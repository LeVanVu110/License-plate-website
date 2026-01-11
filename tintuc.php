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
        /* ----------------------------- section 1 -----------------------------  */
        :root {
            --titanium-white: #F5F5F7;
            --silver-grey: #A1A1A6;
            --black-matte: #0A0A0B;
        }

        .editorial-spotlight {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* Desktop: Căn trái */
            overflow: hidden;
            background: var(--black-matte);
        }

        /* Background & Effects */
        .hero-bg-container {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-image-zoom {
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=2070');
            /* Thay bằng ảnh xe/biển số thực tế */
            background-size: cover;
            background-position: center;
            /* Hiệu ứng Ken Burns giả lập bằng CSS nếu không dùng GSAP */
            animation: kenBurns 20s infinite alternate ease-in-out;
        }

        @keyframes kenBurns {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .hero-overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 50%, transparent 100%);
        }

        /* Content Styles */
        .hero-content {
            position: relative;
            z-index: 10;
            padding-left: 10%;
            /* Desktop lề trái */
            max-width: 800px;
        }

        .editorial-meta {
            margin-bottom: 20px;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            letter-spacing: 3px;
            color: var(--silver-grey);
        }

        .editorial-meta .category {
            color: #fff;
            margin-right: 15px;
            border-right: 1px solid #444;
            padding-right: 15px;
        }

        .hero-headline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            line-height: 1.1;
            color: var(--titanium-white);
            margin: 0 0 40px 0;
            font-weight: 400;
        }

        /* Button & Underline */
        .btn-discover {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            letter-spacing: 4px;
            color: #fff;
            text-decoration: none;
            position: relative;
            padding-bottom: 8px;
        }

        .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 1px;
            background: #fff;
            transition: width 0.5s ease;
        }

        .btn-discover:hover .underline {
            width: 100%;
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            text-align: center;
            opacity: 0.6;
        }

        .scroll-text {
            font-size: 9px;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 10px;
        }

        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, #fff, transparent);
            margin: 0 auto;
            animation: scrollLine 2s infinite;
        }

        @keyframes scrollLine {
            0% {
                transform: scaleY(0);
                transform-origin: top;
            }

            50% {
                transform: scaleY(1);
                transform-origin: top;
            }

            51% {
                transform: scaleY(1);
                transform-origin: bottom;
            }

            100% {
                transform: scaleY(0);
                transform-origin: bottom;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-content {
                padding-left: 0;
                margin: 0 auto;
                text-align: center;
                width: 90%;
                margin-top: 20vh;
            }

            .editorial-meta .category {
                border-right: none;
                display: block;
                margin-right: 0;
                margin-bottom: 10px;
            }

            .hero-headline {
                font-size: 2.8rem;
            }
        }

        /* ----------------------------- section 2 -----------------------------  */
        .market-pulse {
            background: #0A0A0A;
            padding: 60px 0 100px;
            font-family: 'Inter', sans-serif;
            color: #fff;
        }

        /* Ticker Styles */
        .ticker-wrapper {
            background: #000;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 15px 0;
            margin-bottom: 80px;
            overflow: hidden;
        }

        .ticker-content {
            display: flex;
            white-space: nowrap;
            animation: marquee 30s linear infinite;
        }

        .ticker-content:hover {
            animation-play-state: paused;
        }

        .ticker-item {
            display: flex;
            align-items: center;
            padding: 0 40px;
            font-family: 'Roboto Mono', monospace;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .ticker-item span {
            color: #666;
            margin-right: 10px;
        }

        .ticker-item i.up {
            color: #00FF94;
            font-style: normal;
            margin-left: 10px;
        }

        .ticker-item .dot {
            width: 6px;
            height: 6px;
            background: #00FF94;
            border-radius: 50%;
            margin-left: 10px;
            box-shadow: 0 0 10px #00FF94;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* Snap Cards Grid */
        .pulse-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5%;
        }

        .snap-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .snap-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 4px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .snap-card:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-5px);
        }

        .stat-label {
            font-size: 10px;
            letter-spacing: 2px;
            color: #888;
            display: block;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Màu sắc xu hướng */
        .up-trend .stat-value {
            color: #00FF94;
            text-shadow: 0 0 20px rgba(0, 255, 148, 0.2);
        }

        .down-trend .stat-value {
            color: #FF3131;
            text-shadow: 0 0 20px rgba(255, 49, 49, 0.2);
        }

        .gold-trend .stat-value {
            color: #D4AF37;
        }

        .sparkline-container {
            height: 60px;
            margin-bottom: 20px;
        }

        .snap-desc {
            font-size: 12px;
            color: #666;
            line-height: 1.6;
        }

        /* Responsive Mobile */
        @media (max-width: 1024px) {
            .snap-grid {
                display: flex;
                overflow-x: auto;
                padding-bottom: 20px;
                scroll-snap-type: x mandatory;
            }

            .snap-card {
                min-width: 280px;
                scroll-snap-align: center;
            }

            .snap-grid::-webkit-scrollbar {
                display: none;
            }
        }

        /* ----------------------------- section 3 -----------------------------  */
        .knowledge-gallery {
            background: #0A0A0B;
            padding: 100px 0;
            min-height: 100vh;
        }

        .gallery-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5%;
        }

        /* Filter Bar */
        .filter-bar {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 60px;
        }

        .filter-btn {
            background: none;
            border: none;
            color: var(--silver-grey);
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            letter-spacing: 2px;
            cursor: pointer;
            position: relative;
            padding: 10px 0;
            transition: color 0.3s ease;
        }

        .filter-btn.active {
            color: #fff;
        }

        .filter-btn .dot {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) scale(0);
            width: 4px;
            height: 4px;
            background: #D4AF37;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .filter-btn.active .dot {
            transform: translateX(-50%) scale(1);
        }

        /* Masonry Grid */
        .masonry-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: 250px;
            gap: 25px;
        }

        .art-card {
            position: relative;
            overflow: hidden;
            background: #161618;
            border-radius: 2px;
        }

        .big-card {
            grid-column: span 2;
            grid-row: span 2;
        }

        .tall-card {
            grid-row: span 2;
        }

        /* Card Effects */
        .card-inner {
            width: 100%;
            height: 100%;
            position: relative;
            cursor: pointer;
        }

        .parallax-wrapper {
            width: 100%;
            height: 120%;
            /* Dư để chạy parallax */
            position: absolute;
            top: -10%;
        }

        .parallax-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, transparent 60%);
            transition: background 0.5s ease;
        }

        .card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 30px;
            width: 100%;
            z-index: 2;
        }

        .card-meta {
            font-size: 9px;
            letter-spacing: 2px;
            color: #D4AF37;
            display: block;
            margin-bottom: 10px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: #fff;
            line-height: 1.3;
            margin: 0;
        }

        .big-card .card-title {
            font-size: 2.2rem;
        }

        .card-excerpt {
            font-size: 13px;
            color: #888;
            margin-top: 15px;
            height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.5s ease;
        }

        /* Hover Silk Transition */
        .art-card:hover .card-overlay {
            background: rgba(0, 0, 0, 0.8);
        }

        .art-card:hover .card-excerpt {
            height: auto;
            opacity: 1;
        }

        .art-card:hover .parallax-img {
            transform: scale(1.05);
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .masonry-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .big-card {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            .filter-bar {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 20px;
                white-space: nowrap;
            }

            .masonry-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: 400px;
            }

            .big-card,
            .tall-card {
                grid-column: span 1;
                grid-row: span 1;
            }
        }

        /* ----------------------------- section 4 -----------------------------  */
        .expert-voice {
            background: #0D0D0D;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 80px 0;
        }

        .expert-container {
            display: flex;
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            align-items: center;
        }

        /* Visual Side */
        .expert-visual {
            flex: 1;
            height: 90vh;
            padding-left: 5%;
            position: relative;
        }

        .portrait-wrapper {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
            filter: grayscale(100%) contrast(110%);
            transition: filter 0.5s ease;
        }

        .expert-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            will-change: transform;
        }

        .expert-visual:hover .portrait-wrapper {
            filter: grayscale(0%) contrast(100%);
        }

        /* Content Side */
        .expert-content {
            flex: 1;
            padding: 0 8%;
            position: relative;
        }

        .quote-bg {
            position: absolute;
            top: -50px;
            left: 20px;
            font-family: 'Playfair Display', serif;
            font-size: 25rem;
            color: rgba(212, 175, 55, 0.05);
            /* Gold mờ */
            line-height: 1;
            pointer-events: none;
        }

        .golden-quote {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 40px;
        }

        .golden-quote .word {
            display: inline-block;
            opacity: 0;
            transform: translateY(20px);
        }

        .gold-text {
            color: #D4AF37;
        }

        .expert-info {
            border-left: 2px solid #D4AF37;
            padding-left: 25px;
            margin-bottom: 50px;
        }

        .expert-name {
            font-family: 'Inter', sans-serif;
            letter-spacing: 5px;
            font-weight: 900;
            color: #fff;
            margin-bottom: 5px;
        }

        .expert-title {
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn-interview {
            font-family: 'Inter', sans-serif;
            color: #fff;
            text-decoration: none;
            font-size: 11px;
            letter-spacing: 3px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            transition: gap 0.3s ease;
        }

        .btn-interview:hover {
            gap: 30px;
            color: #D4AF37;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .expert-container {
                flex-direction: column;
            }

            .expert-visual {
                height: 60vh;
                padding-left: 0;
                width: 100%;
                order: 2;
            }

            .expert-content {
                padding: 60px 5%;
                order: 1;
                text-align: center;
            }

            .golden-quote {
                font-size: 2.2rem;
            }

            .quote-bg {
                left: 50%;
                transform: translateX(-50%);
                top: 0;
            }

            .expert-info {
                border-left: none;
                padding-left: 0;
            }
        }

        /* ----------------------------- section 5 -----------------------------  */
        .inner-circle {
            position: relative;
            background: #000000;
            min-height: 150vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 100px 5%;
        }

        #dustCanvas {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .circle-container {
            max-width: 800px;
            width: 100%;
            z-index: 2;
            text-align: center;
        }

        .invitation-header .sub-title {
            color: #D4AF37;
            letter-spacing: 5px;
            font-size: 12px;
            display: block;
            margin-bottom: 20px;
        }

        .main-title {
            font-family: 'Playfair Display', serif;
            color: #F7E7CE;
            /* Champagne */
            font-size: 3rem;
            letter-spacing: 2px;
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .description {
            color: #A1A1A6;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 50px;
            font-weight: 300;
        }

        /* Subscribe Form */
        .subscribe-form {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            padding-top: 30%;
        }

        .input-group {
            position: relative;
            width: 100%;
            max-width: 500px;
        }

        .input-group input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px 0;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 18px;
            text-align: center;
            transition: border-color 0.5s ease;
        }

        .input-group input:focus {
            outline: none;
            border-bottom-color: #D4AF37;
        }

        .input-focus-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: #D4AF37;
            box-shadow: 0 0 15px #D4AF37;
            transition: width 0.6s ease;
        }

        .input-group input:focus+.input-focus-line {
            width: 100%;
        }

        /* Nút bấm con dấu */
        .btn-seal {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid #D4AF37;
            color: #D4AF37;
            padding: 18px 45px;
            font-size: 12px;
            letter-spacing: 4px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            transition: all 0.5s ease;
        }

        .btn-seal:hover {
            background: #D4AF37;
            color: #000;
        }

        .seal-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 60px;
            opacity: 0;
        }

        /* Success State */
        .success-message {
            display: none;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .wax-seal-final {
            width: 100px;
            height: 100px;
            background: url('https://cdn-icons-png.flaticon.com/512/3601/3601649.png') no-repeat center;
            background-size: contain;
            filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.5));
            margin-bottom: 20px;
        }

        @media (max-width: 1024px) {
            .inner-circle {
                min-height: 80vh;
                /* Giảm chiều cao từ 150vh xuống để vừa màn hình tablet */
                padding: 80px 5%;
            }

            .main-title {
                font-size: 2.5rem;
            }

            .subscribe-form {
                padding-top: 10% !important;
                /* Giảm khoảng cách đẩy phía trên */
            }
        }

        @media (max-width: 768px) {
            .inner-circle {
                min-height: 100vh;
                /* Đảm bảo phủ kín màn hình mobile */
                padding: 60px 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .main-title {
                font-size: 1.8rem;
                /* Chữ nhỏ lại để không bị tràn dòng */
                margin-bottom: 20px;
            }

            .description {
                font-size: 14px;
                margin-bottom: 30px;
                padding: 0 10px;
            }

            .subscribe-form {
                padding-top: 20px !important;
                /* Xóa bỏ việc đẩy 30% trên mobile */
                width: 100%;
                gap: 20px;
            }

            .input-group {
                max-width: 100%;
            }

            .input-group input {
                font-size: 16px;
                /* Ngăn chặn iOS tự động zoom màn hình khi nhập liệu */
                padding: 12px 0;
            }

            .btn-seal {
                width: 100%;
                /* Nút bấm chiếm toàn màn hình mobile dễ thao tác */
                max-width: 100%;
                padding: 18px 0;
                letter-spacing: 2px;
            }

            /* Đảm bảo header không bị trôi quá xa */
            .invitation-header {
                bottom: auto !important;
                position: relative !important;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 1.5rem;
            }

            .inner-circle {
                min-height: 70vh;
                /* Tối ưu cho các dòng máy nhỏ */
            }
        }
    </style>
</head>

<body>
    <!-- ------------------------------ section 1 ------------------------------  -->
    <section class="editorial-spotlight" id="heroSection">
        <div class="hero-bg-container">
            <div class="hero-image-zoom"></div>
            <div class="hero-overlay-gradient"></div>
        </div>

        <div class="hero-content">
            <div class="editorial-meta reveal-item">
                <span class="category">PHÂN TÍCH THỊ TRƯỜNG</span>
                <span class="read-time">5 PHÚT ĐỌC</span>
            </div>

            <h1 class="hero-headline reveal-item">
                Di sản ẩn mình<br>sau những dãy số
            </h1>

            <div class="hero-action reveal-item">
                <a href="#articleContent" class="btn-discover">
                    KHÁM PHÁ CÂU CHUYỆN
                    <span class="underline"></span>
                </a>
            </div>
        </div>

        <div class="scroll-indicator">
            <span class="scroll-text">CUỘN ĐỂ ĐỌC</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ------------------------------ section 2 ------------------------------  -->
    <section class="market-pulse" id="marketSection">
        <div class="ticker-wrapper">
            <div class="ticker-container">
                <div class="ticker-content">
                    <div class="ticker-item"><span>GIÁ TB TUẦN:</span> 1.2B <i class="up">▲ 4.2%</i></div>
                    <div class="ticker-item"><span>TOP TĂNG TRƯỞNG:</span> 30K-999.99 <i class="up">▲ 15%</i></div>
                    <div class="ticker-item"><span>NGƯỜI CHƠI MỚI:</span> +1,240 <i class="up">▲ 8%</i></div>
                    <div class="ticker-item"><span>SÀN GIAO DỊCH:</span> ĐANG MỞ <span class="dot"></span></div>
                    <div class="ticker-item"><span>GIÁ TB TUẦN:</span> 1.2B <i class="up">▲ 4.2%</i></div>
                    <div class="ticker-item"><span>TOP TĂNG TRƯỞNG:</span> 30K-999.99 <i class="up">▲ 15%</i></div>
                </div>
            </div>
        </div>

        <div class="pulse-container">
            <div class="snap-grid" id="snapCarousel">
                <div class="snap-card up-trend">
                    <div class="snap-header">
                        <span class="stat-label">CHỈ SỐ NIỀM TIN</span>
                        <h3 class="stat-value">+15.8%</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart1"></canvas>
                    </div>
                    <p class="snap-desc">Thị trường biển số ngũ quý đang đạt đỉnh mới trong tháng 10.</p>
                </div>

                <div class="snap-card neutral-trend">
                    <div class="snap-header">
                        <span class="stat-label">LƯỢT TRUY CẬP</span>
                        <h3 class="stat-value">245K</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart2"></canvas>
                    </div>
                    <p class="snap-desc">Sự quan tâm đến dòng biển số phong thủy tăng trưởng ổn định.</p>
                </div>

                <div class="snap-card down-trend">
                    <div class="snap-header">
                        <span class="stat-label">BIẾN ĐỘNG GIÁ</span>
                        <h3 class="stat-value">-2.4%</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart3"></canvas>
                    </div>
                    <p class="snap-desc">Dòng biển số phổ thông ghi nhận sự điều chỉnh giá nhẹ.</p>
                </div>

                <div class="snap-card gold-trend">
                    <div class="snap-header">
                        <span class="stat-label">GIAO DỊCH VIP</span>
                        <h3 class="stat-value">12</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart4"></canvas>
                    </div>
                    <p class="snap-desc">Các phiên đấu giá kín cho giới thượng lưu tăng mạnh.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------------ section 3 ------------------------------  -->
    <section class="knowledge-gallery" id="knowledgeSection">
        <div class="gallery-container">
            <div class="filter-bar reveal-item">
                <button class="filter-btn active" data-filter="all">TẤT CẢ <span class="dot"></span></button>
                <button class="filter-btn" data-filter="phong-thuy">PHONG THỦY <span class="dot"></span></button>
                <button class="filter-btn" data-filter="thi-truong">THỊ TRƯỜNG <span class="dot"></span></button>
                <button class="filter-btn" data-filter="phap-ly">PHÁP LÝ <span class="dot"></span></button>
                <button class="filter-btn" data-filter="thuong-luu">ĐỜI SỐNG THƯỢNG LƯU <span class="dot"></span></button>
            </div>
            <div class="masonry-grid">
                <div class="art-card big-card phap-ly" data-category="phap-ly">
                    <a href="detail_tintuc_phaply_01.php" style="text-decoration: none; color: inherit;">
                        <div class="card-inner">
                            <div class="parallax-wrapper">
                                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=2070" class="parallax-img" alt="Pháp lý">
                            </div>
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <span class="card-meta">PHÁP LÝ • 12 THÁNG 10, 2023</span>
                                <h2 class="card-title">Quy trình định danh biển số: Những điều giới sưu tầm cần lưu ý</h2>
                                <p class="card-excerpt">Cập nhật những thay đổi mới nhất về luật định và cách thức bảo tồn tài sản số...</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="art-card thi-truong" data-category="thi-truong">
                    <a href="detail_tintuc_thitruong_01.php" style="text-decoration: none; color: inherit;">
                        <div class="card-inner">
                            <div class="parallax-wrapper">
                                <img src="https://images.unsplash.com/photo-1560179707-f14e90ef3623?q=80&w=2073" class="parallax-img" alt="Thị trường">
                            </div>
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <span class="card-meta">THỊ TRƯỜNG • 08 THÁNG 10, 2023</span>
                                <h2 class="card-title">Dự báo dòng tiền chảy vào thị trường biển số quý cuối năm</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="art-card phong-thuy" data-category="phong-thuy">
                    <a href="detail_tintuc_phonggthuy_01.php" style="text-decoration: none; color: inherit;">
                        <div class="card-inner">
                            <div class="parallax-wrapper">
                                <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=2070" class="parallax-img" alt="Phong thủy">
                            </div>
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <span class="card-meta">PHONG THỦY • 10 THÁNG 10, 2023</span>
                                <h2 class="card-title">Ngũ hành và màu xe: Tìm sự cân bằng tuyệt đối</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="art-card tall-card phong-thuy" data-category="phong-thuy">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1507608869274-d3177c8bb4c7?q=80&w=2070" class="parallax-img" alt="Cửu tử hỏa tinh">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">PHONG THỦY • VẬN 9 CẬN KỀ</span>
                            <h2 class="card-title">Cửu Tử Hỏa Tinh: Tại sao số 9 sẽ thống trị thập kỷ tới?</h2>
                            <p class="card-excerpt">Phân tích sự chuyển dịch năng lượng từ Vận 8 sang Vận 9 và tầm ảnh hưởng đến giá trị các dòng biển số đuôi 9...</p>
                        </div>
                    </div>
                </div>
                <div class="art-card tall-card phong-thuy" data-category="phong-thuy">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?q=80&w=1944" class="parallax-img" alt="Ngũ hành">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">KIẾN THỨC • NGŨ HÀNH</span>
                            <h2 class="card-title">Tương sinh hay Tương khắc: Cách chọn màu biển số theo bản mệnh</h2>
                            <p class="card-excerpt">Đừng để sự xung khắc về màu sắc cản trở vượng khí của bạn. Hướng dẫn chi tiết cho người mệnh Kim và Thủy...</p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="art-card thuong-luu" data-category="thuong-luu">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2069" class="parallax-img" alt="Sự kiện thượng lưu">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">SỰ KIỆN • ĐẶC QUYỀN</span>
                            <h2 class="card-title">Bên trong buổi tiệc kín của các "Whale" trong giới sưu tầm số</h2>
                            <p class="card-excerpt">Nơi những thương vụ triệu đô được chốt nhanh chóng bên ly vang đỏ và những câu chuyện về phong thủy đạo học...</p>
                        </div>
                    </div>
                </div>
                <div class="art-card thi-truong" data-category="thi-truong">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=2025" class="parallax-img" alt="Siêu xe biển số đẹp">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">THỊ TRƯỜNG • GIAO DỊCH</span>
                            <h2 class="card-title">Điểm danh 5 thương vụ "khủng" nhất quý 3 năm 2023</h2>
                            <p class="card-excerpt">Từ những dãy số tiến đều cho đến ngũ quý, cùng nhìn lại những mức giá kỷ lục đã được thiết lập...</p>
                        </div>
                    </div>
                </div>
                <div class="art-card big-card thi-truong" data-category="thi-truong">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&q=80&w=2000" class="parallax-img" alt="Biểu đồ thị trường">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">THỊ TRƯỜNG • PHÂN TÍCH</span>
                            <h2 class="card-title">Sóng ngầm thị trường: Tại sao giới đầu tư bất động sản đang chuyển hướng sang biển số?</h2>
                            <p class="card-excerpt">Khi tính thanh khoản của các kênh đầu tư truyền thống chậm lại, "bất động sản trên những con số" đang trở thành nơi trú ẩn an toàn...</p>
                        </div>
                    </div>
                </div> -->
                <div class="art-card tall-card thuong-luu" data-category="thuong-luu">
                    <a href="detail_tintuc_thuongluu_01.php" style="text-decoration: none; color: inherit;">
                        <div class="card-inner">
                            <div class="parallax-wrapper">
                                <img src="https://images.unsplash.com/photo-1514316454349-750a7fd3da3a?q=80&w=1974" class="parallax-img" alt="Thượng lưu">
                            </div>
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <span class="card-meta">LIFESTYLE • 05 THÁNG 10, 2023</span>
                                <h2 class="card-title">Bộ sưu tập xe của giới tài phiệt Trung Đông</h2>
                                <p class="card-excerpt">Khám phá những gara trị giá hàng trăm triệu USD...</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="art-card tall-card thi-truong" data-category="thi-truong">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1434626881859-194d67b2b86f?q=80&w=2070" class="parallax-img" alt="Chiến lược đầu tư">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">KINH NGHIỆM • CHIẾN LƯỢC</span>
                            <h2 class="card-title">Đầu tư biển số: Cuộc chơi lướt sóng hay tích sản dài hạn?</h2>
                            <p class="card-excerpt">Lời khuyên từ các chuyên gia lâu năm về việc nhận định giá trị thực của một dãy số trước khi xuống tiền...</p>
                        </div>
                    </div>
                </div>
                <div class="art-card big-card phong-thuy" data-category="phong-thuy">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070" class="parallax-img" alt="Doanh nhân">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">PHONG THỦY • KINH DOANH</span>
                            <h2 class="card-title">Đại cát - Đại lợi: Những dãy số giúp khai thông cung tài lộc cho chủ doanh nghiệp</h2>
                            <p class="card-excerpt">Không chỉ là vẻ ngoài, một dãy số đúng phong thủy là "bùa hộ mệnh" giúp các hợp đồng triệu đô trở nên suôn sẻ hơn...</p>
                        </div>
                    </div>
                </div> -->
                <div class="art-card big-card thuong-luu" data-category="thuong-luu">
                    <a href="detail_tintuc_thuongluu_02.php" style="text-decoration: none; color: inherit;">
                        <div class="card-inner">
                            <div class="parallax-wrapper">
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070" class="parallax-img" alt="Resort hạng sang">
                            </div>
                            <div class="card-overlay"></div>
                            <div class="card-content">
                                <span class="card-meta">TRẢI NGHIỆM • THƯỢNG LƯU</span>
                                <h2 class="card-title">Hành trình xuyên Việt trên những chiếc xe "biển xanh" định danh: Đẳng cấp mới của du lịch trải nghiệm</h2>
                                <p class="card-excerpt">Không chỉ là di chuyển, đó là cách giới tinh hoa khẳng định vị thế cá nhân trên mỗi cung đường họ đi qua...</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="art-card tall-card thuong-luu" data-category="thuong-luu">
                    <div class="card-inner">
                        <div class="parallax-wrapper">
                            <img src="https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=2070" class="parallax-img" alt="Siêu xe và Lifestyle">
                        </div>
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <span class="card-meta">LIFESTYLE • ĐỘC BẢN</span>
                            <h2 class="card-title">Thú chơi biển số: Trang sức cuối cùng cho những chiếc Hypercar</h2>
                            <p class="card-excerpt">Tại sao một chiếc xe 100 tỷ vẫn chưa được coi là hoàn hảo nếu thiếu đi một tấm biển số "ngũ quý" tương xứng?...</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- ------------------------------ section 4 ------------------------------  -->
    <section class="expert-voice" id="expertSection">
        <div class="expert-container">
            <div class="expert-visual">
                <div class="portrait-wrapper">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1974" class="expert-img" alt="Chuyên gia sưu tầm">
                    <div class="liquid-overlay"></div>
                </div>
            </div>

            <div class="expert-content">
                <div class="quote-bg">“</div>
                <div class="quote-wrapper">
                    <h2 class="golden-quote">
                        <span class="word">Biển</span>
                        <span class="word">số</span>
                        <span class="word">không</span>
                        <span class="word">chỉ</span>
                        <span class="word">là</span>
                        <span class="word">định</span>
                        <span class="word">danh,</span>
                        <span class="word">nó</span>
                        <span class="word">là</span>
                        <span class="word">di</span>
                        <span class="word">sản</span>
                        <span class="word">số</span>
                        <span class="word">vĩnh</span>
                        <span class="word gold-text">cửu.</span>
                    </h2>

                    <div class="expert-info">
                        <h4 class="expert-name">MR. PHẠM GIA LÂM</h4>
                        <p class="expert-title">Chủ tịch Hiệp hội Sưu tầm Số Việt Nam</p>
                    </div>

                    <a href="#" class="btn-interview">
                        XEM TOÀN BỘ PHỎNG VẤN <span class="long-arrow">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------------ section 5 ------------------------------  -->
    <section class="inner-circle" id="subscribeSection">
        <canvas id="dustCanvas"></canvas>

        <div class="circle-container">
            <div class="invitation-box reveal-item">
                <header class="invitation-header" style="bottom: 90%">
                    <span class="sub-title">MEMBERS ONLY</span>
                    <h2 class="main-title">ĐỪNG CHỈ ĐỌC TIN TỨC.<br>HÃY DẪN ĐẦU THỊ TRƯỜNG.</h2>
                    <p class="description">
                        Đăng ký nhận <strong>'The Monthly Plate'</strong> – Bản tin phân tích xu hướng
                        và các thương vụ kín dành riêng cho thành viên VIP.
                    </p>
                </header>

                <form class="subscribe-form" id="sealForm">
                    <div class="input-group">
                        <input type="email" placeholder="Địa chỉ Email của bạn" required id="emailInput">
                        <div class="input-focus-line"></div>
                    </div>

                    <button type="submit" class="btn-seal" id="submitBtn">
                        <span class="btn-text">YÊU CẦU GIA NHẬP</span>
                        <div class="seal-icon">
                            <img src="https://cdn-icons-png.flaticon.com/512/3601/3601649.png" alt="Seal">
                        </div>
                    </button>
                </form>

                <div class="success-message" id="successMsg">
                    <div class="wax-seal-final"></div>
                    <p>CHÀO MỪNG BẠN ĐẾN VỚI CÂU LẠC BỘ.</p>
                </div>
            </div>
        </div>
    </section>


    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------ section 1 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Staggered Load Animation
        const tl = gsap.timeline();

        tl.from(".hero-image-zoom", {
                scale: 1.2,
                filter: "blur(10px)",
                duration: 2,
                ease: "power2.out"
            })
            .from(".reveal-item", {
                y: 40,
                opacity: 0,
                filter: "blur(5px)",
                stagger: 0.3,
                duration: 1.5,
                ease: "power3.out"
            }, "-=1");

        // 2. Mouse Tilt Effect (Chỉ Desktop)
        if (window.innerWidth > 1024) {
            document.addEventListener("mousemove", (e) => {
                const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.01;

                gsap.to(".hero-image-zoom", {
                    x: moveX,
                    y: moveY,
                    duration: 1,
                    ease: "power2.out"
                });

                gsap.to(".hero-content", {
                    x: -moveX * 2, // Chữ trôi ngược hướng ảnh (Parallax)
                    y: -moveY * 2,
                    duration: 1,
                    ease: "power2.out"
                });
            });
        }

        // 3. Simple Parallax Scroll
        window.addEventListener("scroll", () => {
            const scrolled = window.pageYOffset;
            gsap.to(".hero-image-zoom", {
                y: scrolled * 0.3,
                ease: "none",
                duration: 0
            });
        });
    });

    // ------------------------ section 2 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        const charts = [];

        function createSparkline(id, data, color) {
            const canvas = document.getElementById(id);
            if (!canvas) return; // Bảo vệ nếu ID không tồn tại

            const ctx = canvas.getContext('2d');

            // Cố định kích thước canvas để tránh lỗi mất chart
            canvas.style.width = '100%';
            canvas.style.height = '100%';

            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map((_, i) => i),
                    datasets: [{
                        data: data,
                        borderColor: color,
                        borderWidth: 2,
                        pointRadius: 0,
                        fill: false,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Rất quan trọng để hiện đủ 4 cái
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }
                }
            });
        }

        // Khởi tạo lại 4 biểu đồ - Đảm bảo ID chart4 khớp với HTML
        charts.push(createSparkline('chart1', [10, 25, 20, 45, 40, 60, 85], '#00FF94'));
        charts.push(createSparkline('chart2', [30, 35, 32, 40, 38, 42, 45], '#00F2FF'));
        charts.push(createSparkline('chart3', [80, 75, 78, 70, 65, 68, 60], '#FF3131'));
        charts.push(createSparkline('chart4', [5, 10, 8, 15, 12, 18, 20], '#D4AF37'));

        // Hiệu ứng Vẽ lại khi Hover
        document.querySelectorAll('.snap-card').forEach((card, index) => {
            card.addEventListener('mouseenter', () => {
                if (charts[index]) {
                    const chart = charts[index];
                    chart.stop();
                    chart.update();
                }
            });
        });
    });
    // ------------------------ section 3 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.art-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // 1. Đổi trạng thái nút bấm (Active)
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                // 2. Hiệu ứng ẩn các bài viết hiện tại
                gsap.to(cards, {
                    opacity: 0,
                    y: 20,
                    duration: 0.3,
                    stagger: 0.05,
                    onComplete: () => {
                        // 3. Lọc logic ẩn/hiện
                        cards.forEach(card => {
                            card.style.display = 'none'; // Ẩn hết

                            if (filterValue === 'all' || card.classList.contains(filterValue)) {
                                card.style.display = 'block'; // Chỉ hiện cái được chọn
                            }
                        });

                        // 4. Hiệu ứng hiện các bài viết mới trồi lên
                        // Ta chọn các thẻ đang có display: block
                        const visibleCards = Array.from(cards).filter(c => c.style.display === 'block');

                        gsap.to(visibleCards, {
                            opacity: 1,
                            y: 0,
                            duration: 0.6,
                            stagger: 0.1,
                            ease: "power2.out"
                        });
                    }
                });
            });
        });
    });
    // Khi click vào bài viết, làm mờ trang cũ trước khi sang trang mới
    document.querySelectorAll('.art-card a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const destination = this.href;

            gsap.to("body", {
                opacity: 0,
                duration: 0.5,
                onComplete: () => {
                    window.location.href = destination;
                }
            });
        });
    });

    // ------------------------ section 4 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Text Reveal Animation (Khi cuộn đến nơi mới hiện chữ)
        gsap.registerPlugin(ScrollTrigger);

        gsap.to(".golden-quote .word", {
            scrollTrigger: {
                trigger: ".golden-quote",
                start: "top 80%",
            },
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.1,
            ease: "power4.out"
        });

        // 2. Parallax Portrait
        gsap.to(".expert-img", {
            scrollTrigger: {
                trigger: ".expert-visual",
                start: "top bottom",
                end: "bottom top",
                scrub: true
            },
            y: "15%", // Di chuyển chậm hơn trang
            scale: 1.1
        });

        // 3. Liquid Distortion Mockup (Hiệu ứng tinh tế khi rê chuột)
        const portrait = document.querySelector('.portrait-wrapper');
        portrait.addEventListener('mousemove', (e) => {
            const {
                left,
                top,
                width,
                height
            } = portrait.getBoundingClientRect();
            const x = (e.clientX - left) / width;
            const y = (e.clientY - top) / height;

            gsap.to(".expert-img", {
                transformOrigin: `${x * 100}% ${y * 100}%`,
                duration: 1
            });
        });
    });

    // ------------------------ section 5 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Floating Gold Dust (Canvas Animation)
        const canvas = document.getElementById('dustCanvas');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 1.5;
                this.speedX = (Math.random() - 0.5) * 0.5;
                this.speedY = (Math.random() - 0.5) * 0.5;
                this.opacity = Math.random() * 0.5;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width) this.x = 0;
                if (this.y > canvas.height) this.y = 0;
            }
            draw() {
                ctx.fillStyle = `rgba(212, 175, 55, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        for (let i = 0; i < 100; i++) particles.push(new Particle());

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animateParticles);
        }
        animateParticles();

        // 2. The Wax Seal Animation
        const form = document.getElementById('sealForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = submitBtn.querySelector('.btn-text');
        const sealIcon = submitBtn.querySelector('.seal-icon');
        const successMsg = document.getElementById('successMsg');

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            // GSAP Animation cho con dấu
            const tl = gsap.timeline();

            tl.to(btnText, {
                    opacity: 0,
                    duration: 0.2
                })
                .to(submitBtn, {
                    width: 80,
                    height: 80,
                    borderRadius: "50%",
                    duration: 0.4,
                    ease: "back.inOut"
                })
                .to(sealIcon, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.3,
                    ease: "expo.out"
                })
                .to(submitBtn, {
                    scale: 0.8,
                    yoyo: true,
                    repeat: 1,
                    duration: 0.1
                }) // Hiệu ứng "đóng bộp"
                .to(".circle-container", {
                    opacity: 0,
                    y: -20,
                    delay: 0.5,
                    duration: 0.5
                })
                .add(() => {
                    form.style.display = 'none';
                    document.querySelector('.invitation-header').style.display = 'none';
                    successMsg.style.display = 'flex';
                })
                .fromTo(successMsg, {
                    opacity: 0,
                    scale: 0.8
                }, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.8,
                    ease: "elastic.out(1, 0.5)"
                });
        });
    });
</script>
<!-- -------------------- section 3 ------------------  -->
<style>
    /* CSS cho Cursor */
    .custom-cursor-read {
        position: fixed;
        pointer-events: none;
        z-index: 9999;
        background: #D4AF37;
        color: #000;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1px;
        opacity: 0;
        transform: scale(0);
    }
</style>

</html>