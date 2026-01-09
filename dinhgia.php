<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        font-family: 'Roboto Mono', monospace; /* Font kiểu mã lệnh */
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
        color: rgba(0, 242, 255, 0.2); /* Hiệu ứng Wireframe */
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
        top: 50%; left: 50%;
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

    .ring-1 { width: 300px; height: 300px; animation: rotate 10s linear infinite; }
    .ring-2 { width: 400px; height: 400px; animation: rotate 15s linear infinite reverse; }
    .ring-3 { width: 500px; height: 500px; animation: rotate 20s linear infinite; }
    .ring-4 { width: 600px; height: 600px; animation: rotate 25s linear infinite reverse; }

    @keyframes rotate { from { transform: translate(-50%, -50%) rotate(0deg); } to { transform: translate(-50%, -50%) rotate(360deg); } }

    /* Scanner Line */
    .scanner-line {
        position: absolute;
        top: 0; left: 0;
        width: 2px; height: 100%;
        background: #00F2FF;
        box-shadow: 0 0 15px #00F2FF;
        animation: scanMove 2s ease-in-out infinite;
    }
    @keyframes scanMove { 0%, 100% { left: 0; } 50% { left: 100%; } }

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
        background: rgba(255,255,255,0.1);
    }
    .progress-fill {
        width: 0%;
        height: 100%;
        background: #00F2FF;
        box-shadow: 0 0 10px #00F2FF;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .wireframe-plate { width: 85vw; }
        .ring-3, .ring-4 { display: none; } /* Giảm vòng xoay trên mobile */
        .orbit-rings { width: 100vw; height: 100vw; }
        .terminal-log { width: 120px; font-size: 0.5rem; }
    }
        /* ------------------------------ section 3--------------------------  */
        /* ------------------------------ section 4--------------------------  */
        /* ------------------------------ section 5--------------------------  */
        /* ------------------------------ section 6--------------------------  */
        /* ------------------------------ section 7--------------------------  */
        /* ------------------------------ section 8--------------------------  */
    </style>
</head>

<body>
    <!-- /* ------------------------------ section 1--------------------------  */ -->
    <section class="ai-valuation-hero">
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

    <!-- /* ------------------------------ section 4--------------------------  */ -->

    <!-- /* ------------------------------ section 5--------------------------  */ -->

    <!-- /* ------------------------------ section 6--------------------------  */ -->

    <!-- /* ------------------------------ section 7--------------------------  */ -->

    <!-- /* ------------------------------ section 8--------------------------  */ -->


    <?php include "footer.php" ?>

</body>
<script>
    // -------------------------------------- section 1 ------------------------------- //
    const plateInput = document.getElementById('plateInput');
    const inputFrame = document.getElementById('inputFrame');
    const btnEvaluate = document.getElementById('btnEvaluate');

    // 1. Hiệu ứng khi nhập liệu
    plateInput.addEventListener('input', (e) => {
        // Tự động viết hoa
        e.target.value = e.target.value.toUpperCase();

        // Hiệu ứng "Sáng rực" khi có chữ
        if (e.target.value.length > 0) {
            inputFrame.style.boxShadow = "0 0 20px rgba(0, 242, 255, 0.2)";
            inputFrame.style.borderColor = "var(--cyan-electric)";
        } else {
            inputFrame.style.boxShadow = "none";
            inputFrame.style.borderColor = "rgba(0, 242, 255, 0.2)";
        }
    });

    // 2. Giả lập kiểm tra lỗi (Ví dụ: nếu bỏ trống)
    btnEvaluate.addEventListener('click', () => {
        if (plateInput.value === "") {
            inputFrame.classList.add('error-state');
            setTimeout(() => {
                inputFrame.classList.remove('error-state');
            }, 1000);
        } else {
            // Chạy hiệu ứng quét Laser khi bắt đầu định giá
            gsap.to(".scan-bar", {
                top: "100%",
                duration: 1.5,
                repeat: -1
            });
            alert("Hệ thống AI đang phân tích dữ liệu thị trường...");
        }
    });
    // -------------------------------------- section 2 ------------------------------- //
    // Giả lập dữ liệu Terminal
    const logs = [
        "Analyzing: Region code 29...",
        "Scanning: Feng Shui Balance...",
        "Fetching: Auction History 2025...",
        "Rule Detection: Quadruple Numbers...",
        "Calculating: Market Demand Index...",
        "Neural Link: Verifying Liquidity...",
        "Processing: Final Result Generation..."
    ];

    function startProcessing() {
        let logIndex = 0;
        const logLeft = document.getElementById('logLeft');
        
        // Chạy dòng lệnh giả lập
        const logInterval = setInterval(() => {
            if(logIndex < logs.length) {
                const p = document.createElement('div');
                p.innerText = `> ${logs[logIndex]}`;
                logLeft.appendChild(p);
                logIndex++;
            } else {
                clearInterval(logInterval);
            }
        }, 800);

        // Chạy thanh tiến trình và số %
        gsap.to("#procFill", {
            width: "100%",
            duration: 5,
            ease: "none",
            onUpdate: function() {
                const progress = Math.round(this.progress() * 100);
                document.getElementById('procPercent').innerText = progress + "%";
                
                // Hiệu ứng Glitch ở 99%
                if(progress === 99) {
                    gsap.to("#processingSection", {
                        x: 2, y: 2, duration: 0.1, repeat: 10, yoyo: true
                    });
                }
            },
            onComplete: () => {
                alert("PHÂN TÍCH HOÀN TẤT. ĐANG TRÍCH XUẤT DỮ LIỆU...");
                // Chuyển sang Section kết quả
            }
        });
    }

    // Tự động chạy khi tải (hoặc sau khi nhấn nút ở Section 1)
    window.onload = startProcessing;
    // -------------------------------------- section 3 ------------------------------- //
    // -------------------------------------- section 4 ------------------------------- //
    // -------------------------------------- section 5 ------------------------------- //
    // -------------------------------------- section 6 ------------------------------- //
    // -------------------------------------- section 7 ------------------------------- //
    // -------------------------------------- section 8 ------------------------------- //
</script>

</html>