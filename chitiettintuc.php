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
        .narrative-body {
            background: #000;
            color: #F5F5F5;
            padding: 100px 0;
            position: relative;
        }

        .narrative-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            position: relative;
            padding: 0 5%;
        }

        /* Sidebar */
        .narrative-sidebar {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            padding-top: 100px;
        }

        .sidebar-inner {
            position: sticky;
            top: 120px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        .side-btn {
            background: transparent;
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: #D4AF37;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .side-btn:hover {
            background: #D4AF37;
            color: #000;
        }

        /* Article Content */
        .main-article {
            max-width: 800px;
            /* Độ rộng tối ưu để đọc không mỏi mắt */
            width: 100%;
        }

        .article-lead {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            line-height: 1.5;
            font-style: italic;
            color: #A1A1A6;
            margin-bottom: 50px;
        }

        .article-paragraph {
            font-family: 'Inter', sans-serif;
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 30px;
            color: #E0E0E0;
        }

        .drop-cap {
            float: left;
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            line-height: 1;
            color: #D4AF37;
            margin-right: 15px;
            margin-top: 10px;
        }

        .sub-heading {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 1rem;
            color: #D4AF37;
            margin: 60px 0 30px;
        }

        /* Full-bleed Image */
        .full-bleed-image {
            margin: 60px -100px;
            /* Tràn lề văn bản */
            position: relative;
        }

        .full-bleed-image img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .full-bleed-image figcaption {
            font-size: 0.9rem;
            color: #666;
            margin-top: 15px;
            text-align: center;
        }

        /* Pull Quote */
        .pull-quote {
            margin: 80px 0;
            text-align: center;
            position: relative;
        }

        .pull-quote p {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            line-height: 1.3;
            color: #fff;
            padding: 30px 0;
        }

        .pull-quote cite {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 4px;
            color: #D4AF37;
            font-style: normal;
        }

        .quote-line {
            width: 60px;
            height: 1px;
            background: #D4AF37;
            margin: 0 auto;
        }

        /* Tooltip */
        .tooltip-trigger {
            border-bottom: 1px dashed #D4AF37;
            cursor: help;
            position: relative;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .full-bleed-image {
                margin: 60px 0;
            }

            .narrative-sidebar {
                display: none;
            }

            /* Ẩn sidebar trên tablet/mobile */
        }

        @media (max-width: 768px) {
            .article-lead {
                font-size: 1.4rem;
            }

            .article-paragraph {
                font-size: 1.1rem;
                line-height: 1.6;
            }

            .pull-quote p {
                font-size: 1.6rem;
            }
        }

        /* -------------------------section 3-----------------  */
        .immersive-gallery {
            background: #0A0A0A;
            width: 100vw;
            margin-left: calc(50% - 50vw);
            /* Kỹ thuật giúp tràn lề hoàn toàn dù nằm trong container */
            padding: 100px 0;
            overflow: hidden;
        }

        .gallery-wrapper {
            width: 80%;
            /* Bắt đầu với chiều rộng nhỏ để tạo hiệu ứng giãn nở */
            margin: 0 auto;
            height: 70vh;
            position: relative;
            transition: width 1.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .gallery-wrapper.expanded {
            width: 100%;
        }

        .showroom-container {
            width: 100%;
            height: 100%;
            position: relative;
            background: #000;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
            cursor: crosshair;
        }

        .showroom-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }

        /* Controls & Overlay */
        .video-controls {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.5s;
            z-index: 10;
        }

        .showroom-container:hover .video-controls {
            opacity: 1;
        }

        .control-btn {
            background: rgba(212, 175, 55, 0.2);
            border: 1px solid #D4AF37;
            color: #D4AF37;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            backdrop-filter: blur(5px);
        }

        .showroom-overlay {
            position: absolute;
            bottom: 30px;
            left: 30px;
            display: flex;
            gap: 40px;
            background: rgba(0, 0, 0, 0.6);
            padding: 20px 30px;
            backdrop-filter: blur(10px);
            border-left: 2px solid #D4AF37;
            z-index: 5;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-item .label {
            font-size: 10px;
            letter-spacing: 2px;
            color: #888;
        }

        .info-item .value {
            font-size: 13px;
            letter-spacing: 1px;
            color: #F7E7CE;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        /* Magnifier */
        #magnifier {
            position: absolute;
            width: 150px;
            height: 150px;
            border: 2px solid #D4AF37;
            border-radius: 50%;
            pointer-events: none;
            display: none;
            background-repeat: no-repeat;
            z-index: 100;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .fullscreen-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: #D4AF37;
            font-size: 20px;
            cursor: pointer;
            z-index: 10;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .gallery-wrapper {
                height: 50vh;
                width: 100% !important;
            }

            .showroom-overlay {
                flex-direction: column;
                gap: 10px;
                bottom: 10px;
                left: 10px;
                padding: 15px;
            }

            .info-item .value {
                font-size: 11px;
            }

            #magnifier {
                display: none !important;
            }

            /* Tắt kính lúp trên mobile */
        }

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

    <!-- --------------------------------- section 2 --------------------------------- -->
    <section class="narrative-body">
        <div class="narrative-container">

            <aside class="narrative-sidebar">
                <div class="sidebar-inner">
                    <button class="side-btn" title="Lưu bài viết"><i class="far fa-bookmark"></i></button>
                    <div class="side-divider"></div>
                    <button class="side-btn"><i class="fab fa-facebook-f"></i></button>
                    <button class="side-btn"><i class="fab fa-twitter"></i></button>
                    <button class="side-btn"><i class="fas fa-link"></i></button>
                </div>
            </aside>

            <article class="main-article">
                <p class="article-lead">
                    Trong thế giới của những nhà sưu tầm tinh hoa, biển số xe không còn đơn thuần là những con số định danh trên mặt kim loại. Nó đã chuyển mình thành một loại "di sản số", một biểu tượng của quyền lực, phong thủy và giá trị đầu tư vượt thời gian.
                </p>

                <p class="article-paragraph">
                    <span class="drop-cap">T</span>ại Việt Nam, thị trường biển số đẹp đang chứng kiến những bước ngoặt lịch sử. Kể từ khi chính sách định danh biển số đi vào thực thi, giá trị của những dãy số "Ngũ quý" hay "Sảnh tiến" đã tăng vọt. Giới thượng lưu không chỉ tìm kiếm một tấm biển đẹp cho chiếc xe của mình, mà họ đang tìm kiếm một <span class="tooltip-trigger" data-tooltip="Phương pháp phân tích dựa trên dữ liệu lịch sử và thuật toán AI để xác định giá trị thực của dãy số.">Định giá AI</span> chính xác để tích sản.
                </p>

                <h3 class="sub-heading">Giá trị của sự độc bản</h3>

                <p class="article-paragraph">
                    Khác với bất động sản hay đồng hồ xa xỉ, biển số xe là duy nhất. Không bao giờ có hai tấm biển số giống hệt nhau trên cùng một quốc gia. Sự khan hiếm tuyệt đối này chính là "chất xúc tác" mạnh mẽ nhất đẩy giá trị của chúng lên hàng triệu USD tại các thị trường như Dubai hay Hong Kong.
                </p>

                <figure class="full-bleed-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070" alt="Luxury Car License Plate">
                    <figcaption>Ánh sáng hoàng hôn trên tấm biển số ngũ quý tại một sự kiện kín.</figcaption>
                </figure>

                <p class="article-paragraph">
                    Nhiều nhà sưu tầm chia sẻ rằng, việc sở hữu một dãy số <span class="tooltip-trigger" data-tooltip="Dãy số có 5 chữ số giống hệt nhau, biểu tượng cho sự viên mãn và quyền lực tuyệt đối.">Biển ngũ quý</span> không chỉ mang lại may mắn theo quan niệm phong thủy, mà còn là lời khẳng định vị thế cá nhân mà không cần phô trương.
                </p>

                <blockquote class="pull-quote">
                    <div class="quote-line"></div>
                    <p>"Biển số đẹp là thứ trang sức duy nhất mà bạn có thể mang theo trên mọi hành trình để khẳng định đẳng cấp mà không cần thốt ra một lời nào."</p>
                    <cite>— MR. PHẠM GIA LÂM</cite>
                    <div class="quote-line"></div>
                </blockquote>

                <p class="article-paragraph">
                    Kết thúc một thập kỷ biến động, thị trường biển số đẹp hiện nay đã trở thành một sân chơi chuyên nghiệp, minh bạch và đầy tiềm năng cho những ai hiểu rõ quy luật của các con số.
                </p>
            </article>
        </div>
    </section>

    <!-- --------------------------------- section 3 --------------------------------- -->
    <section class="immersive-gallery">
        <div class="gallery-wrapper" id="galleryTrigger">

            <div class="showroom-container">
                <video class="showroom-video"
                    autoplay
                    muted
                    loop
                    playsinline
                    id="galleryVideo"
                    poster="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=2070">
                    <source src="" type="video/mp4">
                    Trình duyệt của bạn không hỗ trợ video.
                </video>

                <div class="video-controls">
                    <button id="playPauseBtn" class="control-btn"><i class="fas fa-pause"></i></button>
                </div>

                <div id="magnifier"></div>

                <div class="showroom-overlay">
                    <div class="info-item">
                        <span class="label">VẬT THỂ:</span>
                        <span class="value">BIỂN SỐ 51K-999.99</span>
                    </div>
                    <div class="info-item">
                        <span class="label">CHẤT LIỆU:</span>
                        <span class="value">TITANIUM GOLD PVD</span>
                    </div>
                    <div class="info-item">
                        <span class="label">TÌNH TRẠNG:</span>
                        <span class="value">NGUYÊN BẢN (MINT)</span>
                    </div>
                </div>

                <button class="fullscreen-toggle"><i class="fas fa-expand"></i></button>
            </div>
        </div>
    </section>

    <!-- --------------------------------- section 4 --------------------------------- -->

    <!-- --------------------------------- section 5 --------------------------------- -->

    <?php include "footer.php" ?>
</body>
<script>
    // ----------------------------- section 1 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Khởi tạo hiệu ứng Reveal khi tải trang
        const tl = gsap.timeline();

        tl.to(".decoration-line", {
                width: "150px",
                duration: 1.5,
                ease: "expo.inOut"
            })
            .from(".line-reveal", {
                y: 100,
                opacity: 0,
                duration: 1.2,
                stagger: 0.2,
                ease: "power4.out"
            }, "-=1")
            .from(".reveal-item", {
                opacity: 0,
                y: 20,
                duration: 1,
                stagger: 0.2
            }, "-=0.5");

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
                gsap.to(".hero-img", {
                    x: x,
                    y: y,
                    duration: 2,
                    ease: "power2.out"
                });
            });
        }
    });

    // ----------------------------- section 2 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Reveal on Scroll (Sử dụng ScrollTrigger)
        const paragraphs = document.querySelectorAll('.article-paragraph, .sub-heading, .pull-quote, .full-bleed-image');

        paragraphs.forEach((p) => {
            gsap.from(p, {
                scrollTrigger: {
                    trigger: p,
                    start: "top 85%",
                    toggleActions: "play none none none"
                },
                y: 30,
                opacity: 0,
                duration: 1,
                ease: "power2.out"
            });
        });

        // 2. Smooth Text Focus (Mờ các đoạn văn xung quanh khi đọc lâu)
        let focusTimer;
        paragraphs.forEach((p) => {
            p.addEventListener('mouseenter', () => {
                clearTimeout(focusTimer);
                focusTimer = setTimeout(() => {
                    paragraphs.forEach(other => {
                        if (other !== p) gsap.to(other, {
                            opacity: 0.3,
                            duration: 1
                        });
                    });
                }, 3000); // 3 giây
            });

            p.addEventListener('mouseleave', () => {
                clearTimeout(focusTimer);
                gsap.to(paragraphs, {
                    opacity: 1,
                    duration: 0.5
                });
            });
        });

        // 3. Interactive Tooltip (Đơn giản bằng CSS/JS)
        document.querySelectorAll('.tooltip-trigger').forEach(trigger => {
            trigger.addEventListener('mouseenter', function(e) {
                const text = this.getAttribute('data-tooltip');
                const tooltip = document.createElement('div');
                tooltip.className = 'custom-tooltip';
                tooltip.innerText = text;
                document.body.appendChild(tooltip);

                const rect = this.getBoundingClientRect();
                tooltip.style.left = rect.left + 'px';
                tooltip.style.top = (rect.top - 40) + 'px';

                gsap.fromTo(tooltip, {
                    opacity: 0,
                    y: 10
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.3
                });
            });

            trigger.addEventListener('mouseleave', () => {
                const tooltip = document.querySelector('.custom-tooltip');
                if (tooltip) tooltip.remove();
            });
        });
    });

    // ----------------------------- section 3 ------------------------ // 
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng giãn nở (Expansion) khi cuộn đến
        const galleryWrapper = document.getElementById('galleryTrigger');

        ScrollTrigger.create({
            trigger: galleryWrapper,
            start: "top 80%",
            onEnter: () => galleryWrapper.classList.add('expanded')
        });

        // 2. Play/Pause Video logic
        const video = document.getElementById('galleryVideo');
        const playPauseBtn = document.getElementById('playPauseBtn');

        playPauseBtn.addEventListener('click', () => {
            if (video.paused) {
                video.play();
                playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                video.pause();
                playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
            }
        });

        // 3. Hiệu ứng Kính lúp (Magnifying Glass)
        const showroom = document.querySelector('.showroom-container');

        showroom.addEventListener('mousemove', (e) => {
            if (window.innerWidth <= 768) return;

            const rect = showroom.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;

            // Di chuyển tâm phóng to theo chuột
            gsap.to(video, {
                transformOrigin: `${x}% ${y}%`,
                scale: 1.3,
                duration: 0.5,
                ease: "power2.out"
            });
        });

        showroom.addEventListener('mouseleave', () => {
            gsap.to(video, {
                scale: 1,
                duration: 0.5,
                ease: "power2.out"
            });
        });

        showroom.addEventListener('mouseleave', () => {
            magnifier.style.display = 'none';
            gsap.to(video, {
                scale: 1,
                duration: 0.5
            });
        });
    });

    // ----------------------------- section 4 ------------------------ // 

    // ----------------------------- section 5 ------------------------ // 
</script>
<!-- ---------------------------- section 2 -----------------------  -->\
<style>
    /* CSS cho Tooltip */
    .custom-tooltip {
        position: fixed;
        background: rgba(212, 175, 55, 0.95);
        color: #000;
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 12px;
        z-index: 9999;
        max-width: 250px;
        font-family: 'Inter', sans-serif;
        pointer-events: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
</style>

</html>