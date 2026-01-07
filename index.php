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
        /* --- Responsive Hero Section --- */

/* Màn hình máy tính bảng (Dưới 1024px) */
@media (max-width: 1024px) {
    .hero h1 {
        font-size: 48px; /* Giảm size chữ tiêu đề */
    }
    .search-container {
        width: 80%; /* Chuyển sang dùng % để co giãn theo màn hình */
    }
    .search-container:focus-within {
        width: 85%;
    }
}

/* Màn hình điện thoại (Dưới 768px) */
@media (max-width: 768px) {
    .hero {
        padding: 0 20px; /* Thêm padding 2 bên để text không sát mép */
        height: 0;
    }

    .hero h1 {
        font-size: 36px; /* Size chữ phù hợp điện thoại */
        margin-bottom: 30px;
        line-height: 1.2;
    }

    .search-container {
        width: 100%; /* Full màn hình mobile (trừ padding của hero) */
        padding: 12px 20px;
        border-radius: 30px; /* Bo tròn vừa phải hơn */
        flex-direction: row; /* Vẫn giữ hàng ngang hoặc dọc tùy bạn */
    }

    .search-container:focus-within {
        width: 100%; /* Không cần nở rộng trên mobile để tránh lag */
    }

    .search-container input {
        font-size: 10px; /* Chữ nhỏ lại một chút cho cân đối */
    }

    .search-container span {
        font-size: 14px;
        white-space: nowrap; /* Không cho chữ AI Search bị xuống dòng */
    }
}

/* Màn hình điện thoại siêu nhỏ (Dưới 480px) */
@media (max-width: 480px) {
    .hero h1 {
        font-size: 28px;
    }
    
    /* Nếu muốn nút AI Search xuống dòng cho thoáng thì dùng đoạn này */
    
    /* .search-container {
        flex-direction: column;
        gap: 10px;
        border-radius: 15px;
    } */
   
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
        /* --- Responsive Trading Floor --- */

/* Màn hình máy tính bảng và Laptop nhỏ (Dưới 1024px) */
@media (max-width: 1024px) {
    .trading-floor {
        padding: 60px 30px; /* Giảm padding tổng thể */
    }
    
    .plate-number {
        font-size: 26px; /* Thu nhỏ biển số một chút */
        letter-spacing: 3px;
    }
}

/* Màn hình điện thoại (Dưới 768px) */
@media (max-width: 768px) {
    .trading-floor {
        padding: 50px 20px;
    }

    .trading-floor h2 {
        font-size: 26px !important; /* Cân đối lại tiêu đề */
        text-align: center;
        margin-bottom: 20px !important;
    }

    .grid {
        grid-template-columns: 1fr; /* Ép về 1 cột duy nhất trên mobile */
        gap: 20px;
        margin-top: 30px;
    }

    .plate-card {
        height: auto; /* Cho phép chiều cao co giãn theo nội dung */
        padding: 40px 20px;
    }

    .plate-number {
        font-size: 22px; 
        padding: 8px 15px;
        letter-spacing: 2px;
        width: 80%; /* Giới hạn độ rộng biển trên mobile */
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
        flex-direction: column; /* Chuyển thành hàng dọc */
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
        width: 100%; /* Xe to rõ hơn trên mobile */
        margin-bottom: 120px; /* Tạo khoảng trống cho khay biển số */
    }

    /* Tinh chỉnh lại tỉ lệ drop-zone trên màn hình nhỏ */
    .drop-zone {
        width: 15%; /* Sử dụng % thay vì px để co giãn theo ảnh xe */
        height: 7%; 
    }
}

@media (max-width: 768px) {
    .plate-tray {
        bottom: 20px;
        width: 95%;
        height: auto;
        padding: 15px 10px;
        flex-wrap: wrap; /* Cho phép biển số xuống dòng nếu khay quá hẹp */
        gap: 10px;
    }

    .plate {
        width: 80px; /* Thu nhỏ biển số một chút */
        height: 20px;
        font-size: 10px;
    }
}

@media (max-width: 480px) {
    .info-panel h2 {
        font-size: 1.5rem;
    }
    
    .car-container {
        margin-bottom: 160px; /* Tăng khoảng cách nếu khay biển số bị xuống dòng */
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
        justify-content: center; /* Căn giữa tiêu đề Live trên mobile */
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
        justify-content: center; /* Căn giữa đồng hồ lật trên mobile */
        background: #111;
        padding: 15px 0;
        border-radius: 8px;
    }

    .flip-card {
        width: 35px; /* Tăng kích thước số lật một chút để dễ đọc trên mobile */
        height: 50px;
    }

    .btn-bid {
        width: 100%; /* Nút bấm full chiều ngang để dễ chạm bằng ngón tay */
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
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
        }

        .bike-card:hover {
            border-color: var(--titanium);
            box-shadow: 0 0 20px rgba(229, 228, 226, 0.3);
            transform: scale(1.02);
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
            width: 420px;
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

    <section class="bike-collection">
        <div class="bike-grid">
            <div class="bike-card">
                <div class="quick-preview">
                    <img src="data:image/jpeg;base64,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" class="preview-img" alt="Vespa Preview">
                </div>
                <div class="style-tag">#TayGa</div>
                <div class="bike-plate-box">
                    <div class="region-code">29</div>
                    <div class="number-line">888.88</div>
                </div>
                <div class="bike-price">450.000.000 đ</div>
            </div>

            <div class="bike-card">
                <div class="quick-preview">
                    <img src="https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&q=80&w=1200"
                        class="preview-img" class="preview-img" alt="Harley Preview">
                </div>
                <div class="style-tag">#PKL</div>
                <div class="bike-plate-box">
                    <div class="region-code">59</div>
                    <div class="number-line">666.66</div>
                </div>
                <div class="bike-price">320.000.000 đ</div>
            </div>

        </div>
        <div class="bike-grid">
            <div class="bike-card">
                <div class="quick-preview">
                    <img src="data:image/jpeg;base64,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" class="preview-img" alt="Vespa Preview">
                </div>
                <div class="style-tag">#TayGa</div>
                <div class="bike-plate-box">
                    <div class="region-code">29</div>
                    <div class="number-line">888.88</div>
                </div>
                <div class="bike-price">450.000.000 đ</div>
            </div>

            <div class="bike-card">
                <div class="quick-preview">
                    <img src="https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&q=80&w=1200"
                        class="preview-img" class="preview-img" alt="Harley Preview">
                </div>
                <div class="style-tag">#PKL</div>
                <div class="bike-plate-box">
                    <div class="region-code">59</div>
                    <div class="number-line">666.66</div>
                </div>
                <div class="bike-price">320.000.000 đ</div>
            </div>

        </div>
    </section>
    <!-- ------------------------------------------ section 6 --------------------------------------------  -->

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
    </script>
</body>


</html>