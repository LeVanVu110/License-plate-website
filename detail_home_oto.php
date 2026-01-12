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
        .imperial-numerology {
            padding: 80px 20px;
            background: #000;
        }

        .section-title {
            font-family: 'Cinzel', serif;
            font-size: 36px;
            letter-spacing: 5px;
            text-align: center;
            margin-bottom: 60px;
            color: #F2F2F2;
        }

        /* Bento Grid System */
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: minmax(150px, auto);
            /* Cho phép co giãn theo nội dung */
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Khối trung tâm chiếm 2x2 */
        .central-matrix {
            grid-column: span 2;
            grid-row: span 2;
            min-height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 10px;
            background: radial-gradient(circle, #111 0%, #000 100%);
        }

        .card-frosted {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 4px;
            transition: transform 0.3s ease;
        }

        .oracle-circle {
            width: 300px;
            height: 300px;
            border: 1px solid rgba(212, 175, 55, 0.4);
            border-radius: 50%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Typography */
        .grand-score {
            font-family: 'Cinzel', serif;
            font-size: 80px;
            color: #D4AF37;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.5);
        }

        .hexagram-detail h3 {
            font-family: 'Cinzel', serif;
            font-size: 24px;
            color: #D4AF37;
            font-style: italic;
            margin: 15px 0;
        }

        .grid-item p {
            font-family: 'Inter', sans-serif;
            font-size: 17px;
            line-height: 1.8;
            color: #ccc;
        }

        /* Màu xe tương hợp */
        .car-colors {
            display: flex;
            gap: 15px;
            margin: 20px 0;
        }

        .color-dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid rgba(215, 175, 55, 0.5);
        }

        .flying-num {
            position: absolute;
            font-family: 'Cinzel', serif;
            font-weight: bold;
            color: #D4AF37;
            font-size: 28px;
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.8);
            z-index: 5;
        }

        .element-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Nội dung chính bên trong */
        .element-content {
            margin-top: 10px;
        }

        /* Gợi ý màu xe */
        .car-suggestion {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }

        .car-suggestion span {
            font-size: 13px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 12px;
        }

        .dot {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Hiệu ứng khi di chuột vào chấm màu */
        .dot:hover {
            transform: scale(1.2);
            border-color: #D4AF37;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.5);
        }

        /* Tooltip hiện tên màu (tận dụng thuộc tính title) */
        .dot::before {
            content: attr(title);
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 10px;
            color: #fff;
            white-space: nowrap;
            opacity: 0;
            transition: 0.3s;
            pointer-events: none;
            letter-spacing: 1px;
        }

        .dot:hover::before {
            opacity: 1;
            bottom: -25px;
        }

        /* Hiệu ứng bóng đổ riêng cho màu trắng để nổi bật trên nền tối */
        .dot[style*="#E5E4E2"] {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        /* Cụm các chấm màu */
        .color-dots {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .element-main {
            font-family: 'Cinzel', serif;
            font-size: 32px;
            font-weight: 700;
            color: #D4AF37;
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        }

        .hexagram-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Thêm một hiệu ứng ánh sáng chạy ngầm ở góc thẻ */
        .hexagram-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(212, 175, 55, 0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Nhãn KINH DỊCH */
        .hexagram-card .card-tag {
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.5);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 20px;
            border-left: 2px solid #D4AF37;
            padding-left: 10px;
        }

        /* Tên Quẻ: THIÊN HẠ HỮU HỎA */
        .hex-name {
            font-family: 'Cinzel', serif;
            font-size: 26px;
            font-weight: 700;
            color: #D4AF37;
            margin-bottom: 15px;
            letter-spacing: 2px;
            line-height: 1.2;
            /* Hiệu ứng chữ vàng kim loại mờ */
            background: linear-gradient(135deg, #D4AF37 0%, #FBF5B7 50%, #AA771C 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Mô tả quẻ */
        .hex-desc {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            line-height: 1.8;
            color: #CCCCCC;
            font-weight: 300;
            margin: 0;
            /* Giới hạn độ rộng để đọc dễ hơn */
            max-width: 90%;
        }

        /* Hiệu ứng đặc biệt khi hover vào thẻ */
        .hexagram-card:hover .hex-name {
            filter: brightness(1.2) drop-shadow(0 0 10px rgba(212, 175, 55, 0.4));
            transition: 0.4s ease;
        }

        .interaction-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 1px dashed rgba(212, 175, 55, 0.3);
            /* Viền đứt nét tạo cảm giác "vùng quét" */
        }

        .card-tag {
            display: inline-block;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.5);
            /* Màu trắng mờ */
            letter-spacing: 3px;
            /* Giãn chữ tạo vẻ sang trọng */
            text-transform: uppercase;
            margin-bottom: 20px;
            position: relative;
            padding-left: 15px;
        }

        /* Tạo dấu gạch đứng nhỏ phía trước tag để tạo điểm nhấn */
        .card-tag::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 2px;
            height: 12px;
            background: #D4AF37;
            /* Màu vàng Gold */
            box-shadow: 0 0 8px rgba(212, 175, 55, 0.8);
        }

        /* --- TỔNG THỂ ELEMENT-CARD ĐỂ HỖ TRỢ TAG --- */
        .element-card {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            /* Đẩy nội dung lên trên */
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 30px;
            transition: all 0.4s ease;
        }

        /* Hiệu ứng nhẹ khi hover vào card */
        .element-card:hover {
            border-color: rgba(212, 175, 55, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }

        .interaction-card .card-title {
            font-family: 'Cinzel', serif;
            font-size: 20px;
            color: #fff;
            letter-spacing: 2px;
            margin-bottom: 25px;
            text-align: center;
        }

        .input-wrapper {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Ô nhập liệu */
        .birth-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 18px;
            color: #D4AF37;
            text-align: center;
            border-radius: 4px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            letter-spacing: 2px;
            transition: all 0.3s ease;
        }

        .birth-input:focus {
            outline: none;
            background: rgba(212, 175, 55, 0.05);
            border-color: #D4AF37;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
        }

        .birth-input::placeholder {
            color: #555;
            font-size: 12px;
        }

        /* Nút kiểm tra */
        .btn-check-match {
            background: var(--gold-gradient, linear-gradient(135deg, #BF953F, #FCF6BA, #AA771C));
            color: #000;
            border: none;
            padding: 18px;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 2px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-check-match:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
            filter: brightness(1.1);
        }

        .btn-check-match:active {
            transform: translateY(0);
        }

        /* Hiển thị Mobile (Sửa lỗi tràn Grid) */
        @media (max-width: 992px) {
            .bento-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .bento-grid {
                display: flex;
                flex-direction: column;
            }

            .central-matrix {
                height: 400px;
            }

            .grand-score {
                font-size: 50px;
                text-align: center;
                margin-top: 5px;

            }

            .section-title {
                font-size: 26px;
            }

            .interaction-card {
                padding: 40px 20px;
            }

            .btn-check-match {
                padding: 20px;
                /* Nút to hơn trên mobile để dễ chạm */
            }

            .score-label {}
        }

        @media (max-width: 600px) {
            .bento-grid {
                display: flex;
                flex-direction: column;
            }

            .central-matrix {
                min-height: 350px;
            }

            .oracle-circle {
                width: 250px;
                height: 250px;
            }
        }

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
    <section class="imperial-numerology" id="section2">
        <div class="matrix-container">
            <h2 class="section-title">THE IMPERIAL NUMEROLOGY</h2>

            <div class="bento-grid">
                <div class="grid-item central-matrix">
                    <div class="oracle-circle-wrapper">
                        <div class="oracle-circle" id="numberFlow">
                            <div class="center-symbol">☯</div>
                        </div>
                        <div class="decor-circle circle-1"></div>
                        <div class="decor-circle circle-2"></div>
                    </div>
                    <div class="score-display">
                        <span class="score-label">ĐIỂM ĐẠI CÁT</span>
                        <div class="grand-score">9.5</div>
                    </div>
                </div>

                <div class="grid-item card-frosted hexagram-card">
                    <span class="card-tag">KINH DỊCH</span>
                    <h3 class="hex-name">THIÊN HẠ HỮU HỎA</h3>
                    <p class="hex-desc">Quẻ Đại Hữu: Tượng trưng cho sự giàu có cực thịnh, khẳng định vị thế độc tôn và quyền lực vĩnh cửu trong sự nghiệp.</p>
                </div>

                <div class="grid-item card-frosted element-card">
                    <span class="card-tag">NGŨ HÀNH TRƯỜNG KHÍ</span>
                    <div class="element-content">
                        <div class="element-main">HÀNH KIM</div>
                        <div class="car-suggestion">
                            <span>Hợp màu xe:</span>
                            <div class="color-dots">
                                <div class="dot" style="background: #E5E4E2;" title="Trắng Pearl"></div>
                                <div class="dot" style="background: #0D0D0D;" title="Đen Obsidian"></div>
                                <div class="dot" style="background: #152238;" title="Xanh Deep Blue"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid-item card-frosted interaction-card">
                    <h3 class="card-title">SỰ TƯƠNG HỢP CHỦ NHÂN</h3>
                    <div class="input-wrapper">
                        <input type="text" placeholder="NGÀY/THÁNG/NĂM SINH" class="birth-input">
                        <button class="btn-check-match">KIỂM TRA HỢP MỆNH</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Lấy dữ liệu biển số từ PHP (hoặc mặc định)
        const rawPlate = "<?php echo isset($_GET['plate']) ? $_GET['plate'] : '30K-999.99'; ?>";
        const cleanPlate = rawPlate.replace(/[^a-zA-Z0-9]/g, ""); // Chỉ lấy chữ và số
        const numberContainer = document.getElementById('numberFlow');
        const plateArray = cleanPlate.split('');

        // 2. Tạo các số và tính toán vị trí vòng tròn
        plateArray.forEach((char, i) => {
            const span = document.createElement('span');
            span.innerText = char;
            span.className = 'flying-num';
            numberContainer.appendChild(span);

            // Bán kính vòng tròn
            const radius = window.innerWidth < 768 ? 100 : 130;
            const angle = (i / plateArray.length) * Math.PI * 2 - Math.PI / 2;
            const xPos = Math.cos(angle) * radius;
            const yPos = Math.sin(angle) * radius;

            // Animation bay vào
            gsap.fromTo(span, {
                x: 0,
                y: 0,
                opacity: 0,
                scale: 0
            }, {
                x: xPos,
                y: yPos,
                opacity: 1,
                scale: 1,
                duration: 1.2,
                delay: 0.5 + (i * 0.1),
                ease: "expo.out",
                scrollTrigger: {
                    trigger: "#section2",
                    start: "top 70%"
                }
            });
        });

        // 3. Hiệu ứng Hover 3D cho các thẻ Card (Desktop)
        if (window.innerWidth > 1024) {
            document.querySelectorAll('.card-frosted').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = (e.clientX - rect.left) / rect.width - 0.5;
                    const y = (e.clientY - rect.top) / rect.height - 0.5;
                    gsap.to(card, {
                        rotationY: x * 10,
                        rotationX: -y * 10,
                        transformPerspective: 1000,
                        ease: "power2.out",
                        duration: 0.4
                    });
                });
                card.addEventListener('mouseleave', () => {
                    gsap.to(card, {
                        rotationY: 0,
                        rotationX: 0,
                        duration: 0.5
                    });
                });
            });
        }

        // 4. Hiệu ứng mạch đập cho vòng tròn trung tâm
        gsap.to(".oracle-circle-wrapper", {
            boxShadow: "0 0 50px rgba(212, 175, 55, 0.2)",
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });
    });
    document.querySelector('.btn-check-match').addEventListener('click', function() {
        this.innerText = "ĐANG GIẢI MÃ...";
        this.style.opacity = "0.7";

        // Giả lập quét dữ liệu trong 1.5s
        setTimeout(() => {
            this.innerText = "KIỂM TRA HỢP MỆNH";
            this.style.opacity = "1";
            alert("Biển số này ĐẠI CÁT với bản mệnh của bạn!");
        }, 1500);
    });
    // ---------------------------- section 3------------------------------ //
    // ---------------------------- section 4------------------------------ //
    // ---------------------------- section 5------------------------------ //
</script>

</html>