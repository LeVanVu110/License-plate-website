<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gateway | Auto Cinematic Experience</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap" rel="stylesheet">

    <style>
        /* --- Video Section --- */
        .video-container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        #car-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin-top: 10%;
            margin-left: 30%;
        }

        .video-overlay {
            position: absolute;
            z-index: 10;
            text-align: center;
            pointer-events: none;
        }

        .video-overlay h1 {
            font-size: 4rem;
            letter-spacing: 20px;
            font-weight: 300;
            text-transform: uppercase;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 2s forwards 0.5s;
        }

        /* Biển số xe */
        .plate-box {
            position: absolute;
            bottom: 18%;
            left: 50%;
            transform: translateX(-50%);
            padding: 8px 30px;
            background: #fff;
            color: #000;
            font-size: 24px;
            font-weight: bold;
            border-radius: 4px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
            opacity: 0;
            animation: fadeIn 1.5s forwards 2s;
            /* Hiện sau khi video chạy 2s */
        }

        /* --- Content Section --- */
        .content-section {
            padding: 150px 8%;
            background: var(--obsidian);
            text-align: center;
            opacity: 0;
            transform: translateY(50px);
            transition: all 1.5s ease;
        }

        .content-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 0.9;
            }
        }

        /* Nút cuộn xuống giả định */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            font-size: 10px;
            letter-spacing: 3px;
            color: var(--champagne);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .garage-overlay {
            position: absolute;
            top: 50%;
            left: 8%;
            z-index: 10;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            #car-video {
                width: 100%;
                height: 100%;
                object-fit: cover;
                margin-top: -40%;
                margin-left: -5%;
            }

            .plate-box {
                text-align: center;
                padding: 5px 5px;
                width: 70%;
            }
        }


        /* ------------------------------------------------------- section 1 ---------------------------------------------------------  */
        /* --- Hero Section --- */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            background: radial-gradient(circle, #1a1a1a 0%, #0b0b0b 100%);
        }

        .hero-video-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=1920') center/cover;
            opacity: 0.3;
            z-index: -1;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            margin-bottom: 20px;
            background: linear-gradient(to bottom, #fff, #888);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- AI Search Bar --- */
        .search-container {
            width: 600px;
            background: var(--glass);
            padding: 15px 25px;
            border-radius: 50px;
            border: 1px solid rgba(247, 231, 206, 0.3);
            display: flex;
            align-items: center;
            transition: 0.4s;
        }

        .search-container:focus-within {
            box-shadow: 0 0 20px rgba(247, 231, 206, 0.2);
            width: 650px;
        }

        .search-container input {
            background: transparent;
            border: none;
            color: white;
            flex: 1;
            font-size: 16px;
            outline: none;
        }

        /* ------------------------------------------------------------- section 2 ---------------------------------------------------------------  */
        /* --- Trading Floor (Grid) --- */
        .trading-floor {
            padding: 100px 50px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        /* --- Number Plate Card --- */
        .plate-card {
            background: linear-gradient(135deg, #222, #000);
            border: 1px solid #333;
            border-radius: 15px;
            padding: 30px;
            position: relative;
            transition: 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            cursor: pointer;
            overflow: hidden;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .plate-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--champagne);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .plate-number {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 5px;
            color: var(--titan-white);
            border: 2px solid #444;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
            background: #fff;
            color: #000;
        }

        .price {
            color: var(--champagne);
            font-size: 18px;
            font-weight: 300;
        }

        .urgency-dot {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 8px;
            height: 8px;
            background: #00ff00;
            border-radius: 50%;
            box-shadow: 0 0 10px #00ff00;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }

            100% {
                opacity: 1;
            }
        }

        html,
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Cấm tuyệt đối việc trượt ngang */
        }
    </style>
</head>

<body>
    <!-- ------------------------------------------ phần 1video xe banner || phần 2 nav-menu --------------------------------------------  -->
    <?php include "header.php" ?>

    <div class="video-container">
        <video id="car-video" autoplay muted playsinline>
            <source src="Agen_video.mp4" type="video/mp4">
        </video>

        <div class="video-overlay">
            <!-- <h1>THE GATEWAY</h1> -->
        </div>
        <div class="garage-overlay">
            <h2 style="font-size: 2.5rem; font-weight: 300; letter-spacing: 8px;">VIRTUAL<br>GARAGE</h2>
            <div style="width: 50px; height: 1px; background: var(--champagne); margin: 20px 0;"></div>
            <p style="font-size: 10px; text-transform: uppercase; letter-spacing: 3px; color: #666;">Cuộn chuột để xoay
                xe</p>
        </div>

        <div class="plate-box">M ZS 7299</div>

        <div class="scroll-indicator">SCROLL TO EXPLORE</div>
    </div>
    <!-- ------------------------------------------ section 1 --------------------------------------------  -->

    <section class="hero">
        <div class="hero-video-placeholder"></div>
        <h1>Định danh đẳng cấp</h1>
        <div class="search-container">
            <input type="text" placeholder="Tìm theo cảm xúc (Vd: 'Tôi muốn sự thăng tiến'...)">
            <span style="color: var(--champagne); cursor: pointer;">✦ AI Search</span>
        </div>
    </section>
    <!-- ------------------------------------------ section 2 --------------------------------------------  -->
    <section class="trading-floor">
        <h2 style="font-family: 'Playfair Display'; font-size: 32px; margin-bottom: 40px;">The Trading Floor</h2>

        <div class="grid">
            <div class="plate-card">
                <div class="urgency-dot"></div>
                <div class="plate-number">30K - 888.88</div>
                <div class="price">2.450.000.000 đ</div>
                <div style="margin-top: 10px; font-size: 12px; color: #00ff00;">▲ 2.4% tháng này</div>
            </div>

            <div class="plate-card">
                <div class="urgency-dot"></div>
                <div class="plate-number">51L - 797.79</div>
                <div class="price">850.000.000 đ</div>
                <div style="margin-top: 10px; font-size: 12px; color: #ff4444;">▼ 0.5% tháng này</div>
            </div>

            <div class="plate-card">
                <div class="urgency-dot"></div>
                <div class="plate-number">30K - 678.99</div>
                <div class="price">1.200.000.000 đ</div>
                <div style="margin-top: 10px; font-size: 12px; color: #00ff00;">▲ 12.0% tháng này</div>
            </div>
        </div>
    </section>

    <script>
        // ------------------------------- phần 1 video xe banner------------------------  //

        // Hiệu ứng hiện nội dung khi cuộn tới
        const infoSection = document.getElementById('info-section');

        window.addEventListener('scroll', () => {
            const sectionTop = infoSection.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (sectionTop < windowHeight * 0.75) {
                infoSection.classList.add('visible');
            }
        });

        // Đảm bảo video luôn chạy ở tốc độ mượt nhất
        const video = document.getElementById('car-video');
        video.playbackRate = 0.9; // Làm chậm video lại một chút (80%) để cinematic hơn



        // --------------------------------- section 1 ------------------------------- //

        // Hiệu ứng Parallax nhẹ cho Hero Video
        window.addEventListener('scroll', function() {
            const scroll = window.pageYOffset;
            document.querySelector('.hero-video-placeholder').style.transform = `translateY(${scroll * 0.5}px)`;
        });

        // Giả lập tương tác thẻ
        document.querySelectorAll('.plate-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                // Có thể thêm hiệu ứng âm thanh click nhẹ ở đây
            });
        });
    </script>
</body>


</html>