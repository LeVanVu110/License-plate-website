<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Live Arena | Đấu giá trực tuyến</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Inter:wght@400;700;900&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <style>
        :root {
            --crimson: #FF0000;
            --gold-gradient: linear-gradient(135deg, #D4AF37 0%, #8A6E2F 100%);
            --glass: rgba(255, 255, 255, 0.03);
            --cyan-glow: rgba(0, 242, 255, 0.15);
        }

        body {
            margin: 0;
            padding: 0;
            background: #010101;
            color: #fff;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            padding-top: 5% !important;
            overflow-x: hidden;
        }

        /* -------------------------------- SECTION 1 ------------------------ */
        .live-arena {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #010101;
        }

        /* Hiệu ứng Ánh đèn Spotlight */
        .spotlight {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 80vw; height: 80vw;
            background: radial-gradient(circle, var(--cyan-glow) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        /* Dải thông số kỹ thuật rìa màn hình */
        .tech-lines {
            position: absolute;
            font-family: 'Roboto Mono', monospace;
            font-size: 10px;
            color: rgba(255,255,255,0.2);
            letter-spacing: 2px;
            white-space: nowrap;
            z-index: 2;
        }
        .tech-lines.left { top: 50%; left: 20px; transform: rotate(-90deg) translateY(-50%); }
        .tech-lines.right { top: 50%; right: 20px; transform: rotate(90deg) translateY(-50%); }

        .arena-container {
            display: flex;
            width: 90%;
            max-width: 1400px;
            z-index: 10;
            gap: 60px;
            align-items: center;
        }

        /* Biển số - Hero Object */
        .plate-showcase {
            flex: 1.2;
            position: relative;
            perspective: 2000px;
        }

        .live-badge {
            position: absolute;
            top: -40px;
            left: 0;
            font-family: 'Roboto Mono', monospace;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: 2px;
        }

        .pulse-red {
            width: 8px; height: 8px;
            background: var(--crimson);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--crimson);
            animation: pulse-ring 1.5s infinite;
        }

        .glass-frame {
            background: var(--glass);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            padding: 100px 40px;
            border-radius: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 40px 100px rgba(0,0,0,0.5);
            transform-style: preserve-3d;
        }

        .plate-number {
            font-size: clamp(3rem, 8vw, 6.5rem);
            font-weight: 900;
            letter-spacing: 15px;
            color: #fff;
            text-align: center;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.8));
        }

        .light-sweep {
            position: absolute;
            top: 0; left: -100%;
            width: 60%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transform: skewX(-30deg);
            animation: sweep 5s infinite;
        }

        /* Control Panel */
        .control-panel {
            flex: 0.8;
            padding: 40px;
            background: rgba(255,255,255,0.02);
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .label {
            font-size: 12px;
            color: #666;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 10px;
        }

        .timer {
            font-family: 'Roboto Mono', monospace;
            font-size: 4.5rem;
            font-weight: 500;
            color: var(--crimson);
            margin-bottom: 40px;
            letter-spacing: -2px;
        }

        .current-price .amount {
            font-size: 2.8rem;
            font-weight: 900;
            color: #fff;
            line-height: 1;
        }
        .currency { font-size: 1.5rem; color: #888; margin-right: 10px; }

        .btn-bid {
            position: relative;
            width: 100%;
            padding: 25px;
            background: var(--gold-gradient);
            border: none;
            border-radius: 12px;
            color: #000;
            font-weight: 900;
            font-size: 1.2rem;
            cursor: pointer;
            overflow: hidden;
            margin-top: 40px;
            transition: transform 0.2s;
        }

        .btn-bid:active { transform: scale(0.98); }

        .progress-bar {
            position: absolute;
            bottom: 0; left: 0;
            height: 100%; width: 0%;
            background: rgba(0, 0, 0, 0.15);
        }

        .bid-hint { font-size: 12px; color: #555; text-align: center; margin-top: 15px; }

        /* Animations */
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(2.5); opacity: 0; }
        }
        @keyframes sweep {
            0% { left: -100%; }
            30% { left: 150%; }
            100% { left: 150%; }
        }
        .emergency { animation: heartbeat 0.8s infinite; }
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); filter: brightness(1); }
            50% { transform: scale(1.02); filter: brightness(1.3); }
        }

        /* Sticky Bid Bar Mobile */
        .sticky-bid-bar {
            position: fixed;
            bottom: 0; left: 0; width: 100%;
            background: #0a0a0a;
            padding: 15px 25px;
            display: none;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid rgba(255,255,255,0.1);
            z-index: 100;
            box-sizing: border-box;
        }
        .s-btn { background: var(--gold-gradient); border: none; padding: 12px 20px; border-radius: 8px; font-weight: 800; }

        /* --- RESPONSIVE MOBILE (DƯỚI 1024PX) --- */
        @media (max-width: 1024px) {
            .arena-container {
                flex-direction: column;
                padding-top: 80px; /* Chừa chỗ cho Header */
                padding-bottom: 100px; /* Chừa chỗ cho Sticky Bar */
            }

            .plate-showcase { order: 1; width: 100%; }
            .control-panel { 
                order: 2; 
                width: 100%; 
                background: transparent; 
                border: none; 
                padding: 20px 0;
                text-align: center; 
            }

            .live-badge { left: 30%; transform: translateX(-50%); top: -30px; }
            
            .timer { margin-bottom: 20px; font-size: 2.7rem;}
            
            /* Ẩn nút đặt giá lớn trên Mobile vì đã có Sticky bar */
            .btn-bid { display: none; }
            .bid-hint { display: none; }
        }

        /* Sticky Bar đặc quyền cho Mobile */
        .sticky-bid-bar {
            position: fixed;
            bottom: 0; left: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            display: none;
            padding: 15px 20px;
            box-sizing: border-box;
            border-top: 1px solid rgba(255,255,255,0.1);
            z-index: 999;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 1024px) {
            .sticky-bid-bar { display: flex; }
        }

        .s-price-box .s-label { font-size: 9px; color: #888; display: block; }
        .s-price-box .s-val { font-weight: 800; font-size: 1.1rem; color: #fff; }

        .s-btn-bid {
            background: var(--gold-gradient);
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 900;
            font-size: 0.9rem;
            color: #000;
        }

        /* Animations */
        @keyframes pulse-ring { 0% { transform: scale(1); opacity: 1; } 100% { transform: scale(2.5); opacity: 0; } }
        /* -------------------------------- section 2 ------------------------  */


        /* -------------------------------- section 3 ------------------------  */

        /* -------------------------------- section 4 ------------------------  */

        /* -------------------------------- section 5 ------------------------  */

        /* -------------------------------- section 6 ------------------------  */
    </style>
</head>

<body>
    <!-- -----------------------------------section 1 -----------------------------------  -->
    <section class="live-arena" id="arenaSection">
        <div class="spotlight"></div>

        <div class="tech-lines left">STREAM_ID: PS_8829 // STATUS: SECURE // LIVE_FEED</div>
        <div class="tech-lines right">BLOCKCHAIN_VERIFIED // TRANSACTION_LOCK: ON</div>

        <div class="arena-container">
            <div class="plate-showcase" id="plate3D">
                <div class="live-badge">
                    <span class="pulse-red"></span> LIVE • 1,240 WATCHING
                </div>
                <div class="glass-frame">
                    <div class="plate-number">30K-999.99</div>
                    <div class="light-sweep"></div>
                </div>
            </div>

            <div class="control-panel">
                <div class="countdown-wrapper">
                    <span class="label">THỜI GIAN CÒN LẠI</span>
                    <div class="timer" id="timer">00:45:12</div>
                </div>

                <div class="price-display">
                    <span class="label">GIÁ HIỆN TẠI</span>
                    <div class="current-price" id="priceDisplay">
                        <span class="amount">2,450,000,000</span>
                        <span class="currency">VNĐ</span>
                    </div>
                </div>

                <div class="bid-actions">
                    <button class="btn-bid" id="btnBid">
                        <span style="position: relative; z-index: 2;">NHẤN GIỮ ĐỂ ĐẶT GIÁ</span>
                        <div class="progress-bar" id="bidProgress"></div>
                    </button>
                    <p class="bid-hint">Bước giá tối thiểu: +50,000,000 VNĐ</p>
                </div>
            </div>
        </div>

        <div class="sticky-bid-bar">
            <div>
                <span style="font-size: 10px; color: #888; display: block;">GIÁ HIỆN TẠI</span>
                <span style="font-weight: 800;">2,450,000,000đ</span>
            </div>
            <button class="s-btn">ĐẶT GIÁ</button>
        </div>
    </section>

    <!-- -----------------------------------section 2 -----------------------------------  -->

    <!-- -----------------------------------section 3 -----------------------------------  -->

    <!-- -----------------------------------section 4 -----------------------------------  -->

    <!-- -----------------------------------section 5 -----------------------------------  -->

    <!-- -----------------------------------section 6 -----------------------------------  -->


    <?php include "footer.php" ?>

</body>
<script>
    // ------------------------------- section 1 ----------------------------------//
    // 1. Hiệu ứng 3D Tilt cho biển số
        const plate = document.querySelector('.glass-frame');
        if (window.innerWidth > 1024) {
            document.addEventListener('mousemove', (e) => {
                const x = (window.innerWidth / 2 - e.pageX) / 25;
                const y = (window.innerHeight / 2 - e.pageY) / 25;
                gsap.to(plate, {
                    rotationY: -x,
                    rotationX: y,
                    duration: 0.8,
                    ease: "power2.out"
                });
            });
        }

        // 2. Logic Nhấn giữ để đặt giá (Long Press)
        const bidBtn = document.getElementById('btnBid');
        const progressFill = document.getElementById('bidProgress');
        let interval;
        let progress = 0;

        const startHold = () => {
            interval = setInterval(() => {
                progress += 2;
                progressFill.style.width = progress + '%';
                if (progress >= 100) {
                    confirmBid();
                    stopHold();
                }
            }, 20);
        };

        const stopHold = () => {
            clearInterval(interval);
            progress = 0;
            progressFill.style.width = '0%';
        };

        const confirmBid = () => {
            // Hiệu ứng loé sáng khi giá thay đổi
            gsap.fromTo("#priceDisplay", 
                { opacity: 0.5, scale: 0.9 }, 
                { opacity: 1, scale: 1, duration: 0.5, ease: "expo.out" }
            );
            alert("ĐỀ NGHỊ ĐẶT GIÁ ĐÃ ĐƯỢC GỬI THÀNH CÔNG!");
        };

        bidBtn.addEventListener('mousedown', startHold);
        bidBtn.addEventListener('mouseup', stopHold);
        bidBtn.addEventListener('mouseleave', stopHold);
        // Hỗ trợ Touch cho Mobile
        bidBtn.addEventListener('touchstart', startHold);
        bidBtn.addEventListener('touchend', stopHold);

        // 3. Hiệu ứng khẩn cấp cho giây cuối
        function triggerEmergency() {
            document.getElementById('timer').classList.add('emergency');
        }
        // Giả lập kích hoạt sau 3 giây để xem demo
        setTimeout(triggerEmergency, 3000);


    // ------------------------------- section 2 ----------------------------------//


    // ------------------------------- section 3 ----------------------------------//


    // ------------------------------- section 4 ----------------------------------//


    // ------------------------------- section 5 ----------------------------------//


    // ------------------------------- section 6 ----------------------------------//
</script>

</html>