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

        /* --------------------------- section 3 ------------------------  */

        /* --------------------------- section 4 ------------------------  */

        /* --------------------------- section 5 ------------------------  */
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

    <!-- ---------------------------- section 3 ---------------------------- -->

    <!-- ---------------------------- section 4 ---------------------------- -->

    <!-- ---------------------------- section 5 ---------------------------- -->

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
        window.addEventListener('mousedown', () => gsap.to(cursor, { scale: 0.8, duration: 0.2 }));
        window.addEventListener('mouseup', () => gsap.to(cursor, { scale: 1, duration: 0.2 }));


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

    // ------------------------- section 3 --------------------- //

    // ------------------------- section 4 --------------------- //

    // ------------------------- section 5 --------------------- //

    // ------------------------- section 6 --------------------- //
</script>

</html>