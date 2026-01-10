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
            --gold-primary: #D4AF37;
            --silver-text: #E5E5E5;
        }

        /* --------------------------- section 1 ------------------------  */
        .concierge-entrance {
            position: relative;
            height: 100vh;
            width: 100%;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            cursor: none !important;
            /* Ẩn chuột mặc định */
        }

        /* Background & Ken Burns Effect */
        .hero-background {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            animation: kenBurns 20s infinite alternate;
        }

        @keyframes kenBurns {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .overlay-dark {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.8) 100%);
            z-index: 2;
        }

        /* Typography */
        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 0 5%;
        }

        .headline-wrapper {
            overflow: hidden;
            margin-bottom: 20px;
        }

        .concierge-headline {
            font-family: 'serif';
            /* Nên dùng Cormorant Garamond nếu có link font */
            font-size: clamp(2.5rem, 6vw, 5.5rem);
            font-weight: 300;
            color: var(--gold-champagne);
            letter-spacing: 5px;
            margin: 0;
            transform: translateY(100%);
        }

        .gold-line {
            width: 0;
            height: 1px;
            background: var(--gold-primary);
            margin: 15px auto 0;
            box-shadow: 0 0 10px var(--gold-primary);
        }

        .concierge-sub {
            font-family: sans-serif;
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--silver-text);
            opacity: 0;
            margin-top: 20px;
        }

        /* Custom Cursor */
        .hero-cursor {
            position: fixed;
            width: 80px;
            height: 80px;
            border: 1px solid var(--gold-primary);
            background: rgba(212, 175, 55, 0.1);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            backdrop-filter: blur(2px);
            transition: opacity 0.3s ease, transform 0.1s ease-out;
            will-change: transform;
        }

        .hero-cursor span {
            font-size: 8px;
            color: var(--gold-champagne);
            letter-spacing: 2px;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0.3;
            }
        }

        /* Hạt bụi sáng */
        .particles-container {
            position: absolute;
            inset: 0;
            z-index: 3;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(212, 175, 55, 0.4);
            border-radius: 50%;
        }

        /* Mobile Quick Actions */
        .mobile-quick-actions {
            display: none;
            position: absolute;
            bottom: 40px;
            width: 90%;
            left: 5%;
            gap: 15px;
            z-index: 20;
        }

        .action-btn-glass {
            flex: 1;
            padding: 18px 0;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: var(--gold-champagne);
            text-align: center;
            font-size: 11px;
            letter-spacing: 2px;
            text-decoration: none;
            font-family: sans-serif;
        }

        .pulse {
            animation: pulseGlow 2s infinite;
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(212, 175, 55, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .concierge-entrance {
                cursor: auto;
            }

            .hero-cursor {
                display: none;
            }

            .hero-content {
                transform: translateY(-15%);
            }

            .mobile-quick-actions {
                display: flex;
            }

            .hero-video {
                object-position: center;
            }
        }

        /* --------------------------- section 2 ------------------------  */
        .exclusive-channels {
            background: #000;
            padding: 100px 5%;
            position: relative;
            z-index: 5;
        }

        .channels-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            /* Gutter thoáng đạt */
        }

        .privilege-card {
            background: #121212;
            /* Đen Obsidian */
            padding: 60px 40px;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            /* Deep Shadows */
            border: 1px solid rgba(255, 255, 255, 0.03);
            text-align: center;
        }

        /* Hiệu ứng Glow & Hover Lift */
        .card-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(212, 175, 55, 0.15) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .privilege-card:hover {
            transform: translateY(-20px);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .privilege-card:hover .card-glow {
            opacity: 1;
        }

        .channels-container:hover .privilege-card:not(:hover) {
            opacity: 0.4;
            filter: blur(2px);
        }

        /* Typography & Icons */
        .icon-box {
            height: 80px;
            margin-bottom: 30px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gold-icon {
            width: 40px;
            height: 40px;
            color: var(--gold-primary);
        }

        .channel-label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--gold-primary);
            font-size: 12px;
            letter-spacing: 4px;
            margin-bottom: 20px;
        }

        .contact-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: #F5F5F7;
            margin-bottom: 15px;
        }

        .contact-value.address {
            font-size: 1.4rem;
        }

        .channel-desc {
            font-size: 12px;
            color: #666;
            line-height: 1.6;
            max-width: 80%;
            margin: 0 auto;
        }

        /* Mobile Actions */
        .mobile-direct-btn {
            display: none;
            /* Chỉ hiện trên mobile */
            margin-top: 30px;
            padding: 15px;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            text-decoration: none;
            font-size: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        /* Typing Indicator Animation */
        .typing-indicator {
            position: absolute;
            top: 10px;
            right: 40%;
            display: flex;
            gap: 4px;
        }

        .typing-indicator span {
            width: 4px;
            height: 4px;
            background: var(--gold-primary);
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {

            0%,
            80%,
            100% {
                transform: scale(0);
            }

            40% {
                transform: scale(1);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .channels-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .privilege-card {
                padding: 40px 20px;
            }

            .mobile-direct-btn {
                display: block;
            }

            .privilege-card:hover {
                transform: none;
            }

            .channels-container:hover .privilege-card:not(:hover) {
                opacity: 1;
                filter: none;
            }
        }

        /* --------------------------- section 3 ------------------------  */
        .sourcing-request {
            background: #000;
            padding: 120px 5%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: radial-gradient(circle at 80% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 50%);
        }

        .sourcing-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        /* Lời dẫn bên trái */
        .sourcing-label {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            color: var(--gold-champagne);
            margin-bottom: 30px;
        }

        .sourcing-text {
            color: #888;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .sourcing-steps {
            list-style: none;
            padding: 0;
        }

        .sourcing-steps li {
            color: #fff;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sourcing-steps li span {
            color: var(--gold-primary);
            font-weight: bold;
            border: 1px solid var(--gold-primary);
            padding: 2px 8px;
            font-size: 0.7rem;
        }

        /* Glass Form */
        .glass-form-wrapper {
            position: relative;
            background: rgba(26, 26, 26, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 50px;
            border-radius: 4px;
        }

        .form-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: #fff;
            margin-bottom: 40px;
            text-align: center;
        }

        /* Input Styling */
        .input-group {
            position: relative;
            margin-bottom: 35px;
        }

        .input-group input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #333;
            padding: 10px 0;
            color: #fff;
            font-size: 1rem;
            outline: none;
        }

        .input-group label {
            position: absolute;
            top: 10px;
            left: 0;
            color: #666;
            font-size: 10px;
            letter-spacing: 2px;
            transition: 0.3s ease;
            pointer-events: none;
        }

        /* Floating Label & Golden Trace */
        .input-group input:focus~label,
        .input-group input:valid~label {
            top: -15px;
            color: var(--gold-primary);
        }

        .gold-trace {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--gold-primary);
            box-shadow: 0 0 10px var(--gold-primary);
            transition: width 0.6s ease;
        }

        .input-group input:focus~.gold-trace {
            width: 100%;
        }

        /* Slider Budget */
        .budget-group {
            margin-top: 40px;
        }

        .budget-label {
            font-size: 10px;
            color: var(--gold-primary);
            letter-spacing: 2px;
        }

        .budget-slider {
            width: 100%;
            margin: 20px 0;
            accent-color: var(--gold-primary);
            background: #333;
            height: 2px;
            outline: none;
        }

        #budgetValue {
            color: #fff;
            font-family: serif;
            font-size: 1.2rem;
        }

        /* Submit Button */
        .btn-submit-secure {
            width: 100%;
            padding: 20px;
            background: transparent;
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            letter-spacing: 3px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            margin-top: 30px;
        }

        .form-footer-note {
            font-size: 9px;
            color: #444;
            text-align: center;
            margin-top: 20px;
        }

        /* Success Seal */
        .success-seal {
            position: absolute;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.9);
            z-index: 100;
        }

        .wax-seal {
            text-align: center;
            transform: scale(3);
        }

        .wax-seal img {
            width: 80px;
        }

        .wax-seal span {
            display: block;
            color: var(--gold-primary);
            font-size: 6px;
            margin-top: 5px;
            letter-spacing: 2px;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .sourcing-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .sourcing-info {
                text-align: center;
            }

            .sourcing-steps {
                display: none;
            }

            .glass-form-wrapper {
                padding: 30px 20px;
            }
        }

        /* --------------------------- section 4 ------------------------  */
        .prestige-network {
            background: #121212;
            /* Carbon Black */
            padding: 120px 5%;
            color: #fff;
            overflow: hidden;
        }

        .network-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 80px;
        }

        /* Map Visual Styling */
        .map-visual {
            flex: 1;
            position: relative;
        }

        .map-wrapper {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }

        .vietnam-map-svg {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 0 20px rgba(0, 0, 0, 0.5));
        }

        .map-outline {
            stroke: #E0E0E0;
            /* Silver Silver */
            opacity: 0.3;
        }

        .map-label {
            fill: #888;
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 14px;
        }

        /* Hotspots & Pulse Animation */
        .core-point {
            fill: var(--gold-primary);
        }

        .pulse-ring {
            fill: var(--gold-primary);
            opacity: 0;
            transform-origin: center;
            transform-box: fill-box;
            animation: pulseWave 2s infinite;
        }

        @keyframes pulseWave {
            0% {
                transform: scale(0.5);
                opacity: 0.8;
            }

            100% {
                transform: scale(2.5);
                opacity: 0;
            }
        }

        /* Floating Info */
        .floating-info {
            position: absolute;
            top: 20%;
            right: -20px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 20px;
            width: 180px;
        }

        .info-tag {
            font-size: 9px;
            color: var(--gold-primary);
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .floating-info p {
            font-size: 11px;
            margin: 0;
            color: #aaa;
            line-height: 1.4;
        }

        /* Tooltip */
        .map-tooltip {
            position: fixed;
            pointer-events: none;
            background: var(--gold-primary);
            color: #000;
            padding: 8px 15px;
            font-size: 11px;
            display: none;
            z-index: 1000;
        }

        .map-tooltip span {
            display: block;
            font-weight: bold;
        }

        /* Content Side */
        .network-content {
            flex: 0 0 450px;
        }

        .network-title {
            font-family: sans-serif;
            font-size: 12px;
            letter-spacing: 5px;
            color: var(--gold-primary);
            margin-bottom: 30px;
        }

        .network-desc {
            color: #888;
            line-height: 1.8;
            margin-bottom: 50px;
        }

        .region-card {
            border-left: 1px solid #333;
            padding: 20px 30px;
            margin-bottom: 15px;
            transition: 0.4s;
            cursor: pointer;
        }

        .region-card.active,
        .region-card:hover {
            border-left: 2px solid var(--gold-primary);
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.05) 0%, transparent 100%);
        }

        .region-card h4 {
            margin: 0 0 10px;
            font-size: 13px;
            letter-spacing: 2px;
        }

        .region-card p {
            margin: 0;
            font-size: 11px;
            color: #666;
        }

        .region-card .stat {
            display: block;
            margin-top: 10px;
            font-size: 10px;
            color: var(--gold-primary);
        }

        .btn-locate {
            margin-top: 40px;
            background: transparent;
            border: 1px solid #333;
            color: #fff;
            padding: 15px 30px;
            font-size: 10px;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-locate:hover {
            border-color: var(--gold-primary);
            color: var(--gold-primary);
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .network-container {
                flex-direction: column;
                text-align: center;
            }

            .network-content {
                flex: 1;
                width: 100%;
            }

            .region-carousel {
                display: flex;
                overflow-x: auto;
                gap: 15px;
                padding-bottom: 20px;
            }

            .region-card {
                flex: 0 0 280px;
                border-left: none;
                border-bottom: 1px solid #333;
            }

            .map-visual {
                order: 2;
                margin-top: 50px;
            }

            .floating-info {
                display: none;
            }
        }

        /* --------------------------- section 5 ------------------------  */
        .security-oath {
            background: #000000;
            min-height: 120vh;
            /* Tạo không gian rộng phía trên */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            padding-bottom: 100px;
            overflow: hidden;
        }

        .oath-container {
            max-width: 800px;
            text-align: center;
            z-index: 5;
        }

        /* Biểu tượng con dấu & Hiệu ứng Aura */
        .vault-icon-wrapper {
            position: relative;
            width: 65%;
            height: 50%;
            margin: 0 auto 60px;
        }

        .metallic-seal {
            width: 250px;
            /* Tăng kích thước để thấy rõ bóng đổ */
            height: 250px;
            margin: 0 auto;
        }

        .rotating-seal {
            width: 100%;
            animation: slowRotate 20s linear infinite;
            /* Dynamic Lighting Effect */
            transition: filter 0.3s ease;
        }

        @keyframes slowRotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .gold-aura {
            position: absolute;
            inset: -20px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: silentGlow 4s ease-in-out infinite;
        }

        @keyframes silentGlow {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.3);
                opacity: 0.6;
            }
        }

        /* Typography */
        .oath-message {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 2rem;
            color: #F7E7CE;
            /* Rose Gold Light */
            margin-bottom: 50px;
            font-weight: 300;
        }

        .security-commitments {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-bottom: 80px;
        }

        .commit-label {
            font-family: sans-serif;
            font-size: 10px;
            letter-spacing: 3px;
            color: #888;
        }

        .commitment-divider {
            width: 1px;
            height: 15px;
            background: rgba(212, 175, 55, 0.3);
        }

        /* Signature */
        .signature-wrapper {
            opacity: 0;
            /* Hiện ra khi scroll đến */
        }

        .digital-signature {
            width: 250px;
            height: auto;
        }

        #signature-path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
        }

        .signature-title {
            font-size: 9px;
            letter-spacing: 4px;
            color: var(--gold-primary);
            margin-top: -10px;
        }

        /* Back to top */
        .back-to-top {
            position: absolute;
            bottom: 50px;
            background: transparent;
            border: 1px solid rgba(212, 175, 55, 0.2);
            color: var(--gold-primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .back-to-top:hover {
            background: rgba(212, 175, 55, 0.1);
        }

        #mainSealSVG {
            width: 100%;
            height: 100%;
            overflow: visible;
            /* Quan trọng để bóng đổ không bị cắt mất */
            transition: transform 0.1s ease-out;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .oath-message {
                font-size: 1.4rem;
                padding: 0 20px;
            }

            .security-commitments {
                flex-direction: column;
                gap: 15px;
            }

            .commitment-divider {
                width: 30px;
                height: 1px;
            }
        }
    </style>
</head>

<body>
    <!-- ---------------------------- section 1 ---------------------------- -->
    <section class="concierge-entrance" id="contactHero">
        <div class="hero-cursor"><span>SCROLL</span></div>
        <div class="particles-container" id="lightParticles"></div>

        <div class="hero-background">
            <div class="overlay-dark"></div>
            <video autoplay muted loop playsinline class="hero-video">
                <source src="https://player.vimeo.com/external/477117181.sd.mp4?s=d001f35f3b7c4f4a47d27e99b0c74b9d0a79a3b8&profile_id=164&oauth2_token_id=57447761" type="video/mp4">
            </video>
        </div>

        <div class="hero-content">
            <div class="headline-wrapper">
                <h1 class="concierge-headline">KẾT NỐI ĐẶC QUYỀN</h1>
                <div class="gold-line"></div>
            </div>
            <p class="concierge-sub">Chuyên viên tư vấn riêng của chúng tôi luôn sẵn sàng lắng nghe yêu cầu của quý khách.</p>
        </div>

        <div class="mobile-quick-actions">
            <a href="tel:0900000000" class="action-btn-glass pulse">GỌI NGAY</a>
            <a href="#" class="action-btn-glass">ZALO VIP</a>
        </div>
    </section>

    <!-- ---------------------------- section 2 ---------------------------- -->
    <section class="exclusive-channels" id="channelsSection">
        <div class="channels-container">

            <div class="privilege-card" id="hotlineCard">
                <div class="card-glow"></div>
                <div class="card-content">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24" class="gold-icon phone-icon">
                            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="channel-label">HOTLINE VIP</h3>
                    <div class="contact-value counter" data-target="0988999999">0</div>
                    <p class="channel-desc">Ưu tiên xử lý các yêu cầu khẩn cấp 24/7</p>
                    <a href="tel:0988999999" class="mobile-direct-btn">BẤM ĐỂ GỌI</a>
                </div>
            </div>

            <div class="privilege-card" id="chatCard">
                <div class="card-glow"></div>
                <div class="card-content">
                    <div class="icon-box">
                        <div class="typing-indicator"><span></span><span></span><span></span></div>
                        <svg viewBox="0 0 24 24" class="gold-icon chat-icon">
                            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="channel-label">PRIVATE CHAT</h3>
                    <div class="contact-value">ZALO / WHATSAPP</div>
                    <p class="channel-desc">Trao đổi hồ sơ và hình ảnh trực tiếp qua mã hóa</p>
                    <a href="#" class="mobile-direct-btn">MỞ ZALO</a>
                </div>
            </div>

            <div class="privilege-card" id="officeCard">
                <div class="card-glow"></div>
                <div class="card-content">
                    <div class="icon-box">
                        <svg viewBox="0 0 24 24" class="gold-icon map-icon">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="channel-label">HEADQUARTERS</h3>
                    <div class="contact-value address">Landmark 81, TP. HCM</div>
                    <p class="channel-desc">Gặp gỡ trực tiếp và chiêm ngưỡng bộ sưu tập</p>
                    <a href="#" class="mobile-direct-btn">XEM BẢN ĐỒ</a>
                </div>
            </div>

        </div>
    </section>

    <!-- ---------------------------- section 3 ---------------------------- -->
    <section class="sourcing-request" id="sourcingSection">
        <div class="sourcing-container">
            <div class="sourcing-info">
                <h2 class="sourcing-label">DỊCH VỤ SĂN LÙNG ĐỘC BẢN</h2>
                <p class="sourcing-text">Chúng tôi không chỉ tìm biển số, chúng tôi kết nối những di sản. Mọi yêu cầu đều được xử lý bởi đội ngũ chuyên gia pháp lý và săn tin chuyên nghiệp nhất.</p>
                <ul class="sourcing-steps">
                    <li><span>01</span> Tiếp nhận danh mục quý khách đang săn tìm</li>
                    <li><span>02</span> Thẩm định giá trị và nguồn gốc biển số</li>
                    <li><span>03</span> Giao dịch bảo mật và bàn giao tận tay</li>
                </ul>
            </div>

            <div class="glass-form-wrapper">
                <form id="requestForm" class="sourcing-form">
                    <h3 class="form-title">Yêu cầu săn lùng độc bản</h3>

                    <div class="input-group">
                        <input type="text" id="cust_name" required>
                        <label for="cust_name">DANH TÍNH CỦA QUÝ KHÁCH</label>
                        <div class="gold-trace"></div>
                    </div>

                    <div class="input-group">
                        <input type="tel" id="cust_phone" required>
                        <label for="cust_phone">SỐ ĐIỆN THOẠI / ZALO</label>
                        <div class="gold-trace"></div>
                    </div>

                    <div class="input-group">
                        <input type="text" id="plate_goal" style="text-transform: uppercase;" placeholder="VD: 51K-999.99" required>
                        <label for="plate_goal">BIỂN SỐ QUÝ KHÁCH ĐANG SĂN TÌM</label>
                        <div class="gold-trace"></div>
                    </div>

                    <div class="input-group budget-group">
                        <label class="budget-label">NGÂN SÁCH DỰ KIẾN (VNĐ)</label>
                        <div class="range-container">
                            <input type="range" min="1" max="100" value="10" class="budget-slider" id="budgetRange">
                            <div class="budget-values">
                                <span id="budgetValue">Dưới 1 tỷ</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit-secure">
                        <span class="btn-text">GỬI YÊU CẦU BẢO MẬT</span>
                        <div class="btn-shine"></div>
                    </button>

                    <p class="form-footer-note">Mọi thông tin cá nhân và ngân sách đều được mã hóa và bảo mật tuyệt đối bởi đội ngũ pháp lý của chúng tôi.</p>
                </form>

                <div id="successSeal" class="success-seal">
                    <div class="wax-seal">
                        <img src="https://i.ibb.co/VvzLgS6/wax-seal-gold.png" alt="Secured">
                        <span>ĐÃ NIÊM PHONG</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ---------------------------- section 4 ---------------------------- -->
    <section class="prestige-network" id="networkSection">
        <div class="network-container">

            <div class="map-visual">
                <div class="map-wrapper">
                    <svg viewBox="0 0 500 800" class="vietnam-map-svg">
                        <path class="map-outline" d="M150,50 L180,30 L250,80 L230,150 L280,250 L300,400 L250,550 L280,700 L200,750 L150,700 Z" fill="none" stroke="#333" stroke-width="1" />

                        <path class="connecting-line line-1" d="M180,80 Q250,200 280,450" fill="none" stroke="var(--gold-primary)" stroke-width="0.5" stroke-dasharray="1000" stroke-dashoffset="1000" />
                        <path class="connecting-line line-2" d="M180,80 Q100,300 280,700" fill="none" stroke="var(--gold-primary)" stroke-width="0.5" stroke-dasharray="1000" stroke-dashoffset="1000" />

                        <g class="hotspot" data-region="Miền Bắc" data-count="350+">
                            <circle cx="180" cy="80" r="4" class="core-point" />
                            <circle cx="180" cy="80" r="12" class="pulse-ring" />
                            <text x="195" y="85" class="map-label">Hà Nội</text>
                        </g>
                        <g class="hotspot" data-region="Miền Trung" data-count="150+">
                            <circle cx="280" cy="450" r="4" class="core-point" />
                            <circle cx="280" cy="450" r="12" class="pulse-ring" />
                            <text x="295" y="455" class="map-label">Đà Nẵng</text>
                        </g>
                        <g class="hotspot" data-region="Miền Nam" data-count="500+">
                            <circle cx="280" cy="700" r="4" class="core-point" />
                            <circle cx="280" cy="700" r="12" class="pulse-ring" />
                            <text x="295" y="705" class="map-label">TP. Hồ Chí Minh</text>
                        </g>
                    </svg>

                    <div class="floating-info">
                        <div class="info-tag">MẠNG LƯỚI 63 TỈNH THÀNH</div>
                        <p>Bàn giao trực tiếp và xử lý thủ tục tận nơi</p>
                    </div>

                    <div id="mapTooltip" class="map-tooltip">
                        <span class="region-name">Miền Nam</span>
                        <span class="region-stat">500+ thương vụ thành công</span>
                    </div>
                </div>
            </div>

            <div class="network-content">
                <h2 class="network-title">MẠNG LƯỚI HỖ TRỢ TOÀN QUỐC</h2>
                <p class="network-desc">Xóa bỏ rào cản địa lý, chúng tôi mang đến trải nghiệm giao dịch xuyên suốt từ Bắc chí Nam với quy trình bàn giao "Chìa khóa trao tay".</p>

                <div class="region-carousel">
                    <div class="region-card active">
                        <h4>MIỀN BẮC</h4>
                        <p>Trung tâm đấu giá và pháp lý thủ đô</p>
                        <span class="stat">Trực tiếp tại 25 tỉnh thành</span>
                    </div>
                    <div class="region-card">
                        <h4>MIỀN TRUNG</h4>
                        <p>Kết nối bàn giao dọc hành lang ven biển</p>
                        <span class="stat">Hỗ trợ nhanh 24/7</span>
                    </div>
                    <div class="region-card">
                        <h4>MIỀN NAM</h4>
                        <p>Mạng lưới xử lý biển số lớn nhất cả nước</p>
                        <span class="stat">Văn phòng đại diện Quận 1</span>
                    </div>
                </div>

                <button class="btn-locate">TÌM VĂN PHÒNG GẦN NHẤT</button>
            </div>
        </div>
    </section>

    <!-- ---------------------------- section 5 ---------------------------- -->
    <section class="security-oath" id="securitySection">
        <div class="vault-background"></div>

        <div class="oath-container">
            <div class="vault-icon-wrapper">
                <div class="gold-aura"></div>
                <div class="metallic-seal">
                    <svg viewBox="0 0 200 200" class="rotating-seal" id="mainSealSVG" style="width:100%; height:100%; overflow:visible;">
                        <defs>
                            <filter id="dynamicShadow" x="-50%" y="-50%" width="200%" height="200%">
                                <feDropShadow id="sealShadow" dx="0" dy="0" stdDeviation="8" flood-opacity="0.8" />
                            </filter>

                            <radialGradient id="goldGradient" cx="50%" cy="50%" r="50%">
                                <stop offset="0%" stop-color="#F7E7CE" />
                                <stop offset="70%" stop-color="#D4AF37" />
                                <stop offset="100%" stop-color="#996515" />
                            </radialGradient>
                        </defs>

                        <g filter="url(#dynamicShadow)">
                            <circle cx="100" cy="100" r="80" fill="url(#goldGradient)" stroke="#88540b" stroke-width="1" />
                            <circle cx="100" cy="100" r="70" fill="none" stroke="rgba(0,0,0,0.2)" stroke-width="2" />
                            <path d="M70 80 L100 130 L130 80 M90 70 L110 70" fill="none" stroke="#5d3a0a" stroke-width="6" stroke-linecap="round" />
                            <text x="100" y="155" text-anchor="middle" style="font-size: 10px; fill: #5d3a0a; font-family: serif; letter-spacing: 4px; font-weight: bold;">Lê Văn Vũ</text>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="oath-content">
                <h2 class="oath-message">Sự riêng tư của quý khách là tài sản quý giá nhất của chúng tôi.</h2>

                <div class="security-commitments">
                    <div class="commitment-item">
                        <span class="commit-label">BẢO MẬT DANH TÍNH</span>
                    </div>
                    <div class="commitment-divider"></div>
                    <div class="commitment-item">
                        <span class="commit-label">MÃ HÓA GIAO DỊCH</span>
                    </div>
                    <div class="commitment-divider"></div>
                    <div class="commitment-item">
                        <span class="commit-label">PHÁP LÝ MINH BẠCH</span>
                    </div>
                </div>

                <div class="signature-wrapper">
                    <svg viewBox="0 0 400 150" class="digital-signature">
                        <path id="signature-path" d="M50,80 Q100,20 150,80 T250,80 T350,60" fill="none" stroke="var(--gold-primary)" stroke-width="2" />
                    </svg>
                    <p class="signature-title">FOUNDER & CEO</p>
                </div>
            </div>
        </div>

        <!-- <button class="back-to-top" id="backToTop">
            <svg viewBox="0 0 24 24">
                <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" fill="currentColor" />
            </svg>
        </button> -->
    </section>

    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------- section 1 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Logic Custom Cursor (Fix lỗi lệch tâm và mượt mà hơn)
        const cursor = document.querySelector('.hero-cursor');
        const hero = document.getElementById('contactHero');

        // Sử dụng GSAP QuickSetter để tối ưu hiệu năng di chuyển chuột
        const xSetter = gsap.quickSetter(cursor, "x", "px");
        const ySetter = gsap.quickSetter(cursor, "y", "px");

        window.addEventListener('mousemove', (e) => {
            // Trừ đi 40 (tức 1/2 kích thước 80px của cursor) để tâm vòng tròn trùng mũi chuột
            gsap.to(cursor, {
                x: e.clientX - 750,
                y: e.clientY - 350,
                duration: 0.5,
                ease: "power2.out"
            });
        });

        // Hiệu ứng Hover vào vùng Hero
        hero.addEventListener('mouseenter', () => {
            gsap.to(cursor, {
                opacity: 1,
                scale: 1,
                duration: 0.3
            });
        });

        hero.addEventListener('mouseleave', () => {
            gsap.to(cursor, {
                opacity: 0,
                scale: 0.5,
                duration: 0.3
            });
        });

        // Hiệu ứng click chuột (bóp nhỏ vòng tròn)
        window.addEventListener('mousedown', () => gsap.to(cursor, {
            scale: 0.8,
            duration: 0.2
        }));
        window.addEventListener('mouseup', () => gsap.to(cursor, {
            scale: 1,
            duration: 0.2
        }));


        // 2. Hiệu ứng "The Arrival" (Xuất hiện khi tải trang)
        const tl = gsap.timeline();

        tl.to(".hero-video", {
                opacity: 0.7,
                duration: 2.5,
                ease: "power2.inOut"
            })
            .to(".concierge-headline", {
                translateY: 0,
                duration: 1.5,
                ease: "expo.out"
            }, "-=1.5")
            .to(".gold-line", {
                width: "100%",
                duration: 2,
                ease: "expo.inOut"
            }, "-=1")
            .to(".concierge-sub", {
                opacity: 1,
                y: -10,
                duration: 1
            }, "-=0.5");


        // 3. Tạo hạt bụi sáng (Light Particles) bay lơ lửng
        const particleContainer = document.getElementById('lightParticles');
        if (particleContainer) {
            for (let i = 0; i < 30; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                const size = Math.random() * 3 + 'px';
                p.style.cssText = `
                    position: absolute;
                    width: ${size}; height: ${size};
                    background: rgba(212, 175, 55, 0.3);
                    border-radius: 50%;
                    top: ${Math.random() * 100}%;
                    left: ${Math.random() * 100}%;
                    box-shadow: 0 0 10px #D4AF37;
                    pointer-events: none;
                `;
                particleContainer.appendChild(p);

                gsap.to(p, {
                    y: "-=100",
                    x: "+=" + (Math.random() * 50 - 25),
                    opacity: 0,
                    duration: Math.random() * 5 + 5,
                    repeat: -1,
                    ease: "none",
                    delay: Math.random() * 5
                });
            }
        }


        // 4. Hiệu ứng Scroll (Mờ dần khi cuộn xuống)
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const threshold = 700;

            gsap.to("#contactHero", {
                opacity: Math.max(0, 1 - (scrolled / threshold)),
                y: -scrolled * 0.15,
                duration: 0.1,
                ease: "none"
            });
        });


        // 5. Cảm biến nghiêng (Gravity Sensor) dành riêng cho Mobile
        if (window.DeviceOrientationEvent && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            window.addEventListener('deviceorientation', (e) => {
                // gamma: nghiêng trái/phải, beta: nghiêng trước/sau
                const tiltX = e.gamma / 12;
                const tiltY = e.beta / 12;

                gsap.to(".hero-video", {
                    x: tiltX * 8,
                    y: tiltY * 8,
                    duration: 1.2,
                    ease: "power2.out"
                });
            });
        }
    });

    // ------------------------- section 2 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Number Counting Animation cho Hotline
        const counters = document.querySelectorAll('.counter');

        const countTo = (element) => {
            const target = element.getAttribute('data-target');
            const countObj = {
                val: 0
            };

            gsap.to(countObj, {
                val: target,
                duration: 2.5,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: element,
                    start: "top 90%",
                },
                onUpdate: function() {
                    // Định dạng số điện thoại đẹp: 09xx.xxx.xxx
                    let raw = Math.ceil(countObj.val).toString().padStart(10, '0');
                    element.innerText = raw.replace(/(\d{4})(\d{3})(\d{3})/, '$1.$2.$3');
                }
            });
        };

        counters.forEach(countTo);

        // 2. Icon Animations
        // Rung nhẹ icon điện thoại định kỳ
        gsap.to(".phone-icon", {
            rotation: 15,
            duration: 0.1,
            repeat: 5,
            yoyo: true,
            paused: true,
            id: "ring"
        });

        setInterval(() => {
            gsap.fromTo(".phone-icon", {
                rotation: -10
            }, {
                rotation: 10,
                duration: 0.1,
                repeat: 10,
                yoyo: true
            });
        }, 4000);

        // 3. Mobile Haptic Feedback (Rung phản hồi khi nhấn thẻ)
        const cards = document.querySelectorAll('.privilege-card');
        cards.forEach(card => {
            card.addEventListener('click', () => {
                if ("vibrate" in navigator) {
                    navigator.vibrate(20); // Rung nhẹ 20ms
                }
            });
        });
    });

    // ------------------------- section 3 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Logic cho thanh trượt ngân sách
        const slider = document.getElementById('budgetRange');
        const display = document.getElementById('budgetValue');

        slider.addEventListener('input', function() {
            let val = this.value;
            if (val < 10) display.innerText = "Dưới 1 tỷ";
            else if (val < 30) display.innerText = "1 tỷ - 3 tỷ";
            else if (val < 60) display.innerText = "3 tỷ - 10 tỷ";
            else display.innerText = "Trên 10 tỷ (Ưu tiên đặc biệt)";
        });

        // 2. Hiệu ứng Submit "The Success Seal"
        const form = document.getElementById('requestForm');
        const seal = document.getElementById('successSeal');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Âm thanh đóng dấu (Tùy chọn)
            const audio = new Audio('https://www.soundjay.com/buttons/button-10.mp3');
            audio.play();

            // Ẩn form và hiện con dấu sáp
            gsap.to(form, {
                opacity: 0,
                duration: 0.5
            });

            seal.style.display = 'flex';
            gsap.fromTo(".wax-seal", {
                scale: 5,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 0.8,
                ease: "bounce.out",
                onComplete: () => {
                    // Tự động chuyển hướng hoặc thông báo thêm sau 2 giây
                    setTimeout(() => {
                        alert("Yêu cầu của quý khách đã được niêm phong bảo mật.");
                        location.reload();
                    }, 2000);
                }
            });
        });
    });

    // ------------------------- section 4 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng Connecting Lines (Vẽ đường kẻ vàng khi vào vùng nhìn thấy)
        ScrollTrigger.create({
            trigger: "#networkSection",
            start: "top 70%",
            onEnter: () => {
                gsap.to(".connecting-line", {
                    strokeDashoffset: 0,
                    duration: 3,
                    ease: "power2.inOut"
                });
            }
        });

        // 2. Tooltip tương tác trên Desktop
        const hotspots = document.querySelectorAll('.hotspot');
        const tooltip = document.getElementById('mapTooltip');

        hotspots.forEach(spot => {
            spot.addEventListener('mousemove', (e) => {
                const region = spot.getAttribute('data-region');
                const count = spot.getAttribute('data-count');

                tooltip.style.display = 'block';
                tooltip.querySelector('.region-name').innerText = region;
                tooltip.querySelector('.region-stat').innerText = count + " thương vụ thành công";

                gsap.to(tooltip, {
                    x: e.clientX + 15,
                    y: e.clientY + 15,
                    duration: 0.1
                });
            });

            spot.addEventListener('mouseleave', () => {
                tooltip.style.display = 'none';
            });
        });

        // 3. Tự động đổi Region Card định kỳ
        let currentIdx = 0;
        const cards = document.querySelectorAll('.region-card');
        setInterval(() => {
            cards.forEach(c => c.classList.remove('active'));
            currentIdx = (currentIdx + 1) % cards.length;
            cards[currentIdx].classList.add('active');
        }, 4000);
    });

    // ------------------------- section 5 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Điều khiển bóng đổ bên trong SVG (Dynamic Shadow)
        const sealSVG = document.getElementById('mainSealSVG');
        const sealShadow = document.getElementById('sealShadow');

        if (sealSVG && sealShadow) {
            window.addEventListener('mousemove', (e) => {
                const rect = sealSVG.getBoundingClientRect();
                const sealX = rect.left + rect.width / 2;
                const sealY = rect.top + rect.height / 2;

                // Tính toán độ lệch bóng (dx, dy) - Bóng chạy ngược hướng chuột
                const shadowX = (sealX - e.clientX) / 10;
                const shadowY = (sealY - e.clientY) / 10;

                // Cập nhật bóng đổ qua thuộc tính attr của SVG để mượt hơn CSS
                gsap.to(sealShadow, {
                    attr: {
                        dx: shadowX,
                        dy: shadowY,
                        stdDeviation: Math.max(5, Math.abs(shadowX) + 5)
                    },
                    duration: 0.4,
                    ease: "power1.out"
                });

                // Hiệu ứng nghiêng nhẹ con dấu (Tilt effect)
                const tiltX = (e.clientY - sealY) / 30;
                const tiltY = (sealX - e.clientX) / 30;
                gsap.to(sealSVG, {
                    rotationX: tiltX,
                    rotationY: tiltY,
                    transformPerspective: 600,
                    duration: 0.5
                });
            });
        }

        // 2. Hiệu ứng vẽ chữ ký tay (Digital Signature) khi cuộn đến
        const signaturePath = document.getElementById('signature-path');
        if (signaturePath) {
            gsap.to(signaturePath, {
                strokeDashoffset: 0,
                duration: 3,
                scrollTrigger: {
                    trigger: ".signature-wrapper",
                    start: "top 90%",
                    onEnter: () => gsap.to(".signature-wrapper", {
                        opacity: 1,
                        duration: 1.5
                    })
                }
            });
        }

        // 3. Hiệu ứng Parallax cho toàn bộ Section 5 (Tạo độ sâu khi cuộn)
        gsap.to(".security-oath", {
            scale: 1.02,
            ease: "none",
            scrollTrigger: {
                trigger: ".security-oath",
                start: "top bottom",
                end: "bottom bottom",
                scrub: true
            }
        });

        // 4. Mobile Haptic & Quay lại đầu trang
        const btt = document.getElementById('backToTop');
        if (btt) {
            btt.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                // Rung nhẹ trên điện thoại khi bấm
                if ("vibrate" in navigator) navigator.vibrate(30);
            });
        }

        // Rung nhẹ khi người dùng cuộn xuống kịch sàn trang web (Báo hiệu kết thúc)
        window.addEventListener('scroll', () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                if ("vibrate" in navigator) navigator.vibrate(15);
            }
        });
    });

    // ------------------------- section 6 --------------------- //
</script>

</html>