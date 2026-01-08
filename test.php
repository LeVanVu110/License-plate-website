<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Live Auction Pulse</title>
    <style>
        :root {
            --bg-deep-black: #000000;
            --grey-dark: #222222;
            --ruby-red: #E0115F;
            --gold-glow: rgba(212, 175, 55, 0.4);
            --gold-bright: #D4AF37;
        }

        body { margin: 0; background: var(--bg-deep-black); font-family: 'Courier New', Courier, monospace; color: white; }

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
            grid-template-columns: 1fr 2fr 1.5fr 2fr 1fr;
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

        .plate-number {
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

<section class="auction-section">
    <div class="header-box">
        <div class="live-status">
            <div class="pulse-dot"></div>
            <span>LIVE AUCTION PULSE</span>
        </div>
    </div>

    <div class="auction-list">
        <div class="auction-row" id="row-1">
            <div class="plate-number">51K-888.88</div>
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
            <div class="plate-number">30L-666.66</div>
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
<script>
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