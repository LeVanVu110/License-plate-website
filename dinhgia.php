<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Inter:wght@400;700&family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* ------------------------------ section 1--------------------------  */
        :root {
            --cyan-electric: #00F2FF;
            --obsidian-dark: #020202;
            --titanium-white: #E5E5E5;
            --neon-error: #FF3131;
            --card-bg: #121212;
            --border-soft: rgba(255, 255, 255, 0.08);
            --text-dim: #888888;
            --green-success: #00FF41;
        }

        body {
            margin-top: 5% !important;

        }

        .ai-valuation-hero {
            position: relative;
            height: 100vh;
            background: var(--obsidian-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
        }

        /* Tầng 1: Grid nền */
        .matrix-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 242, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 242, 255, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: 1;
        }

        .system-stats {
            position: absolute;
            top: 40px;
            font-size: 0.65rem;
            color: var(--cyan-electric);
            opacity: 0.5;
            letter-spacing: 2px;
            z-index: 2;
        }

        .system-stats.left {
            left: 40px;
            text-align: left;
        }

        .system-stats.right {
            right: 40px;
            text-align: right;
        }

        .stat-item {
            margin-bottom: 10px;
        }

        /* Tầng 2: Input Zone */
        .interaction-zone {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .input-container {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .input-frame {
            position: relative;
            width: 500px;
            height: 120px;
            border: 1px solid rgba(0, 242, 255, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
        }

        #plateInput {
            background: transparent;
            border: none;
            outline: none;
            color: var(--titanium-white);
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            width: 95%;
            letter-spacing: 10px;
        }

        /* Góc khung (Corner Brackets) */
        .corner-bracket {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid var(--cyan-electric);
        }

        .top-left {
            top: -5px;
            left: -5px;
            border-right: none;
            border-bottom: none;
        }

        .top-right {
            top: -5px;
            right: -5px;
            border-left: none;
            border-bottom: none;
        }

        .bottom-left {
            bottom: -5px;
            left: -5px;
            border-right: none;
            border-top: none;
        }

        .bottom-right {
            bottom: -5px;
            right: -5px;
            border-left: none;
            border-top: none;
        }

        /* Visualizer (Thanh nhảy) */
        .visualizer {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 50px;
        }

        .visualizer span {
            width: 3px;
            background: var(--cyan-electric);
            animation: dance 1s infinite alternate;
        }

        @keyframes dance {
            from {
                height: 10%;
                opacity: 0.3;
            }

            to {
                height: 100%;
                opacity: 1;
            }
        }

        /* Nút Định Giá */
        .btn-evaluate {
            margin-top: 50px;
            background: transparent;
            border: 1px solid var(--cyan-electric);
            color: var(--cyan-electric);
            padding: 15px 60px;
            font-size: 1rem;
            letter-spacing: 5px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: 0.4s;
        }

        .btn-evaluate:hover {
            background: var(--cyan-electric);
            color: #000;
            box-shadow: 0 0 30px var(--cyan-electric);
        }

        /* Trạng thái lỗi */
        .error-state {
            border-color: var(--neon-error) !important;
            animation: shake 0.2s ease-in-out infinite;
        }

        .error-state .corner-bracket {
            border-color: var(--neon-error);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .input-frame {
                width: 85vw;
                height: 100px;
            }

            #plateInput {
                font-size: 1.6rem;
            }

            .visualizer {
                display: none;
            }

            .system-stats {
                top: 20px;
                font-size: 0.5rem;
            }

            .ai-valuation-hero {
                height: 60vh;
                margin-top: 20%;
            }
        }

        /* ------------------------------ section 2--------------------------  */
        .neural-processing {
            position: relative;
            height: 100vh;
            background: #020202;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: 'Roboto Mono', monospace;
            /* Font kiểu mã lệnh */
        }

        /* Terminal Text */
        .terminal-overlay {
            position: absolute;
            inset: 20px;
            pointer-events: none;
            display: flex;
            justify-content: space-between;
            z-index: 1;
        }

        .terminal-log {
            font-size: 0.6rem;
            color: #00F2FF;
            opacity: 0.4;
            line-height: 1.5;
            width: 250px;
            overflow: hidden;
        }

        /* Core & Rings */
        .processing-core {
            position: relative;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wireframe-plate {
            position: relative;
            width: 400px;
            height: 100px;
            border: 1px solid rgba(0, 242, 255, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 242, 255, 0.05);
            backdrop-filter: blur(5px);
        }

        .plate-text {
            font-size: 2.3rem;
            font-weight: 700;
            color: rgba(0, 242, 255, 0.2);
            /* Hiệu ứng Wireframe */
            -webkit-text-stroke: 1px rgba(0, 242, 255, 0.6);
            letter-spacing: 10px;
        }

        /* Vòng xoay Orbit */
        .orbit-rings {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
        }

        .ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid rgba(0, 242, 255, 0.1);
            border-radius: 50%;
            display: flex;
            justify-content: center;
        }

        .ring span {
            font-size: 0.5rem;
            color: #00F2FF;
            margin-top: -10px;
            background: #020202;
            padding: 0 10px;
        }

        .ring-1 {
            width: 300px;
            height: 300px;
            animation: rotate 10s linear infinite;
        }

        .ring-2 {
            width: 400px;
            height: 400px;
            animation: rotate 15s linear infinite reverse;
        }

        .ring-3 {
            width: 500px;
            height: 500px;
            animation: rotate 20s linear infinite;
        }

        .ring-4 {
            width: 600px;
            height: 600px;
            animation: rotate 25s linear infinite reverse;
        }

        @keyframes rotate {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Scanner Line */
        .scanner-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 100%;
            background: #00F2FF;
            box-shadow: 0 0 15px #00F2FF;
            animation: scanMove 2s ease-in-out infinite;
        }

        @keyframes scanMove {

            0%,
            100% {
                left: 0;
            }

            50% {
                left: 100%;
            }
        }

        /* Progress Bar */
        .progress-container {
            position: absolute;
            bottom: 50px;
            width: 60%;
            text-align: center;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.7rem;
            color: #00F2FF;
            letter-spacing: 2px;
        }

        .progress-bar {
            width: 100%;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
        }

        .progress-fill {
            width: 0%;
            height: 100%;
            background: #00F2FF;
            box-shadow: 0 0 10px #00F2FF;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .wireframe-plate {
                width: 85vw;
            }

            .ring-3,
            .ring-4 {
                display: none;
            }

            /* Giảm vòng xoay trên mobile */
            .orbit-rings {
                width: 100vw;
                height: 100vw;
            }

            .terminal-log {
                width: 120px;
                font-size: 0.5rem;
            }
        }

        /* ------------------------------ section 3--------------------------  */
        .the-verdict {
            position: relative;
            min-height: 100vh;
            background: #020202;
            padding: 100px 5%;
            color: #fff;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        /* Hiệu ứng hạt bụi vàng */
        .gold-dust-container {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .verdict-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            z-index: 10;
        }

        /* Price Styling */
        .verdict-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .estimate-label {
            font-size: 0.8rem;
            letter-spacing: 5px;
            color: #888;
            display: block;
            margin-bottom: 20px;
        }

        .price-display {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 10vw, 7rem);
            /* Tự co giãn theo màn hình */
            font-weight: 900;
            color: #D4AF37;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
            line-height: 1;
        }

        .currency {
            font-size: 0.4em;
            vertical-align: super;
            margin-left: 10px;
        }

        /* Analysis Grid */
        .analysis-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .radar-box {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.1);
            padding: 40px;
            height: 450px;
            border-radius: 20px;
        }

        .specs-box {
            display: grid;
            gap: 20px;
        }

        .spec-card {
            background: rgba(255, 255, 255, 0.03);
            padding: 20px 30px;
            border-left: 3px solid #D4AF37;
            transition: 0.3s;
        }

        .spec-card:hover {
            background: rgba(212, 175, 55, 0.05);
            transform: translateX(10px);
        }

        .spec-title {
            font-size: 0.7rem;
            color: #666;
            letter-spacing: 2px;
            display: block;
        }

        .spec-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: #E5E5E5;
            margin-top: 5px;
            display: block;
        }

        /* Con dấu xoay */
        .ai-certified-seal {
            position: absolute;
            bottom: 40px;
            right: 40px;
            width: 150px;
            height: 150px;
            opacity: 0.6;
        }

        .seal-svg {
            animation: rotateSeal 20s linear infinite;
        }

        .seal-text {
            fill: #D4AF37;
            font-size: 8px;
            letter-spacing: 2px;
        }

        @keyframes rotateSeal {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .analysis-grid {
                grid-template-columns: 1fr;
            }

            .radar-box {
                height: 350px;
                padding: 20px;
            }

            .specs-box {
                display: flex;
                overflow-x: auto;
                padding-bottom: 20px;
                scroll-snap-type: x mandatory;
            }

            .spec-card {
                min-width: 250px;
                scroll-snap-align: center;
            }

            .ai-certified-seal {
                position: relative;
                inset: auto;
                margin: 40px auto;
            }
        }

        /* ------------------------------ section 4--------------------------  */
        /* --- SECTION 4: MARKET BENCHMARKS (RE-DESIGNED) --- */
        .market-benchmarks {
            position: relative;
            min-height: 200vh;
            background: #0a0a0a;
            /* Đen xám chì để tách biệt khối */
            padding: 120px 5%;
            z-index: 5;
            overflow: hidden;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Lớp phủ tránh đụng màu với Section 3 */
        .market-benchmarks::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 200px;
            background: linear-gradient(to bottom, #020202, transparent);
            z-index: 2;
            pointer-events: none;
        }

        .benchmarks-container {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
        }

        .benchmarks-header {
            text-align: center;
            margin-bottom: 70px;
        }

        .benchmarks-header .section-title {
            color: #FFFFFF !important;
            /* Trắng tuyệt đối */
            font-size: 0.9rem;
            letter-spacing: 10px;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            margin-bottom: 15px;
        }

        .system-status {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.75rem;
            color: #00FF41;
            /* Xanh lá nhạt - Đã bán/Thành công */
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #00FF41;
            border-radius: 50%;
            box-shadow: 0 0 10px #00FF41;
            animation: pulse 1.5s infinite;
        }

        /* Thẻ Card đối chiếu */
        .comparison-cards-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .benchmark-card {
            background: #121212;
            /* Nền thẻ Card */
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 30px;
            border-radius: 12px;
            transition: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
        }

        .benchmark-card:hover {
            transform: translateY(-15px);
            border-color: var(--cyan-electric);
            background: #161616;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(0, 242, 255, 0.05);
        }

        .card-plate-display {
            background: #000;
            height: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 6px;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .mini-plate {
            font-size: 1.6rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: 3px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            margin-bottom: 12px;
            color: #888;
            /* Màu chữ mờ cho nhãn */
        }

        .info-row .val {
            color: #E5E5E5;
            /* Trắng Titanium cho giá trị */
            font-weight: 600;
        }

        .price-row {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px dashed rgba(255, 255, 255, 0.1);
        }

        .price-val {
            font-size: 1.8rem;
            font-weight: 700;
            color: #FFFFFF;
            /* Màu trắng cho giá tiền */
        }

        .card-footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .similarity-tag {
            font-size: 0.65rem;
            padding: 5px 12px;
            background: rgba(0, 242, 255, 0.1);
            color: var(--cyan-electric);
            border-radius: 4px;
            font-weight: 700;
        }

        .status-tag {
            font-size: 0.7rem;
            color: #00FF41;
            font-weight: 800;
        }

        .btn-load-more {
            display: block;
            margin: 60px auto 0;
            background: transparent;
            border: 1px solid #333;
            color: #888;
            padding: 12px 30px;
            font-size: 0.7rem;
            letter-spacing: 3px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-load-more:hover {
            color: #fff;
            border-color: #fff;
        }

        /* Hiệu ứng biểu đồ nền mờ */
        .bg-chart-overlay {
            position: absolute;
            bottom: 0;
            left: 5%;
            right: 5%;
            height: 350px;
            display: flex;
            align-items: flex-end;
            gap: 15px;
            opacity: 0.03;
            /* Cực mờ để không làm rối mắt */
            z-index: 1;
        }

        .bar-item {
            flex: 1;
            background: #FFFFFF;
            border-radius: 4px 4px 0 0;
        }

        @media (max-width: 768px) {
            .comparison-cards-wrapper {
                display: flex;
                overflow-x: auto;
                padding-bottom: 30px;
                gap: 20px;
                scroll-snap-type: x mandatory;
            }

            .benchmark-card {
                min-width: 85vw;
                scroll-snap-align: center;
            }

            .market-benchmarks {
                min-height: 130vh !important;
            }
        }

        /* ------------------------------ section 5--------------------------  */
        /* --- SECTION 5: STRATEGIC CALL (FIXED) --- */
        .strategic-call {
            position: relative;
            height: 100vh;
            background: #020202;
            overflow: hidden;
            z-index: 10;
            display: flex;
            padding-top: 5%;
            /* Đảm bảo con trực tiếp dàn đều */
        }

        .split-layout {
            display: flex;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .gate {
            position: relative;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 5%;
            transition: flex 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
        }

        /* Sửa lỗi đụng màu đen: Đảm bảo content luôn có z-index cao */
        .gate-content {
            position: relative;
            text-align: center;
            z-index: 20;
            width: 100%;
            max-width: 450px;
            opacity: 1 !important;
            /* Đảm bảo không bị ẩn bởi script */
        }

        .liquidate-gate {
            background: #050b18;
            border-right: 0.5px solid rgba(212, 175, 55, 0.3);
        }

        .secure-gate {
            background: #0c0a09;
        }

        /* Nút bấm tinh chỉnh */
        .btn-gate {
            padding: 18px 45px;
            background: transparent;
            cursor: pointer;
            letter-spacing: 2px;
            font-weight: 700;
            font-size: 0.85rem;
            margin-top: 20px;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-silver {
            border: 1px solid #c0c0c0;
            color: #fff;
        }

        .btn-gold {
            border: 1px solid #D4AF37;
            color: #D4AF37;
        }

        /* Divider và Logo chính giữa */
        .divider-line {
            position: absolute;
            left: 50%;
            top: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, #D4AF37, transparent);
            z-index: 30;
            transform: translateX(-50%);
            pointer-events: none;
        }

        .logo-anchor {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #020202;
            padding: 15px;
            z-index: 31;
        }

        /* Fix Mobile */
        @media (max-width: 768px) {
            .split-layout {
                flex-direction: column;
            }

            .gate {
                height: 50vh;
                padding: 40px 20px;
            }

            .gate-title {
                font-size: 1.8rem;
            }

            .divider-line {
                width: 100%;
                height: 1px;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
            }
        }

        /* ------------------------------ section 6--------------------------  */
        /* ------------------------------ section 7--------------------------  */
        /* ------------------------------ section 8--------------------------  */
    </style>
</head>

<body>
    <!-- /* ------------------------------ section 1--------------------------  */ -->
    <section class="ai-valuation-hero" id="inputSection">
        <div class="matrix-grid"></div>
        <div class="system-stats left">
            <div class="stat-item">GPS: 21.0285° N, 105.8542° E</div>
            <div class="stat-item">AI CORE TEMP: 32°C</div>
            <div class="stat-item">DATABASE: CONNECTED</div>
        </div>
        <div class="system-stats right">
            <div class="stat-item">PROCESSING: IDLE</div>
            <div class="stat-item">NEURAL LINK: ACTIVE</div>
            <div class="stat-item">STABILITY: 99.9%</div>
        </div>

        <div class="interaction-zone">
            <div class="input-container">
                <div class="visualizer left">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>

                <div class="input-frame" id="inputFrame">
                    <div class="corner-bracket top-left"></div>
                    <div class="corner-bracket top-right"></div>
                    <div class="corner-bracket bottom-left"></div>
                    <div class="corner-bracket bottom-right"></div>

                    <input type="text" id="plateInput" placeholder="NHẬP BIỂN SỐ..." autocomplete="off">
                </div>

                <div class="visualizer right">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
            </div>

            <button class="btn-evaluate" id="btnEvaluate">
                <span class="btn-text">ĐỊNH GIÁ AI</span>
                <div class="scan-bar"></div>
            </button>
        </div>

        <div class="vignette-overlay"></div>
    </section>
    <!-- /* ------------------------------ section 2--------------------------  */ -->
    <section class="neural-processing" id="processingSection">
        <div class="terminal-overlay">
            <div class="terminal-log left" id="logLeft"></div>
            <div class="terminal-log right" id="logRight"></div>
        </div>

        <div class="processing-core">
            <div class="orbit-rings">
                <div class="ring ring-1"><span>LỊCH SỬ THỊ TRƯỜNG</span></div>
                <div class="ring ring-2"><span>PHONG THỦY HỌC</span></div>
                <div class="ring ring-3"><span>ĐỘ KHAN HIẾM</span></div>
                <div class="ring ring-4"><span>QUY LUẬT SỐ</span></div>
            </div>

            <div class="wireframe-plate">
                <div class="plate-text" id="displayPlate">29A - 888.88</div>
                <div class="scanner-line"></div>
                <div class="glint gold-point-1"></div>
                <div class="glint gold-point-2"></div>
            </div>
        </div>

        <div class="progress-container">
            <div class="progress-info">
                <span class="status-text">AI ANALYSIS IN PROGRESS...</span>
                <span class="percentage" id="procPercent">0%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" id="procFill"></div>
            </div>
        </div>
    </section>

    <!-- /* ------------------------------ section 3--------------------------  */ -->
    <section class="the-verdict" id="verdictSection">
        <div class="gold-dust-container" id="dustContainer"></div>

        <div class="verdict-container">
            <div class="verdict-header">
                <span class="estimate-label">ƯỚC TÍNH GIÁ TRỊ THỊ TRƯỜNG</span>
                <div class="price-display">
                    <span id="finalPrice">0</span><span class="currency">đ</span>
                </div>
            </div>

            <div class="analysis-grid">
                <div class="radar-box">
                    <canvas id="radarChart"></canvas>
                </div>

                <div class="specs-box">
                    <div class="spec-card">
                        <span class="spec-title">PHONG THỦY</span>
                        <span class="spec-value" id="val-phongthuy">Đang phân tích...</span>
                    </div>
                    <div class="spec-card">
                        <span class="spec-title">THẾ SỐ</span>
                        <span class="spec-value" id="val-theso">Đang phân tích...</span>
                    </div>
                    <div class="spec-card">
                        <span class="spec-title">TỔNG NÚT</span>
                        <span class="spec-value" id="val-tongnut">Đang phân tích...</span>
                    </div>
                    <div class="spec-card">
                        <span class="spec-title">THANH KHOẢN</span>
                        <span class="spec-value">Rất Cao (24h-48h)</span>
                    </div>
                </div>
            </div>

            <div class="ai-certified-seal">
                <svg viewBox="0 0 100 100" class="seal-svg">
                    <path id="curve" d="M 20,50 a 30,30 0 1,1 60,0 a 30,30 0 1,1 -60,0" fill="transparent" />
                    <text>
                        <textPath xlink:href="#curve" class="seal-text">
                            AI CERTIFIED • AUTHENTIC VALUATION •
                        </textPath>
                    </text>
                    <circle cx="50" cy="50" r="15" fill="#D4AF37" class="seal-core" />
                </svg>
            </div>
        </div>
    </section>

    <!-- /* ------------------------------ section 4--------------------------  */ -->
    <section class="market-benchmarks" id="benchmarksSection">
        <div class="bg-chart-overlay">
            <div class="bar-item" style="height: 45%"></div>
            <div class="bar-item" style="height: 60%"></div>
            <div class="bar-item" style="height: 90%"></div>
            <div class="bar-item" style="height: 55%"></div>
            <div class="bar-item" style="height: 80%"></div>
            <div class="bar-item" style="height: 65%"></div>
        </div>

        <div class="benchmarks-container">
            <div class="benchmarks-header">
                <h2 class="section-title">DỮ LIỆU GIAO DỊCH TƯƠNG ĐỒNG</h2>
                <div class="system-status">
                    <span class="pulse-dot"></span>
                    <span style="opacity: 0.9; letter-spacing: 1px;">TÌM THẤY 1,240 DỮ LIỆU KHỚP VỚI BIẾN SỐ CỦA BẠN</span>
                </div>
            </div>

            <div class="comparison-cards-wrapper">
                <div class="benchmark-card">
                    <div class="card-plate-display">
                        <div class="mini-plate">29A-888.68</div>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <span>Ngày giao dịch:</span>
                            <span class="val">12/10/2025</span>
                        </div>
                        <div class="info-row">
                            <span>Khu vực:</span>
                            <span class="val">Hà Nội</span>
                        </div>
                        <div class="price-row">
                            <span class="price-val">850,000,000</span><small style="color:#888; margin-left:5px;">đ</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="similarity-tag">GIỐNG 95%</span>
                        <span class="status-tag">ĐÃ BÁN</span>
                    </div>
                </div>

                <div class="benchmark-card">
                    <div class="card-plate-display">
                        <div class="mini-plate">30K-999.88</div>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <span>Ngày giao dịch:</span>
                            <span class="val">05/11/2025</span>
                        </div>
                        <div class="info-row">
                            <span>Khu vực:</span>
                            <span class="val">TP. HCM</span>
                        </div>
                        <div class="price-row">
                            <span class="price-val">1,200,000,000</span><small style="color:#888; margin-left:5px;">đ</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="similarity-tag">CÙNG ĐẦU SỐ</span>
                        <span class="status-tag">ĐÃ BÁN</span>
                    </div>
                </div>

                <div class="benchmark-card">
                    <div class="card-plate-display">
                        <div class="mini-plate">30L-888.99</div>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <span>Ngày giao dịch:</span>
                            <span class="val">20/12/2025</span>
                        </div>
                        <div class="info-row">
                            <span>Khu vực:</span>
                            <span class="val">Hà Nội</span>
                        </div>
                        <div class="price-row">
                            <span class="price-val">980,000,000</span><small style="color:#888; margin-left:5px;">đ</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="similarity-tag">GIỐNG 88%</span>
                        <span class="status-tag">ĐÃ BÁN</span>
                    </div>
                </div>

            </div>

            <button class="btn-load-more">XEM THÊM DỮ LIỆU THỊ TRƯỜNG</button>
        </div>
    </section>
    <!-- /* ------------------------------ section 5--------------------------  */ -->
    <section class="strategic-call" id="callSection">
        <div class="split-layout">
            <div class="gate liquidate-gate" id="gateLeft">
                <div class="gate-content">
                    <span class="gate-label">DÀNH CHO NGƯỜI BÁN</span>
                    <h3 class="gate-title" style="color: #fff; margin-bottom: 15px;">THANH KHOẢN NGAY</h3>
                    <p class="gate-desc" style="color: #aaa; margin-bottom: 30px;">Bán biển số nhanh chóng với mức giá AI đề xuất thông qua mạng lưới độc quyền.</p>
                    <button class="btn-gate btn-silver" onclick="openGateForm('Bán')">ĐĂNG BÁN ƯU TIÊN</button>
                </div>
            </div>

            <div class="divider-line">
                <div class="logo-anchor">
                    <div class="mini-logo-circle">PS</div>
                </div>
            </div>

            <div class="gate secure-gate" id="gateRight">
                <div class="gate-content">
                    <span class="gate-label">DÀNH CHO NHÀ SƯU TẦM</span>
                    <h3 class="gate-title" style="color: #fff; margin-bottom: 15px;">KÝ GỬI & BẢO MẬT</h3>
                    <p class="gate-desc" style="color: #aaa; margin-bottom: 30px;">Đưa tài sản vào danh mục quản trị chuyên sâu để tối ưu hóa giá trị bền vững.</p>
                    <button class="btn-gate btn-gold" onclick="openGateForm('Ký gửi')">KÝ GỬI CHUYÊN GIA</button>
                </div>
            </div>
        </div>
    </section>

    <!-- /* ------------------------------ section 6--------------------------  */ -->

    <!-- /* ------------------------------ section 7--------------------------  */ -->

    <!-- /* ------------------------------ section 8--------------------------  */ -->


    <?php include "footer.php" ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Đăng ký các Plugin cần thiết của GSAP
    gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

    // -------------------------------------- LOGIC ĐIỀU KHIỂN CHUNG ------------------- //

    // Hàm trung tâm điều phối luồng chạy của trang
    function startValuationFlow() {
        const plateNumber = document.getElementById('plateInput').value.trim();

        // 1. Chuyển từ Section 1 -> Section 2
        gsap.to(window, {
            duration: 1.2,
            scrollTo: "#processingSection",
            ease: "power4.inOut",
            onStart: () => {
                // Hiển thị biển số đang quét vào Section 2
                document.getElementById('displayPlate').innerText = plateNumber;
                // Kích hoạt Terminal và vòng xoay
                runNeuralProcessing();
            }
        });
    }

    // -------------------------------------- SECTION 1: INPUT ------------------------- //
    const plateInput = document.getElementById('plateInput');
    const inputFrame = document.getElementById('inputFrame');
    const btnEvaluate = document.getElementById('btnEvaluate');

    // Hiệu ứng phát sáng khi gõ chữ
    plateInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.toUpperCase();
        if (e.target.value.length > 0) {
            inputFrame.style.boxShadow = "0 0 25px rgba(0, 242, 255, 0.3)";
            inputFrame.style.borderColor = "var(--cyan-electric)";
        } else {
            inputFrame.style.boxShadow = "none";
            inputFrame.style.borderColor = "rgba(0, 242, 255, 0.2)";
        }
    });

    // Sự kiện Click nút Định giá
    btnEvaluate.addEventListener('click', () => {
        if (plateInput.value === "") {
            inputFrame.classList.add('error-state');
            setTimeout(() => inputFrame.classList.remove('error-state'), 1000);
        } else {
            // Hiệu ứng quét laser cục bộ tại nút trước khi chuyển trang
            gsap.to(".scan-bar", {
                top: "100%",
                duration: 0.5,
                repeat: 1
            });
            // Bắt đầu luồng chuyển cảnh
            startValuationFlow();
        }
    });

    // -------------------------------------- SECTION 2: PROCESSING -------------------- //
    function runNeuralProcessing() {
        const logs = [
            "Analyzing: Region code " + plateInput.value.substring(0, 2) + "...",
            "Scanning: Feng Shui Balance...",
            "Fetching: Auction History 2026...",
            "Rule Detection: Unique Patterns...",
            "Calculating: Market Demand Index...",
            "Neural Link: Verifying Liquidity...",
            "Processing: Final Result Generation..."
        ];

        let logIndex = 0;
        const logLeft = document.getElementById('logLeft');
        logLeft.innerHTML = ""; // Reset terminal

        // Chạy Terminal Text
        const logInterval = setInterval(() => {
            if (logIndex < logs.length) {
                const p = document.createElement('div');
                p.innerText = `> ${logs[logIndex]}`;
                p.style.opacity = "0";
                logLeft.appendChild(p);
                gsap.to(p, {
                    opacity: 1,
                    x: 5,
                    duration: 0.3
                });
                logIndex++;
            } else {
                clearInterval(logInterval);
            }
        }, 600);

        // Chạy Progress Bar 0% -> 100%
        gsap.to("#procFill", {
            width: "100%",
            duration: 4.5, // Thời gian chờ AI xử lý
            ease: "none",
            onUpdate: function() {
                const progress = Math.round(this.progress() * 100);
                document.getElementById('procPercent').innerText = progress + "%";

                // Hiệu ứng Glitch cuối tiến trình
                if (progress === 99) {
                    gsap.to("#processingSection", {
                        x: 3,
                        yoyo: true,
                        repeat: 10,
                        duration: 0.05
                    });
                }
            },
            onComplete: () => {
                // Tự động chuyển sang Section 3 khi xong 100%
                goToVerdict();
            }
        });
    }

    // -------------------------------------- SECTION 3: VERDICT ----------------------- //

    // Biến toàn cục để quản lý Chart, tránh lỗi chồng đè khi định giá nhiều lần
    let myRadarChart = null;

    function goToVerdict() {
        gsap.to(window, {
            duration: 1.5,
            scrollTo: "#verdictSection",
            ease: "expo.inOut",
            onStart: () => {
                // Giả lập thuật toán định giá: Biển càng nhiều số trùng, giá càng cao
                const plateValue = document.getElementById('plateInput').value;
                const basePrice = 50000000;
                const randomness = Math.random() * 50000000;

                // Logic giả lập: nếu có số lặp (tứ quý, ngũ quý) thì giá tăng vọt
                const hasRepeats = /(.)\1{3,}/.test(plateValue.replace(/[^0-9]/g, ''));
                const multiplier = hasRepeats ? 20 : 1;

                const finalPrice = Math.floor((basePrice + randomness) * multiplier);

                triggerVerdict(finalPrice);
            }
        });
    }

    function triggerVerdict(finalValue) {
        const plateRaw = document.getElementById('plateInput').value.trim().toUpperCase();

        // 1. Hiệu ứng nhảy số tiền (Money Counter)
        const priceElement = document.getElementById('finalPrice');
        gsap.to(priceElement, {
            innerText: finalValue,
            duration: 2.5,
            snap: {
                innerText: 1
            },
            ease: "power4.out",
            onUpdate: function() {
                priceElement.innerText = parseFloat(priceElement.innerText).toLocaleString('vi-VN');
            }
        });

        // 2. Logic Phân tích dữ liệu biển số thực tế cho spec-cards
        analyzePlateSpecs(plateRaw);

        // 3. Vẽ biểu đồ Radar (Sử dụng Chart.js)
        const ctx = document.getElementById('radarChart').getContext('2d');

        // Hủy biểu đồ cũ nếu đã tồn tại để vẽ mới hoàn toàn
        if (myRadarChart) {
            myRadarChart.destroy();
        }

        myRadarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['PHONG THỦY', 'ĐỘ HIẾM', 'THANH KHOẢN', 'ĐẦU SỐ', 'THẨM MỸ'],
                datasets: [{
                    label: 'Chỉ số AI',
                    data: [
                        Math.floor(Math.random() * 20) + 80, // Phong thủy ngẫu nhiên 80-100
                        /(.)\1{2,}/.test(plateRaw) ? 98 : 75, // Độ hiếm dựa trên số lặp
                        Math.floor(Math.random() * 30) + 65,
                        85,
                        90
                    ],
                    backgroundColor: 'rgba(212, 175, 55, 0.2)',
                    borderColor: '#D4AF37',
                    pointBackgroundColor: '#D4AF37',
                    pointBorderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        angleLines: {
                            color: 'rgba(255,255,255,0.1)'
                        },
                        grid: {
                            color: 'rgba(255,255,255,0.1)'
                        },
                        pointLabels: {
                            color: '#aaa',
                            font: {
                                size: 12,
                                family: 'Inter'
                            }
                        },
                        ticks: {
                            display: false,
                            max: 100
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // 4. Tạo hạt bụi vàng (Gold Dust) nâng cao
        createGoldDustEffect();
    }

    // Hàm bổ trợ phân tích chi tiết biển số để đổ dữ liệu vào UI
    function analyzePlateSpecs(plate) {
    const specs = document.querySelectorAll('.spec-value');
    const numbersOnly = plate.replace(/[^0-9]/g, '');
    
    // 1. Cập nhật THẾ SỐ (Chỉ số [1])
    if (/(.)\1{4}/.test(numbersOnly)) specs[1].innerText = "Ngũ Quý (Cực Phẩm)";
    else if (/(.)\1{3}/.test(numbersOnly)) specs[1].innerText = "Tứ Quý (Đẳng Cấp)";
    else if (/(.)\1{2}/.test(numbersOnly)) specs[1].innerText = "Tam Hoa (Phú Quý)";
    else if (/0123|1234|2345|3456|4567|5678|6789/.test(numbersOnly)) specs[1].innerText = "Số Tiến (Thăng Tiến)";
    else specs[1].innerText = "Số Cặp (Cân Đối)";

    // 2. Cập nhật TỔNG NÚT (Chỉ số [2])
    let total = 0;
    numbersOnly.split('').forEach(num => total += parseInt(num));
    let nut = total % 10;
    // Nếu bạn muốn 999.99 ra 6 nút (không theo toán học) thì phải sửa thủ công, 
    // nhưng tốt nhất nên để theo toán học:
    specs[2].innerText = nut + " Nút (" + (nut >= 7 ? "Đại Cát" : "Bình An") + ")";

    // 3. Cập nhật PHONG THỦY (Chỉ số [0])
    // Thêm dòng này để nó không bị fix cứng "Trường Cửu" mãi mãi
    if (nut === 9) specs[0].innerText = "Đại Cát - Trường Cửu";
    else specs[0].innerText = "Hanh Thông - Tốt Lành";

    // Kích hoạt hiệu ứng bay vào cho các card
    gsap.from(".spec-card", {
        opacity: 0,
        x: 30,
        stagger: 0.1,
        duration: 0.8,
        ease: "power2.out"
    });
}

    function createGoldDustEffect() {
        const container = document.getElementById('dustContainer');
        container.innerHTML = "";
        for (let i = 0; i < 45; i++) {
            const dust = document.createElement('div');
            dust.style.cssText = `
                position: absolute; width: ${Math.random()*3}px; height: ${Math.random()*3}px; 
                background: #D4AF37; border-radius: 50%; 
                top: ${Math.random()*100}%; left: ${Math.random()*100}%;
                opacity: ${Math.random()}; pointer-events: none;
                box-shadow: 0 0 4px #D4AF37;
            `;
            container.appendChild(dust);

            gsap.to(dust, {
                y: -150 - Math.random() * 100,
                x: "+=" + (Math.random() * 40 - 20),
                opacity: 0,
                duration: 2 + Math.random() * 2,
                repeat: -1,
                delay: Math.random() * 2,
                ease: "power1.out"
            });
        }
    }

    // -------------------------------------- SECTION 4: BENCHMARKS -------------------- //
    function animateSection4() {
        // Đảm bảo section hiện thị và reset opacity của card
        gsap.set(".benchmark-card", {
            opacity: 0,
            y: 50
        });

        ScrollTrigger.create({
            trigger: "#benchmarksSection",
            start: "top 70%",
            onEnter: () => {
                gsap.to(".benchmark-card", {
                    y: 0,
                    opacity: 1,
                    duration: 1,
                    stagger: 0.2,
                    ease: "power4.out"
                });
            }
        });

        // Hiệu ứng biểu đồ cột nền nhấp nhô mờ ảo
        gsap.to(".bar-item", {
            height: "random(20, 95)%",
            duration: 2.5,
            repeat: -1,
            yoyo: true,
            stagger: 0.2,
            ease: "sine.inOut"
        });

    }
    window.addEventListener('load', animateSection4);
    // -------------------------   SECTION 5 -------------------------//
    function openGateForm(type) {
        const formOverlay = document.getElementById('gateForm');
        document.getElementById('formTypeTitle').innerText = 'YÊU CẦU ' + type.toUpperCase();

        // Hiệu ứng hiện Form mượt mà
        gsap.to(formOverlay, {
            display: 'flex',
            opacity: 1,
            duration: 0.5
        });
        gsap.from(".form-container > *", {
            y: 30,
            opacity: 0,
            stagger: 0.1,
            duration: 0.5
        });
    }

    function closeGateForm() {
        gsap.to("#gateForm", {
            opacity: 0,
            duration: 0.3,
            onComplete: () => {
                document.getElementById('gateForm').style.display = 'none';
            }
        });
    }

    function submitGateForm() {
        const name = document.getElementById('clientName').value;
        const tel = document.getElementById('clientTel').value;

        if (name && tel) {
            alert("Thông tin đã được gửi tới chuyên gia. Chúng tôi sẽ liên hệ lại ngay.");
            closeGateForm();
        } else {
            alert("Vui lòng nhập đủ thông tin.");
        }
    }

    // Thêm hiệu ứng ScrollTrigger cho Section 5
    function animateSection5() {
        // Reset trạng thái ban đầu để tránh bị mất nội dung nếu ScrollTrigger chưa chạy
        gsap.set(".gate-content", {
            opacity: 1,
            y: 0
        });

        gsap.from(".gate-content", {
            scrollTrigger: {
                trigger: "#callSection",
                start: "top 70%",
                toggleActions: "play none none reverse"
            },
            y: 60,
            opacity: 0,
            duration: 1,
            stagger: 0.3,
            ease: "power3.out"
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        animateSection5();
    });
</script>

</html>