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
    <style>
        :root {
            --matte-black: #0D0D0D;
            --chrome-silver: linear-gradient(145deg, #e6e6e6, #808080);
            --gold-power: #D4AF37;
            --plate-font: 'Alumni Sans', sans-serif;
            /* Font mô phỏng font biển số */
            --color-kim: #FFFFFF;
            /* Trắng bạc */
            --color-thuy: #2196F3;
            /* Xanh dương */
            --color-moc: #4CAF50;
            /* Xanh lá */
            --color-hoa: #F44336;
            /* Đỏ rực */
            --gold: #D4AF37;
            --silver: #E5E4E2;
            --neon-red: #ff3131;
            --dark-bg: #050505;
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

            .btn-contact {
                margin-top: 0 !important;
            }
        }

        /* --------------------------- section 2 ---------------------------------  */
        .numerology-spirit {
            background-color: #050505;
            padding: 100px 0;
            color: #fff;
            position: relative;
            overflow: hidden;
            height: 150vh;

        }

        .sacred-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .spirit-title {
            font-family: 'EB Garamond', serif;
            font-size: 36px;
            letter-spacing: 5px;
            color: #E5E5E5;
        }

        .title-underline {
            width: 60px;
            height: 1px;
            background: var(--gold-primary);
            margin: 20px auto;
        }

        .spirit-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        /* Visual Geometry */
        .sacred-geometry {
            position: relative;
            width: 100%;
            max-width: 500px;
            aspect-ratio: 1/1;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Vòng tròn SVG và các đường line mảnh */
        .elements-circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .outer-ring {
            stroke: rgba(212, 175, 55, 0.2);
            stroke-width: 1;
            fill: none;
        }

        .lines {
            stroke: rgba(212, 175, 55, 0.15);
            stroke-width: 0.8;
            stroke-dasharray: 4 4;
            /* Tạo đường đứt nét như hình */
        }

        /* Các điểm nút (Nodes) Gold */
        .element-node {
            fill: #1A1A1A;
            stroke: var(--gold-primary);
            stroke-width: 2;
            transition: all 0.4s ease;
            filter: drop-shadow(0 0 5px rgba(212, 175, 55, 0.5));
        }

        .element-node:hover {
            fill: var(--gold-primary);
            filter: drop-shadow(0 0 10px var(--gold-primary));
        }

        /* Tìm và sửa lại class này */
        .pulse-energy {
            position: absolute;
            top: 50% !important;
            /* Cố định vị trí 50% */
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            /* Luôn giữ tâm */
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, #D4AF37 0%, #000 100%);
            border-radius: 50%;
            z-index: 1;
            box-shadow: 0 0 50px rgba(212, 175, 55, 0.3);
        }

        /* Hiệu ứng xung quanh quả cầu */
        .pulse-energy::after {
            content: '';
            position: absolute;
            inset: -20px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%);
            animation: energy-glow 3s infinite alternate;
        }

        @keyframes energy-glow {
            from {
                opacity: 0.4;
                transform: scale(1);
            }

            to {
                opacity: 0.8;
                transform: scale(1.2);
            }
        }

        @keyframes energy-pulse {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.8;
            }

            100% {
                transform: translate(-50%, -50%) scale(15);
                opacity: 0;
            }
        }

        /* Analysis Cards */
        .info-card {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.03);
            border-left: 2px solid var(--gold-primary);
            padding: 30px;
            margin-bottom: 25px;
            transition: 0.4s;
        }

        .num-digit {
            font-family: 'EB Garamond', serif;
            font-size: 48px;
            color: var(--gold-primary);
            margin-right: 30px;
        }

        .num-detail h3 {
            font-family: 'EB Garamond', serif;
            font-size: 18px;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .num-detail p {
            font-size: 14px;
            color: #D1D1D1;
            line-height: 1.6;
        }

        /* Score Block */
        .score-circle-wrap {
            margin-top: 50px;
            text-align: center;
        }

        .score-number {
            font-family: 'EB Garamond', serif;
            font-size: 60px;
            color: var(--gold-primary);
            display: block;
            text-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
        }

        .bike-suggest {
            font-size: 14px;
            color: #666;
            margin-top: 15px;
        }

        .bike-suggest span {
            color: var(--gold-primary);
        }

        /* Styling cho nút Chia sẻ Quẻ số */
        .btn-share-spirit {
            margin-top: 40px;
            background: transparent;
            color: var(--gold-primary);
            border: 1px solid rgba(212, 175, 55, 0.4);
            padding: 18px 45px;
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;
            margin-left: 190px;
        }

        /* Hiệu ứng lớp nền bóng mờ khi hover */
        .btn-share-spirit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(212, 175, 55, 0.2),
                    transparent);
            transition: all 0.6s;
            z-index: -1;
        }

        .btn-share-spirit:hover {
            color: #000;
            background-color: var(--gold-primary);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
            border-color: var(--gold-primary);
        }

        .btn-share-spirit:hover::before {
            left: 100%;
        }

        /* Khối tính toán hợp mệnh */
        .compatibility-box {
            position: absolute;
            top: 105%;
            /* Nằm dưới đáy vòng tròn */
            width: 100%;
            max-width: 320px;
            background: rgba(255, 255, 255, 0.02);
            padding: 20px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            z-index: 5;
        }

        /* Ô nhập năm sinh */
        #birthYear {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #444;
            color: var(--gold-primary);
            padding: 10px 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            margin-bottom: 20px;
            outline: none;
            transition: border-color 0.3s;
        }

        #birthYear:focus {
            border-bottom-color: var(--gold-primary);
        }

        #birthYear::placeholder {
            color: #666;
            font-size: 14px;
        }

        /* Thanh tiến trình (Progress Bar) */
        .progress-container {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            width: 0%;
            /* Sẽ được GSAP điều khiển */
            height: 100%;
            background: linear-gradient(90deg, #CD7F32, #D4AF37);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.5);
            position: relative;
        }

        /* Hiệu ứng ánh sáng chạy dọc thanh progress */
        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 30px;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shine-progress 2s infinite;
        }

        @keyframes shine-progress {
            0% {
                left: -30px;
            }

            100% {
                left: 100%;
            }
        }

        /* Văn bản hiển thị % */
        .comp-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            color: #888;
            letter-spacing: 1px;
        }

        #compVal {
            color: var(--gold-primary);
            font-weight: bold;
            font-size: 18px;
        }

        /* Nhãn tên */
        .element-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 10;
            pointer-events: none;
            text-align: center;
            width: 100%;
        }

        .element-label.active {
            opacity: 1;
            /* top: 42%; */
            transform: translate(-50%, -180%);
            /* Nhích nhẹ lên khi hiện */
        }

        /* Các lớp màu động sẽ được JS thêm vào */
        .label-kim {
            color: var(--color-kim);
            text-shadow: 0 0 20px var(--color-kim);
        }

        .label-thuy {
            color: var(--color-thuy);
            text-shadow: 0 0 20px var(--color-thuy);
        }

        .label-moc {
            color: var(--color-moc);
            text-shadow: 0 0 20px var(--color-moc);
        }

        .label-hoa {
            color: var(--color-hoa);
            text-shadow: 0 0 20px var(--color-hoa);
        }

        /* --- Styling cho nút Liên Hệ / Tư vấn --- */
        .btn-contact {
            position: relative;
            display: inline-block;
            padding: 16px 40px;
            margin-top: 25px;
            background: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: 1;
        }

        /* Hiệu ứng lớp nền chạy khi hover */
        .btn-contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gold-primary);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: -1;
        }

        .btn-contact:hover {
            color: #000;
            /* Chữ chuyển sang đen trên nền vàng */
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
            transform: translateY(-3px);
        }

        .btn-contact:hover::before {
            left: 0;
        }

        .btn-contact:active {
            transform: translateY(-1px);
        }

        /* Hiệu ứng tia sáng quét qua nút (Shine Effect) */
        .btn-contact::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.4);
            transform: rotate(30deg);
            transition: none;
            pointer-events: none;
        }

        .btn-contact:hover::after {
            left: 150%;
            transition: all 0.8s ease-in-out;
        }

        .spirit-analysis {
            opacity: 0;
            transform: translateY(30px);
            transition: none;
            /* Tránh việc chiếm chỗ khi chưa hiện */
        }

        /* Responsive */
        @media (max-width: 768px) {
            .spirit-layout {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .spirit-visual {
                order: 2;
            }

            .spirit-analysis {
                order: 1;
            }

            .spirit-title {
                font-size: 26px;
            }

            .score-number {
                font-size: 40px;
            }

            .info-card {
                padding: 20px;
            }

            .btn-share-spirit {
                width: 100%;
                /* Full width trên mobile để dễ chạm */
                padding: 15px 0;
                margin-top: 30px;
            }

            .pulse-energy {
                width: 70px;
                height: 70px;
            }

            .compatibility-box {
                bottom: -150px;
            }

            .btn-share-spirit {
                margin-left: 0 !important;
            }

        }

        /* --------------------------- section 3 ---------------------------------  */
        /* --- SECTION 3: THE VIRTUAL GARAGE --- */
        .lifestyle-preview {
            background: #000;
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            color: #fff;
        }

        .led-strip {
            position: absolute;
            top: 10%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.4), transparent);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
        }

        .showroom-slider {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vehicle-images {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1200px;
            /* Tạo chiều sâu cho hiệu ứng xoay xe */
        }

        .bike-img {
            position: absolute;
            max-height: 80%;
            opacity: 0;
            transform: translateX(150px) rotateY(-30deg);
            transition: all 1s cubic-bezier(0.19, 1, 0.22, 1);
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.9));
        }

        .bike-img.active {
            opacity: 1;
            transform: translateX(0) rotateY(0);
        }

        /* Biển số gắn trên xe */
        .dynamic-plate-wrap {
            position: absolute;
            z-index: 20;
            top: 52%;
            /* Điều chỉnh tọa độ theo vị trí đuôi xe */
            left: 45%;
            pointer-events: none;
        }

        .plate-mini {
            background: #fff;
            color: #000;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: 800;
            border: 1.5px solid #222;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .plate-mini .p-top {
            font-size: 10px;
            border-bottom: 1px solid #ddd;
        }

        .plate-mini .p-bottom {
            font-size: 16px;
        }

        /* Nút mũi tên điều hướng */
        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #444;
            font-size: 50px;
            cursor: pointer;
            transition: 0.3s;
            z-index: 100;
        }

        .nav-arrow:hover {
            color: var(--gold-primary);
        }

        .prev-bike {
            left: 20px;
        }

        .next-bike {
            right: 20px;
        }

        /* Thông tin xe */
        .vehicle-info {
            position: absolute;
            bottom: 10%;
            width: 100%;
            text-align: center;
        }

        .vehicle-info h3 {
            font-size: 32px;
            letter-spacing: 3px;
            margin: 0;
            text-transform: uppercase;
        }

        .vehicle-info p {
            color: #888;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Phân trang (Dots) */
        .dots-container {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 20px;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #333;
            cursor: pointer;
            transition: 0.3s;
        }

        .dot.active {
            background: var(--gold-primary);
            box-shadow: 0 0 10px var(--gold-primary);
        }

        /* Nút AI Preview */
        .btn-ai-preview {
            background: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            padding: 15px 35px;
            font-weight: bold;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.4s;
            text-transform: uppercase;
        }

        .btn-ai-preview:hover {
            background: var(--gold-primary);
            color: #000;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        }

        /* --- RESPONSIVE SECTION 3 --- */
        @media (max-width: 768px) {
            .lifestyle-preview {
                height: auto;
                padding: 60px 0;
                flex-direction: column;
                /* Chuyển sang bố cục dọc */
            }

            .showroom-slider {
                height: 350px;
                /* Thu nhỏ chiều cao khu vực xe */
                margin-bottom: 20px;
            }

            .bike-img {
                max-height: 70%;
                /* Giảm kích thước ảnh xe */
                width: 90%;
                object-fit: contain;
            }

            /* Điều chỉnh biển số nhỏ lại trên Mobile */
            .plate-mini {
                padding: 3px 6px;
                border-width: 1px;
            }

            .plate-mini .p-top {
                font-size: 8px;
            }

            .plate-mini .p-bottom {
                font-size: 12px;
            }

            /* Nút điều hướng Mobile */
            .nav-arrow {
                font-size: 35px;
                padding: 10px;
                background: rgba(0, 0, 0, 0.3);
                /* Thêm nền mờ để dễ bấm */
                border-radius: 50%;
            }

            .vehicle-info {
                position: relative;
                /* Đưa text xuống dưới slider */
                bottom: 0;
                padding: 0 20px;
            }

            .vehicle-info h3 {
                font-size: 20px;
                letter-spacing: 1px;
            }

            .vehicle-info p {
                font-size: 13px;
                line-height: 1.5;
            }

            .btn-ai-preview {
                width: 100%;
                /* Nút AI dài hết màn hình trên mobile */
                padding: 12px 20px;
                font-size: 12px;
            }
        }

        /* --------------------------- section 4 ---------------------------------  */
        .vip-concierge {
            background: #000;
            padding: 120px 0;
            color: #fff;
            overflow: hidden;
        }

        .concierge-container {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 80px;
            padding: 0 40px;
        }

        /* VIP Card Styling */
        .vip-visual {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .vip-card-wrap {
            perspective: 1500px;
            margin-bottom: 50px;
        }

        .vip-card {
            width: 400px;
            height: 240px;
            background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            position: relative;
            padding: 30px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8);
            transform-style: preserve-3d;
        }

        .card-shine {
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, transparent 60%);
            pointer-events: none;
        }

        .card-logo {
            font-size: 12px;
            letter-spacing: 4px;
            color: var(--gold-power);
        }

        .card-holder {
            margin-top: 60px;
        }

        .card-holder span {
            font-size: 10px;
            color: #666;
            letter-spacing: 2px;
        }

        .holder-name {
            font-size: 32px;
            font-weight: bold;
            color: #fff;
            margin-top: 5px;
        }

        .keyring-preview {
            text-align: center;
            opacity: 0.6;
        }

        .keyring-img {
            width: 120px;
            filter: drop-shadow(0 10px 15px #000);
        }

        .keyring-preview p {
            font-size: 13px;
            color: #888;
            margin-top: 10px;
        }

        /* Ownership Process Styling */
        .vip-title {
            font-family: 'EB Garamond', serif;
            font-size: 36px;
            letter-spacing: 4px;
            margin-bottom: 60px;
        }

        .process-path {
            position: relative;
            margin-bottom: 50px;
        }

        .path-line {
            position: absolute;
            left: 20px;
            top: 0;
            width: 2px;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
        }

        .path-progress {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 0%;
            background: var(--gold-power);
            box-shadow: 0 0 15px var(--gold-power);
        }

        .step-item {
            position: relative;
            padding-left: 60px;
            margin-bottom: 40px;
            cursor: pointer;
        }

        .step-icon {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            background: #000;
            border: 1px solid #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #555;
            z-index: 2;
            transition: 0.4s;
        }

        .step-item.active .step-icon {
            border-color: var(--gold-power);
            color: var(--gold-power);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.4);
        }

        .step-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .step-item.active h3 {
            color: var(--gold-power);
        }

        .step-detail {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .step-item.active .step-detail {
            max-height: 200px;
            opacity: 1;
            margin-top: 15px;
        }

        .step-detail p {
            font-size: 15px;
            color: #999;
            line-height: 1.6;
        }

        .legal-info {
            font-size: 12px;
            color: var(--gold-power);
            display: block;
            margin-top: 10px;
            opacity: 0.7;
        }

        .btn-vip-contact {
            width: 100%;
            padding: 20px;
            background: transparent;
            border: 1px solid var(--gold-power);
            color: #fff;
            letter-spacing: 3px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: inset 0 0 0 0 var(--gold-power);
        }

        .btn-vip-contact:hover {
            background: var(--gold-power);
            color: #000;
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.3);
        }

        /* --- MOBILE RESPONSIVE --- */
        @media (max-width: 992px) {
            .concierge-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .vip-card {
                width: 100%;
                max-width: 350px;
                height: 210px;
            }

            .vip-title {
                font-size: 26px;
                text-align: center;
            }

            .btn-vip-contact {
                /* position: fixed; */
                bottom: 0;
                left: 0;
                z-index: 999;
                background: #111;
                border-top: 1px solid var(--gold-power);
            }
        }

        /* --------------------------- section 5 ---------------------------------  */
        .market-pulse {
            background: #050505;
            padding: 100px 0;
            color: #fff;
        }

        .market-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .market-title {
            font-family: 'EB Garamond', serif;
            font-size: 36px;
            letter-spacing: 4px;
            margin-bottom: 60px;
            color: #fdfdfd;
        }

        .market-dashboard {
            display: grid;
            grid-template-columns: 6fr 4fr;
            gap: 40px;
            align-items: start;
        }

        /* Chart Styles */
        .chart-area {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 4px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .label {
            font-size: 14px;
            letter-spacing: 2px;
            color: #888;
            text-transform: uppercase;
        }

        .growth-badge {
            color: #4CAF50;
            font-weight: bold;
            font-size: 14px;
        }

        /* Hiệu ứng nhịp đập Pulse */
        .pulse-growth {
            text-shadow: 0 0 10px rgba(76, 175, 80, 0.5);
            animation: pulseGlow 2s infinite;
        }

        @keyframes pulseGlow {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.6;
            }

            100% {
                opacity: 1;
            }
        }

        .canvas-container {
            height: 400px;
            width: 100%;
        }

        /* Stats Styles */
        .main-valuation {
            margin-bottom: 40px;
        }

        .value-wrap {
            font-size: 56px;
            font-weight: 800;
            color: var(--gold-power);
            margin: 10px 0;
        }

        .currency {
            font-size: 24px;
            margin-left: 10px;
            opacity: 0.7;
        }

        .description {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .indicators-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
        }

        .ind-item {
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-left: 2px solid var(--gold-power);
        }

        .ind-val {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
        }

        .ind-desc {
            font-size: 13px;
            color: #555;
        }

        .comparison-box {
            background: var(--gold-power);
            color: #000;
            padding: 20px;
            border-radius: 2px;
        }

        .comp-label {
            font-size: 12px;
            font-weight: bold;
            opacity: 0.8;
            margin-bottom: 5px;
        }

        /* --- RESPONSIVE SECTION 4 --- */
        @media (max-width: 768px) {
            .market-pulse {
                padding: 60px 0;
                width: 100%;
                height: 100%;
            }

            .market-title {
                font-size: 26px;
                margin-bottom: 30px;
                text-align: center;
            }

            .market-dashboard {
                grid-template-columns: 1fr;
                /* Chuyển về 1 cột */
                gap: 30px;
            }

            .chart-area {
                padding: 15px;
                background: rgba(255, 255, 255, 0.01);
                border: none;
            }

            .canvas-container {
                height: 220px;
                /* Thu nhỏ biểu đồ trên mobile */
            }

            /* Tối ưu vùng hiển thị tiền */
            .value-wrap {
                font-size: 36px;
                /* Giảm từ 56px xuống 36px */
                display: flex;
                flex-wrap: wrap;
                align-items: baseline;
            }

            .currency {
                font-size: 18px;
            }

            .main-valuation .description {
                font-size: 14px;
            }

            /* Grid chỉ số trên mobile */
            .indicators-grid {
                grid-template-columns: 1fr;
                /* Xếp chồng 2 thẻ Liquidity và Rarity */
                gap: 15px;
            }

            .ind-item {
                padding: 15px;
            }

            .comparison-box {
                margin-top: 10px;
            }
        }

        /* Fix lỗi tràn màn hình nhỏ (iPhone SE/5) */
        @media (max-width: 380px) {
            .value-wrap {
                font-size: 28px;
            }
        }
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
                            <?php
                            // 1. Lấy giá trị từ URL, nếu không có thì mặc định là 30K-999.99
                            $plate_raw = isset($_GET['plate']) ? $_GET['plate'] : '30K-999.99';

                            // 2. Tách chuỗi dựa trên dấu gạch ngang "-"
                            // Ví dụ: 51K-888.88 sẽ tách thành mảng ["51K", "888.88"]
                            $plate_parts = explode('-', $plate_raw);

                            $top_part = isset($plate_parts[0]) ? $plate_parts[0] : '30K';
                            $bottom_part = isset($plate_parts[1]) ? $plate_parts[1] : '999.99';
                            ?>
                            <div class="plate-top" id="plateTop"><?php echo htmlspecialchars($top_part); ?></div>
                            <div class="plate-bottom" id="plateBottom"><?php echo htmlspecialchars($bottom_part); ?></div>
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
                    <?php
                    // 1. Lấy giá trị từ URL, nếu không có thì mặc định là 30K-999.99
                    $price_raw = isset($_GET['price']) ? $_GET['price'] : '920.000.000';
                    ?>
                    <span class="price-label">Giá hiện tại</span>
                    <div class="price-value"><?php echo $price_raw ?><span>VND</span></div>
                </div>

                <div class="action-btns">
                    <button class="btn-bid">ĐẶT CỌC GIỮ CHỖ</button>
                    <button class="btn-contact">LIÊN HỆ VIP</button>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------------------- section 2 ---------------------------------  -->
    <section class="numerology-spirit" id="section2">
        <div class="sacred-container">
            <div class="section-header">
                <h2 class="spirit-title">THE NUMEROLOGY & SPIRIT</h2>
                <div class="title-underline"></div>
            </div>

            <div class="spirit-layout">
                <div class="spirit-visual">
                    <div class="sacred-geometry">
                        <div class="pulse-energy"></div>
                        <div class="pulse-energy"></div>
                        <div id="element-label" class="element-label">KHÁM PHÁ MỆNH</div>
                        <svg viewBox="0 0 400 400" class="elements-circle">
                            <circle cx="200" cy="200" r="180" class="outer-ring" />
                            <path d="M200 20 L200 380 M20 200 L380 200" class="lines" />
                            <circle cx="200" cy="20" r="12" class="element-node kim" data-name="HÀNH KIM" />
                            <circle cx="380" cy="200" r="12" class="element-node thuy" data-name="HÀNH THỦY" />
                            <circle cx="200" cy="380" r="12" class="element-node moc" data-name="HÀNH MỘC" />
                            <circle cx="20" cy="200" r="12" class="element-node hoa" data-name="HÀNH HỎA" />
                        </svg>
                        <div class="compatibility-box">
                            <input type="number" placeholder="Năm sinh của bạn..." id="birthYear">
                            <div class="progress-container">
                                <div class="progress-bar" id="compBar"></div>
                            </div>
                            <span class="comp-text">Độ hợp mệnh: <span id="compVal">0</span>%</span>
                        </div>
                    </div>
                </div>

                <div class="spirit-analysis">

                    <div class="numerology-cards">
                        <div class="info-card" data-number="8">
                            <span class="num-digit">8</span>
                            <div class="num-detail">
                                <h3>BÁT - ĐẠI PHÁT</h3>
                                <p>Con số của sự thịnh vượng vô tận. Trong tiếng Hán, "Bát" đọc chệch là "Phát", tượng trưng cho sự thăng tiến không ngừng trong kinh doanh.</p>
                            </div>
                        </div>

                        <div class="info-card" data-number="5">
                            <span class="num-digit">5</span>
                            <div class="num-detail">
                                <h3>NGŨ QUÝ - SINH LỘC</h3>
                                <p>Năm con số 8 trùng phùng tạo nên nguồn năng lượng Thổ cực thịnh, giúp chủ nhân củng cố địa vị và quyền lực bền vững như núi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="score-circle-wrap">
                        <div class="score-inner">
                            <span class="score-label">PHONG THỦY</span>
                            <span class="score-number">10/10</span>
                        </div>
                        <p class="bike-suggest">Hợp mệnh: <span>Thổ & Kim</span>. Gợi ý: SH Đỏ, Vespa Vàng đồng hoặc BMW S1000RR Đen vàng.</p>
                    </div>

                    <button class="btn-share-spirit">CHIA SẺ QUẺ SỐ</button>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------------------- section 3 ---------------------------------  -->
    <section class="lifestyle-preview">
        <div class="led-strip"></div>

        <div class="showroom-slider">
            <button class="nav-arrow prev-bike">←</button>

            <div class="vehicle-images">
                <div class="dynamic-plate-wrap">
                    <div class="plate-mini">
                        <div class="p-top" id="miniPlateTop">59-A3</div>
                        <div class="p-bottom" id="miniPlateBottom">888.88</div>
                    </div>
                </div>

                <img src="https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?q=80&w=1000&auto=format&fit=crop"
                    class="bike-img active"
                    data-name="HONDA SH 350i"
                    data-desc="Nước sơn Trắng Ngọc Trai tương sinh hoàn hảo với hành Kim.">

                <img src="https://vespatopcom.com/wp-content/uploads/2024/05/vespa-946-dior-13.webp"
                    class="bike-img"
                    data-name="VESPA 946 CHRISTIAN DIOR"
                    data-desc="Vẻ đẹp di sản kết hợp cùng dãy số ngũ quý tạo nên giá trị độc bản.">

                <img src="https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?q=80&w=1000&auto=format&fit=crop"
                    class="bike-img"
                    data-name="DUCATI PANIGALE V4"
                    data-desc="Sắc đỏ Hỏa mạnh mẽ hắt ánh sáng cực phẩm lên mặt biển mica.">
            </div>

            <button class="nav-arrow next-bike">→</button>
        </div>

        <div class="vehicle-info">
            <h3 id="bikeName">HONDA SH 350i</h3>
            <p id="bikeDesc">Nước sơn Trắng Ngọc Trai tương sinh hoàn hảo với hành Kim.</p>

            <div class="dots-container">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>

            <button class="btn-ai-preview" style="margin-top: 30px;">
                ✦ TẢI ẢNH XE CỦA BẠN (AI PREVIEW)
            </button>
        </div>
    </section>
    <!-- --------------------------- section 5 ---------------------------------  -->
    <section class="market-pulse" id="section4">
        <div class="market-container">
            <h2 class="market-title">THE MARKET PULSE</h2>

            <div class="market-dashboard">
                <div class="chart-area">
                    <div class="chart-header">
                        <span class="label">BIẾN ĐỘNG GIÁ TRỊ (12 THÁNG)</span>
                        <div class="growth-badge pulse-growth">+15.4%</div>
                    </div>
                    <div class="canvas-container">
                        <canvas id="marketChart"></canvas>
                    </div>
                </div>

                <div class="stats-area">
                    <div class="stat-card main-valuation">
                        <span class="label">ĐỊNH GIÁ HIỆN TẠI</span>
                        <div class="value-wrap">
                            <?php
                            // Lấy giá trị price từ URL, nếu không có thì mặc định là 850.000.000
                            $price_from_url = isset($_GET['price']) ? $_GET['price'] : '850.000.000';

                            // Xử lý loại bỏ dấu chấm để lấy số thuần túy (Dùng cho data-target)
                            // Ví dụ: "3.200.000.000" thành "3200000000"
                            $numeric_price = str_replace('.', '', $price_from_url);
                            ?>
                            <span class="counting-wealth" data-target="<?php echo $numeric_price; ?>">0</span>
                            <span class="currency">VND</span>
                        </div>
                        <p class="description">Giá trị dựa trên dữ liệu đấu giá thực tế và độ khan hiếm khu vực.</p>
                    </div>

                    <div class="indicators-grid">
                        <div class="ind-item">
                            <span class="label">TÍNH THANH KHOẢN</span>
                            <div class="ind-val pulse-growth">CAO</div>
                            <p class="ind-desc">18 người đang tìm kiếm</p>
                        </div>
                        <div class="ind-item">
                            <span class="label">ĐỘ KHAN HIẾM</span>
                            <div class="ind-val">DUY NHẤT</div>
                            <p class="ind-desc">Chỉ 1 biển tương đương</p>
                        </div>
                    </div>

                    <div class="comparison-box">
                        <div class="comp-label">GIÁ TRỊ TƯƠNG ĐƯƠNG</div>
                        <div class="comp-content">
                            <i class="icon-bike"></i>
                            <span>01 xe <strong>SH 350i (New 2024)</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- --------------------------- section 4 ---------------------------------  -->
    <section class="vip-concierge" id="section5">
        <div class="concierge-container">
            <div class="vip-visual">
                <div class="vip-card-wrap">
                    <div class="vip-card" id="vipCard">
                        <div class="card-shine"></div>
                        <div class="card-content">
                            <div class="card-logo">VIP MEMBERSHIP</div>
                            <div class="card-holder">
                                <?php $plate_raw = isset($_GET['plate']) ? $_GET['plate'] : '30K-999.99'; ?>
                                <span>ĐẶC QUYỀN SỞ HỮU</span>
                                <div class="holder-name" id="cardPlateName"><?php echo $plate_raw ?></div>
                            </div>
                            <div class="card-footer">PREMIUM SERVICE</div>
                        </div>
                    </div>
                </div>

                <div class="keyring-preview">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToVN_0y8dObMHrc86RvftHA5vGnxciSN6ZGQ&s" alt="Keyring" class="keyring-img">
                    <p>Quà tặng: Móc khóa da dập số độc bản</p>
                </div>
            </div>

            <div class="ownership-process">
                <h2 class="vip-title">THE WHITE-GLOVE SERVICE</h2>
                <div class="process-path">
                    <div class="path-line">
                        <div class="path-progress" id="pathProgress"></div>
                    </div>

                    <div class="steps-wrapper">
                        <div class="step-item" data-step="1">
                            <div class="step-icon">01</div>
                            <div class="step-content">
                                <h3>ĐẶT CỌC GIỮ CHỖ</h3>
                                <div class="step-detail">
                                    <p>Hoàn tất thủ tục ký quỹ online chỉ trong 5 phút. Biển số sẽ được khóa trạng thái dành riêng cho bạn.</p>
                                    <span class="legal-info">Thời gian: Tức thì | Pháp lý: Hợp đồng điện tử</span>
                                </div>
                            </div>
                        </div>

                        <div class="step-item" data-step="2">
                            <div class="step-icon">02</div>
                            <div class="step-content">
                                <h3>ĐỊNH DANH CHÍNH CHỦ</h3>
                                <div class="step-detail">
                                    <p>Chuyên gia của chúng tôi sẽ hỗ trợ toàn bộ hồ sơ đăng ký định danh tại cơ quan chức năng.</p>
                                    <span class="legal-info">Thời gian: 1-3 ngày | Pháp lý: Chứng nhận định danh</span>
                                </div>
                            </div>
                        </div>

                        <div class="step-item" data-step="3">
                            <div class="step-icon">03</div>
                            <div class="step-content">
                                <h3>BÀN GIAO TẬN NHÀ</h3>
                                <div class="step-detail">
                                    <p>Gói Door-to-Door: Đội ngũ mặc suit, găng tay trắng bàn giao & lắp đặt biển số trực tiếp lên xe của bạn.</p>
                                    <span class="legal-info">Thời gian: Theo yêu cầu | Dịch vụ: White-glove</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn-vip-contact">LIÊN HỆ CHUYÊN GIA SỞ HỮU</button>
            </div>
        </div>
    </section>



    <?php include "footer.php" ?>
</body>
<script>
    gsap.registerPlugin(ScrollTrigger);

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
    document.addEventListener("DOMContentLoaded", function() {
        // --- Cấu hình dữ liệu phong thủy theo số đuôi ---
        const fengShuiData = {
            '0': {
                name: 'THỦY',
                class: 'thuy',
                color: '#2196F3',
                mean: 'Số 0 - Sự khởi đầu vô tận, viên mãn.'
            },
            '1': {
                name: 'THỦY',
                class: 'thuy',
                color: '#2196F3',
                mean: 'Số 1 - Nhất: Vị thế độc tôn, đứng đầu.'
            },
            '2': {
                name: 'THỔ',
                class: 'moc',
                color: '#D4AF37',
                mean: 'Số 2 - Mãi mãi: Sự bền vững, song hỷ.'
            },
            '3': {
                name: 'MỘC',
                class: 'moc',
                color: '#4CAF50',
                mean: 'Số 3 - Tài: Tài năng và trí tuệ.'
            },
            '4': {
                name: 'MỘC',
                class: 'moc',
                color: '#4CAF50',
                mean: 'Số 4 - Tứ: Sự cân bằng, bốn mùa hưng thịnh.'
            },
            '5': {
                name: 'THỔ',
                class: 'kim',
                color: '#D4AF37',
                mean: 'Số 5 - Ngũ: Trung tâm của quyền lực.'
            },
            '6': {
                name: 'KIM',
                class: 'kim',
                color: '#FFFFFF',
                mean: 'Số 6 - Lộc: Tài lộc dồi dào, suôn sẻ.'
            },
            '7': {
                name: 'KIM',
                class: 'kim',
                color: '#FFFFFF',
                mean: 'Số 7 - Thất: Sức mạnh tâm linh, huyền bí.'
            },
            '8': {
                name: 'THỔ',
                class: 'kim',
                color: '#D4AF37',
                mean: 'Số 8 - Phát: Phát đạt, thịnh vượng.'
            },
            '9': {
                name: 'HỎA',
                class: 'hoa',
                color: '#F44336',
                mean: 'Số 9 - Cửu: Vĩnh cửu, trường thọ.'
            }
        };
        const analyzeFengShui = () => {
            // 1. Lấy số cuối cùng của biển số
            const plateText = document.getElementById('plateBottom').innerText;
            const lastDigit = plateText.replace(/[^0-9]/g, '').slice(-1);
            const data = fengShuiData[lastDigit];

            // 2. Cập nhật các thẻ thông tin (Info Cards) tự động
            const cardsWrap = document.querySelector('.numerology-cards');
            if (cardsWrap) {
                cardsWrap.innerHTML = `
                <div class="info-card">
                    <span class="num-digit">${lastDigit}</span>
                    <div class="num-detail">
                        <h3>HÀNH ${data.name}</h3>
                        <p>${data.mean} Biển số này mang năng lượng tương sinh mạnh mẽ cho chủ nhân.</p>
                    </div>
                </div>
                <div class="info-card">
                    <span class="num-digit">★</span>
                    <div class="num-detail">
                        <h3>CÁT TƯỜNG</h3>
                        <p>Dãy số ${plateText} được đánh giá là cực phẩm phong thủy, mang lại vận may đặc biệt.</p>
                    </div>
                </div>
            `;
            }

            // 3. Tự động kích hoạt Node tương ứng trên vòng tròn
            const targetNode = document.querySelector(`.element-node.${data.class}`);
            if (targetNode) {
                const targetX = targetNode.getAttribute('cx');
                const targetY = targetNode.getAttribute('cy');

                gsap.to(".pulse-energy", {
                    left: targetX + "px",
                    top: targetY + "px",
                    background: `radial-gradient(circle, ${data.color} 0%, #000 100%)`,
                    boxShadow: `0 0 80px ${data.color}`,
                    duration: 1.5,
                    ease: "power2.out"
                });
            }

            // 4. Cập nhật quả cầu năng lượng
            gsap.to(".pulse-energy", {
                background: `radial-gradient(circle, ${data.color} 0%, #000 100%)`,
                boxShadow: `0 0 80px ${data.color}`,
                duration: 2
            });

            // 5. Cập nhật phần điểm và gợi ý xe
            const suggestText = document.querySelector('.bike-suggest');
            if (suggestText) {
                suggestText.innerHTML = `Hợp mệnh: <span style="color:${data.color}">${data.name}</span>. Phù hợp cho các dòng xe cao cấp.`;
            }
        };
        // Chạy hàm phân tích ngay khi load
        analyzeFengShui();

        ScrollTrigger.refresh();
        // 1. Reveal hiệu ứng khi cuộn trang
        // gsap.from(".info-card", {
        //     scrollTrigger: {
        //         trigger: ".numerology-spirit",
        //         start: "top 70%",
        //     },
        //     x: 0,
        //     opacity: 1,
        //     stagger: 0.2,
        //     duration: 1
        // });

        // 2. Logic Tứ Hành - Đổi màu khi Hover
        const elementLabel = document.getElementById('element-label');
        const nodes = document.querySelectorAll('.element-node');
        const energyBall = document.querySelector('.pulse-energy');
        const nodeMoc = document.querySelector('.element-node.moc');
        gsap.to(".element-node.moc", {
            r: 15,
            fill: "#D4AF37", // Màu vàng gold đại diện cho Thổ/Kim
            stroke: "#fff",
            duration: 2,
            repeat: -1,
            yoyo: true,
            filter: "drop-shadow(0 0 10px #D4AF37)"
        });

        const colorMap = {
            'kim': '#FFFFFF',
            'thuy': '#2196F3',
            'moc': '#4CAF50',
            'hoa': '#F44336'
        };

        nodes.forEach(node => {
            node.addEventListener('mouseenter', function() {
                const type = this.classList[1]; // kim, thuy, moc, hoa
                const activeColor = colorMap[type];
                const name = this.getAttribute('data-name');

                // 1. Hiện nhãn tên
                elementLabel.innerHTML = name;
                elementLabel.className = `element-label active label-${type}`;

                // 2. Phóng to Node (Dùng attr vì đây là SVG)
                gsap.to(this, {
                    attr: {
                        r: 18
                    }, // Thay đổi bán kính r của hình tròn SVG
                    fill: activeColor,
                    duration: 0.3
                });

                // 3. Đổi màu quả cầu năng lượng (Chỉ đổi màu và scale, không chạm vào x/y)
                gsap.to(energyBall, {
                    background: `radial-gradient(circle, ${activeColor} 0%, #000 100%)`,
                    boxShadow: `0 0 60px ${activeColor}`,
                    scale: 1.3,
                    duration: 0.4,
                    overwrite: true // Ngăn chặn xung đột với hiệu ứng nhịp thở
                });
            });

            node.addEventListener('mouseleave', function() {
                elementLabel.classList.remove('active');

                // Trả Node về trạng thái cũ
                gsap.to(this, {
                    attr: {
                        r: 12
                    },
                    fill: "#1A1A1A",
                    duration: 0.3
                });

                // Trả quả cầu năng lượng về màu Gold ban đầu
                gsap.to(energyBall, {
                    background: "radial-gradient(circle, #D4AF37 0%, #856404 100%)",
                    boxShadow: "0 0 50px rgba(212, 175, 55, 0.3)",
                    scale: 1,
                    duration: 0.4
                });
            });
        });
        // 3. Logic Hợp mệnh (Compatibility)
        const birthInput = document.getElementById('birthYear');
        const compBar = document.getElementById('compBar');
        const compVal = document.getElementById('compVal');

        if (birthInput) {
            birthInput.addEventListener('input', (e) => {
                if (e.target.value.length === 4) {
                    let score = Math.floor(Math.random() * (99 - 75 + 1)) + 75;
                    gsap.to(compBar, {
                        width: score + "%",
                        duration: 1.5,
                        ease: "power4.out"
                    });

                    let count = {
                        val: 0
                    };
                    gsap.to(count, {
                        val: score,
                        duration: 1.5,
                        onUpdate: () => {
                            compVal.innerHTML = Math.floor(count.val);
                        }
                    });
                } else {
                    gsap.to(compBar, {
                        width: "0%",
                        duration: 0.5
                    });
                    compVal.innerHTML = "0";
                }
            });
        }

        // 4. Logic nút Chia sẻ
        const shareBtn = document.querySelector('.btn-share-spirit');
        if (shareBtn) {
            shareBtn.addEventListener('click', function() {
                gsap.to(this, {
                    scale: 0.95,
                    duration: 0.1,
                    yoyo: true,
                    repeat: 1
                });
                alert("Hệ thống đang trích xuất dữ liệu phong thủy...");
            });
        }

        // 5. Hiệu ứng nhịp thở cho quả cầu
        gsap.to(".pulse-energy", {
            scale: 1.1,
            opacity: 0.8,
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
        });
    });
    // Hiệu ứng Magnetic cho nút Contact
    const contactBtn = document.querySelector('.btn-contact');
    if (contactBtn) {
        contactBtn.addEventListener('mousemove', (e) => {
            const rect = contactBtn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            gsap.to(contactBtn, {
                x: x * 0.3,
                y: y * 0.3,
                duration: 0.4,
                ease: "power2.out"
            });
        });

        contactBtn.addEventListener('mouseleave', () => {
            gsap.to(contactBtn, {
                x: 0,
                y: 0,
                duration: 0.6,
                ease: "elastic.out(1, 0.3)"
            });
        });
    }
    // Tìm đến đoạn JS điều khiển spirit-analysis và sửa thành:
    window.addEventListener("load", function() {
        gsap.registerPlugin(ScrollTrigger);

        // Ép ScrollTrigger tính toán lại toàn bộ vị trí sau khi load trang
        ScrollTrigger.refresh();

        gsap.to(".spirit-analysis", {
            scrollTrigger: {
                trigger: ".spirit-analysis",
                start: "top 85%", // Kích hoạt sớm hơn một chút
                onEnter: () => console.log("Spirit Analysis Activated"), // Debug để kiểm tra
            },
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power2.out"
        });

        // Thêm dòng này để hỗ trợ các trình duyệt mobile
        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 500);
    });


    // --------------------------- section 3 --------------------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Đồng bộ biển số từ Section 1
        const pTop = document.getElementById('plateTop')?.innerText || "59-A3";
        const pBottom = document.getElementById('plateBottom')?.innerText || "888.88";

        document.getElementById('miniPlateTop').innerText = pTop;
        document.getElementById('miniPlateBottom').innerText = pBottom;

        // 2. Slider Logic
        const bikes = document.querySelectorAll('.bike-img');
        const dots = document.querySelectorAll('.dot');
        const bikeName = document.getElementById('bikeName');
        const bikeDesc = document.getElementById('bikeDesc');
        const plateWrap = document.querySelector('.dynamic-plate-wrap');
        let currentIdx = 0;
        // Tọa độ biển số linh hoạt theo thiết bị
        const getPlatePosition = (idx) => {
            const isMobile = window.innerWidth <= 768;
            if (isMobile) {
                // Tọa độ cho Mobile (đã căn chỉnh cho màn hình dọc)
                return [{
                        top: '62%',
                        left: '46%'
                    }, // SH
                    {
                        top: '58%',
                        left: '32%'
                    }, // Vespa
                    {
                        top: '48%',
                        left: '52%'
                    } // Ducati
                ][idx];
            } else {
                // Tọa độ cho Desktop
                return [{
                        top: '55%',
                        left: '42%'
                    },
                    {
                        top: '60%',
                        left: '35%'
                    },
                    {
                        top: '48%',
                        left: '48%'
                    }
                ][idx];
            }
        };

        function updateShowroom(idx) {
            // Hiệu ứng "Switch" - Xe cũ trượt ra
            gsap.to(bikes[currentIdx], {
                opacity: 0,
                x: -100,
                rotateY: 20,
                duration: 0.5
            });
            dots[currentIdx].classList.remove('active');

            currentIdx = idx;

            // Hiệu ứng "Snap" - Xe mới trượt vào
            gsap.fromTo(bikes[currentIdx], {
                opacity: 0,
                x: 100,
                rotateY: -20
            }, {
                opacity: 1,
                x: 0,
                rotateY: 0,
                duration: 0.8,
                ease: "power2.out"
            });
            dots[currentIdx].classList.add('active');

            // Cập nhật nội dung văn bản
            bikeName.innerText = bikes[currentIdx].dataset.name;
            bikeDesc.innerText = bikes[currentIdx].dataset.desc;

            // Hiệu ứng "Vít ốc" biển số (Bounce)
            gsap.fromTo(plateWrap, {
                scale: 1.5,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 0.6,
                delay: 0.3,
                ease: "back.out(1.7)"
            });
            const pos = getPlatePosition(idx);
            gsap.to(plateWrap, {
                top: pos.top,
                left: pos.left,
                duration: 0.5,
                ease: "power2.out"
            });

            // Hiệu ứng nảy biển số
            gsap.fromTo(plateWrap, {
                scale: 1.5,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 0.6,
                delay: 0.3,
                ease: "back.out(1.7)"
            });
        }

        // Sự kiện Click nút điều hướng
        document.querySelector('.next-bike').addEventListener('click', () => {
            updateShowroom((currentIdx + 1) % bikes.length);
        });

        document.querySelector('.prev-bike').addEventListener('click', () => {
            updateShowroom((currentIdx - 1 + bikes.length) % bikes.length);
        });

        // 3. Hiệu ứng Cinematic Orbit (Xoay nhẹ tự động)
        gsap.to(".vehicle-images", {
            rotateY: 5,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // 4. Zoom & Tilt theo chuột (Chỉ dành cho Desktop)
        if (window.innerWidth > 1024) {
            document.querySelector('.showroom-slider').addEventListener('mousemove', (e) => {
                const rect = e.currentTarget.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;

                gsap.to(".vehicle-images", {
                    rotateY: x * 15,
                    rotateX: -y * 10,
                    duration: 0.5
                });
            });
        }
        // Gán sự kiện Click cho Dot
        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => updateShowroom(i));
        });

        // Cập nhật lại vị trí khi xoay màn hình (Resize)
        window.addEventListener('resize', () => updateShowroom(currentIdx));
    });
    // --------------------------- section 4 --------------------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Đồng bộ biển số từ Section 1 vào Thẻ VIP
        const mainPlate = document.getElementById('plateBottom')?.innerText || "777.77";
        const mainPrefix = document.getElementById('plateTop')?.innerText || "29-K";
        document.getElementById('cardPlateName').innerText = `${mainPrefix} ${mainPlate}`;

        // 2. Hiệu ứng Floating VIP Card (Tilt)
        const card = document.getElementById('vipCard');
        const shine = card.querySelector('.card-shine');

        document.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            gsap.to(card, {
                rotateY: x * 20,
                rotateX: -y * 20,
                duration: 0.5,
                ease: "power2.out"
            });

            gsap.to(shine, {
                x: x * 100,
                y: y * 100,
                duration: 0.5
            });
        });

        // 3. Hiệu ứng "The Golden Step" - Scroll Trigger Progress

        gsap.to("#pathProgress", {
            height: "100%",
            scrollTrigger: {
                trigger: ".steps-wrapper",
                start: "top 60%",
                end: "bottom 60%",
                scrub: 1
            }
        });

        // 4. Accordion Logic & Auto-active on scroll
        const steps = document.querySelectorAll('.step-item');

        steps.forEach((step, index) => {
            // Click để mở thủ công
            step.addEventListener('click', () => {
                steps.forEach(s => s.classList.remove('active'));
                step.classList.add('active');
            });

            // Tự động active khi scroll qua
            ScrollTrigger.create({
                trigger: step,
                start: "top 70%",
                onEnter: () => {
                    steps.forEach(s => s.classList.remove('active'));
                    step.classList.add('active');
                },
                onEnterBack: () => {
                    steps.forEach(s => s.classList.remove('active'));
                    step.classList.add('active');
                }
            });
        });
    });

    // --------------------------- section 5 --------------------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Khởi tạo Biểu đồ (The Market Path)
        const ctx = document.getElementById('marketChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(212, 175, 55, 0.3)');
        gradient.addColorStop(1, 'rgba(212, 175, 55, 0)');

        const chartData = {
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'Giá trị (Triệu VND)',
                data: [600, 620, 615, 650, 680, 720, 710, 750, 780, 810, 830, 850],
                borderColor: '#D4AF37',
                borderWidth: 2,
                pointBackgroundColor: '#D4AF37',
                pointRadius: 0,
                pointHoverRadius: 6,
                fill: true,
                backgroundColor: gradient,
                tension: 0.4
            }]
        };

        const marketChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: '#1a1a1a',
                        titleColor: '#D4AF37',
                        bodyColor: '#fff',
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        display: false // Ẩn trục Y để trông giống Sparkline trên Mobile
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: window.innerWidth < 768 ? 10 : 12 // Chữ nhỏ hơn trên Mobile
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });

        // 2. Hiệu ứng Counting Wealth (Chạy số)
        const countWealth = () => {
            const wealthElement = document.querySelector('.counting-wealth');
            const target = parseInt(wealthElement.getAttribute('data-target'));
            const duration = 2000; // 2s
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    wealthElement.innerText = target.toLocaleString('vi-VN');
                    clearInterval(timer);
                } else {
                    wealthElement.innerText = Math.floor(current).toLocaleString('vi-VN');
                }
            }, 16);
        };

        // 3. Scroll Trigger để kích hoạt hiệu ứng
        let triggered = false;
        window.addEventListener('scroll', () => {
            const section = document.querySelector('.market-pulse');
            const pos = section.getBoundingClientRect().top;
            if (pos < window.innerHeight * 0.7 && !triggered) {
                countWealth();
                triggered = true;
            }
        });
    });
</script>

</html>