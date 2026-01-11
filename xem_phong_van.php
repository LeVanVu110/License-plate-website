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
        :root {
            --gold-champagne: #F7E7CE;
            --ivory-white: #FFFFF0;
            --gold-primary: #D4AF37;
            --gold-bronze: #CD7F32;
            --midnight-black: #1A1A1A;
            --slate-gray: #666666;
            --off-white: #FCFCFC;
        }

        /* ------------------------------ section 1 ------------------------------   */
        .living-portrait {
            position: relative;
            height: 100vh;
            width: 100%;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Background Media */
        .portrait-media-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: grayscale(100%);
            /* Bắt đầu bằng đen trắng */
            transition: filter 3s ease-in-out;
        }

        .portrait-video,
        .portrait-fallback {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Lớp phủ chuyển màu */
        .color-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, transparent 20%, rgba(0, 0, 0, 0.4) 100%);
            opacity: 0;
            transition: opacity 3s;
        }

        /* Content Styling */
        .portrait-content {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .expert-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 5rem;
            color: var(--gold-champagne);
            letter-spacing: 15px;
            margin: 0;
            opacity: 0;
            transform: scale(0.8);
            position: relative;
        }

        .gold-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150%;
            height: 150%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%);
            opacity: 0;
            pointer-events: none;
        }

        .expert-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            color: var(--ivory-white);
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-top: 20px;
            opacity: 0;
        }

        /* Controls */
        .media-controls {
            position: absolute;
            bottom: 40px;
            right: 40px;
            z-index: 20;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .living-portrait:hover .media-controls {
            opacity: 1;
        }

        .control-btn {
            background: transparent;
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            padding: 8px 15px;
            font-size: 9px;
            letter-spacing: 2px;
            cursor: pointer;
        }

        /* Initial Blackout Effect */
        .initial-blackout {
            position: absolute;
            inset: 0;
            background: #000;
            z-index: 100;
            pointer-events: none;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .expert-name {
                font-size: 2.5rem;
                letter-spacing: 5px;
            }

            .portrait-content {
                transform: translateY(+0vh);
            }

            /* Đưa lên 1/3 màn hình */
            .portrait-media-wrapper {
                height: 100%;
            }
            .expert-title{
                font-size: 12px;
                padding: 10px;
            }
            .living-portrait{
                height: 60vh;
            }
        }

        /* ------------------------------ section 2 ------------------------------   */
        .the-monologue {
            background-color: #0A0A0B;
            /* Đen Midnight nhám */
            padding: 160px 0;
            position: relative;
            overflow: hidden;
            color: #E5E5E5;
            /* Trắng bạc (Silver Silk) */
        }

        .editorial-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            position: relative;
            padding: 0 5%;
        }

        /* Parallax Quotation mờ ảo */
        .parallax-quote {
            position: absolute;
            top: -50px;
            right: 5%;
            font-family: 'Playfair Display', serif;
            font-size: 35rem;
            color: rgba(255, 255, 255, 0.03);
            /* Cực mờ trên nền đen */
            line-height: 1;
            pointer-events: none;
            z-index: 1;
        }

        .monologue-content {
            max-width: 720px;
            z-index: 2;
        }

        /* Drop Cap Modern Gold */
        .drop-cap {
            float: left;
            font-family: 'Cormorant Garamond', serif;
            font-size: 6.5rem;
            line-height: 0.75;
            padding-top: 10px;
            padding-right: 20px;
            color: var(--gold-primary);
            font-weight: 300;
            /* Hiệu ứng tỏa sáng nhẹ cho chữ cái đầu */
            filter: drop-shadow(0 0 10px rgba(212, 175, 55, 0.3));
        }

        .monologue-text {
            font-family: 'EB Garamond', serif;
            font-size: 21px;
            line-height: 1.9;
            color: #CCCCCC;
            /* Trắng bạc trung tính */
            margin-bottom: 45px;
            text-align: justify;
            opacity: 0;
            transform: translateY(30px);
            letter-spacing: 0.3px;
        }

        .monologue-text.delayed {
            color: #999;
            /* Đoạn sau mờ hơn một chút để tạo nhịp điệu đọc */
        }

        /* Interview Meta - Silver */
        .interview-meta {
            position: absolute;
            left: 20px;
            top: 50px;
        }

        .meta-item {
            font-family: 'Montserrat', sans-serif;
            font-size: 9px;
            letter-spacing: 3px;
            color: #444;
            /* Mờ ẩn trong bóng tối */
            margin-bottom: 20px;
            transform: rotate(-90deg);
            transform-origin: left bottom;
            white-space: nowrap;
            text-transform: uppercase;
        }

        /* Digital Signature Gold */
        .signature-container {
            margin-top: 80px;
            text-align: right;
            opacity: 0;
            filter: drop-shadow(0 0 5px rgba(212, 175, 55, 0.2));
        }

        .digital-signature-svg {
            width: 240px;
            height: auto;
        }

        #ink-flow-path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
        }

        .signature-sub {
            font-family: 'Montserrat', sans-serif;
            font-size: 8px;
            letter-spacing: 5px;
            color: var(--gold-primary);
            margin-top: -25px;
            opacity: 0.7;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .the-monologue {
                padding: 100px 0;
            }

            .monologue-text {
                font-size: 19px;
                line-height: 1.7;
                padding: 0 10px;
            }

            .interview-meta {
                display: none;
            }

            .drop-cap {
                font-size: 5rem;
            }
        }

        /* ------------------------------ section 3 ------------------------------   */
        .expert-text-wrapper {
            position: relative;
        }

        .the-dialogue {
            background-color: #0A0A0B;
            /* Đen Midnight */
            padding: 150px 0;
            position: relative;
            overflow-x: hidden;
            color: #CCCCCC;
            /* Trắng bạc mặc định */
            -webkit-font-smoothing: antialiased;
        }

        .dialogue-scroll-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 50px;
        }

        /* Layout 30/70 */
        .qa-segment {
            display: grid;
            grid-template-columns: 0.3fr 0.7fr;
            gap: 80px;
            margin-bottom: 150px;
            opacity: 0.2;
            /* Mờ hơn để làm nổi bật đoạn đang đọc */
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .interviewer-col {
            position: sticky;
            top: 150px;
            height: fit-content;
        }

        .q-label {
            font-family: 'Montserrat', sans-serif;
            font-size: 10px;
            letter-spacing: 4px;
            color: #D4AF37;
            /* Gold */
            margin-bottom: 15px;
            display: block;
        }

        .question-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            font-style: italic;
            line-height: 1.7;
            color: #666;
            /* Màu xám trầm */
        }

        /* Expert Part - Typography 26px */
        .expert-text {
            font-family: 'EB Garamond', serif;
            font-size: 26px;
            line-height: 1.7;
            color: #E5E5E5;
            /* Silver Silk */
            margin-bottom: 35px;
            text-align: justify;
        }

        .highlight-bronze {
            color: #CD7F32;
            font-style: italic;
        }

        /* Sợi chỉ vàng bên lề trái câu trả lời */
        .expert-col {
            border-left: 1px solid rgba(212, 175, 55, 0.1);
            padding-left: 60px;
        }

        /* Pull Quote (Lớn và Sang trọng) */
        .pull-quote-wrapper {
            margin: 100px 0;
            text-align: center;
        }

        .cinematic-quote {
            font-family: 'EB Garamond', serif;
            font-style: italic;
            font-size: 42px;
            line-height: 1.3;
            color: #D4AF37;
            padding: 60px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            max-width: 800px;
            margin: 0 auto;
        }

        /* Golden Thread Line */
        .golden-thread-container {
            position: absolute;
            left: calc(50% - 145px);
            top: 0;
            height: 100%;
            width: 1px;
            background: rgba(255, 255, 255, 0.05);
        }

        .golden-thread-line {
            width: 100%;
            height: 0%;
            background: #D4AF37;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.5);
        }

        .side-illustration {
            position: absolute;
            right: -180px;
            /* Đẩy ảnh ra ngoài lề phải trên Desktop */
            top: 50px;
            width: 150px;
            z-index: 5;
            text-align: center;
        }

        .side-illustration img {
            width: 100%;
            border-radius: 4px;
            filter: grayscale(1) contrast(1.2);
            /* Tạo nét nghệ thuật đen trắng */
            border: 1px solid rgba(212, 175, 55, 0.3);
            transition: 0.5s ease;
        }

        .side-illustration span {
            display: block;
            font-size: 9px;
            color: #666;
            margin-top: 8px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* --- Responsive cho Section 3 --- */
        @media (max-width: 992px) {
            .dialogue-scroll-container {
                padding: 0 30px;
                /* Giảm lề hai bên trên tablet */
            }

            .qa-segment {
                gap: 40px;
                grid-template-columns: 0.4fr 0.6fr;
                /* Điều chỉnh tỉ lệ nhẹ cho tablet */
            }
        }

        @media (max-width: 768px) {
            .the-dialogue {
                padding: 80px 0;
                /* Giảm padding tổng thể */
            }

            .dialogue-scroll-container {
                padding: 0 20px;
                /* Lề hẹp hơn cho mobile */
            }

            .qa-segment {
                grid-template-columns: 1fr;
                /* Chuyển sang 1 cột dọc hoàn toàn */
                gap: 15px;
                margin-bottom: 80px;
                opacity: 0.4;
                /* Mobile nên để độ mờ mặc định cao hơn một chút để dễ nhận diện */
            }

            /* Vô hiệu hóa tính năng Sticky trên mobile để tránh lỗi hiển thị */
            .interviewer-col {
                position: static;
                margin-bottom: 10px;
            }

            .question-text {
                font-size: 16px;
                /* Giảm cỡ chữ câu hỏi */
                border-left: 2px solid #666;
                /* Thêm vạch kẻ trái cho câu hỏi */
                padding-left: 15px;
            }

            .expert-col {
                border-left: none;
                /* Bỏ sợi chỉ vàng tĩnh */
                padding-left: 0;
                position: relative;
            }

            /* Hiển thị ký hiệu A: cho chuyên gia trên mobile */
            .a-label-mobile {
                display: block !important;
                /* Hiện nhãn A: Expert */
                font-family: 'Montserrat', sans-serif;
                font-size: 11px;
                letter-spacing: 2px;
                color: #D4AF37;
                margin-bottom: 10px;
                font-weight: bold;
            }

            .expert-text {
                font-size: 20px;
                /* Cỡ chữ đọc lý tưởng trên mobile */
                line-height: 1.6;
                text-align: left;
                /* Mobile không nên để justify để tránh lỗi khoảng trắng (river of white) */
            }

            /* Tối ưu Pull Quote cho mobile (Glassmorphism) */
            .cinematic-quote {
                font-size: 26px;
                padding: 40px 20px;
                background: rgba(255, 255, 255, 0.03);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                width: 100%;
            }

            /* Ẩn sợi chỉ vàng chạy dọc trên mobile vì nó chiếm diện tích */
            .golden-thread-container {
                display: none;
            }

            /* Căn chỉnh lại ảnh minh họa side-illustration */
            .side-illustration {
                width: 100%;
                margin: 20px 0;
            }
        }

        /* Responsive: Trên Mobile ảnh sẽ quay lại luồng chính */
        @media (max-width: 1200px) {
            .side-illustration {
                position: relative;
                right: 0;
                top: 0;
                width: 100%;
                margin: 30px 0;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .side-illustration img {
                width: 80%;
            }
        }

        /* ------------------------------ section 4 ------------------------------   */
        .legacy-gallery {
            background-color: #050505;
            /* Tiếp nối Obsidian Black */
            padding: 120px 0;
            color: #fff;
            overflow: hidden;
        }

        .gallery-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 40px;
        }

        /* Header */
        .gallery-header {
            margin-bottom: 60px;
        }

        .gallery-index {
            font-family: 'EB Garamond', serif;
            font-style: italic;
            color: var(--gold-primary);
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
        }

        .gallery-title {
            font-family: 'EB Garamond', serif;
            font-size: 32px;
            color: var(--gold-primary);
            margin: 0;
        }

        .gallery-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 10px;
            letter-spacing: 4px;
            color: #666;
            margin-top: 10px;
        }

        /* Bento Grid */
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: 250px;
            gap: 25px;
            cursor: crosshair;
            /* Thay thế biểu tượng magnify qua JS */
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            background: #111;
            border-radius: 2px;
            opacity: 0;
            /* Cho hiệu ứng reveal */
            transform: translateY(40px);
        }

        .item-inner {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.2, 1, 0.3, 1), filter 0.5s;
            filter: brightness(0.6) grayscale(0.2);
        }

        /* Grid Spanning */
        .large {
            grid-column: span 2;
            grid-row: span 2;
        }

        .square {
            grid-column: span 1;
            grid-row: span 1;
        }

        .wide {
            grid-column: span 1;
            grid-row: span 1;
        }

        /* Caption Styles */
        .caption-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 25px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            pointer-events: none;
        }

        .item-number {
            font-family: 'EB Garamond', serif;
            font-style: italic;
            font-size: 16px;
            color: var(--gold-primary);
            display: block;
        }

        .item-caption {
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            color: #E5E5E5;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
        }

        /* Light Leak Effect */
        .light-leak {
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.05) 0%, transparent 60%);
            pointer-events: none;
            mix-blend-mode: screen;
            opacity: 0;
            transition: opacity 0.5s;
        }

        /* Interaction */
        .gallery-item:hover img {
            transform: scale(1.05);
            filter: brightness(1) grayscale(0);
        }

        .gallery-item:hover .light-leak {
            opacity: 1;
            animation: leakMove 3s infinite linear;
        }

        @keyframes leakMove {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(20%, 20%);
            }
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .bento-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 15px;
                grid-auto-rows: unset;
                padding-bottom: 20px;
            }

            .gallery-item {
                min-width: 85vw;
                height: 50vh;
                scroll-snap-align: center;
                flex-shrink: 0;
                opacity: 1;
                transform: none;
            }

            .gallery-title {
                font-size: 24px;
            }

            .item-caption {
                font-size: 12px;
            }

            .item-number {
                font-size: 14px;
            }
        }

        /* ------------------------------ section 5 ------------------------------   */
        .final-wisdom {
            background-color: #0A0A0A;
            /* Đen Obsidian */
            height: 110vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            color: #fff;
            -webkit-font-smoothing: antialiased;
        }

        .wisdom-container {
            max-width: 1000px;
            width: 100%;
            text-align: center;
            z-index: 2;
            padding: 0 20px;
        }

        /* Hiệu ứng chữ phát sáng */
        .the-wisdom {
            font-family: 'EB Garamond', serif;
            font-style: italic;
            font-size: clamp(32px, 5vw, 64px);
            color: #E5E5E5;
            line-height: 1.2;
            margin-bottom: 40px;
            opacity: 0;
            filter: blur(10px);
            transition: all 1.5s ease-out;
        }

        .the-wisdom.glow {
            opacity: 1;
            filter: blur(0);
            color: #FFFFFF;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
        }

        /* Chữ ký */
        .signature-wrapper {
            margin-bottom: 60px;
            opacity: 0;
        }

        .expert-signature {
            width: 250px;
            height: auto;
            margin: 0 auto;
        }

        #signature-path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            /* Giá trị này sẽ được JS điều khiển */
        }

        .expert-name-text {
            display: block;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            letter-spacing: 4px;
            color: #D4AF37;
            margin-top: -30px;
        }

        /* Nút CTA Magnetic */
        .cta-magnetic-button {
            display: inline-block;
            padding: 22px 50px;
            border: 1px solid rgba(212, 175, 55, 0.5);
            color: #D4AF37;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 4px;
            position: relative;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .cta-magnetic-button:hover {
            background-color: #D4AF37;
            color: #000;
            box-shadow: 0 0 50px rgba(212, 175, 55, 0.4);
        }

        .pulse-circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 1px solid rgba(212, 175, 55, 0.5);
            animation: pulse-ring 2.5s infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.4);
                opacity: 0;
            }
        }

        .wisdom-footer {
            position: absolute;
            bottom: 5px; /* 40px  */
            width: 100%;
            left: 0;
            opacity: 0.4;
            height: 20%;
        }

        .footer-info {
            font-family: 'Montserrat', sans-serif;
            font-size: 11px;
            letter-spacing: 2px;
        }

        .bottom-gold-glow {
            position: absolute;
            bottom: -150px;
            left: 50%;
            transform: translateX(-50%);
            width: 100vw;
            height: 300px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .the-wisdom {
                font-size: 32px;
            }

            .cta-magnetic-button {
                width: 85%;
                padding: 20px 0;
                font-size: 12px;
            }
            .wisdom-footer{
                height: 10%;
            }
            .final-wisdom{
                height: 55vh;
            
            }
        }
    </style>
