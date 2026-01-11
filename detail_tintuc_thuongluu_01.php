<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* -------------------------section 1-----------------  */
        :root {
            --gold-bronze: #D4AF37;
            --champagne: #F7E7CE;
        }

        .immersive-header {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Hero Media & Animation */
        .hero-media {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(10px);
            /* Bắt đầu bằng Blur */
            transform: scale(1.1);
            animation: infiniteZoom 20s linear infinite alternate, fadeInClear 2s ease-out forwards;
        }

        .overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.8) 100%);
            z-index: 2;
        }

        @keyframes infiniteZoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        @keyframes fadeInClear {
            to {
                filter: blur(0);
                opacity: 1;
            }
        }

        /* Main Content */
        .hero-content {
            position: relative;
            z-index: 10;
            padding: 0 5%;
            max-width: 1200px;
        }

        .main-headline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            color: #fff;
            line-height: 1.1;
            margin: 30px 0;
            font-weight: 900;
        }

        .line-reveal {
            display: block;
            overflow: hidden;
        }

        .gold-text {
            color: var(--gold-bronze);
        }

        .decoration-line {
            width: 0;
            height: 1px;
            background: var(--gold-bronze);
            margin: 0 auto;
            box-shadow: 0 0 15px var(--gold-bronze);
        }

        .meta-data,
        .author-info {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            letter-spacing: 4px;
            color: var(--silver-grey);
            text-transform: uppercase;
        }

        .meta-tag {
            color: var(--gold-bronze);
            font-weight: bold;
        }

        /* Sticky & Progress Bar */
        .reading-progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.1);
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background: var(--gold-bronze);
            box-shadow: 0 0 10px var(--gold-bronze);
        }

        .sticky-nav {
            position: fixed;
            top: -60px;
            left: 0;
            width: 100%;
            height: 60px;
            background: rgba(10, 10, 11, 0.95);
            backdrop-filter: blur(10px);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 5%;
            transition: top 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .sticky-title {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 14px;
            letter-spacing: 1px;
        }

        /* Scroll Hint */
        .scroll-hint {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            opacity: 0.6;
        }

        .scroll-text {
            font-size: 9px;
            letter-spacing: 3px;
            color: #fff;
            display: block;
            margin-bottom: 10px;
        }

        .scroll-arrow {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, var(--gold-bronze), transparent);
            margin: 0 auto;
            animation: pulseLine 2s infinite;
        }

        @keyframes pulseLine {
            0% {
                height: 0;
                opacity: 0;
            }

            50% {
                height: 50px;
                opacity: 1;
            }

            100% {
                height: 50px;
                opacity: 0;
                transform: translateY(20px);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-headline {
                font-size: 2.2rem;
            }

            .hero-content {
                margin-top: 20vh;
            }
        }

        /* -------------------------section 2-----------------  */
        .narrative-body {
            background: #000;
            color: #F5F5F5;
            padding: 100px 0;
            position: relative;
        }

        .narrative-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            position: relative;
            padding: 0 5%;
        }

        /* Sidebar */
        .narrative-sidebar {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            padding-top: 100px;
        }

        .sidebar-inner {
            position: sticky;
            top: 120px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        .side-btn {
            background: transparent;
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: #D4AF37;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .side-btn:hover {
            background: #D4AF37;
            color: #000;
        }

        /* Article Content */
        .main-article {
            max-width: 800px;
            /* Độ rộng tối ưu để đọc không mỏi mắt */
            width: 100%;
        }

        .article-lead {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            line-height: 1.5;
            font-style: italic;
            color: #A1A1A6;
            margin-bottom: 50px;
        }

        .article-paragraph {
            font-family: 'Inter', sans-serif;
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 30px;
            color: #E0E0E0;
        }

        .drop-cap {
            float: left;
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            line-height: 1;
            color: #D4AF37;
            margin-right: 15px;
            margin-top: 10px;
        }

        .sub-heading {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 1rem;
            color: #D4AF37;
            margin: 60px 0 30px;
        }

        /* Full-bleed Image */
        .full-bleed-image {
            margin: 60px -100px;
            /* Tràn lề văn bản */
            position: relative;
        }

        .full-bleed-image img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .full-bleed-image figcaption {
            font-size: 0.9rem;
            color: #666;
            margin-top: 15px;
            text-align: center;
        }

        /* Pull Quote */
        .pull-quote {
            margin: 80px 0;
            text-align: center;
            position: relative;
        }

        .pull-quote p {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            line-height: 1.3;
            color: #fff;
            padding: 30px 0;
        }

        .pull-quote cite {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 4px;
            color: #D4AF37;
            font-style: normal;
        }

        .quote-line {
            width: 60px;
            height: 1px;
            background: #D4AF37;
            margin: 0 auto;
        }

        /* Tooltip */
        .tooltip-trigger {
            border-bottom: 1px dashed #D4AF37;
            cursor: help;
            position: relative;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .full-bleed-image {
                margin: 60px 0;
            }

            .narrative-sidebar {
                display: none;
            }

            /* Ẩn sidebar trên tablet/mobile */
        }

        @media (max-width: 768px) {
            .article-lead {
                font-size: 1.4rem;
            }

            .article-paragraph {
                font-size: 1.1rem;
                line-height: 1.6;
            }

            .pull-quote p {
                font-size: 1.6rem;
            }
        }

        /* -------------------------section 3-----------------  */
        .immersive-gallery {
            background: #0A0A0A;
            width: 100vw;
            margin-left: calc(50% - 50vw);
            /* Kỹ thuật giúp tràn lề hoàn toàn dù nằm trong container */
            padding: 100px 0;
            overflow: hidden;
        }

        .gallery-wrapper {
            width: 80%;
            /* Bắt đầu với chiều rộng nhỏ để tạo hiệu ứng giãn nở */
            margin: 0 auto;
            height: 70vh;
            position: relative;
            transition: width 1.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .gallery-wrapper.expanded {
            width: 100%;
        }

        .showroom-container {
            width: 100%;
            height: 100%;
            position: relative;
            background: #000;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
            cursor: crosshair;
        }

        .showroom-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }

        /* Controls & Overlay */
        .video-controls {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.5s;
            z-index: 10;
        }

        .showroom-container:hover .video-controls {
            opacity: 1;
        }

        .control-btn {
            background: rgba(212, 175, 55, 0.2);
            border: 1px solid #D4AF37;
            color: #D4AF37;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            backdrop-filter: blur(5px);
        }

        .showroom-overlay {
            position: absolute;
            bottom: 30px;
            left: 30px;
            display: flex;
            gap: 40px;
            background: rgba(0, 0, 0, 0.6);
            padding: 20px 30px;
            backdrop-filter: blur(10px);
            border-left: 2px solid #D4AF37;
            z-index: 5;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-item .label {
            font-size: 10px;
            letter-spacing: 2px;
            color: #888;
        }

        .info-item .value {
            font-size: 13px;
            letter-spacing: 1px;
            color: #F7E7CE;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        /* Magnifier */
        #magnifier {
            position: absolute;
            width: 150px;
            height: 150px;
            border: 2px solid #D4AF37;
            border-radius: 50%;
            pointer-events: none;
            display: none;
            background-repeat: no-repeat;
            z-index: 100;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .fullscreen-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: #D4AF37;
            font-size: 20px;
            cursor: pointer;
            z-index: 10;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .gallery-wrapper {
                height: 50vh;
                width: 100% !important;
            }

            .showroom-overlay {
                flex-direction: column;
                gap: 10px;
                bottom: 10px;
                left: 10px;
                padding: 15px;
            }

            .info-item .value {
                font-size: 11px;
            }

            #magnifier {
                display: none !important;
            }

            /* Tắt kính lúp trên mobile */
        }

        /* -------------------------section 4-----------------  */
        .authority-insight-wrapper {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 5%;
            position: relative;
        }

        .insight-container {
            display: flex;
            gap: 50px;
            align-items: flex-start;
        }

        /* Authority Card - Glassmorphism */
        .authority-card {
            flex: 0 0 380px;
            /* Chiếm khoảng 30-40% chiều rộng */
            position: sticky;
            top: 100px;
            /* Hiệu ứng Sticky Reveal */
            background: rgba(15, 15, 15, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 40px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .card-glow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            box-shadow: inset 0 0 30px rgba(212, 175, 55, 0.05);
            pointer-events: none;
        }

        .expert-profile {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .expert-image-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            filter: grayscale(100%);
            border: 1px solid var(--gold-bronze);
        }

        .expert-portrait {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .expert-name {
            font-family: 'Inter', sans-serif;
            color: #F7E7CE;
            /* Rose Gold */
            font-size: 14px;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .expert-rank {
            font-size: 9px;
            color: #888;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .insight-content {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.15rem;
            line-height: 1.7;
            color: #E0E0E0;
            margin-bottom: 30px;
            position: relative;
        }

        /* Chữ ký điện tử */
        .signature-container {
            text-align: right;
            position: relative;
        }

        .ink-signature {
            width: 150px;
            height: 50px;
        }

        #signaturePath {
            stroke-dasharray: 500;
            stroke-dashoffset: 500;
            /* Ẩn đi để vẽ */
        }

        .sign-label {
            display: block;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(212, 175, 55, 0.5);
            margin-top: -10px;
        }

        .accompanying-text {
            flex: 1;
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #A1A1A6;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .insight-container {
                flex-direction: column;
            }

            .authority-card {
                flex: 1;
                position: relative;
                top: 0;
                width: 100%;
                margin-bottom: 40px;
                order: 2;
                /* Đưa xuống sau đoạn văn đầu tiên trên mobile */
            }

            .accompanying-text {
                order: 1;
            }
        }


        /* -------------------------section 5-----------------  */
        .continued-journey {
            background: linear-gradient(to bottom, #000000, #0F0F0F);
            padding: 120px 0 0 0;
            overflow: hidden;
        }

        .journey-container {
            width: 100%;
        }

        .related-section {
            max-width: 1200px;
            margin: 0 auto 100px;
            padding: 0 5%;
        }

        .journey-label {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            letter-spacing: 5px;
            color: #D4AF37;
            margin-bottom: 50px;
            text-align: center;
        }

        /* Related Grid */
        .related-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .chronicle-card {
            position: relative;
            transition: transform 0.3s ease;
        }

        .chronicle-link {
            text-decoration: none;
            display: block;
        }

        .chronicle-img-wrapper {
            width: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            border-radius: 2px;
            margin-bottom: 25px;
            background: #111;
        }

        .chronicle-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .chronicle-meta {
            font-size: 10px;
            letter-spacing: 2px;
            color: #666;
            display: block;
            margin-bottom: 10px;
        }

        .chronicle-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #fff;
            line-height: 1.4;
            transition: color 0.3s;
        }

        /* Effects on Hover */
        .chronicle-card:hover .chronicle-img-wrapper img {
            transform: scale(1.05);
        }

        .chronicle-card:hover .chronicle-title {
            color: #D4AF37;
        }

        #relatedGrid:hover .chronicle-card:not(:hover) {
            opacity: 0.4;
            filter: grayscale(1);
        }

        /* CTA Banner */
        .cta-banner {
            position: relative;
            padding: 100px 0;
            text-align: center;
            background: #050505;
            border-top: 1px solid rgba(212, 175, 55, 0.1);
        }

        .infinite-path {
            position: absolute;
            bottom: 0;
            left: -100%;
            width: 200%;
            height: 1px;
            background: linear-gradient(to right, transparent, #D4AF37, transparent);
            animation: pathFlow 8s linear infinite;
        }

        @keyframes pathFlow {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(50%);
            }
        }

        .cta-message {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 40px;
            line-height: 1.3;
        }

        .btn-cta-gold {
            display: inline-block;
            padding: 20px 50px;
            background: transparent;
            border: 1px solid #D4AF37;
            color: #D4AF37;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            letter-spacing: 3px;
            position: relative;
            overflow: hidden;
        }

        .btn-glow {
            position: absolute;
            inset: 0;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0);
            animation: breathGlow 3s infinite;
        }

        @keyframes breathGlow {

            0%,
            100% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.1);
            }

            50% {
                box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
            }
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .related-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                padding-bottom: 30px;
                gap: 20px;
            }

            .chronicle-card {
                flex: 0 0 85%;
                scroll-snap-align: start;
            }

            .cta-message {
                font-size: 1.5rem;
            }

            .btn-cta-gold {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <!-- --------------------------------- section 1 --------------------------------- -->
    <section class="immersive-header" id="heroSection">
        <div class="reading-progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <div class="sticky-nav" id="stickyNav">
            <span class="sticky-title">Bộ sưu tập xe của giới tài phiệt Trung Đông</span>
        </div>

        <div class="hero-media">
            <div class="overlay-gradient"></div>
            <img src="https://images.unsplash.com/photo-1514316454349-750a7fd3da3a?q=80&w=1974&auto=format&fit=crop" class="hero-img" alt="Middle East Luxury Hero">
        </div>

        <div class="hero-content">
            <div class="meta-data reveal-item">
                <span class="meta-tag">LIFESTYLE</span>
                <span class="meta-separator">/</span>
                <span class="meta-date">05 THÁNG 10, 2023</span>
            </div>

            <h1 class="main-headline">
                <span class="line-reveal">Bộ sưu tập xe của</span>
                <span class="line-reveal">giới <span class="gold-text">tài phiệt Trung Đông.</span></span>
            </h1>

            <div class="decoration-line"></div>

            <div class="author-info reveal-item" style="padding-top: 1%;">
                <span class="author-name">BỞI QUỐC ANH - TẠP CHÍ THƯỢNG LƯU</span>
                <span class="read-time">12 PHÚT ĐỌC</span>
            </div>
        </div>

        <div class="scroll-hint">
            <span class="scroll-text">KHÁM PHÁ GARA TRIỆU ĐÔ</span>
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <!-- --------------------------------- section 2 --------------------------------- -->
    <section class="narrative-body">
    <div class="narrative-container">

        <aside class="narrative-sidebar">
            <div class="sidebar-inner">
                <button class="side-btn" title="Lưu bài viết"><i class="far fa-bookmark"></i></button>
                <div class="side-divider"></div>
                <button class="side-btn"><i class="fab fa-facebook-f"></i></button>
                <button class="side-btn"><i class="fab fa-twitter"></i></button>
                <button class="side-btn"><i class="fas fa-link"></i></button>
            </div>
        </aside>

        <article class="main-article">
            <p class="article-lead">
                Tại những vùng đất xa xôi của Trung Đông, nơi sa mạc gặp gỡ những tòa tháp chọc trời, xe hơi không còn là phương tiện di chuyển. Chúng là những tác phẩm nghệ thuật, là biểu tượng quyền lực và là những kho báu di động trong các gara có giá trị còn lớn hơn cả một tòa lâu đài.
            </p>

            <p class="article-paragraph">
                <span class="drop-cap">V</span>ới giới tài phiệt vùng Vịnh, việc sở hữu một chiếc Bugatti hay Ferrari phiên bản tiêu chuẩn chỉ là bước khởi đầu. Sự khác biệt thực sự nằm ở những tùy chỉnh độc bản (bespoke). Những chiếc xe được dát vàng, bọc da cá sấu bạch tạng hay đính kim cương lên bảng điều khiển là điều không hiếm gặp. Đặc biệt, linh hồn của những bộ sưu tập này chính là các <span class="tooltip-trigger" data-tooltip="Những tấm biển số có ít chữ số (1 hoặc 2 số) tại Dubai hoặc Abu Dhabi thường được đấu giá với mức giá từ vài triệu đến hàng chục triệu USD.">tấm biển số độc mã</span>, đôi khi có giá trị cao gấp 10 lần chiếc siêu xe đắt nhất thế giới.
            </p>

            <p class="article-paragraph">
                Khám phá bên trong các "thánh đường" siêu xe tại Dubai hay Doha, người ta dễ dàng choáng ngợp trước những dãy xe được sắp xếp theo tông màu hoặc theo bề dày lịch sử. Từ những chiếc Rolls-Royce phiên bản giới hạn kỷ niệm 100 năm cho đến những mẫu Hypercar chưa từng được xuất hiện trước công chúng như Lykan Hypersport hay Devel Sixteen. Mỗi chiếc xe đều được chăm sóc trong môi trường điều hòa nhiệt độ chính xác và được bảo vệ bởi đội ngũ an ninh chuyên nghiệp.
            </p>

            <h3 class="sub-heading">Khi đam mê vượt qua mọi giới hạn tài chính</h3>

            <p class="article-paragraph">
                Một xu hướng mới của giới siêu giàu Trung Đông hiện nay là sưu tầm các dòng "Super-SUV" để chinh phục các cồn cát sa mạc nhưng vẫn giữ nguyên sự xa hoa của nội thất limousine. Những chiếc Mercedes-AMG G63 phiên bản 6x6 hay Lamborghini Urus độ Mansory với lớp sơn phản quang trở thành "vũ khí" ưa thích của các hoàng thân trong những chuyến đi săn giữa lòng sa mạc.
            </p>

            <figure class="full-bleed-image">
                <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?q=80&w=2070" alt="Middle East Supercar">
                <figcaption>Ánh đèn laser phản chiếu trên thân xe sợi carbon – một cảnh tượng quen thuộc tại các buổi tụ họp của giới sưu tầm vùng Vịnh.</figcaption>
            </figure>

            <p class="article-paragraph">
                "Họ không chỉ mua xe, họ mua lịch sử và sự duy nhất," một chuyên gia giám định quốc tế chia sẻ. Giới tài phiệt Trung Đông thường có mối quan hệ trực tiếp với các hãng xe như McLaren hay Koenigsegg để yêu cầu những <span class="tooltip-trigger" data-tooltip="Những mẫu xe được thiết kế và chế tạo hoàn toàn theo ý muốn của khách hàng, không có chiếc thứ hai trên thế giới.">phiên bản One-off</span>. Đối với họ, việc nhìn thấy một người khác lái chiếc xe giống hệt mình là một điều không thể chấp nhận được.
            </p>

            <blockquote class="pull-quote">
                <div class="quote-line"></div>
                <p>"Ở đây, gara không phải là nơi để xe, đó là một bảo tàng cá nhân nơi chúng tôi lưu giữ những giấc mơ bằng thép và kim cương."</p>
                <cite>— HOÀNG THÂN SAUDI ARABIA (Ẩn danh)</cite>
                <div class="quote-line"></div>
            </blockquote>

            <p class="article-paragraph">
                Cuộc chơi siêu xe tại Trung Đông cũng đang dần chuyển mình sang kỷ nguyên điện hóa với những mẫu siêu xe điện có công suất hàng nghìn mã lực. Tuy nhiên, dù công nghệ có thay đổi, tinh thần về sự sang trọng tột bậc và cái tôi cá nhân mạnh mẽ vẫn luôn là kim chỉ nam cho giới tài phiệt nơi đây. Mỗi bộ sưu tập là một câu chuyện về tầm nhìn, quyền lực và sự khát khao chinh phục mọi giới hạn của con người.
            </p>
        </article>
    </div>
</section>

    <!-- --------------------------------- section 3 --------------------------------- -->
    <section class="immersive-gallery">
        <div class="gallery-wrapper" id="galleryTrigger">

            <div class="showroom-container">
                <video class="showroom-video"
                    autoplay
                    muted
                    loop
                    playsinline
                    id="galleryVideo"
                    poster="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=2070">
                    <source src="" type="video/mp4">
                    Trình duyệt của bạn không hỗ trợ video.
                </video>

                <div class="video-controls">
                    <button id="playPauseBtn" class="control-btn"><i class="fas fa-pause"></i></button>
                </div>

                <div id="magnifier"></div>

                <div class="showroom-overlay">
                    <div class="info-item">
                        <span class="label">VẬT THỂ:</span>
                        <span class="value">BIỂN SỐ 51K-999.99</span>
                    </div>
                    <div class="info-item">
                        <span class="label">CHẤT LIỆU:</span>
                        <span class="value">TITANIUM GOLD PVD</span>
                    </div>
                    <div class="info-item">
                        <span class="label">TÌNH TRẠNG:</span>
                        <span class="value">NGUYÊN BẢN (MINT)</span>
                    </div>
                </div>

                <button class="fullscreen-toggle"><i class="fas fa-expand"></i></button>
            </div>
        </div>
    </section>

    <!-- --------------------------------- section 4 --------------------------------- -->
    <section class="authority-insight-wrapper">
        <div class="insight-container">

            <aside class="authority-card reveal-insight">
                <div class="card-glow"></div>

                <div class="expert-profile">
                    <div class="expert-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070" alt="Expert Portrait" class="expert-portrait">
                    </div>
                    <div class="expert-meta">
                        <h4 class="expert-name">NAM NGUYEN</h4>
                        <p class="expert-rank">CHUYÊN GIA PHONG THỦY & SƯU TẦM SỐ</p>
                    </div>
                </div>

                <div class="insight-content">
                    <p class="insight-quote">
                        "Giá trị của một dãy số không nằm ở cách nó hiển thị trên mặt kim loại, mà ở cách nó cộng hưởng với bản mệnh của chủ nhân. Một dãy ngũ quý 9 trong vận 9 không chỉ là tài sản, nó là một cổng năng lượng dẫn lối tài lộc."
                    </p>
                </div>

                <div class="signature-container">
                    <svg viewBox="0 0 200 60" class="ink-signature">
                        <path d="M20,40 Q50,10 80,40 T140,40 Q160,20 180,50" fill="none" stroke="#D4AF37" stroke-width="2" id="signaturePath" />
                    </svg>
                    <span class="sign-label">Verified Authority</span>
                </div>
            </aside>

            <div class="accompanying-text">
                <p>Như đã đề cập ở phần trước, sự dịch chuyển năng lượng từ vận 8 sang vận 9 đã thay đổi hoàn toàn tư duy của giới sưu tầm. Các dãy số mang hành Hỏa và Thổ đang trở thành mục tiêu săn đón hàng đầu...</p>
                <p>Nhiều phiên đấu giá gần đây cho thấy mức giá kỷ lục thường rơi vào các tấm biển có sự xuất hiện của số 9. Đây không phải là ngẫu nhiên mà là một chiến lược tích sản có tính toán của giới tinh hoa.</p>
            </div>
        </div>
    </section>

    <!-- --------------------------------- section 5 --------------------------------- -->
    <section class="continued-journey">
        <div class="journey-container">
            <div class="related-section">
                <h3 class="journey-label">CÂU CHUYỆN TIẾP THEO</h3>
                <div class="related-grid" id="relatedGrid">
                    <div class="chronicle-card">
                        <a href="detail_tintuc_thitruong_02.php" class="chronicle-link">
                            <div class="chronicle-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=2070" alt="Related Article">
                            </div>
                            <div class="chronicle-info">
                                <span class="chronicle-meta">THỊ TRƯỜNG • 5 PHÚT ĐỌC</span>
                                <h4 class="chronicle-title">Tương lai của biển số xe định danh trong kỷ nguyên số</h4>
                            </div>
                        </a>
                    </div>

                    <div class="chronicle-card">
                        <a href="detail_tintuc_thitruong_03.php" class="chronicle-link">
                            <div class="chronicle-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c?q=80&w=2070" alt="Related Article">
                            </div>
                            <div class="chronicle-info">
                                <span class="chronicle-meta">BỘ SƯU TẬP • 12 PHÚT ĐỌC</span>
                                <h4 class="chronicle-title">Chiêm ngưỡng bộ sưu tập "Ngũ Quý" của đại gia Sài Thành</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="cta-banner">
                <div class="infinite-path"></div>
                <div class="cta-content">
                    <h2 class="cta-message">Cảm hứng từ những con số? <br>Khám phá những báu vật đang chờ đợi chủ nhân.</h2>
                    <a href="daugia.php" class="btn-cta-gold">
                        <span class="btn-text">GIA NHẬP ĐẤU TRƯỜNG</span>
                        <div class="btn-glow"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php" ?>
</body>
<script>
    // ----------------------------- section 1 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Khởi tạo hiệu ứng Reveal khi tải trang
        const tl = gsap.timeline();

        tl.to(".decoration-line", {
                width: "150px",
                duration: 1.5,
                ease: "expo.inOut"
            })
            .from(".line-reveal", {
                y: 100,
                opacity: 0,
                duration: 1.2,
                stagger: 0.2,
                ease: "power4.out"
            }, "-=1")
            .from(".reveal-item", {
                opacity: 0,
                y: 20,
                duration: 1,
                stagger: 0.2
            }, "-=0.5");

        // 2. Xử lý Scroll Morph & Reading Progress
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrolled / windowHeight) * 100;

            // Cập nhật thanh tiến trình
            document.getElementById('progressBar').style.width = progress + "%";

            // Hiệu ứng Parallax & Fade cho Hero Content
            gsap.to(".hero-content", {
                y: scrolled * 0.4,
                opacity: 1 - (scrolled / 600),
                duration: 0.1
            });

            // Hiện Sticky Nav khi cuộn qua Hero
            if (scrolled > window.innerHeight * 0.8) {
                document.getElementById('stickyNav').style.top = "0";
            } else {
                document.getElementById('stickyNav').style.top = "-60px";
            }
        });

        // 3. Mouse Parallax (Desktop only)
        if (window.innerWidth > 1024) {
            document.addEventListener('mousemove', (e) => {
                const x = (e.clientX / window.innerWidth - 0.5) * 20;
                const y = (e.clientY / window.innerHeight - 0.5) * 20;
                gsap.to(".hero-img", {
                    x: x,
                    y: y,
                    duration: 2,
                    ease: "power2.out"
                });
            });
        }
    });

    // ----------------------------- section 2 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Reveal on Scroll (Sử dụng ScrollTrigger)
        const paragraphs = document.querySelectorAll('.article-paragraph, .sub-heading, .pull-quote, .full-bleed-image');

        paragraphs.forEach((p) => {
            gsap.from(p, {
                scrollTrigger: {
                    trigger: p,
                    start: "top 85%",
                    toggleActions: "play none none none"
                },
                y: 30,
                opacity: 0,
                duration: 1,
                ease: "power2.out"
            });
        });

        // 2. Smooth Text Focus (Mờ các đoạn văn xung quanh khi đọc lâu)
        let focusTimer;
        paragraphs.forEach((p) => {
            p.addEventListener('mouseenter', () => {
                clearTimeout(focusTimer);
                focusTimer = setTimeout(() => {
                    paragraphs.forEach(other => {
                        if (other !== p) gsap.to(other, {
                            opacity: 0.3,
                            duration: 1
                        });
                    });
                }, 3000); // 3 giây
            });

            p.addEventListener('mouseleave', () => {
                clearTimeout(focusTimer);
                gsap.to(paragraphs, {
                    opacity: 1,
                    duration: 0.5
                });
            });
        });

        // 3. Interactive Tooltip (Đơn giản bằng CSS/JS)
        document.querySelectorAll('.tooltip-trigger').forEach(trigger => {
            trigger.addEventListener('mouseenter', function(e) {
                const text = this.getAttribute('data-tooltip');
                const tooltip = document.createElement('div');
                tooltip.className = 'custom-tooltip';
                tooltip.innerText = text;
                document.body.appendChild(tooltip);

                const rect = this.getBoundingClientRect();
                tooltip.style.left = rect.left + 'px';
                tooltip.style.top = (rect.top - 40) + 'px';

                gsap.fromTo(tooltip, {
                    opacity: 0,
                    y: 10
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.3
                });
            });

            trigger.addEventListener('mouseleave', () => {
                const tooltip = document.querySelector('.custom-tooltip');
                if (tooltip) tooltip.remove();
            });
        });
    });

    // ----------------------------- section 3 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng giãn nở (Expansion) khi cuộn đến
        const galleryWrapper = document.getElementById('galleryTrigger');

        ScrollTrigger.create({
            trigger: galleryWrapper,
            start: "top 80%",
            onEnter: () => galleryWrapper.classList.add('expanded')
        });

        // 2. Play/Pause Video logic
        const video = document.getElementById('galleryVideo');
        const playPauseBtn = document.getElementById('playPauseBtn');

        playPauseBtn.addEventListener('click', () => {
            if (video.paused) {
                video.play();
                playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                video.pause();
                playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
            }
        });

        // 3. Hiệu ứng Kính lúp (Magnifying Glass)
        const showroom = document.querySelector('.showroom-container');

        showroom.addEventListener('mousemove', (e) => {
            if (window.innerWidth <= 768) return;

            const rect = showroom.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;

            // Di chuyển tâm phóng to theo chuột
            gsap.to(video, {
                transformOrigin: `${x}% ${y}%`,
                scale: 1.3,
                duration: 0.5,
                ease: "power2.out"
            });
        });

        showroom.addEventListener('mouseleave', () => {
            gsap.to(video, {
                scale: 1,
                duration: 0.5,
                ease: "power2.out"
            });
        });

        showroom.addEventListener('mouseleave', () => {
            magnifier.style.display = 'none';
            gsap.to(video, {
                scale: 1,
                duration: 0.5
            });
        });
    });

    // ----------------------------- section 4 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng "Ink Signature" khi cuộn đến
        gsap.registerPlugin(ScrollTrigger);

        gsap.to("#signaturePath", {
            scrollTrigger: {
                trigger: ".signature-container",
                start: "top 90%",
                toggleActions: "play none none none"
            },
            strokeDashoffset: 0,
            duration: 2.5,
            ease: "power1.inOut"
        });

        // 2. Reveal hiệu ứng card (Fade & Glow)
        gsap.from(".authority-card", {
            scrollTrigger: {
                trigger: ".authority-card",
                start: "top 80%",
            },
            opacity: 0,
            x: 50,
            duration: 1.2,
            ease: "expo.out"
        });

        // 3. Hiệu ứng Glow tỏa sáng nhẹ liên tục
        gsap.to(".card-glow", {
            boxShadow: "inset 0 0 50px rgba(212, 175, 55, 0.15)",
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });
    });


    // ----------------------------- section 5 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng Magnetic (Di chuyển nhẹ theo chuột) cho thẻ bài viết
        const cards = document.querySelectorAll('.chronicle-card');

        if (window.innerWidth > 1024) {
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = (e.clientX - rect.left) / rect.width - 0.5;
                    const y = (e.clientY - rect.top) / rect.height - 0.5;

                    gsap.to(card, {
                        x: x * 20,
                        y: y * 20,
                        rotationY: x * 5,
                        rotationX: -y * 5,
                        duration: 0.5,
                        ease: "power2.out"
                    });
                });

                card.addEventListener('mouseleave', () => {
                    gsap.to(card, {
                        x: 0,
                        y: 0,
                        rotationY: 0,
                        rotationX: 0,
                        duration: 0.5,
                        ease: "power2.out"
                    });
                });
            });
        }

        // 2. Reveal Scroll cho CTA
        gsap.from(".cta-content", {
            scrollTrigger: {
                trigger: ".cta-banner",
                start: "top 80%",
            },
            y: 50,
            opacity: 0,
            duration: 1.5,
            ease: "expo.out"
        });
    });
</script>
<!-- ---------------------------- section 2 -----------------------  -->
<style>
    /* CSS cho Tooltip */
    .custom-tooltip {
        position: fixed;
        background: rgba(212, 175, 55, 0.95);
        color: #000;
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 12px;
        z-index: 9999;
        max-width: 250px;
        font-family: 'Inter', sans-serif;
        pointer-events: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
</style>

</html>