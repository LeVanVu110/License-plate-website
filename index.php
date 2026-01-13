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
        /* --------------------------------- phần 1video xe banner || phần 2 nav-menu -----------------------  */
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

        /* --- Responsive Hero Section --- */

        /* Màn hình máy tính bảng (Dưới 1024px) */
        @media (max-width: 1024px) {
            .hero h1 {
                font-size: 48px;
                /* Giảm size chữ tiêu đề */
            }

            .search-container {
                width: 80%;
                /* Chuyển sang dùng % để co giãn theo màn hình */
            }

            .search-container:focus-within {
                width: 85%;
            }

            .hero-video-placeholder {
                height: 400%;
                top: 6px;
            }

        }

        /* Màn hình điện thoại (Dưới 768px) */
        @media (max-width: 768px) {
            .hero {
                padding: 0 20px;
                /* Thêm padding 2 bên để text không sát mép */
                height: 10vh;
            }

            .hero h1 {
                font-size: 36px;
                /* Size chữ phù hợp điện thoại */
                margin-bottom: 30px;
                line-height: 1.2;
            }

            .search-container {
                width: 100%;
                /* Full màn hình mobile (trừ padding của hero) */
                padding: 12px 20px;
                border-radius: 30px;
                /* Bo tròn vừa phải hơn */
                flex-direction: row;
                /* Vẫn giữ hàng ngang hoặc dọc tùy bạn */
            }

            .search-container:focus-within {
                width: 100%;
                /* Không cần nở rộng trên mobile để tránh lag */
            }

            .search-container input {
                font-size: 10px;
                /* Chữ nhỏ lại một chút cho cân đối */
            }

            .search-container span {
                font-size: 14px;
                white-space: nowrap;
                /* Không cho chữ AI Search bị xuống dòng */
            }
        }

        /* Màn hình điện thoại siêu nhỏ (Dưới 480px) */
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }
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
            font-size: 30px;
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

        /* --- Responsive Trading Floor --- */

        /* Màn hình máy tính bảng và Laptop nhỏ (Dưới 1024px) */
        @media (max-width: 1024px) {
            .trading-floor {
                padding: 60px 30px;
                /* Giảm padding tổng thể */
            }

            .plate-number {
                font-size: 26px;
                /* Thu nhỏ biển số một chút */
                letter-spacing: 3px;
            }
        }

        /* Màn hình điện thoại (Dưới 768px) */
        @media (max-width: 768px) {
            .trading-floor {
                padding: 50px 20px;
            }

            .trading-floor h2 {
                font-size: 26px !important;
                /* Cân đối lại tiêu đề */
                text-align: center;
                margin-bottom: 20px !important;
            }

            .grid {
                grid-template-columns: 1fr;
                /* Ép về 1 cột duy nhất trên mobile */
                gap: 20px;
                margin-top: 30px;
            }

            .plate-card {
                height: auto;
                /* Cho phép chiều cao co giãn theo nội dung */
                padding: 40px 20px;
            }

            .plate-number {
                font-size: 22px;
                padding: 8px 15px;
                letter-spacing: 2px;
                width: 80%;
                /* Giới hạn độ rộng biển trên mobile */
                text-align: center;
            }

            .price {
                font-size: 16px;
            }
        }

        /* Màn hình điện thoại nhỏ (Dưới 480px) */
        @media (max-width: 480px) {
            .plate-number {
                font-size: 20px;
                letter-spacing: 1px;
            }

            .trading-floor h2 {
                font-size: 22px !important;
            }
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

        /* --- Responsive Virtual Garage --- */

        @media (max-width: 1024px) {
            .virtual-garage {
                flex-direction: column;
                /* Chuyển thành hàng dọc */
                height: auto;
                min-height: 100vh;
                padding-bottom: 50px;
            }

            .info-panel {
                padding: 40px 20px;
                text-align: center;
                align-items: center;
            }

            .info-panel h2 {
                font-size: 2rem;
            }

            .info-panel p {
                max-width: 100%;
            }

            .garage-workspace {
                width: 100%;
                padding: 20px;
                justify-content: flex-start;
            }

            .car-container {
                width: 100%;
                /* Xe to rõ hơn trên mobile */
                margin-bottom: 120px;
                /* Tạo khoảng trống cho khay biển số */
            }

            /* Tinh chỉnh lại tỉ lệ drop-zone trên màn hình nhỏ */
            .drop-zone {
                width: 15%;
                /* Sử dụng % thay vì px để co giãn theo ảnh xe */
                height: 7%;
            }
        }

        @media (max-width: 768px) {
            .plate-tray {
                bottom: 20px;
                width: 95%;
                height: auto;
                padding: 15px 10px;
                flex-wrap: wrap;
                /* Cho phép biển số xuống dòng nếu khay quá hẹp */
                gap: 10px;
            }

            .plate {
                width: 80px;
                /* Thu nhỏ biển số một chút */
                height: 20px;
                font-size: 10px;
            }
        }

        @media (max-width: 480px) {
            .info-panel h2 {
                font-size: 1.5rem;
            }

            .car-container {
                margin-bottom: 160px;
                /* Tăng khoảng cách nếu khay biển số bị xuống dòng */
            }
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
            background: rgba(0, 0, 0, 0.5);
            top: 50%;
        }

        /* Animations */
        @keyframes pulse-red {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(224, 17, 95, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(224, 17, 95, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(224, 17, 95, 0);
            }
        }

        @keyframes flash-gold {
            0% {
                background: transparent;
            }

            50% {
                background: var(--gold-glow);
                box-shadow: inset 0 0 20px var(--gold-bright);
            }

            100% {
                background: transparent;
            }
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

        /* --- Responsive Live Auction --- */

        /* Màn hình máy tính bảng (Dưới 1024px) */
        @media (max-width: 1024px) {
            .auction-row {
                /* Thu hẹp tỉ lệ các cột để vừa màn hình nhỏ hơn */
                grid-template-columns: 1.5fr 1.5fr 1.2fr 1.8fr 0.8fr;
                gap: 10px;
                padding: 15px;
            }

            .plate-numbers {
                font-size: 1.2rem;
            }
        }

        /* Màn hình điện thoại (Dưới 768px) */
        @media (max-width: 768px) {
            .auction-section {
                padding: 40px 15px;
            }

            .header-box {
                justify-content: center;
                /* Căn giữa tiêu đề Live trên mobile */
            }

            .auction-row {
                /* Chuyển từ Grid ngang sang Flexbox dọc */
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                border-radius: 12px;
                border: 1px solid #1a1a1a;
                margin-bottom: 10px;
            }

            /* Tạo bố cục 2 cột giả cho các thông tin quan trọng */
            .plate-numbers {
                font-size: 1.6rem;
                width: 100%;
                border-bottom: 1px solid #222;
                padding-bottom: 10px;
                margin-bottom: 5px;
                text-align: center;
            }

            .bid-info {
                font-size: 0.85rem;
            }

            .current-price {
                font-size: 1.4rem;
                margin: 5px 0;
            }

            .countdown-timer {
                width: 100%;
                justify-content: center;
                /* Căn giữa đồng hồ lật trên mobile */
                background: #111;
                padding: 15px 0;
                border-radius: 8px;
            }

            .flip-card {
                width: 35px;
                /* Tăng kích thước số lật một chút để dễ đọc trên mobile */
                height: 50px;
            }

            .btn-bid {
                width: 100%;
                /* Nút bấm full chiều ngang để dễ chạm bằng ngón tay */
                padding: 15px;
                font-size: 1rem;
                font-weight: bold;
            }
        }

        /* Màn hình điện thoại rất nhỏ (Dưới 480px) */
        @media (max-width: 480px) {
            .plate-numbers {
                font-size: 1.4rem;
            }

            .current-price {
                font-size: 1.2rem;
            }
        }

        /* ---------------------------------------------- section 5 -------------------------------------------  */
        /* --- 1. Split Screen Chooser --- */
        .split-chooser {
            display: flex;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            border-bottom: 1px solid #222;
        }

        .side {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: flex 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            text-align: center;
            padding: 40px;
        }

        .side:hover {
            flex: 1.5;
        }

        /* Phía Ô tô */
        .side.car {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=1000');
            background-size: cover;
            border-right: 1px solid rgba(247, 231, 206, 0.2);
        }

        /* Phía Xe máy */
        .side.bike {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&q=80&w=1000');
            background-size: cover;
        }

        .side h2 {
            font-size: 3rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 5px;
            transition: 0.5s;
        }

        .car h2 {
            color: var(--elite-gold);
        }

        .bike h2 {
            color: var(--titanium);
        }

        .side p {
            opacity: 0;
            transition: 0.5s;
            transform: translateY(20px);
        }

        .side:hover p {
            opacity: 1;
            transform: translateY(0);
            color: #ccc;
        }

        /* --- 2. Bike Plate Cards (Grid Section) --- */
        .bike-collection {
            padding: 100px 10%;
            background: #050505;
        }

        .bike-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* Grid 4 cột thay vì 3 */
            gap: 25px;
            margin-top: 50px;
        }

        .bike-card {
            background: var(--gunmetal);
            /* aspect-ratio: 4 / 3; */
            /* Tỉ lệ gần vuông cho xe máy */
            border-radius: 10px;
            padding: 20px;
            position: relative;
            transition: 0.4s;
            border: 1px solid #333;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 50px;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .bike-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--titaniums) !important;
            box-shadow: 0 15px 30px rgba(165, 169, 180, 0.2);
        }

        /* Định dạng biển số xe máy 2 dòng */
        .plate-bike-ui {
            background: #fdfdfd;
            border-radius: 8px;
            height: 110px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            border: 2px solid #ddd;
            color: #000;
        }

        .plate-bike-ui .top {
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1;
        }

        .plate-bike-ui .bottom {
            font-size: 1.6rem;
            font-weight: 800;
        }

        /* Tag phân loại */
        .style-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 0.7rem;
            background: rgba(0, 168, 255, 0.1);
            color: var(--dynamic-blue);
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid var(--dynamic-blue);
            text-transform: uppercase;
        }

        /* Hình dáng biển số xe máy thực tế */
        .bike-plate-box {
            background: #fdfdfd;
            width: 100%;
            height: 120px;
            margin: 20px auto;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #000;
            box-shadow: 2px 5px 15px rgba(0, 0, 0, 0.5);
            border: 2px solid #ddd;
        }

        .region-code {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dynamic-blue);
            /* Màu nhấn mã vùng */
            line-height: 1;
        }

        .number-line {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .bike-price {
            color: var(--titanium);
            font-weight: 600;
            font-size: 1.2rem;
            text-align: center;
        }

        /* --- 3. Quick Preview Window --- */
        .quick-preview {
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%) scale(0.8);
            width: 200px;
            height: 140px;
            background: #222;
            border-radius: 10px;
            opacity: 0;
            pointer-events: none;
            transition: 0.3s;
            overflow: hidden;
            border: 2px solid var(--titanium);
            z-index: 10;
        }

        .bike-card:hover .quick-preview {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }

        .preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(0.5);
        }

        @media (max-width: 768px) {
            .split-chooser {
                flex-direction: column;
                height: 400px;
                /* Giới hạn tổng chiều cao cố định cho cả 2 phần */
            }

            .side {
                flex: 1;
                /* Chia đều không gian */
                height: 200px;
                /* Giảm chiều cao mỗi bên xuống khoảng 200px */
                padding: 20px;
            }

            .side h2 {
                font-size: 1.5rem;
                /* Thu nhỏ tiêu đề */
                letter-spacing: 2px;
            }

            .side p {
                font-size: 0.85rem;
                opacity: 1;
                /* Luôn hiện text trên mobile */
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .bike-collection {
                padding: 30px 15px;
                /* Giảm khoảng cách lề hai bên */
            }

            .bike-grid {
                gap: 20px;
                /* Thu hẹp khoảng cách giữa các thẻ */
            }

            .bike-card {
                padding: 10px;
                width: 80%;
            }

            /* Thu nhỏ khu vực hiển thị biển số */
            .bike-plate-box {
                padding: 10px;
                margin: 10px 0;
            }

            .region-code {
                font-size: 1.2rem;
                /* Thu nhỏ số vùng (ví dụ: 29) */
            }

            .number-line {
                font-size: 1.8rem;
                /* Thu nhỏ dãy số chính (ví dụ: 888.88) */
                line-height: 1.2;
            }

            .bike-price {
                font-size: 1rem;
                margin-top: 5px;
            }
        }

        /* Responsive cho mobile: chuyển về 1 hoặc 2 cột tùy màn hình */
        @media (max-width: 1024px) {
            .bike-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .bike-grid {
                grid-template-columns: 1fr;
                justify-items: anchor-center;
            }
        }

        .car-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 cột */
            gap: 30px;
            margin-bottom: 80px;
        }

        .car-card {
            background: var(--gunmetal);
            border: 1px solid #333;
            padding: 25px;
            border-radius: 12px;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .car-card:hover {
            transform: translateY(-10px);
            border-color: var(--champagnes) !important;
            /* Sử dụng biến mới */
            box-shadow: 0 15px 30px rgba(212, 175, 55, 0.2);
        }

        /* Responsive */
        @media (max-width: 1024px) {

            .car-grid,
            .bike-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .car-grid,
            .bike-grid {
                grid-template-columns: 1fr;
                justify-items: anchor-center;
            }

            .car-card {
                width: 80%;
            }
        }

        /* Ẩn các card có class hidden-card  ô tô*/
        .hidden-card {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        /* Hiệu ứng khi hiện ra xe máy */
        .show-card {
            display: block !important;
            opacity: 1;
            transform: translateY(0);
        }

        #loadMoreBtn:hover {
            background: var(--champagnes);
            color: #000;
        }

        .hidden-bike {
            display: none;
            opacity: 0;
            transform: translateY(20px);
        }

        .show-bike {
            display: block !important;
            animation: fadeInUp 0.6s ease forwards;
        }

        #loadMoreBikes:hover {
            background: var(--titaniums);
            color: #000;
        }

        /* ------------------------------------------ section 6 --------------------------------------------   */
        /* --- Section Tin tức: The Journal --- */
        .section-journal {
            padding: 100px 5%;
            background: #000;
            color: #fff;
        }

        .journal-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 1 hàng ngang 3 thẻ */
            gap: 40px;
            margin-top: 50px;
        }

        .journal-card {
            text-decoration: none;
            color: inherit;
            display: block;
            group: hover;
        }

        /* Hình ảnh khổ dọc Portrait (Tỉ lệ 3:4 hoặc 2:3) */
        .journal-img-wrapper {
            width: 100%;
            aspect-ratio: 3 / 4;
            overflow: hidden;
            border-radius: 4px;
            margin-bottom: 20px;
            background: #1a1a1a;
        }

        .journal-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .journal-card:hover .journal-img-wrapper img {
            transform: scale(1.1);
        }

        .journal-category {
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--champagnes);
            /* Dùng biến màu vàng đã tạo ở trên */
            margin-bottom: 10px;
            display: block;
        }

        /* Tiêu đề dùng font Serif sang trọng */
        .journal-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            line-height: 1.3;
            font-weight: 700;
            margin-bottom: 15px;
            transition: color 0.3s;
        }

        .journal-card:hover .journal-title {
            color: var(--champagnes);
        }

        .journal-date {
            font-size: 0.8rem;
            color: #666;
            font-family: 'Inter', sans-serif;
        }

        #carGrid a {
            text-decoration: none !important;
        }

        .bike-card a {
            color: inherit;
            /* Giữ nguyên màu chữ của cha */
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .bike-card:hover {
            transform: translateY(-5px);
            /* Hiệu ứng nổi lên khi di chuột */
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .journal-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .journal-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- ------------------------------------------ Header --------------------------------------------  -->
    <?php include "header.php" ?>

    <!-- ------------------------------------------ phần 1video xe banner || phần 2 nav-menu --------------------------------------------  -->

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

        <!-- <div class="scroll-indicator">SCROLL TO EXPLORE</div> -->
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
                        <div class="flip-card">0</div>
                        <div class="flip-card">2</div>
                    </div>
                    <span>:</span>
                    <div class="flip-unit">
                        <div class="flip-card">1</div>
                        <div class="flip-card">5</div>
                    </div>
                    <span>:</span>
                    <div class="flip-unit">
                        <div class="flip-card">4</div>
                        <div class="flip-card">8</div>
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
                        <div class="flip-card">0</div>
                        <div class="flip-card">0</div>
                    </div>
                    <span>:</span>
                    <div class="flip-unit">
                        <div class="flip-card">4</div>
                        <div class="flip-card">2</div>
                    </div>
                    <span>:</span>
                    <div class="flip-unit">
                        <div class="flip-card">1</div>
                        <div class="flip-card">2</div>
                    </div>
                </div>
                <button class="btn-bid" onclick="simulateBid('row-2')">Trả giá</button>
            </div>
        </div>
    </section>
    <!-- ------------------------------------------ section 5 --------------------------------------------  -->
    <section class="split-chooser">
        <div class="side car">
            <h2>The Elite</h2>
            <p>Thế giới biển số Ô tô - Đẳng cấp & Trường tồn</p>
        </div>
        <div class="side bike">
            <h2>The Dynamic</h2>
            <p>Thế giới biển số Xe máy - Tốc độ & Bản sắc</p>
        </div>
    </section>

    <section class="section-cars" style="padding: 3%;">
        <div class="section-header" style="margin-bottom: 40px; text-align: center;">
            <h2 style="color: var(--champagnes); font-family: 'Playfair Display'; font-size: 35px; text-transform: uppercase; letter-spacing: 3px;">
                Car Plates Collection
            </h2>
            <p style="color: #666;">Dòng biển số định danh dành cho xe ô tô</p>
        </div>

        <div class="car-grid" id="carGrid">
            <a href="detail_home_xemay.php?plate=30K-999.99&price=3.200.000.000" class="gallery-card car-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">30K-999.99</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">3.200.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=51K-888.88&price=2.850.000.000" class="gallery-card car-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">51K-888.88</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">2.850.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=43A-666.66&price=1.500.000.000" class="gallery-card car-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">43A-666.66</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">1.500.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=30L-555.55&price=950.000.000" class="gallery-card car-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">30L-555.55</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">950.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=51L-222.22&price=820.000.000" class="gallery-card car-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">51L-222.22</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">820.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=15A-999.99&price=1.200.000.000" class="gallery-card car-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">15A-999.99</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">1.200.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=30K-123.45&price=450.000.000" class="gallery-card car-card hidden-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">30K-123.45</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">450.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=51K-678.90&price=380.000.000" class="gallery-card car-card hidden-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">51K-678.90</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">380.000.000 đ</div>
            </a>

            <a href="detail_home_xemay.php?plate=30L-888.68&price=760.000.000" class="gallery-card car-card hidden-card">
                <span style="color: var(--champagnes); font-size: 0.7rem; letter-spacing: 2px;">LUXURY SERIES</span>
                <div class="plate-ui-car" style="color: #fff;">30L-888.68</div>
                <div style="color: #fff; text-align: center; font-weight: bold; margin-top: 10px;">760.000.000 đ</div>
            </a>
        </div>

        <div style="text-align: center; margin-top: 50px;">
            <button id="loadMoreBtn" style="background: transparent; border: 1px solid var(--champagnes); color: var(--champagnes); padding: 12px 35px; cursor: pointer; font-family: 'Inter'; font-weight: bold; letter-spacing: 2px; transition: all 0.3s;">
                XEM THÊM
            </button>
        </div>
    </section>

    <section class="section-bikes" style="padding: 3%;">
        <div class="section-header" style="margin-bottom: 40px; text-align: center;">
            <h2 style="color: var(--titaniums); font-family: 'Playfair Display'; font-size: 35px; text-transform: uppercase; letter-spacing: 3px;">
                Motorbike Collection
            </h2>
            <p style="color: #666;">Dòng biển số xe máy - Đẳng cấp Titanium</p>
        </div>

        <div class="bike-grid" id="bikeGrid">
            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=29-A1 888.88&price=155.000.000" style="text-decoration: none; display: block; width: 100%;">
                    <span style="color: var(--titaniums); font-size: 0.7rem; letter-spacing: 2px;">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">29-A1</div>
                        <div class="bottom">888.88</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">155.000.000 đ</div>
                </a>
            </div>
            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=59-B2+666.66&price=92.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">59-B2</div>
                        <div class="bottom">666.66</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">92.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=43-C1+799.99&price=88.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">43-C1</div>
                        <div class="bottom">799.99</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">88.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=30-Z1+123.45&price=75.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">30-Z1</div>
                        <div class="bottom">123.45</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">75.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=29-P1+999.99&price=110.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">29-P1</div>
                        <div class="bottom">999.99</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">110.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=51-F3+555.55&price=85.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">51-F3</div>
                        <div class="bottom">555.55</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">85.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=75-G1+222.22&price=65.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">75-G1</div>
                        <div class="bottom">222.22</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">65.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card">
                <a href="detail_home_oto.php?plate=37-B2+333.33&price=70.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">37-B2</div>
                        <div class="bottom">333.33</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">70.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card hidden-bike">
                <a href="detail_home_oto.php?plate=60-B8+888.88&price=95.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">60-B8</div>
                        <div class="bottom">888.88</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">95.000.000 đ</div>
                </a>
            </div>

            <div class="gallery-card bike-card hidden-bike">
                <a href="detail_home_oto.php?plate=92-H1+678.89&price=45.000.000" class="plate-link">
                    <span class="series-tag">DYNAMIC SERIES</span>
                    <div class="plate-ui-bike">
                        <div class="top">92-H1</div>
                        <div class="bottom">678.89</div>
                    </div>
                    <div style="color: #fff; text-align: center; font-weight: bold;">45.000.000 đ</div>
                </a>
            </div>
        </div>

        <div style="text-align: center; margin-top: 50px;">
            <button id="loadMoreBikes" style="background: transparent; border: 1px solid var(--titaniums); color: var(--titaniums); padding: 12px 35px; cursor: pointer; font-family: 'Inter'; font-weight: bold; letter-spacing: 2px; transition: all 0.3s;">
                XEM THÊM XE MÁY
            </button>
        </div>
    </section>
    <!-- ------------------------------------------ section 6 --------------------------------------------  -->
    <section class="section-journal">
        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-family: 'Playfair Display'; font-size: 42px; letter-spacing: 2px;">THE JOURNAL</h2>
            <div style="width: 50px; height: 1px; background: var(--champagnes); margin: 20px auto;"></div>
        </div>

        <div class="journal-grid">
            <a href="chitiettintuc1.php" class="journal-card">
                <div class="journal-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=2070&auto=format&fit=crop" alt="The Art of Speed">
                </div>
                <span class="journal-category">Lifestyle</span>
                <h3 class="journal-title">Nghệ thuật chọn biển số: Đẳng cấp khẳng định vị thế chủ nhân</h3>
                <span class="journal-date">OCTOBER 24, 2023</span>
            </a>

            <a href="chitiettintuc2.php" class="journal-card">
                <div class="journal-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=2070&auto=format&fit=crop" alt="Luxury Interior">
                </div>
                <span class="journal-category">Market Update</span>
                <h3 class="journal-title">Xu hướng thị trường biển số xe máy ngũ quý cuối năm 2023</h3>
                <span class="journal-date">OCTOBER 20, 2023</span>
            </a>

            <a href="chitiettintuc3.php" class="journal-card">
                <div class="journal-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070&auto=format&fit=crop" alt="Racing Heritage">
                </div>
                <span class="journal-category">Exclusive</span>
                <h3 class="journal-title">Phỏng vấn giới sưu tầm: Tại sao "Bạc Titanium" lại lên ngôi?</h3>
                <span class="journal-date">OCTOBER 15, 2023</span>
            </a>
        </div>
    </section>
    <!-- ------------------------------------------ footer --------------------------------------------  -->
    <?php include "footer.php" ?>
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
        // --------------------------------- section 5 --------------------------- //
        // 1. Sự kiện cho Ô tô
        document.getElementById('loadMoreBtn').addEventListener('click', function() {
            const hiddenCards = document.querySelectorAll('.hidden-card');
            hiddenCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('show-card');
                }, index * 100);
            });
            this.style.display = 'none';
        }); // Kết thúc sự kiện ô tô ở đây

        // 2. Sự kiện cho Xe máy (Đưa ra ngoài để chạy độc lập)
        document.getElementById('loadMoreBikes').addEventListener('click', function() {
            const hiddenBikes = document.querySelectorAll('.hidden-bike');
            hiddenBikes.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('show-bike');
                }, index * 100);
            });
            this.style.display = 'none';
        });
    </script>
</body>


</html>