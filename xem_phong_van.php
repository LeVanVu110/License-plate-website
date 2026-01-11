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
            --ivory-white: #FFFFF0;
            --gold-primary: #D4AF37;
        }

        /* ------------------------------ section 1 ------------------------------   */
        .living-portrait {
            position: relative;
            height: 100vh;
            width: 100%;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Background Media */
        .portrait-media-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: grayscale(100%);
            /* Bắt đầu bằng đen trắng */
            transition: filter 3s ease-in-out;
        }

        .portrait-video,
        .portrait-fallback {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Lớp phủ chuyển màu */
        .color-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, transparent 20%, rgba(0, 0, 0, 0.4) 100%);
            opacity: 0;
            transition: opacity 3s;
        }

        /* Content Styling */
        .portrait-content {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .expert-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 5rem;
            color: var(--gold-champagne);
            letter-spacing: 15px;
            margin: 0;
            opacity: 0;
            transform: scale(0.8);
            position: relative;
        }

        .gold-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150%;
            height: 150%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%);
            opacity: 0;
            pointer-events: none;
        }

        .expert-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            color: var(--ivory-white);
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-top: 20px;
            opacity: 0;
        }

        /* Controls */
        .media-controls {
            position: absolute;
            bottom: 40px;
            right: 40px;
            z-index: 20;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .living-portrait:hover .media-controls {
            opacity: 1;
        }

        .control-btn {
            background: transparent;
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            padding: 8px 15px;
            font-size: 9px;
            letter-spacing: 2px;
            cursor: pointer;
        }

        /* Initial Blackout Effect */
        .initial-blackout {
            position: absolute;
            inset: 0;
            background: #000;
            z-index: 100;
            pointer-events: none;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .expert-name {
                font-size: 2.5rem;
                letter-spacing: 5px;
            }

            .portrait-content {
                transform: translateY(-15vh);
            }

            /* Đưa lên 1/3 màn hình */
            .portrait-media-wrapper {
                height: 100%;
            }
        }

        /* ------------------------------ section 2 ------------------------------   */

        /* ------------------------------ section 3 ------------------------------   */

        /* ------------------------------ section 4 ------------------------------   */

        /* ------------------------------ section 5 ------------------------------   */
    </style>
</head>

<body>
    <!-- ------------------------------ section 1 ------------------------------   -->
    <section class="living-portrait" id="portraitSection">
        <div class="initial-blackout"></div>

        <div class="portrait-media-wrapper">
            <video autoplay muted loop playsinline class="portrait-video" id="portraitVideo">
                <source src="https://assets.mixkit.co/videos/preview/mixkit-thoughtful-man-sitting-by-the-window-40455-large.mp4" type="video/mp4">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1974" alt="Expert Portrait" class="portrait-fallback">
            </video>
            <div class="color-overlay"></div>
        </div>

        <div class="portrait-content">
            <h1 class="expert-name">NGUYỄN MINH TRÍ</h1>
            <div class="gold-glow"></div>
            <p class="expert-title">BẬC THẦY SƯU TẦM BIỂN SỐ & DI SẢN XE SANG</p>
        </div>

        <div class="media-controls">
            <button id="toggleMute" class="control-btn">
                <span class="icon">UNMUTE</span>
            </button>
        </div>

        <div class="scroll-hint">
            <div class="mouse-wheel"></div>
        </div>
    </section>

    <!-- ------------------------------ section 2 ------------------------------   -->

    <!-- ------------------------------ section 3 ------------------------------   -->

    <!-- ------------------------------ section 4 ------------------------------   -->

    <!-- ------------------------------ section 5 ------------------------------   -->

    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------------ section 1 ------------------------------  //
    document.addEventListener("DOMContentLoaded", function() {
        // Đảm bảo GSAP và ScrollTrigger đã được load
        gsap.registerPlugin(ScrollTrigger);

        const tl = gsap.timeline();

        // 1. Hiệu ứng "From Shadow to Light" khi tải trang
        tl.to(".initial-blackout", {
                opacity: 0,
                duration: 2,
                ease: "power2.inOut"
            })
            .to(".expert-name", {
                opacity: 1,
                scale: 1,
                duration: 2.5,
                ease: "power3.out"
            }, "-=1")
            .to(".gold-glow", {
                opacity: 1,
                duration: 1.5
            }, "-=1.5")
            .to(".portrait-media-wrapper", {
                filter: "grayscale(0%)", // Chuyển sang có màu
                duration: 4,
                ease: "sine.inOut"
            }, "-=2")
            .to(".expert-title", {
                opacity: 1,
                y: -10,
                duration: 1.5,
                ease: "power2.out"
            }, "-=2");

        // 2. Scroll Transition: Mờ dần và thu nhỏ khi cuộn
        gsap.to("#portraitSection", {
            scrollTrigger: {
                trigger: "#portraitSection",
                start: "top top",
                end: "bottom top",
                scrub: true
            },
            opacity: 0,
            scale: 0.9,
            y: -50
        });

        // 3. Tương tác chuột - Soft Blur xung quanh khuôn mặt (Desktop)
        if (window.innerWidth > 1024) {
            document.querySelector('.living-portrait').addEventListener('mousemove', (e) => {
                const x = (e.clientX / window.innerWidth) * 100;
                const y = (e.clientY / window.innerHeight) * 100;

                gsap.to(".portrait-media-wrapper", {
                    maskImage: `radial-gradient(circle at ${x}% ${y}%, black 10%, transparent 60%)`,
                    webkitMaskImage: `radial-gradient(circle at ${x}% ${y}%, black 10%, transparent 60%)`,
                    duration: 0.5
                });
            });
        }

        // 4. Toggle Mute
        const video = document.getElementById('portraitVideo');
        const muteBtn = document.getElementById('toggleMute');

        muteBtn.addEventListener('click', () => {
            video.muted = !video.muted;
            muteBtn.innerText = video.muted ? "UNMUTE" : "MUTE";
        });
    });

    // ------------------------------ section 2 ------------------------------  //

    // ------------------------------ section 3 ------------------------------  //

    // ------------------------------ section 4 ------------------------------  //

    // ------------------------------ section 5 ------------------------------  //
</script>

</html>