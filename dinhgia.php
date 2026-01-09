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
            font-size: 2.5rem;
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
        /* ------------------------------ section 5--------------------------  */
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
                        <span class="spec-value">Đại Cát - Trường Cửu</span>
                    </div>
                    <div class="spec-card">
                        <span class="spec-title">THẾ SỐ</span>
                        <span class="spec-value">Số Lặp Kép (AABB)</span>
                    </div>
                    <div class="spec-card">
                        <span class="spec-title">TỔNG NÚT</span>
                        <span class="spec-value">9 Nút (Cực Đỉnh)</span>
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

    <!-- /* ------------------------------ section 5--------------------------  */ -->

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
            gsap.to(".scan-bar", { top: "100%", duration: 0.5, repeat: 1 });
            // Bắt đầu luồng chuyển cảnh
            startValuationFlow();
        }
    });

    // -------------------------------------- SECTION 2: PROCESSING -------------------- //
    function runNeuralProcessing() {
        const logs = [
            "Analyzing: Region code " + plateInput.value.substring(0,2) + "...",
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
                gsap.to(p, { opacity: 1, x: 5, duration: 0.3 });
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
                    gsap.to("#processingSection", { x: 3, yoyo: true, repeat: 10, duration: 0.05 });
                }
            },
            onComplete: () => {
                // Tự động chuyển sang Section 3 khi xong 100%
                goToVerdict();
            }
        });
    }

    // -------------------------------------- SECTION 3: VERDICT ----------------------- //
    function goToVerdict() {
        gsap.to(window, {
            duration: 1.5,
            scrollTo: "#verdictSection",
            ease: "expo.inOut",
            onStart: () => {
                // Giả lập giá trị định giá dựa trên biển số (Logic mẫu)
                const mockPrice = Math.floor(Math.random() * (2000000000 - 50000000) + 50000000);
                triggerVerdict(mockPrice);
            }
        });
    }

    function triggerVerdict(finalValue) {
        // 1. Nhảy số tiền (Money Counter)
        const priceElement = document.getElementById('finalPrice');
        gsap.to(priceElement, {
            innerText: finalValue,
            duration: 2.5,
            snap: { innerText: 1 },
            ease: "power4.out",
            onUpdate: function() {
                priceElement.innerText = parseFloat(priceElement.innerText).toLocaleString('vi-VN');
            }
        });

        // 2. Vẽ biểu đồ Radar (Sử dụng Chart.js)
        const ctx = document.getElementById('radarChart').getContext('2d');
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['PHONG THỦY', 'ĐỘ HIẾM', 'THANH KHOẢN', 'ĐẦU SỐ', 'THẨM MỸ'],
                datasets: [{
                    data: [95, 80, 70, 85, 90], // Dữ liệu này có thể thay đổi tùy biển số
                    backgroundColor: 'rgba(212, 175, 55, 0.2)',
                    borderColor: '#D4AF37',
                    pointBackgroundColor: '#D4AF37',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    r: {
                        angleLines: { color: 'rgba(255,255,255,0.05)' },
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        pointLabels: { color: '#888', font: { size: 11 } },
                        ticks: { display: false, max: 100 }
                    }
                },
                plugins: { legend: { display: false } }
            }
        });

        // 3. Tạo hạt bụi vàng (Gold Dust)
        const container = document.getElementById('dustContainer');
        container.innerHTML = ""; // Reset bụi
        for (let i = 0; i < 40; i++) {
            const dust = document.createElement('div');
            dust.style.cssText = `
                position: absolute; width: 2px; height: 2px; background: #D4AF37;
                border-radius: 50%; top: ${Math.random()*100}%; left: ${Math.random()*100}%;
                opacity: ${Math.random()}; pointer-events: none;
            `;
            container.appendChild(dust);

            gsap.to(dust, {
                y: "-=150",
                x: "+=" + (Math.random() * 60 - 30),
                opacity: 0,
                duration: 3 + Math.random() * 2,
                repeat: -1,
                delay: Math.random() * 2
            });
        }
    }
</script>

</html>