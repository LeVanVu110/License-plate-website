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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --matte-black: #0D0D0D;
            --chrome-silver: linear-gradient(145deg, #e6e6e6, #808080);
            --gold-power: #D4AF37;
            --plate-font: 'Alumni Sans', sans-serif;
            /* Font mô phỏng font biển số */
        }

        /* --------------------------- section 1 ---------------------------------  */
        .identity-reveal {
            background-color: var(--matte-black);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 80px 40px;
        }

        /* Background đuôi xe Bokeh */
        .mechanical-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1558981403-c5f91cbba527?q=80&w=2000') center/cover;
            filter: blur(15px) brightness(0.3);
            z-index: 0;
        }

        .identity-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            z-index: 1;
            width: 100%;
        }

        /* Biển số 3D Square */
        .plate-visual-zone {
            display: flex;
            flex-direction: column;
            align-items: center;
            perspective: 1000px;
        }

        .motor-plate {
            width: 320px;
            height: 280px;
            background: #fdfdfd;
            border-radius: 8px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8), inset 0 0 15px rgba(0, 0, 0, 0.1);
            border: 8px solid #222;
            /* Khung Chrome ngoài */
            transform-style: preserve-3d;
        }

        .motor-plate::after {
            content: '';
            position: absolute;
            inset: -2px;
            border: 2px solid #aaa;
            /* Viền sáng giả Inox */
            border-radius: 6px;
        }

        .plate-shine {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent 40%, rgba(255, 255, 255, 0.4) 50%, transparent 60%);
            background-size: 200% 200%;
            z-index: 2;
            pointer-events: none;
        }

        .plate-content {
            text-align: center;
            color: #111;
            font-weight: 800;
            line-height: 1;
        }

        .plate-top {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .plate-bottom {
            font-size: 85px;
            letter-spacing: -2px;
        }

        /* Typography Section */
        .plate-title {
            font-family: 'EB Garamond', serif;
            font-size: 40px;
            color: #fff;
            margin: 15px 0;
        }

        .price-value {
            font-size: 48px;
            color: var(--gold-power);
            font-weight: bold;
            margin-top: 10px;
        }

        .price-value span {
            font-size: 18px;
            margin-left: 10px;
            opacity: 0.7;
        }

        /* Action Buttons */
        .btn-bid {
            background: var(--gold-power);
            color: #000;
            padding: 20px 40px;
            border: none;
            font-weight: bold;
            letter-spacing: 2px;
            cursor: pointer;
            margin-right: 20px;
            transition: 0.3s;
        }

        .btn-bid:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .identity-container {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .motor-plate {
                width: 280px;
                height: 240px;
            }

            .plate-top {
                font-size: 45px;
            }

            .plate-bottom {
                font-size: 60px;
            }

            .identity-reveal {
                padding: 40px 20px;
            }

            .action-btns {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background: #111;
                padding: 15px;
                display: flex;
                z-index: 10;
            }

            .btn-bid {
                flex: 1;
                margin: 0 5px;
            }
        }

        /* --------------------------- section 2 ---------------------------------  */

        /* --------------------------- section 3 ---------------------------------  */

        /* --------------------------- section 4 ---------------------------------  */

        /* --------------------------- section 5 ---------------------------------  */
    </style>
</head>

<body>
    <!-- --------------------------- section 1 ---------------------------------  -->
    <section class="identity-reveal" id="identitySection">
        <div class="mechanical-bg"></div>

        <div class="identity-container">
            <div class="plate-visual-zone">
                <div class="plate-3d-wrap" id="plate3D">
                    <div class="motor-plate">
                        <div class="plate-shine"></div>
                        <div class="plate-content">
                            <div class="plate-top">59-A3</div>
                            <div class="plate-bottom">999.99</div>
                        </div>
                        <div class="plate-frame"></div>
                    </div>
                    <div class="exhaust-smoke"></div>
                </div>

                <div class="compatibility-tag">
                    Hoàn hảo cho: <span>Honda SH, Vespa 946, BMW S1000RR</span>
                </div>
            </div>

            <div class="plate-info-zone">
                <div class="status-badge">ĐANG ĐẤU GIÁ</div>
                <h1 class="plate-title">Cửu Ngũ Chí Tôn</h1>
                <p class="plate-desc">Dòng biển ngũ quý 9 biểu tượng cho sự vĩnh cửu và quyền lực tuyệt đối tại khu vực TP. Hồ Chí Minh.</p>

                <div class="specs-grid">
                    <div class="spec-item">
                        <span class="label">LOẠI BIỂN</span>
                        <span class="value">Ngũ Quý</span>
                    </div>
                    <div class="spec-item">
                        <span class="label">KHU VỰC</span>
                        <span class="value">TP.HCM</span>
                    </div>
                </div>

                <div class="price-block">
                    <span class="price-label">Giá hiện tại</span>
                    <div class="price-value">850.000.000<span>VND</span></div>
                </div>

                <div class="action-btns">
                    <button class="btn-bid">ĐẶT CỌC GIỮ CHỖ</button>
                    <button class="btn-contact">LIÊN HỆ VIP</button>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------------------- section 2 ---------------------------------  -->

    <!-- --------------------------- section 3 ---------------------------------  -->

    <!-- --------------------------- section 4 ---------------------------------  -->

    <!-- --------------------------- section 5 ---------------------------------  -->

    <?php include "footer.php" ?>
</body>
<script>
    // --------------------------- section 1 --------------------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        const plate = document.querySelector('.motor-plate');
        const wrap = document.querySelector('.plate-3d-wrap');

        // 1. Animation lúc load trang (The Plate Slide)
        gsap.from(".motor-plate", {
            y: 100,
            opacity: 0,
            duration: 1.5,
            ease: "power4.out"
        });

        gsap.to(".plate-shine", {
            backgroundPosition: "200% 200%",
            duration: 2,
            repeat: -1,
            ease: "linear"
        });

        // 2. Hiệu ứng 3D Tilt khi di chuột
        if (window.innerWidth > 1024) {
            window.addEventListener('mousemove', (e) => {
                let x = (window.innerWidth / 2 - e.pageX) / 25;
                let y = (window.innerHeight / 2 - e.pageY) / 25;
                plate.style.transform = `rotateY(${x}deg) rotateX(${y}deg)`;
            });
        }

        // 3. Mobile Touch Tilt (Cử chỉ tay)
        wrap.addEventListener('touchmove', (e) => {
            let touch = e.touches[0];
            let x = (window.innerWidth / 2 - touch.pageX) / 15;
            plate.style.transform = `rotateY(${x}deg)`;
        });
    });

    // --------------------------- section 2 --------------------------------- //

    // --------------------------- section 3 --------------------------------- //

    // --------------------------- section 4 --------------------------------- //

    // --------------------------- section 5 --------------------------------- //
</script>

</html>