</head>

<body>
    <!-- ------------------------------ section 1 ------------------------------   -->
    <section class="living-portrait" id="portraitSection">
        <div class="initial-blackout"></div>

        <div class="portrait-media-wrapper">
            <video autoplay muted loop playsinline class="portrait-video" id="portraitVideo">
                <source src="https://assets.mixkit.co/videos/preview/mixkit-thoughtful-man-sitting-by-the-window-40455-large.mp4" type="video/mp4">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1974" alt="Expert Portrait" class="portrait-fallback">
            </video>
            <div class="color-overlay"></div>
        </div>

        <div class="portrait-content">
            <h1 class="expert-name">NGUYỄN MINH TRÍ</h1>
            <div class="gold-glow"></div>
            <p class="expert-title">BẬC THẦY SƯU TẦM BIỂN SỐ & DI SẢN XE SANG</p>
        </div>

        <div class="media-controls">
            <button id="toggleMute" class="control-btn">
                <span class="icon">UNMUTE</span>
            </button>
        </div>

        <div class="scroll-hint">
            <div class="mouse-wheel"></div>
        </div>
    </section>

    <!-- ------------------------------ section 2 ------------------------------   -->
    <section class="the-monologue" id="monologueSection">
        <div class="parallax-quote">“</div>

        <div class="editorial-container">
            <aside class="interview-meta">
                <div class="meta-item">LOCATION: PRIVATE VAULT, HK</div>
                <div class="meta-item">TIME: 03:00 AM</div>
                <div class="meta-item">STATUS: CONFIDENTIAL</div>
            </aside>

            <article class="monologue-content">
                <p class="monologue-text">
                    <span class="drop-cap">T</span>ôi vẫn nhớ như in buổi sáng mùa đông tại Geneva, khi kim đồng hồ của chiếc Patek Philippe trên tay vừa điểm 4 giờ. Trong thế giới của những con số, người ta thường bàn về giá trị, nhưng ở đây, chúng tôi bàn về định mệnh. Một biển số không chỉ là những ký tự vô hồn; nó là dấu ấn của một gia tộc, là tiếng nói của một cá nhân mà không cần phải thốt ra lời.
                </p>

                <p class="monologue-text delayed">
                    Cơ duyên đưa tôi đến với nghề săn lùng di sản không phải từ những con số triệu đô, mà từ một lời hứa bảo tồn những giá trị đang dần bị quên lãng giữa dòng chảy cơ giới hóa. Khi tôi đặt bút ký vào một bản hợp đồng, tôi biết mình vừa giúp một mảnh ghép lịch sử tìm thấy đúng chủ nhân. Đó không phải là kinh doanh, đó là sự kế thừa.
                </p>

                <div class="signature-container">
                    <svg viewBox="0 0 400 150" class="digital-signature-svg">
                        <path id="ink-flow-path" d="M50,80 C100,20 150,120 200,80 S300,40 350,90 M180,60 L220,100" fill="none" stroke="var(--gold-primary)" stroke-width="2" />
                    </svg>
                    <div class="signature-sub">EXECUTIVE SIGNATURE</div>
                </div>
            </article>
        </div>
    </section>

    <!-- ------------------------------ section 3 ------------------------------   -->
    <section class="the-dialogue" id="dialogueSection">
        <div class="golden-thread-container">
            <div class="golden-thread-line"></div>
        </div>

        <div class="dialogue-scroll-container">
            <div class="qa-segment active-highlight">
                <div class="interviewer-col">
                    <span class="q-label">Q: INTERVIEWER</span>
                    <p class="question-text">Thưa ông, trong thế giới của những con số độc bản, đâu là ranh giới giữa một người kinh doanh và một người sưu tầm di sản?</p>
                </div>
                <div class="expert-col">
                    <span class="a-label-mobile" style="display:none;">A: EXPERT</span>
                    <div class="expert-text-wrapper">
                        <p class="expert-text">
                            Ranh giới đó thực chất rất mong manh, nhưng nó nằm ở "linh hồn" của vật phẩm. Một người kinh doanh nhìn vào một tấm biển số và thấy những con số <span class="tooltip-trigger" data-tooltip="Biển số có dãy số liên tiếp tăng dần, tượng trưng cho sự thăng tiến không ngừng.">Sảnh tiến</span>, thấy lợi nhuận tiềm năng.
                        </p>
                        <p class="expert-text">
                            Còn chúng tôi, những người bảo tồn, chúng tôi thấy câu chuyện đằng sau đó. Một tấm biển không chỉ là thép và sơn, nó là chứng nhân của một thời kỳ, là niềm tự hào của một gia tộc. Khi bạn cầm trên tay một di sản, trách nhiệm của bạn là tìm cho nó một người chủ xứng tầm thay vì chỉ bán cho người trả giá cao nhất.
                        </p>
                    </div>
                </div>
            </div>

            <div class="pull-quote-wrapper">
                <blockquote class="cinematic-quote">
                    “Chúng tôi không bán những con số, chúng tôi chuyển giao những câu chuyện lịch sử được mã hóa.”
                </blockquote>
            </div>

            <div class="qa-segment active-highlight">
                <div class="interviewer-col">
                    <p class="question-text">Vậy làm thế nào để ông duy trì sự tĩnh lặng và bảo mật tuyệt đối trong một thị trường đầy náo nhiệt như hiện nay?</p>
                </div>
                <div class="expert-col">
                    <div class="expert-text-wrapper">
                        <p class="expert-text">
                            Sự tĩnh lặng là một đặc quyền. Trong giới siêu giàu, thông tin là tài sản quý giá nhất. Chúng tôi vận hành giống như một ngân hàng Thụy Sĩ cổ điển: Mọi giao dịch đều diễn ra trong bóng tối, không dấu vết kỹ thuật số, không ồn ào truyền thông.
                        </p>
                        <div class="side-illustration scroll-reveal-right">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=500" alt="Detail">
                            <span>Cận cảnh cuốn sổ tay lịch sử</span>
                        </div>
                        <p class="expert-text">
                            Chỉ khi sự bảo mật đạt đến mức tuyệt đối, khách hàng mới thực sự mở lòng để chia sẻ về những mong muốn sâu kín nhất của họ đối với bộ sưu tập của mình.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------------ section 4 ------------------------------   -->
    <section class="legacy-gallery" id="section4">
        <div class="gallery-container">
            <div class="gallery-header">
                <span class="gallery-index">IV</span>
                <h2 class="gallery-title">The Legacy Gallery</h2>
                <p class="gallery-subtitle">NHỮNG MẢNH GHÉP DI SẢN ĐỘC BẢN</p>
            </div>

            <div class="bento-grid">
                <div class="gallery-item large" data-index="01">
                    <div class="item-inner">
                        <img src="https://images.unsplash.com/photo-1566008885218-90abf9200ddb?q=80&w=1500" alt="Báu vật di sản">
                        <div class="light-leak"></div>
                        <div class="caption-overlay">
                            <span class="item-number">01</span>
                            <p class="item-caption">Biển số "Vương Triều" - Chứng nhân lịch sử từ năm 1920.</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item square" data-index="02">
                    <div class="item-inner">
                        <img src="https://images.unsplash.com/photo-1517315003714-a071486bd9ea?q=80&w=800" alt="Chi tiết chất liệu">
                        <div class="light-leak"></div>
                        <div class="caption-overlay">
                            <span class="item-number">02</span>
                            <p class="item-caption">Chất liệu thép tôi luyện thủ công.</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item square" data-index="03">
                    <div class="item-inner">
                        <img src="https://images.unsplash.com/photo-1455165814004-1126a7199f9b?q=80&w=800" alt="Giấy tờ chứng nhận">
                        <div class="light-leak"></div>
                        <div class="caption-overlay">
                            <span class="item-number">03</span>
                            <p class="item-caption">Văn bản chứng thực từ hoàng gia.</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item wide" data-index="04">
                    <div class="item-inner">
                        <img src="https://images.unsplash.com/photo-1502301197179-65228ab57f78?q=80&w=1000" alt="Khoảnh khắc sưu tầm">
                        <div class="light-leak"></div>
                        <div class="caption-overlay">
                            <span class="item-number">04</span>
                            <p class="item-caption">Góc khuất trong thư viện lưu trữ cá nhân.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------------ section 5 ------------------------------   -->
    <section class="final-wisdom" id="section5">
        <div class="wisdom-container">
            <div class="wisdom-content">
                <blockquote class="the-wisdom">
                    “Đừng tìm một con số, hãy tìm một định mệnh.”
                </blockquote>

                <div class="signature-wrapper">
                    <svg viewBox="0 0 400 150" class="expert-signature">
                        <path id="signature-path" d="M50,80 C100,20 150,150 200,80 C250,20 350,80 380,50"
                            fill="none" stroke="#D4AF37" stroke-width="2" />
                    </svg>
                    <span class="expert-name-text">Bảo tàng Di sản số</span>
                </div>

                <div class="cta-wrapper">
                    <a href="#" class="cta-magnetic-button">
                        <span class="cta-text">BẮT ĐẦU DI SẢN CỦA BẠN</span>
                        <div class="pulse-circle"></div>
                    </a>
                </div>
            </div>

            <footer class="wisdom-footer">
                <!-- <div class="footer-line"></div> -->
                <div class="footer-info">
                    <span>THỰC HIỆN: THE HERITAGE TEAM</span>
                    <span>•</span>
                    <span>JANUARY 2024</span>
                    <span>•</span>
                    <span>EXCLUSIVE INTERVIEW</span>
                </div>
            </footer>
        </div>

        <div class="bottom-gold-glow"></div>
    </section>

    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------------ section 1 ------------------------------  //
    document.addEventListener("DOMContentLoaded", function() {
        // Đảm bảo GSAP và ScrollTrigger đã được load
        gsap.registerPlugin(ScrollTrigger);

        const tl = gsap.timeline();

        // 1. Hiệu ứng "From Shadow to Light" khi tải trang
        tl.to(".initial-blackout", {
                opacity: 0,
                duration: 2,
                ease: "power2.inOut"
            })
            .to(".expert-name", {
                opacity: 1,
                scale: 1,
                duration: 2.5,
                ease: "power3.out"
            }, "-=1")
            .to(".gold-glow", {
                opacity: 1,
                duration: 1.5
            }, "-=1.5")
            .to(".portrait-media-wrapper", {
                filter: "grayscale(0%)", // Chuyển sang có màu
                duration: 4,
                ease: "sine.inOut"
            }, "-=2")
            .to(".expert-title", {
                opacity: 1,
                y: -10,
                duration: 1.5,
                ease: "power2.out"
            }, "-=2");

        // 2. Scroll Transition: Mờ dần và thu nhỏ khi cuộn
        gsap.to("#portraitSection", {
            scrollTrigger: {
                trigger: "#portraitSection",
                start: "top top",
                end: "bottom top",
                scrub: true
            },
            opacity: 0,
            scale: 0.9,
            y: -50
        });

        // 3. Tương tác chuột - Soft Blur xung quanh khuôn mặt (Desktop)
        if (window.innerWidth > 1024) {
            document.querySelector('.living-portrait').addEventListener('mousemove', (e) => {
                const x = (e.clientX / window.innerWidth) * 100;
                const y = (e.clientY / window.innerHeight) * 100;

                gsap.to(".portrait-media-wrapper", {
                    maskImage: `radial-gradient(circle at ${x}% ${y}%, black 10%, transparent 60%)`,
                    webkitMaskImage: `radial-gradient(circle at ${x}% ${y}%, black 10%, transparent 60%)`,
                    duration: 0.5
                });
            });
        }

        // 4. Toggle Mute
        const video = document.getElementById('portraitVideo');
        const muteBtn = document.getElementById('toggleMute');

        muteBtn.addEventListener('click', () => {
            video.muted = !video.muted;
            muteBtn.innerText = video.muted ? "UNMUTE" : "MUTE";
        });
    });

    // ------------------------------ section 2 ------------------------------  //
    document.addEventListener("DOMContentLoaded", function() {
        // Reveal từng đoạn văn khi cuộn
        gsap.utils.toArray(".monologue-text").forEach((text) => {
            gsap.to(text, {
                scrollTrigger: {
                    trigger: text,
                    start: "top 85%",
                },
                opacity: 1,
                y: 0,
                duration: 1.5,
                ease: "power2.out"
            });
        });

        // Hiệu ứng Parallax cho dấu ngoặc kép
        gsap.to(".parallax-quote", {
            scrollTrigger: {
                trigger: "#monologueSection",
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            },
            y: 100,
            opacity: 0.08
        });

        // Vẽ chữ ký tay Gold
        gsap.to("#ink-flow-path", {
            scrollTrigger: {
                trigger: ".signature-container",
                start: "top 90%",
                onEnter: () => {
                    gsap.to(".signature-container", {
                        opacity: 1,
                        duration: 1
                    });
                    gsap.to("#ink-flow-path", {
                        strokeDashoffset: 0,
                        duration: 3.5,
                        ease: "power1.inOut"
                    });
                }
            }
        });
    });

    // ------------------------------ section 3 ------------------------------  //
    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Hiệu ứng Highlighting (Focus đọc)
        gsap.utils.toArray(".qa-segment").forEach((seg) => {
            ScrollTrigger.create({
                trigger: seg,
                // Trên mobile, cho đoạn văn sáng sớm hơn và giữ lâu hơn
                start: window.innerWidth < 768 ? "top 85%" : "top 70%",
                end: window.innerWidth < 768 ? "bottom 15%" : "bottom 30%",
                onEnter: () => gsap.to(seg, {
                    opacity: 1,
                    duration: 0.4
                }),
                onLeave: () => gsap.to(seg, {
                    opacity: 0.2,
                    duration: 0.4
                }),
                onEnterBack: () => gsap.to(seg, {
                    opacity: 1,
                    duration: 0.4
                }),
                onLeaveBack: () => gsap.to(seg, {
                    opacity: 0.2,
                    duration: 0.4
                })
            });
        });
        // Hiệu ứng hình ảnh trượt từ lề vào
        gsap.utils.toArray(".scroll-reveal-right").forEach((img) => {
            gsap.from(img, {
                scrollTrigger: {
                    trigger: img,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                },
                x: 100,
                opacity: 0,
                duration: 1.2,
                ease: "power2.out"
            });
        });

        // 2. Sợi chỉ vàng chạy dọc
        gsap.to(".golden-thread-line", {
            height: "100%",
            ease: "none",
            scrollTrigger: {
                trigger: "#dialogueSection",
                start: "top center",
                end: "bottom center",
                scrub: true
            }
        });

        // 3. Hiệu ứng Tooltip đơn giản
        const tooltips = document.querySelectorAll('.tooltip-trigger');
        tooltips.forEach(t => {
            t.addEventListener('mouseover', () => {
                // Bạn có thể thêm logic hiện popup ở đây nếu cần
            });
        });
    });
    // ------------------------------ section 4 ------------------------------  //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Reveal on Scroll (Staggered)
        gsap.to(".gallery-item", {
            scrollTrigger: {
                trigger: ".bento-grid",
                start: "top 80%",
            },
            opacity: 1,
            y: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: "power3.out",
            onComplete: () => {
                // Loại bỏ blur sau khi hiện xong
                gsap.to(".gallery-item img", {
                    filter: "brightness(0.6) grayscale(0.2)"
                });
            }
        });

        // 2. Magnificent Zoom & Focus logic
        const items = document.querySelectorAll('.gallery-item');
        items.forEach(item => {
            item.addEventListener('mouseenter', () => {
                items.forEach(other => {
                    if (other !== item) gsap.to(other, {
                        opacity: 0.4,
                        duration: 0.5
                    });
                });
            });

            item.addEventListener('mouseleave', () => {
                items.forEach(other => gsap.to(other, {
                    opacity: 1,
                    duration: 0.5
                }));
            });
        });

        // 3. Custom Cursor (Magnify icon)
        const gallery = document.querySelector('.bento-grid');
        gallery.addEventListener('mousemove', (e) => {
            // Có thể chèn một div cursor custom tại đây nếu muốn
        });
    });

    // ------------------------------ section 5 ------------------------------  //
    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Hiệu ứng hiện Lời kết và vẽ Chữ ký
        ScrollTrigger.create({
            trigger: "#section5",
            start: "top 50%", // Bắt đầu khi section vào giữa màn hình
            onEnter: () => {
                // Hiện câu nói sáng bừng
                document.querySelector(".the-wisdom").classList.add("glow");

                // Hiệu ứng vẽ chữ ký tay
                gsap.to("#signature-path", {
                    strokeDashoffset: 0,
                    duration: 3,
                    ease: "power2.inOut",
                    delay: 0.8
                });

                // Hiện wrapper chữ ký
                gsap.to(".signature-wrapper", {
                    opacity: 1,
                    y: -10,
                    duration: 1.5,
                    delay: 0.8
                });

                // Rung nhẹ điện thoại (Haptic)
                if (window.navigator && window.navigator.vibrate) {
                    window.navigator.vibrate(40);
                }
            }
        });

        // 2. Hiệu ứng Magnetic cho nút bấm (Desktop)
        if (window.innerWidth > 1024) {
            const cta = document.querySelector(".cta-magnetic-button");
            cta.addEventListener("mousemove", (e) => {
                const {
                    offsetX,
                    offsetY,
                    target
                } = e;
                const {
                    clientWidth,
                    clientHeight
                } = target;
                const moveX = (offsetX - clientWidth / 2) / 4;
                const moveY = (offsetY - clientHeight / 2) / 4;
                gsap.to(cta, {
                    x: moveX,
                    y: moveY,
                    duration: 0.3
                });
            });

            cta.addEventListener("mouseleave", () => {
                gsap.to(cta, {
                    x: 0,
                    y: 0,
                    duration: 0.3
                });
            });
        }
    });
</script>

</html>