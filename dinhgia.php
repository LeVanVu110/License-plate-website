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
    // -------------------------------------- section 3 ------------------------------- //
    // -------------------------------------- section 4 ------------------------------- //
    // -------------------------------------- section 5 ------------------------------- //
    // -------------------------------------- section 6 ------------------------------- //
    // -------------------------------------- section 7 ------------------------------- //
    // -------------------------------------- section 8 ------------------------------- //
</script>

</html>