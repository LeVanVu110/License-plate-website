<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gateway | Auto Cinematic Experience</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>

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

        /* ---------------------------------------------- section 3 -------------------------------------------  */
        .virtual-garage {
            display: flex;
            height: 100vh;
            background: radial-gradient(circle at 70% 50%, #1A1A1A 0%, #0B0B0B 100%);
        }

        /* Bên trái: Thông tin */
        .info-panel {
            flex: 1;
            padding: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 2;
        }

        .info-panel h2 {
            font-size: 2.5rem;
            color: var(--laser-color);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .info-panel p {
            color: #888;
            line-height: 1.6;
            max-width: 400px;
        }

        /* Bên phải: Khu vực xe */
        .garage-workspace {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            perspective: 1000px;
        }

        .car-container {
            position: relative;
            width: 90%;
            transform-style: preserve-3d;
            will-change: transform;
        }

        .car-image {
            width: 100%;
            height: auto;
            border-radius: 20px;
            /* Ảnh xe Mazda góc nghiêng đẹp từ Unsplash */
            filter: drop-shadow(0 30px 50px rgba(0, 0, 0, 0.5));
        }

        /* Điểm thả biển số (Drop Zone) */
        .drop-zone {
            position: absolute;
            /* Căn chỉnh theo ảnh xe Mazda cụ thể bên dưới */
            bottom: 29%;
            right: 69%;
            width: 80px;
            height: 25px;
            border: 2px dashed rgba(224, 255, 255, 0.4);
            transform: rotate(4deg) skewX(0deg);
            /* Làm nghiêng để khớp góc 45 độ của xe */
            z-index: 5;
        }

        .drop-zone.active {
            border-color: var(--laser-color);
            background: rgba(224, 255, 255, 0.2);
            box-shadow: 0 0 20px var(--laser-color);
        }

        /* Khay chứa biển số */
        .plate-tray {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            height: 80px;
            background: #000;
            border: 1px solid #222;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            border-radius: 15px;
            z-index: 10;
        }

        .plate {
            width: 90px;
            height: 22px;
            background: #f0f0f0;
            color: #333;
            font-weight: bold;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 2px;
            cursor: grab;
            border: 1px solid #999;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        /* Hiệu ứng Ting */
        #ting-flash {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--laser-color);
            opacity: 0;
            pointer-events: none;
            border-radius: 50%;
        }
        /* ---------------------------------------------- section 4 -------------------------------------------  */
        .auction-section {
            padding: 80px 5%;
            background: var(--bg-deep-black);
        }

        .header-box {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        /* Chấm đỏ nhấp nháy */
        .live-status {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--ruby-red);
            font-weight: bold;
            letter-spacing: 2px;
        }

        .pulse-dot {
            width: 12px;
            height: 12px;
            background: var(--ruby-red);
            border-radius: 50%;
            box-shadow: 0 0 0 rgba(224, 17, 95, 0.7);
            animation: pulse-red 1.5s infinite;
        }

        /* Danh sách bảng điện tử */
        .auction-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .auction-row {
            display: grid;
            grid-template-columns: 1.75fr 2fr 1.5fr 2fr 1fr;
            align-items: center;
            background: #0a0a0a;
            padding: 20px;
            border-bottom: 1px solid #1a1a1a;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        /* Hiệu ứng lóe sáng Vàng Gold */
        .auction-row.new-bid {
            animation: flash-gold 0.6s ease-out;
        }

        .plate-numbers {
            font-size: 1.5rem;
            font-weight: bold;
            color: #eee;
        }

        .bid-info {
            color: #888;
            font-size: 0.9rem;
        }

        .current-price {
            color: var(--gold-bright);
            font-size: 1.3rem;
            font-weight: bold;
        }

        /* --- Flip Clock Styles --- */
        .countdown-timer {
            display: flex;
            gap: 5px;
        }

        .flip-unit {
            display: flex;
            gap: 2px;
            align-items: center;
        }

        .flip-card {
            background: var(--grey-dark);
            color: #fff;
            width: 30px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: bold;
            border-radius: 4px;
            border-bottom: 2px solid #000;
            position: relative;
        }

        .flip-card::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 1px;
            background: rgba(0,0,0,0.5);
            top: 50%;
        }

        /* Animations */
        @keyframes pulse-red {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(224, 17, 95, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(224, 17, 95, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(224, 17, 95, 0); }
        }

        @keyframes flash-gold {
            0% { background: transparent; }
            50% { background: var(--gold-glow); box-shadow: inset 0 0 20px var(--gold-bright); }
            100% { background: transparent; }
        }

        .btn-bid {
            background: transparent;
            border: 1px solid var(--gold-bright);
            color: var(--gold-bright);
            padding: 8px 15px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .btn-bid:hover {
            background: var(--gold-bright);
            color: #000;
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

    <!-- ------------------------------------------ section 3 --------------------------------------------  -->
    <section class="virtual-garage">
        <div class="info-panel">
            <h2>Virtual Garage</h2>
            <p>Chọn một biển số từ khay bên dưới và kéo thả trực tiếp vào đầu xe để xem độ tương thích.</p>
        </div>

        <div class="garage-workspace" id="workspace">
            <div class="car-container" id="carContainer">
                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1000" class="car-image">

                <div class="drop-zone" id="dropZone">
                    <div id="ting-flash"></div>
                </div>
            </div>

            <div class="plate-tray">
                <div class="plate">30F-888.88</div>
                <div class="plate">51G-999.99</div>
                <div class="plate">VIP-666.66</div>
                <div class="plate">43A-123.45</div>
                <div class="plate">99A-777.77</div>
            </div>
        </div>
    </section>


    <!-- ------------------------------------------ section 4 --------------------------------------------  -->
     
<section class="auction-section">
    <div class="header-box">
        <div class="live-status">
            <div class="pulse-dot"></div>
            <span>LIVE AUCTION PULSE</span>
        </div>
    </div>

    <div class="auction-list">
        <div class="auction-row" id="row-1">
            <div class="plate-numbers">51K-888.88</div>
            <div class="bid-info">Người thầu: <span style="color:white">Dương Quý ***</span></div>
            <div class="current-price">3,450,000,000 đ</div>
            <div class="countdown-timer">
                <div class="flip-unit">
                    <div class="flip-card">0</div><div class="flip-card">2</div>
                </div>
                <span>:</span>
                <div class="flip-unit">
                    <div class="flip-card">1</div><div class="flip-card">5</div>
                </div>
                <span>:</span>
                <div class="flip-unit">
                    <div class="flip-card">4</div><div class="flip-card">8</div>
                </div>
            </div>
            <button class="btn-bid" onclick="simulateBid('row-1')">Trả giá</button>
        </div>

        <div class="auction-row" id="row-2">
            <div class="plate-numbers">30L-666.66</div>
            <div class="bid-info">Người thầu: <span style="color:white">Nguyễn Anh ***</span></div>
            <div class="current-price">1,200,000,000 đ</div>
            <div class="countdown-timer">
                <div class="flip-unit">
                    <div class="flip-card">0</div><div class="flip-card">0</div>
                </div>
                <span>:</span>
                <div class="flip-unit">
                    <div class="flip-card">4</div><div class="flip-card">2</div>
                </div>
                <span>:</span>
                <div class="flip-unit">
                    <div class="flip-card">1</div><div class="flip-card">2</div>
                </div>
            </div>
            <button class="btn-bid" onclick="simulateBid('row-2')">Trả giá</button>
        </div>
    </div>
</section>
    <!-- ------------------------------------------ section 5 --------------------------------------------  -->

    <!-- ------------------------------------------ section 6 --------------------------------------------  -->


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

        // --------------------------------- section 3 ------------------------------- //
        gsap.registerPlugin(Draggable);

        const carContainer = document.getElementById('carContainer');
        const workspace = document.getElementById('workspace');
        const dropZone = document.getElementById('dropZone');

        // Biến lưu trữ biển số hiện tại đang được gắn trên xe
        let currentPlate = null;

        // 1. Hiệu ứng Parallax Xe nghiêng
        workspace.addEventListener('mousemove', (e) => {
            const xPos = (e.clientX / window.innerWidth - 0.5) * 15;
            const yPos = (e.clientY / window.innerHeight - 0.5) * 8;
            gsap.to(carContainer, {
                rotateY: xPos,
                rotateX: -yPos,
                duration: 0.6,
                ease: "power2.out"
            });
        });

        // 2. Kéo thả biển số
        Draggable.create(".plate", {
            type: "x,y",
            onDragStart: function() {
                // Khi bắt đầu kéo, đưa biển lên lớp trên cùng
                gsap.set(this.target, {
                    zIndex: 100
                });
            },
            onDrag: function() {
                if (this.hitTest(dropZone, "50%")) {
                    dropZone.classList.add('active');
                } else {
                    dropZone.classList.remove('active');
                }
            },
            onDragEnd: function() {
                if (this.hitTest(dropZone, "50%")) {

                    // --- LOGIC ĐẨY BIỂN CŨ XUỐNG ---
                    if (currentPlate && currentPlate !== this.target) {
                        gsap.to(currentPlate, {
                            x: 0,
                            y: 0,
                            rotation: 0,
                            skewX: 0,
                            scale: 1,
                            duration: 0.5,
                            ease: "power2.inOut"
                        });
                    }

                    // Cập nhật biển hiện tại là biển vừa thả vào
                    currentPlate = this.target;

                    // Tính toán vị trí tâm
                    const dzRect = dropZone.getBoundingClientRect();
                    const plateRect = this.target.getBoundingClientRect();
                    const deltaX = dzRect.left - plateRect.left + (dzRect.width - plateRect.width) / 2;
                    const deltaY = dzRect.top - plateRect.top + (dzRect.height - plateRect.height) / 2;

                    // Gắn biển mới lên xe
                    gsap.to(this.target, {
                        x: "+=" + deltaX,
                        y: "+=" + deltaY,
                        rotation: 4, // Góc bạn chỉnh
                        skewX: 0, // Góc bạn chỉnh
                        scale: 0.85,
                        duration: 0.4,
                        ease: "back.out(1.2)",
                        zIndex: 5 // Đảm bảo nằm dưới hiệu ứng loé sáng
                    });

                    // Hiệu ứng "Ting"
                    gsap.fromTo("#ting-flash", {
                        opacity: 1,
                        scale: 0
                    }, {
                        opacity: 0,
                        scale: 4,
                        duration: 0.6
                    });

                    dropZone.style.borderColor = "transparent";
                } else {
                    // Nếu thả trượt hoặc kéo ra khỏi xe:
                    if (currentPlate === this.target) {
                        currentPlate = null; // Giải phóng vị trí nếu kéo biển đang gắn ra ngoài
                        dropZone.style.borderColor = "rgba(224, 255, 255, 0.4)";
                    }

                    gsap.to(this.target, {
                        x: 0,
                        y: 0,
                        rotation: 0,
                        skewX: 0,
                        scale: 1,
                        duration: 0.5,
                        zIndex: 1
                    });
                }
                dropZone.classList.remove('active');
            }
        });
        //------------------------------ section 4 ------------------------------ //
        // 1. Giả lập hiệu ứng Flash khi có giá mới
    function simulateBid(rowId) {
        const row = document.getElementById(rowId);
        
        // Thêm class hiệu ứng
        row.classList.remove('new-bid');
        void row.offsetWidth; // Trigger reflow để reset animation
        row.classList.add('new-bid');
        
        // Giả lập tăng giá ngẫu nhiên
        const priceTag = row.querySelector('.current-price');
        let currentVal = parseInt(priceTag.innerText.replace(/,/g, ''));
        currentVal += 50000000;
        priceTag.innerText = currentVal.toLocaleString('vi-VN') + ' đ';
    }

    // 2. Logic đồng hồ đếm ngược (Mô phỏng lật số)
    function startCountdown() {
        const cards = document.querySelectorAll('.flip-card');
        
        setInterval(() => {
            // Đây là nơi bạn sẽ cập nhật giá trị thật từ hệ thống
            // Ở đây tôi chỉ làm hiệu ứng nhấp nháy nhẹ để mô phỏng sự thay đổi
            const randomCard = cards[Math.floor(Math.random() * cards.length)];
            
            randomCard.style.transform = 'rotateX(90deg)';
            randomCard.style.transition = '0.2s';
            
            setTimeout(() => {
                randomCard.style.transform = 'rotateX(0deg)';
            }, 200);

        }, 1000);
    }

    startCountdown();

    </script>
</body>


</html>