<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Masterpiece | Bộ Sưu Tập Độc Bản</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --gold-glow: rgba(212, 175, 55, 0.1);
            --silver-text: #AFAFAF;
            --obsidian: #080808;
            --gold-heritage: #D4AF37;
            --smoke-white: #F5F5F5;
            --lead-gray: #888888;
        }

        /* ---------------------------------------- section 1----------------------------------  */
        .bg-text-back {
            position: absolute;
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            color: #fff;
            opacity: 0.20;
            z-index: 1;
            letter-spacing: 20px;
            pointer-events: none;
            transition: all 0.5s ease;
            text-align: center;
            width: 100%;
            font-size: 15rem;
            /* Desktop mặc định */
        }

        /* Container bao ngoài */
        .artifact-container {
            position: relative;
            height: 100vh;
            width: 100%;
            background: #000000;
            display: flex;
            /* Sử dụng Flexbox */
            flex-direction: column;
            /* Xếp các thành phần theo hàng dọc */
            justify-content: center;
            /* Căn giữa theo chiều dọc */
            align-items: center;
            /* Căn giữa theo chiều ngang - QUAN TRỌNG */
            overflow: hidden;
        }

        /* Biển số trung tâm */
        .plate-artifact {
            width: 450px;
            /* Kích thước Desktop */
            height: 110px;
            background: linear-gradient(135deg, #fff 0%, #dcdcdc 50%, #fff 100%);
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #aaa;
            z-index: 10;
            margin: 0 auto;
            /* Đảm bảo lề tự động căn giữa */
            box-shadow: 0 40px 100px rgba(0, 0, 0, 1);
            filter: drop-shadow(0 20px 50px rgba(0, 0, 0, 0.8));
            transform-style: preserve-3d;
            /* Giúp hiệu ứng nghiêng mượt hơn */
        }

        /* 2. Quầng sáng sau biển số */
        .glow-backdrop {
            position: absolute;
            width: 60vw;
            height: 60vw;
            background: radial-gradient(circle, var(--gold-glow) 0%, rgba(0, 0, 0, 0) 70%);
            z-index: 2;
            pointer-events: none;
        }

        /* 3. Tấm biển số */
        .plate-wrapper {
            z-index: 10;
            perspective: 1000px;
            /* Tạo không gian 3D */
        }

        .plate-artifact {
            width: 550px;
            height: 120px;
            background: linear-gradient(135deg, #fff 0%, #dcdcdc 50%, #fff 100%);
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            /* Để chứa hiệu ứng Shine */
            box-shadow: 0 40px 100px rgba(0, 0, 0, 1);
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #aaa;
            filter: drop-shadow(0 20px 50px rgba(0, 0, 0, 0.8));
        }

        .plate-inner {
            font-size: 3.5rem;
            font-weight: 900;
            color: #111;
            letter-spacing: 10px;
            font-family: 'Arial', sans-serif;
        }

        /* 4. Hiệu ứng ánh sáng quét (Shine Streak) */
        .shine-streak {
            position: absolute;
            top: 0;
            left: -150%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.4),
                    transparent);
            transform: skewX(-20deg);
            animation: shine 6s infinite;
        }

        @keyframes shine {
            0% {
                left: -150%;
            }

            20% {
                left: 150%;
            }

            100% {
                left: 150%;
            }
        }

        /* Chỉ dẫn cuộn */
        .scroll-guide {
            position: absolute;
            bottom: 30px;
            text-align: center;
            z-index: 20;
            color: var(--silver-text);
        }

        .scroll-text {
            font-size: 0.7rem;
            letter-spacing: 4px;
            display: block;
        }

        /* --- RESPONSIVE CHO MOBILE --- */
        @media (max-width: 768px) {
            .artifact-container {
                align-items: center;
                padding-top: 0;
                /* Có thể chỉnh padding để đẩy lên cao nếu cần */
                height: 65vh;
            }

            .bg-text-back {
                font-size: 2rem;
                /* Thu nhỏ font */
                letter-spacing: 11px;
                top: 55%;
                /* Đẩy lên trên biển số */
            }

            .plate-artifact {
                width: 50vw;
                /* Tràn lề 50vw */
                height: auto;
                aspect-ratio: 16/5;
            }

            .plate-inner {
                font-size: 4vw;
                /* Chữ trong biển số tự co giãn 4vw */
                letter-spacing: 5px;
            }

            .scroll-text {
                display: none;
                /* Ẩn chữ trên mobile */
            }

            .arrow-down {
                animation: pulse 2s infinite;
                /* Hiệu ứng Pulse cho mũi tên */
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 0.3;
            }
        }

        /* ---------------------------------------- section 2----------------------------------  */
        .heritage-hall {
            background-color: var(--obsidian);
            position: relative;
            padding: 150px 0;
        }

        /* Đường kẻ dẫn dắt dọc */
        .vertical-line-guide {
            position: absolute;
            top: 0;
            left: 50%;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, var(--gold-heritage), transparent);
            opacity: 0.3;
            z-index: 1;
        }

        .heritage-block {
            display: flex;
            align-items: center;
            min-height: 100vh;
            padding: 100px 8%;
            position: relative;
            z-index: 2;
        }

        /* Bố cục 60/40 */
        .showcase-container {
            flex: 0 0 60%;
            display: flex;
            justify-content: center;
        }

        .story-container {
            flex: 0 0 40%;
            padding: 0 50px;
        }

        /* Khung kính ảo cho biển số */
        .glass-frame {
            width: 80%;
            aspect-ratio: 16/9;
            background: linear-gradient(145deg, #111, #000);
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 50px 100px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            will-change: transform, opacity;
        }

        .plate-mini {
            background: #fff;
            padding: 15px 40px;
            border-radius: 5px;
            font-size: 3rem;
            font-weight: 900;
            color: #000;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
        }

        /* Typography */
        .sub-headline {
            color: var(--gold-heritage);
            font-size: 0.8rem;
            letter-spacing: 5px;
            display: block;
            margin-bottom: 20px;
        }

        .main-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--smoke-white);
            margin-bottom: 30px;
        }

        .description {
            color: var(--lead-gray);
            line-height: 1.8;
            font-size: 1.1rem;
            max-width: 500px;
        }

        /* Đảo ngược cho block-right */
        .block-right .story-container {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        /* --- RESPONSIVE CHO SECTION 2 (HERITAGE HALL) --- */
        @media (max-width: 768px) {
            .heritage-hall {
                padding: 80px 0;
                /* Giảm padding tổng thể */
            }

            /* Vô hiệu hóa đường kẻ dọc trên mobile để đỡ rối mắt */
            .vertical-line-guide {
                display: none;
            }

            .heritage-block {
                flex-direction: column !important;
                /* Chuyển sang hàng dọc cho tất cả các block */
                padding: 0px 8% 46% 8% !important;
                /* Tăng khoảng cách giữa các khối sản phẩm */
                text-align: center !important;
                min-height: 80vh !important;
                /* Căn giữa toàn bộ văn bản */
            }

            /* 1. Kích thước ảnh: Chiếm 100% chiều ngang */
            .showcase-container {
                width: 100% !important;
                flex: none !important;
                padding: 0;
                margin-bottom: 30px;
                /* Giảm khoảng cách giữa ảnh và chữ */
            }

            .glass-frame {
                width: 100% !important;
                /* Tràn lề */
                border-radius: 0;
                /* Bỏ bo góc để tạo cảm giác tràn viền quyền lực */
                border-left: none;
                border-right: none;
                aspect-ratio: 16/9;
            }

            .plate-mini {
                transform: scale(0.7);
                /* Thu nhỏ biển số một chút để cân đối với khung hình mobile */
            }

            /* 2. Căn lề văn bản và Font chữ */
            .story-container {
                width: 100% !important;
                flex: none !important;
                padding: 0 25px !important;
                /* Padding vừa đủ để không chạm mép màn hình */
                text-align: center !important;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .main-title {
                font-size: 2.2rem !important;
                /* Giảm kích cỡ khoảng 30% */
                font-weight: 900 !important;
                /* Tăng độ dày */
                line-height: 1.2;
                margin-bottom: 20px;
            }

            .sub-headline {
                letter-spacing: 3px;
                margin-bottom: 10px;
            }

            .description {
                font-size: 1rem;
                line-height: 1.6;
                max-width: 100%;
                /* Cho phép text dàn trải đều */
                margin: 0 auto;
            }

            /* Loại bỏ căn lề phải của block-right trên mobile */
            .block-right .story-container {
                text-align: center !important;
                align-items: center !important;
            }
        }

        /* ---------------------------------------- section 3----------------------------------  */
        .value-prospect {
            background: var(--obsidian);
            padding: 120px 8%;
            min-height: 80vh;
            color: #fff;
        }

        .value-container {
            display: flex;
            gap: 60px;
            align-items: flex-start;
        }

        /* Phần biểu đồ */
        .chart-box {
            flex: 0 0 60%;
        }

        .chart-wrapper {
            position: relative;
            height: 320px;
            margin-top: 40px;
            border-bottom: 1px solid #333;
            border-left: 1px solid #333;
        }

        /* Phần chỉ số */
        .metrics-box {
            flex: 0 0 40%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding-top: 80px;
        }

        .metric-card {
            background: rgba(255, 255, 255, 0.03);
            padding: 30px 20px;
            border-radius: 4px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.4s ease;
        }

        .metric-card:hover {
            background: rgba(212, 175, 55, 0.05);
            border-color: var(--gold-heritage);
        }

        .metric-label {
            font-size: 0.7rem;
            letter-spacing: 3px;
            color: var(--lead-gray);
            display: block;
            margin-bottom: 15px;
        }

        .metric-value {
            font-family: 'Inter', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .neon-text {
            color: #00FF41;
            text-shadow: 0 0 10px rgba(0, 255, 65, 0.3);
        }

        .metric-desc {
            font-size: 0.8rem;
            color: var(--lead-gray);
            line-height: 1.4;
        }

        .main-title-serif {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: var(--smoke-white);
        }

        /* --- RESPONSIVE MOBILE --- */
        @media (max-width: 1024px) {
            .value-container {
                flex-direction: column;
            }

            .chart-box,
            .metrics-box {
                flex: 0 0 100%;
                width: 100%;
            }

            .metrics-box {
                display: flex;
                overflow-x: auto;
                gap: 15px;
                padding-bottom: 20px;
                scroll-snap-type: x mandatory;
                padding-top: 0;
            }

            .metric-card {
                min-width: 250px;
                scroll-snap-align: center;
            }
        }

        /* ---------------------------------------- section 4----------------------------------  */
        .private-vault {
        position: relative;
        height: 100vh;
        background: #020202;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        perspective: 2000px;
    }

    /* Hiệu ứng tối dần 4 góc */
    .vignette-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(circle, transparent 20%, rgba(0,0,0,0.9) 100%);
        pointer-events: none;
        z-index: 2;
    }

    /* Khung bảo mật Glassmorphism */
    .vault-content {
        position: relative;
        z-index: 10;
        padding: 60px;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-image: linear-gradient(135deg, #D4AF37, #E5E5E5, #D4AF37) 1;
        text-align: center;
        max-width: 600px;
        width: 90%;
    }

    /* Biểu tượng vân tay & hiệu ứng nhịp thở */
    .fingerprint-icon {
        width: 80px;
        margin: 0 auto 30px;
        position: relative;
        animation: pulseGlow 4s ease-in-out infinite;
    }

    @keyframes pulseGlow {
        0%, 100% { filter: drop-shadow(0 0 5px rgba(212,175,55,0.2)); opacity: 0.5; }
        50% { filter: drop-shadow(0 0 20px rgba(212,175,55,0.6)); opacity: 1; }
    }

    .scan-line {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: #D4AF37;
        box-shadow: 0 0 15px #D4AF37;
        animation: scanning 3s linear infinite;
    }

    @keyframes scanning {
        0% { top: 0; }
        100% { top: 100%; }
    }

    /* Typography */
    .vault-title {
        font-family: 'Playfair Display', serif;
        color: #D4AF37;
        letter-spacing: 10px;
        margin-bottom: 15px;
    }

    .vault-msg {
        color: #888;
        font-size: 0.9rem;
        letter-spacing: 2px;
        line-height: 1.8;
        margin-bottom: 40px;
    }

    /* Nút bấm hiệu ứng Laser */
    .btn-access {
        background: transparent;
        border: 1px solid #D4AF37;
        color: #D4AF37;
        padding: 15px 40px;
        letter-spacing: 3px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: 0.4s;
    }

    .btn-access:hover {
        color: #fff;
        box-shadow: 0 0 30px rgba(255,255,255,0.1);
    }

    .glow-laser {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: 0.5s;
    }

    .btn-access:hover .glow-laser {
        left: 100%;
    }

    /* Vault Panels (Cửa hầm) */
    .vault-panel {
        position: absolute;
        top: 0;
        width: 50%;
        height: 100%;
        background: #050505;
        z-index: 5;
        transition: transform 1.5s cubic-bezier(0.7, 0, 0.3, 1);
        border: 1px solid rgba(255,255,255,0.02);
    }
    .left-panel { left: 0; border-right: 1px solid #111; }
    .right-panel { right: 0; border-left: 1px solid #111; }

    .vault-open .left-panel { transform: translateX(-100%); }
    .vault-open .right-panel { transform: translateX(100%); }

    /* Mobile Responsive */
    .mobile-unlock-zone { display: none; }

    @media (max-width: 768px) {
        .vault-content { padding: 40px 20px; border-image: none; border: 1px solid #333; }
        .btn-access { display: none; }
        .mobile-unlock-zone { display: block; margin-top: 20px; }
        
        .slide-track {
            width: 100%;
            height: 50px;
            background: rgba(255,255,255,0.05);
            border-radius: 25px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555;
            font-size: 0.7rem;
            letter-spacing: 3px;
        }

        .slide-handle {
            position: absolute;
            left: 5px;
            width: 40px;
            height: 40px;
            background: #D4AF37;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000;
        }
    }

        /* ---------------------------------------- section 5----------------------------------  */


        /* ---------------------------------------- section 6----------------------------------  */


        /* ---------------------------------------- section 7----------------------------------  */
    </style>
</head>

<body>
    <!-- -----------------------------------section 1 -----------------------------------  -->
    <section class="artifact-container">
        <div class="bg-text-back" id="bgText">MASTERPIECE</div>
        <div class="glow-backdrop"></div>

        <div class="plate-wrapper">
            <div class="plate-artifact" id="mainPlate">
                <div class="plate-content">
                    <div class="plate-inner">30K - 999.99</div>
                    <div class="shine-streak"></div>
                </div>
            </div>
        </div>

        <div class="scroll-guide">
            <span class="scroll-text">SCROLL TO EXPLORE</span>
            <div class="arrow-down"></div>
        </div>
    </section>
    <!-- -----------------------------------section 2 -----------------------------------  -->
    <section class="heritage-hall">
        <div class="vertical-line-guide"></div>

        <div class="heritage-block block-left">
            <div class="showcase-container">
                <div class="glass-frame parallax-img">
                    <div class="plate-mini car-plate">29A - 888.88</div>
                </div>
            </div>
            <div class="story-container">
                <span class="sub-headline">BIỂU TƯỢNG QUYỀN LỰC</span>
                <h2 class="main-title">Đại Phát Thiên Thu</h2>
                <p class="description">
                    Con số 8 tượng trưng cho sự vĩnh cửu và thịnh vượng. Với dãy ngũ quý 8,
                    tấm biển không chỉ là định danh, mà là một lời khẳng định về vị thế
                    độc tôn và tầm vóc của người sở hữu trong giới thượng lưu.
                </p>
            </div>
        </div>

        <div class="heritage-block block-right">
            <div class="story-container">
                <span class="sub-headline">DI SẢN TỐC ĐỘ</span>
                <h2 class="main-title">30L - 999.99</h2>
                <p class="description">
                    Số 9 - con số của sự trường thọ và viên mãn. Đây là tác phẩm dành riêng
                    cho những quý tộc mong muốn tìm kiếm sự hoàn mỹ tuyệt đối trong từng
                    chi tiết nhỏ nhất của bộ sưu tập xe cá nhân.
                </p>
            </div>
            <div class="showcase-container">
                <div class="glass-frame parallax-img">
                    <div class="plate-mini car-plate">30L - 999.99</div>
                </div>
            </div>
        </div>
    </section>
    <!-- -----------------------------------section 3 -----------------------------------  -->

    <section class="value-prospect">
        <div class="value-container">
            <div class="chart-box">
                <div class="chart-header">
                    <span class="sub-headline">MARKET ANALYSIS</span>
                    <h2 class="main-title-serif">Tăng trưởng giá trị</h2>
                </div>
                <div class="chart-wrapper">
                    <canvas id="valueChart"></canvas>
                </div>
            </div>

            <div class="metrics-box">
                <div class="metric-card">
                    <span class="metric-label">RARITY</span>
                    <div class="metric-value"><span class="counter">0.01</span>%</div>
                    <p class="metric-desc">Tỷ lệ xuất hiện trên toàn quốc</p>
                </div>

                <div class="metric-card">
                    <span class="metric-label">DEMAND</span>
                    <div class="metric-value">+<span class="counter">1250</span></div>
                    <p class="metric-desc">Nhà sưu tầm đang săn đón</p>
                </div>

                <div class="metric-card">
                    <span class="metric-label">ANNUAL GROWTH</span>
                    <div class="metric-value neon-text">+<span class="counter">45</span>%</div>
                    <p class="metric-desc">Lợi nhuận trung bình hàng năm</p>
                </div>

                <div class="metric-card">
                    <span class="metric-label">LIQUIDITY</span>
                    <div class="metric-value">HIGH</div>
                    <p class="metric-desc">Thời gian thanh khoản: 24h - 72h</p>
                </div>
            </div>
        </div>
    </section>

    <!-- -----------------------------------section 4 -----------------------------------  -->
     <section class="private-vault">
    <div class="vignette-overlay"></div>
    
    <div class="vault-door-container" id="vaultDoor">
        <div class="vault-panel left-panel"></div>
        <div class="vault-panel right-panel"></div>
        
        <div class="vault-content">
            <div class="security-scanner">
                <div class="fingerprint-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#D4AF37" stroke-width="1" stroke-linecap="round">
                        <path d="M12 11c0-3.517 2.157-6.528 5.222-7.758M12 11c0 3.517-2.157 6.528-5.222 7.758M12 11V5M12 11v6m0 0c0 1.657-1.343 3-3 3s-3-1.343-3-3m6 0c0 1.657 1.343 3 3 3s3-1.343 3-3"/>
                        <circle cx="12" cy="11" r="10" opacity="0.2"/>
                    </svg>
                    <div class="scan-line"></div>
                </div>
            </div>

            <h2 class="vault-title">THE PRIVATE VAULT</h2>
            <p class="vault-msg">Chỉ dành cho những yêu cầu đặc biệt.<br>Khám phá danh mục biển số chưa niêm yết.</p>
            
            <button class="btn-access" id="accessVault">
                <span class="btn-text">REQUEST ACCESS</span>
                <div class="glow-laser"></div>
            </button>

            <div class="mobile-unlock-zone">
                <div class="slide-track">
                    <div class="slide-handle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                    <span>SLIDE TO UNLOCK</span>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- -----------------------------------section 5 -----------------------------------  -->


    <!-- -----------------------------------section 6 -----------------------------------  -->


    <!-- -----------------------------------section 7 -----------------------------------  -->



    <?php include "footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        // -------------------------------------- section 1 ------------------------------- //
        const plate = document.getElementById('mainPlate');
        const isMobile = window.innerWidth <= 768;

        // 1. Hiệu ứng lơ lửng chung (Floating)
        gsap.to(plate, {
            y: -15,
            duration: 3,
            ease: "power1.inOut",
            yoyo: true,
            repeat: -1
        });

        if (!isMobile) {
            // --- CHẾ ĐỘ DESKTOP: Nghiêng theo chuột ---
            document.addEventListener('mousemove', (e) => {
                const {
                    clientX,
                    clientY
                } = e;
                const centerX = window.innerWidth / 2;
                const centerY = window.innerHeight / 2;

                const rotateX = (centerY - clientY) / 25;
                const rotateY = (clientX - centerX) / 25;

                gsap.to(plate, {
                    rotateX: rotateX,
                    rotateY: rotateY,
                    duration: 0.5,
                    ease: "power2.out"
                });
            });
        } else {
            // --- CHẾ ĐỘ MOBILE: Nghiêng tự động (Auto-tilt) ---
            gsap.to(plate, {
                rotateY: 15,
                rotateX: 5,
                duration: 2.5,
                ease: "sine.inOut",
                yoyo: true,
                repeat: -1
            });

            // Đẩy tiêu đề nền lên trên biển số một chút bằng GSAP nếu cần tinh chỉnh
            gsap.set("#bgText", {
                y: -100
            });
        }
        // -------------------------------------- section 2 ------------------------------- //
        // Đăng ký plugin với GSAP
        gsap.registerPlugin(ScrollTrigger);

        // Kiểm tra nếu các phần tử tồn tại trước khi chạy để tránh lỗi
        const blocks = gsap.utils.toArray(".heritage-block");

        blocks.forEach((block) => {
            const subTitle = block.querySelector(".sub-headline");
            const mainTitle = block.querySelector(".main-title");
            const desc = block.querySelector(".description");
            const imgFrame = block.querySelector(".glass-frame");

            // Tạo Timeline cho từng block
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: block,
                    start: "top 80%", // Kích hoạt khi block cách đỉnh màn hình 80%
                    toggleActions: "play none none reverse"
                }
            });

            tl.from(subTitle, {
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power3.out"
                })
                .from(mainTitle, {
                    y: 50,
                    opacity: 0,
                    duration: 1,
                    ease: "power3.out"
                }, "-=0.6")
                .from(desc, {
                    y: 40,
                    opacity: 0,
                    duration: 1,
                    ease: "power3.out"
                }, "-=0.7");

            // Hiệu ứng Zoom hình ảnh từ 1.1 về 1
            gsap.fromTo(imgFrame, {
                scale: 1.15,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 1.5,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: imgFrame,
                    start: "top 90%",
                }
            });
        });

        // -------------------------------------- section 3 ------------------------------- //
        // --- 1. HIỆU ỨNG DATA DRAW (Biểu đồ tự vẽ) & HOVER POINT (Tooltip) ---
        const ctx = document.getElementById('valueChart').getContext('2d');

        // Tạo gradient cho đường biểu đồ
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(212, 175, 55, 0.2)');
        gradient.addColorStop(1, 'rgba(212, 175, 55, 0)');

        const valueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Giá trị (Tỷ VNĐ)',
                    data: [0.8, 1.3, 1.1, 2.2, 2.8, 3.5],
                    borderColor: '#D4AF37',
                    borderWidth: 3,
                    pointBackgroundColor: '#D4AF37',
                    pointBorderColor: '#000',
                    pointHoverRadius: 8, // Hiệu ứng khi hover vào điểm
                    pointHoverBorderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    backgroundColor: gradient,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // Cấu hình Tooltip (Hover Point)
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#111',
                        titleFont: {
                            family: 'Inter',
                            size: 14
                        },
                        bodyFont: {
                            family: 'Inter',
                            size: 13
                        },
                        padding: 12,
                        displayColors: false,
                        borderColor: '#D4AF37',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return ' Giá trị: ' + context.parsed.y + ' Tỷ VNĐ';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        display: false
                    }, // Ẩn trục Y cho tối giản
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#888',
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                // Quan trọng: Animation Draw
                animation: {
                    duration: 2500,
                    easing: 'easeOutQuart'
                }
            }
        });

        // Kích hoạt vẽ lại biểu đồ khi cuộn tới
        ScrollTrigger.create({
            trigger: ".value-prospect",
            start: "top 70%",
            onEnter: () => {
                valueChart.update(); // Chạy hiệu ứng vẽ
            }
        });

        // --- 2. HIỆU ỨNG NUMBER COUNTER (Số chạy tăng dần) ---
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            const target = +counter.innerText; // Lấy giá trị đích từ HTML
            counter.innerText = "0"; // Reset về 0 trước khi chạy

            gsap.to(counter, {
                innerText: target,
                duration: 2.5,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: ".value-prospect",
                    start: "top 75%",
                },
                snap: {
                    innerText: 1
                }, // Nhảy số nguyên (hoặc 0.1 nếu là số thập phân)
                onUpdate: function() {
                    // Định dạng lại số nếu cần (thêm dấu phẩy...)
                    // counter.innerText = Math.ceil(this.targets()[0].innerText);
                }
            });
        });

        // -------------------------------------- section 4 ------------------------------- //
        const accessBtn = document.getElementById('accessVault');
    const vaultDoor = document.getElementById('vaultDoor');

    // Giả lập âm thanh Click kim loại
    const playClickSound = () => {
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioCtx.createOscillator();
        const gainNode = audioCtx.createGain();
        oscillator.connect(gainNode);
        gainNode.connect(audioCtx.destination);
        oscillator.type = 'sine';
        oscillator.frequency.setValueAtTime(800, audioCtx.currentTime);
        gainNode.gain.setValueAtTime(0.1, audioCtx.currentTime);
        oscillator.start();
        oscillator.stop(audioCtx.currentTime + 0.05);
    };

    accessBtn.addEventListener('mouseenter', playClickSound);

    accessBtn.addEventListener('click', () => {
        // Hiệu ứng mở cửa hầm
        vaultDoor.classList.add('vault-open');
        
        // Sau khi cửa mở, chuyển trang hoặc hiện Form
        setTimeout(() => {
            alert("Đang xác thực quyền truy cập hầm kín...");
            // window.location.href = 'contact.php'; 
        }, 1500);
    });

    // Xử lý Slide to Unlock trên Mobile
    if (window.innerWidth <= 768) {
        const handle = document.querySelector('.slide-handle');
        const track = document.querySelector('.slide-track');
        let isDragging = false;

        handle.addEventListener('touchstart', () => isDragging = true);
        document.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            let x = e.touches[0].clientX - track.getBoundingClientRect().left - 20;
            if (x < 5) x = 5;
            if (x > track.offsetWidth - 45) {
                x = track.offsetWidth - 45;
                vaultDoor.classList.add('vault-open');
                isDragging = false;
            }
            handle.style.left = x + 'px';
        });
        document.addEventListener('touchend', () => {
            if (parseInt(handle.style.left) < track.offsetWidth - 50) {
                handle.style.left = '5px';
            }
            isDragging = false;
        });
    }

        // -------------------------------------- section 5 ------------------------------- //


        // -------------------------------------- section 6 ------------------------------- //


        // -------------------------------------- section 7 ------------------------------- //
    </script>
</body>

</html>