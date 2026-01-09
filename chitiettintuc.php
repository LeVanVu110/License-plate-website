<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* -------------------------section 1-----------------  */
        :root {
            --gold-bronze: #D4AF37;
            --champagne: #F7E7CE;
        }

        .immersive-header {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Hero Media & Animation */
        .hero-media {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(10px);
            /* Bắt đầu bằng Blur */
            transform: scale(1.1);
            animation: infiniteZoom 20s linear infinite alternate, fadeInClear 2s ease-out forwards;
        }

        .overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.8) 100%);
            z-index: 2;
        }

        @keyframes infiniteZoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        @keyframes fadeInClear {
            to {
                filter: blur(0);
                opacity: 1;
            }
        }

        /* Main Content */
        .hero-content {
            position: relative;
            z-index: 10;
            padding: 0 5%;
            max-width: 1200px;
        }

        .main-headline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            color: #fff;
            line-height: 1.1;
            margin: 30px 0;
            font-weight: 900;
        }

        .line-reveal {
            display: block;
            overflow: hidden;
        }

        .gold-text {
            color: var(--gold-bronze);
        }

        .decoration-line {
            width: 0;
            height: 1px;
            background: var(--gold-bronze);
            margin: 0 auto;
            box-shadow: 0 0 15px var(--gold-bronze);
        }

        .meta-data,
        .author-info {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            letter-spacing: 4px;
            color: var(--silver-grey);
            text-transform: uppercase;
        }

        .meta-tag {
            color: var(--gold-bronze);
            font-weight: bold;
        }

        /* Sticky & Progress Bar */
        .reading-progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.1);
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background: var(--gold-bronze);
            box-shadow: 0 0 10px var(--gold-bronze);
        }

        .sticky-nav {
            position: fixed;
            top: -60px;
            left: 0;
            width: 100%;
            height: 60px;
            background: rgba(10, 10, 11, 0.95);
            backdrop-filter: blur(10px);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 5%;
            transition: top 0.5s cubic-bezier(0.19, 1, 0.22, 1);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .sticky-title {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 14px;
            letter-spacing: 1px;
        }

        /* Scroll Hint */
        .scroll-hint {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            opacity: 0.6;
        }

        .scroll-text {
            font-size: 9px;
            letter-spacing: 3px;
            color: #fff;
            display: block;
            margin-bottom: 10px;
        }

        .scroll-arrow {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, var(--gold-bronze), transparent);
            margin: 0 auto;
            animation: pulseLine 2s infinite;
        }

        @keyframes pulseLine {
            0% {
                height: 0;
                opacity: 0;
            }

            50% {
                height: 50px;
                opacity: 1;
            }

            100% {
                height: 50px;
                opacity: 0;
                transform: translateY(20px);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-headline {
                font-size: 2.2rem;
            }

            .hero-content {
                margin-top: 20vh;
            }
        }

        /* -------------------------section 2-----------------  */

        /* -------------------------section 3-----------------  */

        /* -------------------------section 4-----------------  */

        /* -------------------------section 5-----------------  */
    </style>
</head>

<body>
    <!-- --------------------------------- section 1 --------------------------------- -->
    <section class="immersive-header" id="heroSection">
        <div class="reading-progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <div class="sticky-nav" id="stickyNav">
            <span class="sticky-title">Biển số không chỉ là định danh, nó là di sản số vĩnh cửu</span>
        </div>

        <div class="hero-media">
            <div class="overlay-gradient"></div>
            <img src="https://images.unsplash.com/photo-1514316454349-750a7fd3da3a?q=80&w=2000" class="hero-img" alt="Hero Background">
        </div>

        <div class="hero-content">
            <div class="meta-data reveal-item">
                <span class="meta-tag">PHONG THỦY</span>
                <span class="meta-separator">/</span>
                <span class="meta-date">12 THÁNG 10, 2023</span>
            </div>

            <h1 class="main-headline">
                <span class="line-reveal">Biển số không chỉ là định danh,</span>
                <span class="line-reveal">nó là di sản số <span class="gold-text">vĩnh cửu.</span></span>
            </h1>

            <div class="decoration-line"></div>

            <div class="author-info reveal-item">
                <span class="author-name">BỞI PHẠM GIA LÂM</span>
                <span class="read-time">8 PHÚT ĐỌC</span>
            </div>
        </div>

        <div class="scroll-hint">
            <span class="scroll-text">SCROLL DOWN</span>
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <div style="height: 2000px; background: #0A0A0B;"></div>
    <!-- --------------------------------- section 2 --------------------------------- -->

    <!-- --------------------------------- section 3 --------------------------------- -->

    <!-- --------------------------------- section 4 --------------------------------- -->

    <!-- --------------------------------- section 5 --------------------------------- -->

    <?php include "footer.php" ?>
</body>
<script>
    // ----------------------------- section 1 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
    // 1. Khởi tạo hiệu ứng Reveal khi tải trang
    const tl = gsap.timeline();
    
    tl.to(".decoration-line", { width: "150px", duration: 1.5, ease: "expo.inOut" })
      .from(".line-reveal", { y: 100, opacity: 0, duration: 1.2, stagger: 0.2, ease: "power4.out" }, "-=1")
      .from(".reveal-item", { opacity: 0, y: 20, duration: 1, stagger: 0.2 }, "-=0.5");

    // 2. Xử lý Scroll Morph & Reading Progress
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = (scrolled / windowHeight) * 100;
        
        // Cập nhật thanh tiến trình
        document.getElementById('progressBar').style.width = progress + "%";

        // Hiệu ứng Parallax & Fade cho Hero Content
        gsap.to(".hero-content", {
            y: scrolled * 0.4,
            opacity: 1 - (scrolled / 600),
            duration: 0.1
        });

        // Hiện Sticky Nav khi cuộn qua Hero
        if (scrolled > window.innerHeight * 0.8) {
            document.getElementById('stickyNav').style.top = "0";
        } else {
            document.getElementById('stickyNav').style.top = "-60px";
        }
    });

    // 3. Mouse Parallax (Desktop only)
    if (window.innerWidth > 1024) {
        document.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth - 0.5) * 20;
            const y = (e.clientY / window.innerHeight - 0.5) * 20;
            gsap.to(".hero-img", { x: x, y: y, duration: 2, ease: "power2.out" });
        });
    }
});

    // ----------------------------- section 2 ------------------------ // 

    // ----------------------------- section 3 ------------------------ // 

    // ----------------------------- section 4 ------------------------ // 

    // ----------------------------- section 5 ------------------------ // 
</script>

</html>