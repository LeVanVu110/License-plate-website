<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --obsidian: #050505;
            --champagne: #D4AF37;
            --titanium: #F2F2F2;
            --gold-gradient: linear-gradient(135deg, #BF953F, #FCF6BA, #B38728, #FBF5B7, #AA771C);
        }

        /* ---------------------------- section 1------------------------------ */
        .sovereign-presence {
            height: 100vh;
            background: var(--obsidian);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 2000px;
        }

        /* Background & Car Silhouette */
        .car-silhouette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=2070&auto=format&fit=crop') center/cover no-repeat;
            opacity: 0.15;
            filter: grayscale(100%) blur(5px);
            z-index: 1;
        }

        .luxury-bg-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, transparent 20%, var(--obsidian) 80%);
            z-index: 2;
        }

        /* Plate Design - Executive Style */
        .plate-wrapper {
            z-index: 10;
            position: relative;
            padding: 20px;
            animation: floatingPower 4s ease-in-out infinite;
        }

        .plate-mica {
            background: #fff;
            width: 650px;
            /* Tỉ lệ biển dài mới */
            height: 140px;
            border-radius: 8px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.1);
            border: 4px solid #333;
            overflow: hidden;
            cursor: pointer;
        }

        .plate-number {
            font-family: 'Inter', sans-serif;
            /* Thay bằng font chuyên dụng nếu có */
            font-weight: 900;
            font-size: 70px;
            color: #111;
            letter-spacing: 10px;
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Hiệu ứng Light Sweep */
        .light-sweep {
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
            transform: skewX(-20deg);
            z-index: 5;
        }

        /* Typography & Info */
        .location-tag {
            position: absolute;
            top: 10%;
            left: 5%;
            z-index: 10;
        }

        .label {
            display: block;
            font-size: 14px;
            letter-spacing: 5px;
            color: #888;
            margin-bottom: 8px;
        }

        .gold-hairline {
            width: 60px;
            height: 1px;
            background: var(--champagne);
            margin-top: 10px;
        }

        .executive-info {
            margin-top: 60px;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .plate-name-title {
            font-family: 'Cinzel', serif;
            /* Cần import font Cinzel từ Google Fonts */
            font-size: 42px;
            font-weight: 700;
            color: #FFFFFF;
            letter-spacing: 8px;
            text-transform: uppercase;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            background: linear-gradient(to bottom, #fff 40%, #888 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hộp định giá */
        .valuation-box {
            display: inline-block;
            padding: 25px 50px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.2);
            /* Viền vàng mờ */
            border-radius: 2px;
            backdrop-filter: blur(10px);
        }

        .valuation-box .label {
            display: block;
            font-size: 14px;
            color: #888;
            letter-spacing: 5px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .current-price {
            font-family: 'Inter', sans-serif;
            font-size: 48px;
            font-weight: 700;
            color: var(--champagne);
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 10px;
        }

        .current-price .currency {
            font-size: 18px;
            color: rgba(212, 175, 55, 0.6);
            letter-spacing: 2px;
        }

        /* --- MOBILE CTA BAR STYLE --- */
        .mobile-cta-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(5, 5, 5, 1) 60%, rgba(5, 5, 5, 0));
            z-index: 1000;
            display: none;
            /* Mặc định ẩn trên Desktop */
        }

        .btn-vip-gold {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 4px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #000;
            text-transform: uppercase;
            cursor: pointer;

            /* Hiệu ứng Gradient Vàng Kim Loại đa lớp */
            background: linear-gradient(135deg,
                    #BF953F 0%,
                    #FCF6BA 25%,
                    #B38728 50%,
                    #FBF5B7 75%,
                    #AA771C 100%);
            background-size: 200% auto;

            /* Đổ bóng khối */
            box-shadow: 0 10px 30px rgba(170, 119, 28, 0.3);
            transition: all 0.4s ease;

            /* Hiệu ứng bóng gương nhẹ */
            position: relative;
            overflow: hidden;
        }

        /* Hiệu ứng vệt sáng lướt qua nút khi load hoặc chạm */
        .btn-vip-gold::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.4);
            transform: rotate(30deg);
            transition: all 0.5s;
            animation: buttonLightSweep 4s infinite;
        }

        @keyframes buttonLightSweep {
            0% {
                left: -60%;
            }

            20% {
                left: 120%;
            }

            100% {
                left: 120%;
            }
        }

        .btn-vip-gold:active {
            transform: scale(0.98);
            filter: brightness(1.2);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .plate-mica {
                width: 340px;
                height: 80px;
            }

            .plate-number {
                font-size: 40px;
                letter-spacing: 4px;
            }

            .plate-name-title {
                font-size: 24px;
                letter-spacing: 4px;
            }

            .valuation-box {
                padding: 20px 30px;
            }

            .current-price {
                font-size: 32px;
            }

            .mobile-cta-bar {
                display: block;
            }

            .btn-vip-gold {
                width: 100%;
                padding: 15px;
                background: var(--gold-gradient);
                border: none;
                border-radius: 4px;
                font-weight: bold;
                color: #000;
                text-transform: uppercase;
            }

            body {
                padding-bottom: 80px;
            }
        }

        @keyframes floatingPower {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* ---------------------------- section 2------------------------------ */
        /* ---------------------------- section 3------------------------------ */
        /* ---------------------------- section 4------------------------------ */
        /* ---------------------------- section 5------------------------------ */
    </style>
</head>

<body>
    <!-- ---------------------------- section 1------------------------------ -->
    <section class="sovereign-presence" id="hero-section">
        <div class="luxury-bg-overlay"></div>
        <div class="car-silhouette"></div>

        <div class="hero-container">
            <div class="location-tag fade-in">
                <span class="label">TỈNH THÀNH</span>
                <span class="value">HÀ NỘI</span>
                <div class="gold-hairline"></div>
            </div>

            <div class="plate-wrapper">
                <div class="plate-3d-container" id="plateContainer">
                    <div class="plate-mica">
                        <div class="light-sweep"></div>
                        <div class="plate-content">
                            <span class="plate-number" id="mainPlate">30K - 999.99</span>
                        </div>
                    </div>
                    <div class="plate-shadow"></div>
                </div>
            </div>

            <div class="executive-info">
                <h1 class="plate-name-title">THE IMPERIAL NINE</h1>
                <div class="valuation-box">
                    <span class="label">GIÁ ĐẤU GIÁ CAO NHẤT</span>
                    <div class="current-price">
                        <span id="price-counter" data-target="15200000000">0</span>
                        <span class="currency">VND</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-cta-bar">
            <button class="btn-vip-gold">LIÊN HỆ VIP ĐỂ SỞ HỮU</button>
        </div>
    </section>
    <!-- ---------------------------- section 2------------------------------ -->
    <!-- ---------------------------- section 3------------------------------ -->
    <!-- ---------------------------- section 4------------------------------ -->
    <!-- ---------------------------- section 5------------------------------ -->
    <?php include "footer.php" ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
    // ---------------------------- section 1------------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng Light Sweep khi tải trang
        gsap.to(".light-sweep", {
            left: "150%",
            duration: 1.5,
            ease: "power2.inOut",
            delay: 0.5
        });

        // 2. Number Counting cho giá tiền
        const priceElement = document.getElementById("price-counter");
        const targetPrice = parseInt(priceElement.getAttribute("data-target"));

        let obj = {
            val: 0
        };
        gsap.to(obj, {
            val: targetPrice,
            duration: 3,
            ease: "power3.out",
            onUpdate: function() {
                priceElement.innerHTML = Math.floor(obj.val).toLocaleString('vi-VN');
            }
        });

        // 3. Mouse Tracking (Desktop) - Xoay biển số 3D
        if (window.innerWidth > 1024) {
            const plate = document.getElementById("plateContainer");
            document.addEventListener("mousemove", (e) => {
                let x = (window.innerWidth / 2 - e.pageX) / 25;
                let y = (window.innerHeight / 2 - e.pageY) / 25;
                gsap.to(plate, {
                    rotationY: -x,
                    rotationX: y,
                    duration: 0.5,
                    ease: "power1.out"
                });
            });
        }

        // 4. Parallax cho xe nền khi cuộn
        gsap.to(".car-silhouette", {
            scrollTrigger: {
                trigger: "#hero-section",
                start: "top top",
                scrub: true
            },
            opacity: 0,
            y: 100
        });

        // 5. Touch to sweep (Mobile)
        document.getElementById("plateContainer").addEventListener("touchstart", function() {
            gsap.fromTo(".light-sweep", {
                left: "-100%"
            }, {
                left: "150%",
                duration: 1
            });
        });
    });
    // ---------------------------- section 2------------------------------ //
    // ---------------------------- section 3------------------------------ //
    // ---------------------------- section 4------------------------------ //
    // ---------------------------- section 5------------------------------ //
</script>

</html>