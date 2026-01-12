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
        /* --- SECTION 3: THE PRESTIGE DRIVE --- */
        .prestige-drive {
            background: #050505;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            color: #fff;
            padding: 60px 0;
        }

        /* Lớp phủ ánh đèn hắt từ sàn garage */
        .garage-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: radial-gradient(ellipse at bottom, rgba(212, 175, 55, 0.12), transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        .prestige-container {
            display: grid;
            grid-template-columns: 35% 65%;
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 5%;
            z-index: 10;
            position: relative;
        }

        /* --- SIDEBAR & TYPOGRAPHY --- */
        .prestige-sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .prestige-sidebar .section-title {
            font-family: 'Cinzel', serif;
            font-size: 36px;
            letter-spacing: 5px;
            color: #fff;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
        }

        #carName {
            font-family: 'Inter', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: #D4AF37;
            /* Gold */
            letter-spacing: 2px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        #carDesc {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            line-height: 1.8;
            color: #888;
            margin-bottom: 40px;
            max-width: 90%;
        }

        /* --- CAR SELECTOR (SILHOUETTE) --- */
        .car-selector {
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-bottom: 40px;
        }

        .select-item {
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer;
            opacity: 0.3;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 10px;
            border-radius: 8px;
        }

        .select-item.active {
            opacity: 1;
            background: rgba(212, 175, 55, 0.05);
            transform: translateX(10px);
        }

        .select-item span {
            font-size: 13px;
            letter-spacing: 3px;
            font-weight: 600;
        }

        .silhouette {
            width: 80px;
            height: 40px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: brightness(0) invert(1);
            /* Biến icon thành màu trắng */
        }

        /* --- CUSTOM OPTIONS (FRAME & LIGHT) --- */
        .custom-frame {
            margin-bottom: 30px;
        }

        .custom-frame .label {
            display: block;
            font-size: 12px;
            letter-spacing: 2px;
            color: #555;
            margin-bottom: 15px;
        }

        .frame-options {
            display: flex;
            gap: 10px;
        }

        .frame-btn {
            background: transparent;
            border: 1px solid #333;
            color: #fff;
            padding: 8px 15px;
            font-size: 11px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
        }

        .frame-btn.active,
        .frame-btn:hover {
            border-color: #D4AF37;
            color: #D4AF37;
        }

        .light-toggle-wrap {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 12px;
            letter-spacing: 1px;
            color: #888;
        }

        /* --- SHOWROOM DISPLAY (CAR & PLATE) --- */
        .showroom-display {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1500px;
        }

        .car-visual-wrap {
            position: relative;
            width: 100%;
            transition: transform 0.1s ease-out;
        }

        .car-img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 20px 50px rgba(0, 0, 0, 0.8));
        }

        /* Biển số 3D gắn trên xe */
        .dynamic-plate {
            position: absolute;
            /* Vị trí sẽ được JS điều khiển tùy theo xe */
            width: 160px;
            height: 35px;
            background: #fff;
            border-radius: 2px;
            padding: 1px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            z-index: 50;
            /* overflow: hidden; */
        }

        .plate-inner {
            width: 100%;
            height: 100%;
            background: #fff;
            border: 2px solid #D4AF37;
            /* Mặc định khung vàng */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .plate-text {
            font-family: 'Inter', sans-serif;
            color: #000;
            font-weight: 900;
            font-size: 18px;
            letter-spacing: 1px;
        }

        /* Hiệu ứng đèn soi biển số ban đêm */
        .plate-glow {
            position: absolute;
            top: -20px;
            /* Đẩy lên trên mép biển số một chút */
            left: 50%;
            transform: translateX(-50%);
            width: 120%;
            /* Rộng hơn biển số để tỏa sáng sang hai bên */
            height: 40px;
            /* Hiệu ứng tỏa sáng màu vàng nắng nhạt cực sang */
            background: radial-gradient(ellipse at center, rgba(255, 255, 200, 0.8) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease, filter 0.4s ease;
            pointer-events: none;
            z-index: 10;
        }

        /* Hiệu ứng khi đèn bật: Thêm độ lóa cho toàn bộ biển số */
        .light-active .plate-glow {
            opacity: 1;
            filter: blur(2px);
        }

        .light-active.plate-inner {
            box-shadow: 0 0 20px rgba(255, 255, 190, 0.4), 0 5px 15px rgba(0, 0, 0, 0.5);
            border-color: #FFF6A5 !important;
            /* Làm viền sáng rực lên */
        }

        .light-on .plate-glow {
            opacity: 1;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 22px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #333;
            transition: .4s;
            border-radius: 34px;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 3px;
            bottom: 2px;
            background-color: #fff;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        /* Khi gạt nút sang phải */
        input:checked+.slider {
            background-color: #D4AF37;
        }

        input:checked+.slider:before {
            transform: translateX(22px);
            background-color: #000;
        }

        /* --- TỐI ƯU RESPONSIVE SECTION 3 --- */
        @media (max-width: 1024px) {
            .prestige-container {
                display: flex !important;
                flex-direction: column !important;
                padding: 0 15px !important;
                width: 100% !important;
                box-sizing: border-box;
            }

            .prestige-sidebar {
                width: 100% !important;
                text-align: center;
                order: 2;
                /* Đưa chữ xuống dưới */
            }

            .showroom-display {
                width: 100% !important;
                order: 1;
                /* Đưa xe lên đầu */
                min-height: 250px !important;
                margin-bottom: 20px;
            }

            /* Thanh chọn xe dàn hàng ngang */
            /* --- FIX TRÀN CHO CAR SELECTOR --- */
            .car-selector {
                display: flex;
                gap: 15px;
                width: 100%;
                /* Cho phép cuộn ngang nếu nội dung vượt quá chiều rộng màn hình */
                overflow-x: auto;
                /* Ẩn thanh cuộn xấu xí trên các trình duyệt */
                -ms-overflow-style: none;
                scrollbar-width: none;
                padding: 10px 5px;
                /* Đảm bảo các item không bị co lại quá mức */
                flex-wrap: nowrap;
                -webkit-overflow-scrolling: touch;
                /* Cuộn mượt trên iPhone */
            }

            .car-selector::-webkit-scrollbar {
                display: none;
                /* Ẩn thanh cuộn trên Chrome/Safari */
            }

            .select-item {
                /* Quan trọng: Ngăn các item bị bóp méo chiều rộng */
                flex: 0 0 auto;
                display: flex;
                flex-direction: column;
                /* Chuyển icon lên trên chữ để tiết kiệm diện tích ngang */
                align-items: center;
                justify-content: center;
                min-width: 100px;
                /* Độ rộng tối thiểu vừa đủ cho Mobile */
                text-align: center;
                padding: 10px;
                background: rgba(255, 255, 255, 0.03);
                border-radius: 8px;
                border: 1px solid rgba(255, 255, 255, 0.05);
            }

            .select-item.active {
                transform: translateY(-5px) !important;
                /* Hiệu ứng nổi lên thay vì lướt sang phải */
                /* height: 50px; */
            }

            .select-item span {
                font-size: 10px !important;
                /* Thu nhỏ chữ một chút trên Mobile */
                margin-top: 8px;
                white-space: nowrap;
                /* Giữ chữ trên 1 dòng */
            }

            .silhouette {
                width: 50px !important;
                /* Thu nhỏ icon xe */
                height: 25px !important;
            }

            /* Hiệu ứng Active cho Mobile */
            .select-item.active {
                background: rgba(212, 175, 55, 0.1);
                border-color: #D4AF37;
                transform: scale(1.05);
            }

            #carDesc {
                margin: 0 auto 30px;
            }

            .frame-options {
                justify-content: center;
            }

            .light-toggle-wrap {
                justify-content: center;
            }

            .showroom-display {
                order: 1;
                min-height: 300px;
            }
        }

        @media (max-width: 480px) {
            .dynamic-plate {
                width: 110px;
                height: 25px;
            }

            .plate-text {
                font-size: 13px;
            }

            .silhouette {
                width: 60px;
            }
        }

        @media (max-width: 600px) {

            /* Thu nhỏ biển số trên xe để cân đối */
            .dynamic-plate {
                width: 110px !important;
                height: 25px !important;
            }

            .plate-text {
                font-size: 13px !important;
            }

            .car-img {
                max-width: 100% !important;
                height: auto !important;
            }
        }

        @media (max-width: 768px) {
            .prestige-sidebar .section-title {
                font-size: 26px;
                letter-spacing: 3px;
            }

            #carName {
                font-size: 22px;
            }

            /* Thu nhỏ biển số để vừa với đuôi xe trên màn hình nhỏ */
            .dynamic-plate {
                width: 120px !important;
                height: 28px !important;
            }

            .plate-text {
                font-size: 13px !important;
            }

            .silhouette {
                width: 60px;
                height: 30px;
            }
        }

        /* --- RESPONSIVE SECTION 2 --- */
        @media (max-width: 992px) {
            .bento-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                /* Máy tính bảng hiện 2 cột */
            }
        }

        @media (max-width: 767px) {
            .imperial-numerology {
                padding: 40px 15px !important;
                overflow: hidden;
                /* Ngăn chặn số bay ra ngoài */
            }

            .bento-grid {
                display: flex !important;
                flex-direction: column !important;
                /* Điện thoại hiện 1 cột dọc */
                gap: 15px !important;
            }

            .central-matrix {
                min-height: 300px !important;
                padding: 20px !important;
            }

            /* Thu nhỏ vòng tròn số để không chạm mép */
            .oracle-circle-wrapper {
                width: 250px !important;
                height: 250px !important;
            }

            .grand-score {
                font-size: 50px !important;
            }
        }

        /* Ẩn thanh cuộn của car-selector trên Mobile để đẹp hơn */
        .car-selector::-webkit-scrollbar {
            display: none;
        }

        .car-selector {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        html,
        body {
            overflow-x: hidden;
            /* Khóa hoàn toàn tràn ngang */
            width: 100%;
            margin: 0;
            padding: 0;
        }

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
    <section class="prestige-drive" id="section3">
        <div class="garage-overlay"></div>

        <div class="prestige-container">
            <div class="prestige-sidebar">
                <h2 class="section-title">THE PRESTIGE DRIVE</h2>

                <div class="car-selector">
                    <div class="select-item active" data-car="sedan">
                        <div class="silhouette sedan-icon">
                            <svg viewBox="0 0 100 40" fill="currentColor">
                                <path d="M10,30 Q10,20 30,20 L70,20 Q90,20 90,30 Z M25,30 A5,5 0 1,1 24.9,30 Z M75,30 A5,5 0 1,1 74.9,30 Z" />
                            </svg>
                        </div>
                        <span>LUXURY SEDAN</span>
                    </div>

                    <div class="select-item" data-car="suv">
                        <div class="silhouette suv-icon">
                            <svg viewBox="0 0 100 40" fill="currentColor">
                                <path d="M5,30 L5,15 L30,15 L40,10 L85,10 L95,20 L95,30 Z M25,30 A6,6 0 1,1 24.9,30 Z M75,30 A6,6 0 1,1 74.9,30 Z" />
                            </svg>
                        </div>
                        <span>POWERFUL SUV</span>
                    </div>

                    <div class="select-item" data-car="supercar">
                        <div class="silhouette supercar-icon">
                            <svg viewBox="0 0 100 40" fill="currentColor">
                                <path d="M5,30 Q20,10 50,10 Q80,10 95,30 Z M30,30 A4,4 0 1,1 29.9,30 Z M70,30 A4,4 0 1,1 69.9,30 Z" />
                            </svg>
                        </div>
                        <span>SUPERCAR</span>
                    </div>
                </div>

                <div class="car-info">
                    <h3 id="carName">MAYBACH S680</h3>
                    <p id="carDesc">Sự kết hợp hoàn hảo giữa quyền uy và lịch lãm. Biển số ngũ quý giúp khẳng định vị thế chủ nhân trong các cuộc gặp gỡ thượng lưu.</p>

                    <div class="custom-frame">
                        <span class="label">TÙY CHỈNH KHUNG BIỂN</span>
                        <div class="frame-options">
                            <button class="frame-btn active" data-frame="gold">VÀNG 24K</button>
                            <button class="frame-btn" data-frame="carbon">CARBON</button>
                            <button class="frame-btn" data-frame="inox">INOX</button>
                        </div>
                    </div>

                    <div class="light-toggle-wrap">
                        <span>ĐÈN SOI BIỂN SỐ</span>
                        <label class="switch">
                            <input type="checkbox" id="plateLight">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="showroom-display">
                <div class="car-visual-wrap" id="carVisual">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070" alt="Car" class="car-img" id="mainCarImg">

                    <div class="dynamic-plate" id="virtualPlate">
                        <div class="plate-glow"></div>
                        <div class="plate-inner">
                            <div class="plate-text">30K - 999.99</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    document.addEventListener("DOMContentLoaded", function() {
        const isMobile = window.innerWidth <= 768;
        const carData = {
            sedan: {
                name: "MAYBACH S680",
                desc: "Sự kết hợp hoàn hảo giữa quyền uy và lịch lãm. Biển số giúp khẳng định vị thế chủ nhân.",
                img: "https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070",
                platePos: isMobile ? {
                    bottom: "28%",
                    right: "32%",
                    rotateY: "-15deg",
                    scale: 0.8
                } : {
                    bottom: "25%",
                    right: "35%",
                    rotateY: "-15deg",
                    scale: 1
                }
            },
            suv: {
                name: "G-CLASS EDITION",
                desc: "Biểu tượng của quyền lực và sự thống trị. Biển số phong thủy tạo thế đứng vững chãi.",
                img: "https://images.unsplash.com/photo-1520031441872-265e4ff70366?q=80&w=2000",
                platePos: isMobile ? {
                    bottom: "38%",
                    right: "42%",
                    rotateY: "0deg",
                    scale: 0.8
                } : {
                    bottom: "35%",
                    right: "45%",
                    rotateY: "0deg",
                    scale: 1
                }
            },
            supercar: {
                name: "LAMBORGHINI REVUELTO",
                desc: "Dành cho những tâm hồn khao khát tốc độ và sự khác biệt tuyệt đối.",
                img: "https://images.unsplash.com/photo-1544636331-e26879cd4d9b?q=80&w=2070",
                platePos: isMobile ? {
                    bottom: "20%",
                    right: "38%",
                    rotateY: "-15deg",
                    scale: 0.8
                } : {
                    bottom: "15%",
                    right: "40%",
                    rotateY: "-15deg",
                    scale: 1
                }
            }
        };

        const selectItems = document.querySelectorAll('.select-item');
        const virtualPlate = document.getElementById('virtualPlate');
        const mainImg = document.getElementById('mainCarImg');

        selectItems.forEach(item => {
            item.addEventListener('click', function() {
                const carType = this.dataset.car;
                const data = carData[carType];

                // 1. Morphing Animation
                gsap.to(mainImg, {
                    opacity: 0,
                    x: -50,
                    duration: 0.4,
                    onComplete: () => {
                        mainImg.src = data.img;
                        gsap.to(mainImg, {
                            opacity: 1,
                            x: 0,
                            duration: 0.6,
                            ease: "power2.out"
                        });
                    }
                });

                // 2. Biển số "bay" sang vị trí mới
                gsap.to(virtualPlate, {
                    bottom: data.platePos.bottom,
                    right: data.platePos.right,
                    rotateY: data.platePos.rotateY,
                    scale: data.platePos.scale, // Thêm dòng này
                    duration: 0.8,
                    ease: "back.out(1.2)"
                });

                // Update Text
                document.getElementById('carName').innerText = data.name;
                document.getElementById('carDesc').innerText = data.desc;

                // Active State
                selectItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // 3. 360 Depth Effect (Mouse Move)
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.pageX) / 30;
            const y = (window.innerHeight / 2 - e.pageY) / 80;
            gsap.to("#carVisual", {
                rotationY: x,
                rotationX: -y,
                duration: 1
            });
        });

        // 4. Custom Frame Logic
        document.querySelectorAll('.frame-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const frame = this.dataset.frame;
                const plateInner = document.querySelector('.plate-inner');

                if (frame === 'gold') plateInner.style.borderColor = "#D4AF37";
                else if (frame === 'carbon') plateInner.style.borderColor = "#222";
                else plateInner.style.borderColor = "#ccc";

                document.querySelectorAll('.frame-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    document.getElementById('plateLight').addEventListener('change', function() {
        const virtualPlate = document.getElementById('virtualPlate');
        const plateInner = document.querySelector('.plate-inner');
        const plateGlow = document.querySelector('.plate-glow');

        if (this.checked) {
            // Thêm class cho cả khung và hiệu ứng ánh sáng
            virtualPlate.classList.add('light-active');
            plateInner.classList.add('light-active');
            if (plateGlow) plateGlow.style.opacity = '1';

            // Hiệu ứng lóe sáng tức thì khi bật (Cinematic)
            gsap.fromTo(plateGlow, {
                opacity: 0,
                scaleX: 0.5
            }, {
                opacity: 1,
                scaleX: 1,
                duration: 0.3
            });
        } else {
            plateInner.classList.remove('light-active');
            if (plateGlow) plateGlow.style.opacity = '0';
        }
    });
    window.addEventListener('resize', () => {
        // Gọi lại hàm cập nhật vị trí biển số nếu cần
        location.reload(); // Cách đơn giản nhất để các tọa độ % tính toán lại
    });
    // ---------------------------- section 4------------------------------ //
    // ---------------------------- section 5------------------------------ //
</script>

</html>