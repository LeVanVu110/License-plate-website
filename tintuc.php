<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        /* ----------------------------- section 1 -----------------------------  */
        :root {
            --titanium-white: #F5F5F7;
            --silver-grey: #A1A1A6;
            --black-matte: #0A0A0B;
        }

        .editorial-spotlight {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* Desktop: Căn trái */
            overflow: hidden;
            background: var(--black-matte);
        }

        /* Background & Effects */
        .hero-bg-container {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-image-zoom {
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=2070');
            /* Thay bằng ảnh xe/biển số thực tế */
            background-size: cover;
            background-position: center;
            /* Hiệu ứng Ken Burns giả lập bằng CSS nếu không dùng GSAP */
            animation: kenBurns 20s infinite alternate ease-in-out;
        }

        @keyframes kenBurns {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .hero-overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 50%, transparent 100%);
        }

        /* Content Styles */
        .hero-content {
            position: relative;
            z-index: 10;
            padding-left: 10%;
            /* Desktop lề trái */
            max-width: 800px;
        }

        .editorial-meta {
            margin-bottom: 20px;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            letter-spacing: 3px;
            color: var(--silver-grey);
        }

        .editorial-meta .category {
            color: #fff;
            margin-right: 15px;
            border-right: 1px solid #444;
            padding-right: 15px;
        }

        .hero-headline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            line-height: 1.1;
            color: var(--titanium-white);
            margin: 0 0 40px 0;
            font-weight: 400;
        }

        /* Button & Underline */
        .btn-discover {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            letter-spacing: 4px;
            color: #fff;
            text-decoration: none;
            position: relative;
            padding-bottom: 8px;
        }

        .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 1px;
            background: #fff;
            transition: width 0.5s ease;
        }

        .btn-discover:hover .underline {
            width: 100%;
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            text-align: center;
            opacity: 0.6;
        }

        .scroll-text {
            font-size: 9px;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 10px;
        }

        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, #fff, transparent);
            margin: 0 auto;
            animation: scrollLine 2s infinite;
        }

        @keyframes scrollLine {
            0% {
                transform: scaleY(0);
                transform-origin: top;
            }

            50% {
                transform: scaleY(1);
                transform-origin: top;
            }

            51% {
                transform: scaleY(1);
                transform-origin: bottom;
            }

            100% {
                transform: scaleY(0);
                transform-origin: bottom;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-content {
                padding-left: 0;
                margin: 0 auto;
                text-align: center;
                width: 90%;
                margin-top: 20vh;
            }

            .editorial-meta .category {
                border-right: none;
                display: block;
                margin-right: 0;
                margin-bottom: 10px;
            }

            .hero-headline {
                font-size: 2.8rem;
            }
        }

        /* ----------------------------- section 2 -----------------------------  */

        /* ----------------------------- section 3 -----------------------------  */

        /* ----------------------------- section 4 -----------------------------  */

        /* ----------------------------- section 5 -----------------------------  */
    </style>
</head>

<body>
    <!-- ------------------------------ section 1 ------------------------------  -->
    <section class="editorial-spotlight" id="heroSection">
        <div class="hero-bg-container">
            <div class="hero-image-zoom"></div>
            <div class="hero-overlay-gradient"></div>
        </div>

        <div class="hero-content">
            <div class="editorial-meta reveal-item">
                <span class="category">PHÂN TÍCH THỊ TRƯỜNG</span>
                <span class="read-time">5 PHÚT ĐỌC</span>
            </div>

            <h1 class="hero-headline reveal-item">
                Di sản ẩn mình<br>sau những dãy số
            </h1>

            <div class="hero-action reveal-item">
                <a href="#articleContent" class="btn-discover">
                    KHÁM PHÁ CÂU CHUYỆN
                    <span class="underline"></span>
                </a>
            </div>
        </div>

        <div class="scroll-indicator">
            <span class="scroll-text">CUỘN ĐỂ ĐỌC</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ------------------------------ section 2 ------------------------------  -->

    <!-- ------------------------------ section 3 ------------------------------  -->

    <!-- ------------------------------ section 4 ------------------------------  -->

    <!-- ------------------------------ section 5 ------------------------------  -->


    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------ section 1 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Staggered Load Animation
        const tl = gsap.timeline();

        tl.from(".hero-image-zoom", {
                scale: 1.2,
                filter: "blur(10px)",
                duration: 2,
                ease: "power2.out"
            })
            .from(".reveal-item", {
                y: 40,
                opacity: 0,
                filter: "blur(5px)",
                stagger: 0.3,
                duration: 1.5,
                ease: "power3.out"
            }, "-=1");

        // 2. Mouse Tilt Effect (Chỉ Desktop)
        if (window.innerWidth > 1024) {
            document.addEventListener("mousemove", (e) => {
                const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.01;

                gsap.to(".hero-image-zoom", {
                    x: moveX,
                    y: moveY,
                    duration: 1,
                    ease: "power2.out"
                });

                gsap.to(".hero-content", {
                    x: -moveX * 2, // Chữ trôi ngược hướng ảnh (Parallax)
                    y: -moveY * 2,
                    duration: 1,
                    ease: "power2.out"
                });
            });
        }

        // 3. Simple Parallax Scroll
        window.addEventListener("scroll", () => {
            const scrolled = window.pageYOffset;
            gsap.to(".hero-image-zoom", {
                y: scrolled * 0.3,
                ease: "none",
                duration: 0
            });
        });
    });

    // ------------------------ section 2 ------------------------ //

    // ------------------------ section 3 ------------------------ //

    // ------------------------ section 4 ------------------------ //

    // ------------------------ section 5 ------------------------ //
</script>

</html>