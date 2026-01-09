<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Live Arena | Đấu giá trực tuyến</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Inter:wght@400;700;900&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <style>
        :root {
            --crimson: #FF0000;
            --gold-gradient: linear-gradient(135deg, #D4AF37 0%, #8A6E2F 100%);
            --glass: rgba(255, 255, 255, 0.03);
            --cyan-glow: rgba(0, 242, 255, 0.15);
            --champagne: #F7E7CE;
            --gold: #D4AF37;
            --dark-grey: #0D0D0D;
            --rose-gold: #B76E79;
            --rose-gold-light: #E0B0FF;
            /* Chút sắc bạc Rose */
            --black-charcoal: #080808;
            --carbon: rgba(255, 255, 255, 0.02);
            -webkit-link: #ff53d7ff
        }

        body {
            margin: 0;
            padding: 0;
            background: #010101;
            color: #fff;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            padding-top: 5% !important;
            overflow-x: hidden;
        }

        /* -------------------------------- SECTION 1 ------------------------ */
        .live-arena {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #010101;
        }

        /* Hiệu ứng Ánh đèn Spotlight */
        .spotlight {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80vw;
            height: 80vw;
            background: radial-gradient(circle, var(--cyan-glow) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        /* Dải thông số kỹ thuật rìa màn hình */
        .tech-lines {
            position: absolute;
            font-family: 'Roboto Mono', monospace;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.2);
            letter-spacing: 2px;
            white-space: nowrap;
            z-index: 2;
        }

        .tech-lines.left {
            top: 50%;
            left: 20px;
            transform: rotate(-90deg) translateY(-50%);
        }

        .tech-lines.right {
            top: 50%;
            right: 20px;
            transform: rotate(90deg) translateY(-50%);
        }

        .arena-container {
            display: flex;
            width: 90%;
            max-width: 1400px;
            z-index: 10;
            gap: 60px;
            align-items: center;
        }

        /* Biển số - Hero Object */
        .plate-showcase {
            flex: 1.2;
            position: relative;
            perspective: 2000px;
        }

        .live-badge {
            position: absolute;
            top: -40px;
            left: 0;
            font-family: 'Roboto Mono', monospace;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: 2px;
        }

        .pulse-red {
            width: 8px;
            height: 8px;
            background: var(--crimson);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--crimson);
            animation: pulse-ring 1.5s infinite;
        }

        .glass-frame {
            background: var(--glass);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            padding: 100px 40px;
            border-radius: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            transform-style: preserve-3d;
        }

        .plate-number {
            font-size: clamp(3rem, 8vw, 6.5rem);
            font-weight: 900;
            letter-spacing: 15px;
            color: #fff;
            text-align: center;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.8));
        }

        .light-sweep {
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transform: skewX(-30deg);
            animation: sweep 5s infinite;
        }

        /* Control Panel */
        .control-panel {
            flex: 0.8;
            padding: 40px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .label {
            font-size: 12px;
            color: #666;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 10px;
        }

        .timer {
            font-family: 'Roboto Mono', monospace;
            font-size: 4.5rem;
            font-weight: 500;
            color: var(--crimson);
            margin-bottom: 40px;
            letter-spacing: -2px;
        }

        .current-price .amount {
            font-size: 2.8rem;
            font-weight: 900;
            color: #fff;
            line-height: 1;
        }

        .currency {
            font-size: 1.5rem;
            color: #888;
            margin-right: 10px;
        }

        .btn-bid {
            position: relative;
            width: 100%;
            padding: 25px;
            background: var(--gold-gradient);
            border: none;
            border-radius: 12px;
            color: #000;
            font-weight: 900;
            font-size: 1.2rem;
            cursor: pointer;
            overflow: hidden;
            margin-top: 40px;
            transition: transform 0.2s;
        }

        .btn-bid:active {
            transform: scale(0.98);
        }

        .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 100%;
            width: 0%;
            background: rgba(0, 0, 0, 0.15);
        }

        .bid-hint {
            font-size: 12px;
            color: #555;
            text-align: center;
            margin-top: 15px;
        }

        /* Animations */
        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(2.5);
                opacity: 0;
            }
        }

        @keyframes sweep {
            0% {
                left: -100%;
            }

            30% {
                left: 150%;
            }

            100% {
                left: 150%;
            }
        }

        .emergency {
            animation: heartbeat 0.8s infinite;
        }

        @keyframes heartbeat {

            0%,
            100% {
                transform: scale(1);
                filter: brightness(1);
            }

            50% {
                transform: scale(1.02);
                filter: brightness(1.3);
            }
        }

        /* Sticky Bid Bar Mobile */
        .sticky-bid-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #0a0a0a;
            padding: 15px 25px;
            display: none;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 100;
            box-sizing: border-box;
        }

        .s-btn {
            background: var(--gold-gradient);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 800;
        }

        /* --- RESPONSIVE MOBILE (DƯỚI 1024PX) --- */
        @media (max-width: 1024px) {
            .arena-container {
                flex-direction: column;
                padding-top: 80px;
                /* Chừa chỗ cho Header */
                padding-bottom: 100px;
                /* Chừa chỗ cho Sticky Bar */
            }

            .plate-showcase {
                order: 1;
                width: 100%;
            }

            .control-panel {
                order: 2;
                width: 100%;
                background: transparent;
                border: none;
                padding: 20px 0;
                text-align: center;
            }

            .live-badge {
                left: 30%;
                transform: translateX(-50%);
                top: -30px;
            }

            .timer {
                margin-bottom: 20px;
                font-size: 2.7rem;
            }

            /* Ẩn nút đặt giá lớn trên Mobile vì đã có Sticky bar */
            .btn-bid {
                display: none;
            }

            .bid-hint {
                display: none;
            }
        }

        /* Sticky Bar đặc quyền cho Mobile */
        .sticky-bid-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            display: none;
            padding: 15px 20px;
            box-sizing: border-box;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 999;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 1024px) {
            .sticky-bid-bar {
                display: flex;
            }
        }

        .s-price-box .s-label {
            font-size: 9px;
            color: #888;
            display: block;
        }

        .s-price-box .s-val {
            font-weight: 800;
            font-size: 1.1rem;
            color: #fff;
        }

        .s-btn-bid {
            background: var(--gold-gradient);
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 900;
            font-size: 0.9rem;
            color: #000;
        }

        /* Animations */
        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(2.5);
                opacity: 0;
            }
        }

        /* -------------------------------- section 2 ------------------------  */
        .bid-pulse {
            background: #010101;
            padding: 100px 0;
            min-height: 80vh;
            font-family: 'Inter', sans-serif;
            position: relative;
        }

        .pulse-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .pulse-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
        }

        .pulse-title {
            font-size: 0.8rem;
            letter-spacing: 4px;
            color: #888;
            margin-bottom: 10px;
        }

        .bid-count {
            font-size: 1.5rem;
            font-weight: 700;
            color: #00F2FF;
            /* Cyan */
        }

        .total-volume {
            text-align: right;
        }

        .total-volume .counter-up {
            font-size: 2.5rem;
            font-weight: 900;
            font-family: 'Roboto Mono', monospace;
        }

        /* Bid Cards */
        .bid-feed-wrapper {
            position: relative;
            max-height: 600px;
            overflow: hidden;
        }

        .bid-card {
            background: rgba(20, 20, 20, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px 30px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.4s ease;
        }

        .bid-card:hover {
            background: rgba(30, 30, 30, 0.9);
            border-color: rgba(0, 242, 255, 0.3);
            transform: translateX(10px);
        }

        .bid-identity {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .bidder-name {
            font-weight: 700;
            display: block;
        }

        .bidder-status {
            font-size: 10px;
            color: #D4AF37;
            letter-spacing: 1px;
        }

        .bid-amount {
            font-family: 'Roboto Mono', monospace;
            font-size: 1.4rem;
            font-weight: 700;
        }

        /* Style cho người dẫn đầu */
        .bid-card.leader {
            border: 1px solid #D4AF37;
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.05), transparent);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.1);
        }

        .bid-card.leader .bid-amount {
            color: #D4AF37;
        }

        /* Style cho người bị vượt mặt */
        .bid-card.outbid {
            opacity: 0.6;
        }

        .bid-card.outbid .bid-amount {
            color: #E5E5E5;
        }

        .feed-gradient-mask {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(transparent, #010101);
            pointer-events: none;
        }

        /* Toast Mobile */
        .bid-toast {
            position: fixed;
            top: 70px;
            right: -300px;
            background: #00F2FF;
            color: #000;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 800;
            z-index: 1000;
            box-shadow: 0 10px 30px rgba(0, 242, 255, 0.3);
            transition: 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .pulse-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .total-volume {
                margin-top: 20px;
            }

            .bid-card {
                padding: 15px;
                flex-wrap: wrap;
            }

            .bid-time {
                width: 100%;
                order: 3;
                font-size: 11px;
                margin-top: 5px;
                color: #555;
            }

            .bid-amount {
                font-size: 1rem;
            }
        }

        /* -------------------------------- section 3 ------------------------  */
        .upcoming-treasures {
            background: #010101;
            padding: 120px 0;
            overflow: hidden;
        }

        .showroom-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5%;
        }

        /* Header */
        .showroom-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 80px;
        }

        .serif-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 400;
            color: #fff;
            margin: 0;
        }

        .subtitle {
            color: #666;
            letter-spacing: 5px;
            font-size: 0.7rem;
            margin-top: 10px;
        }

        .global-countdown {
            text-align: right;
            border-left: 1px solid #333;
            padding-left: 30px;
        }

        .next-timer {
            font-family: 'Roboto Mono', monospace;
            font-size: 1.5rem;
            color: var(--gold);
            margin-top: 5px;
        }

        /* Grid & Cards */
        .treasure-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .treasure-card {
            background: var(--dark-grey);
            border-radius: 4px;
            position: relative;
            transition: all 0.5s ease;
            cursor: pointer;
        }

        /* Hiệu ứng Glow Border khi Hover */
        .treasure-card::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            z-index: -1;
            opacity: 0;
            transition: 0.5s;
        }

        .treasure-card:hover::before {
            opacity: 1;
        }

        .card-inner {
            padding: 30px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .plate-preview {
            position: relative;
            height: 180px;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .plate-mockup {
            font-size: 2.5rem;
            font-weight: 800;
            color: #333;
            /* Lúc đầu hơi mờ */
            filter: blur(8px);
            transition: 0.8s cubic-bezier(0.2, 1, 0.3, 1);
        }

        .treasure-card:hover .plate-mockup {
            filter: blur(0);
            color: #fff;
            transform: scale(1.1);
        }

        .starting-label {
            position: absolute;
            bottom: 10px;
            left: 15px;
            font-size: 10px;
            color: var(--champagne);
            letter-spacing: 1px;
        }

        .fengshui-tags {
            margin-bottom: 15px;
        }

        .fengshui-tags span {
            font-size: 9px;
            border: 0.5px solid #444;
            padding: 3px 10px;
            margin-right: 5px;
            color: #888;
        }

        .plate-id {
            font-size: 1.5rem;
            margin: 10px 0;
            color: #fff;
        }

        .launch-date {
            font-size: 12px;
            color: #555;
            margin-bottom: 25px;
        }

        /* Nút Nhận thông báo */
        .btn-remind {
            background: transparent;
            border: 1px solid #333;
            color: #fff;
            padding: 15px;
            width: 100%;
            font-size: 0.7rem;
            letter-spacing: 2px;
            position: relative;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-remind:hover {
            border-color: var(--titan);
            color: var(--titan);
        }

        .pulse-circle {
            display: inline-block;
            width: 6px;
            height: 6px;
            background: var(--gold);
            border-radius: 50%;
            margin-right: 10px;
            box-shadow: 0 0 10px var(--gold);
            animation: pulse-gold 2s infinite;
        }

        @keyframes pulse-gold {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(3);
                opacity: 0;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .treasure-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                padding-bottom: 30px;
                gap: 20px;
            }

            .treasure-card {
                min-width: 85%;
                scroll-snap-align: center;
            }

            .serif-title {
                font-size: 2.5rem;
            }

            .global-countdown {
                display: none;
            }

            .treasure-grid::-webkit-scrollbar {
                display: none;
            }
        }

        /* -------------------------------- section 4 ------------------------  */
        .trust-transparency {
            background: #020202;
            /* Matte Black */
            padding: 120px 0;
            color: #fff;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .ledger-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .ledger-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .secure-tag {
            font-family: 'Roboto Mono', monospace;
            font-size: 12px;
            color: #001F3F;
            background: #00F2FF;
            padding: 4px 12px;
            border-radius: 4px;
            letter-spacing: 2px;
        }

        .ledger-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-top: 20px;
            letter-spacing: 1px;
        }

        .header-line {
            width: 60px;
            height: 2px;
            background: #00F2FF;
            margin: 20px auto;
        }

        /* Triad Grid */
        .triad-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .trust-card {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.05);
            height: 450px;
            position: relative;
            cursor: pointer;
            perspective: 1000px;
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .trust-card:hover {
            transform: rotateY(180deg);
        }

        .card-content,
        .card-back {
            position: absolute;
            inset: 0;
            padding: 40px;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .card-back {
            background: #001F3F;
            /* Navy Blue */
            transform: rotateY(180deg);
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 8rem;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.02);
            pointer-events: none;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            color: #00F2FF;
            margin-bottom: 30px;
        }

        .trust-card h3 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .trust-card p {
            color: #888;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Seal Effect */
        .seal-box {
            margin-top: 30px;
            opacity: 0;
            transform: scale(2);
            transition: 0.8s ease;
        }

        .trust-card.active .seal-box {
            opacity: 0.4;
            transform: scale(1);
        }

        .seal-img {
            width: 80px;
            filter: grayscale(1) invert(1);
        }

        /* Scan Line Effect */
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #00F2FF, transparent);
            opacity: 0;
            z-index: 10;
        }

        .trust-card:hover .scan-line {
            animation: scanning 2s linear infinite;
            opacity: 1;
        }

        @keyframes scanning {
            0% {
                top: 0%;
            }

            100% {
                top: 100%;
            }
        }

        /* Footer */
        .ledger-footer {
            text-align: center;
            margin-top: 60px;
            color: #555;
            font-size: 13px;
        }

        .ledger-footer a {
            color: #00F2FF;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: 0.3s;
        }

        .ledger-footer a:hover {
            border-bottom-color: #00F2FF;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .triad-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .trust-card {
                height: auto;
                min-height: 300px;
            }

            /* Tắt hiệu ứng lật trên Mobile để thân thiện với UX chạm */
            .trust-card:hover {
                transform: none;
            }

            .card-back {
                display: none;
            }

            .card-content {
                position: relative;
                padding: 60px 20px;
            }

            .trust-transparency {
                padding: 0;
            }
        }

        /* -------------------------------- section 5 ------------------------  */
        .vip-lounge {
            background: #000;
            padding: 150px 0;
            position: relative;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
        }

        .lounge-bg-parallax {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            background: radial-gradient(circle at 50% 50%, #111 0%, #000 100%);
            z-index: 1;
        }

        .lounge-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Thẻ VIP Card */
        .vip-card {
            width: 70%;
            background: var(--black-charcoal);
            border-radius: 2px;
            /* Góc vuông vức sang trọng */
            position: relative;
            padding: 80px;
            box-shadow: 0 50px 100px rgba(0, 0, 0, 0.8);
            overflow: hidden;
            border: 1px solid rgba(183, 110, 121, 0.1);
        }

        /* Họa tiết Carbon mờ */
        .card-texture {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(45deg, var(--carbon) 25%, transparent 25%),
                linear-gradient(-45deg, var(--carbon) 25%, transparent 25%);
            background-size: 4px 4px;
            opacity: 0.3;
        }

        .card-inner {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .concierge-tag {
            font-family: 'Roboto Mono', monospace;
            font-size: 11px;
            letter-spacing: 6px;
            color: var(--dynamic-blue);
            display: block;
            margin-bottom: 30px;
        }

        .boutique-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 3.5rem);
            font-weight: 400;
            color: #fff;
            margin-bottom: 40px;
        }

        .serif-text {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.2rem;
            color: #888;
            max-width: 600px;
            margin: 0 auto 60px;
            line-height: 1.8;
        }

        /* Nút kết nối VIP */
        .btn-vip-connect {
            background: transparent;
            border: 1px solid var(--dynamic-blue);
            color: var(--dynamic-blue);
            padding: 20px 40px;
            font-size: 11px;
            letter-spacing: 4px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: 0.5s;
        }

        .btn-vip-connect:hover {
            background: var(--dynamic-blue);
            color: #000;
        }

        .btn-shimmer {
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: skewX(-30deg);
            animation: shimmer 4s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            20% {
                left: 150%;
            }

            100% {
                left: 150%;
            }
        }

        /* Viền sáng chạy chậm */
        .soft-glow-border {
            position: absolute;
            inset: 0;
            border: 1px solid transparent;
            background: linear-gradient(90deg, transparent, var(--dynamic-blue), transparent) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            opacity: 0.2;
            animation: border-flow 10s linear infinite;
        }

        @keyframes border-flow {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        .legal-disclaimer {
            margin-top: 40px;
            font-size: 10px;
            color: #b2b2b2;
            letter-spacing: 1px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .vip-card {
                width: 100%;
                padding: 60px 25px;
                border-radius: 0;
            }

            .serif-text {
                font-size: 1rem;
            }

            .btn-vip-connect {
                width: 100%;
            }
        }

        /* -------------------------------- section 6 ------------------------  */
    </style>
</head>

<body>
    <!-- -----------------------------------section 1 -----------------------------------  -->
    <section class="live-arena" id="arenaSection">
        <div class="spotlight"></div>

        <div class="tech-lines left">STREAM_ID: PS_8829 // STATUS: SECURE // LIVE_FEED</div>
        <div class="tech-lines right">BLOCKCHAIN_VERIFIED // TRANSACTION_LOCK: ON</div>

        <div class="arena-container">
            <div class="plate-showcase" id="plate3D">
                <div class="live-badge">
                    <span class="pulse-red"></span> LIVE • 1,240 WATCHING
                </div>
                <div class="glass-frame">
                    <div class="plate-number">30K-999.99</div>
                    <div class="light-sweep"></div>
                </div>
            </div>

            <div class="control-panel">
                <div class="countdown-wrapper">
                    <span class="label">THỜI GIAN CÒN LẠI</span>
                    <div class="timer" id="timer">00:45:12</div>
                </div>

                <div class="price-display">
                    <span class="label">GIÁ HIỆN TẠI</span>
                    <div class="current-price" id="priceDisplay">
                        <span class="amount">2,450,000,000</span>
                        <span class="currency">VNĐ</span>
                    </div>
                </div>

                <div class="bid-actions">
                    <button class="btn-bid" id="btnBid">
                        <span style="position: relative; z-index: 2;">NHẤN GIỮ ĐỂ ĐẶT GIÁ</span>
                        <div class="progress-bar" id="bidProgress"></div>
                    </button>
                    <p class="bid-hint">Bước giá tối thiểu: +50,000,000 VNĐ</p>
                </div>
            </div>
        </div>

        <div class="sticky-bid-bar">
            <div>
                <span style="font-size: 10px; color: #888; display: block;">GIÁ HIỆN TẠI</span>
                <span style="font-weight: 800;">2,450,000,000đ</span>
            </div>
            <button class="s-btn">ĐẶT GIÁ</button>
        </div>
    </section>

    <!-- -----------------------------------section 2 -----------------------------------  -->
    <section class="bid-pulse" id="bidPulseSection">
        <div class="pulse-container">
            <div class="pulse-header">
                <div class="header-left">
                    <h2 class="pulse-title">LỊCH SỬ ĐẶT GIÁ</h2>
                    <div class="bid-count"><span id="totalBids">48</span> Bids</div>
                </div>
                <div class="total-volume">
                    <span class="label">TỔNG GIÁ TRỊ CỰC ĐẠI</span>
                    <div class="counter-up" id="topPrice">2,450,000,000</div>
                </div>
            </div>

            <div class="bid-feed-wrapper">
                <div class="bid-feed" id="bidFeed">
                    <div class="bid-card leader">
                        <div class="bid-identity">
                            <div class="crown-icon">👑</div>
                            <div class="bidder-info">
                                <span class="bidder-name">Đại gia #88</span>
                                <span class="bidder-status">DẪN ĐẦU</span>
                            </div>
                        </div>
                        <div class="bid-time">Vừa xong</div>
                        <div class="bid-amount">2,450,000,000đ</div>
                    </div>

                    <div class="bid-card outbid">
                        <div class="bid-identity">
                            <div class="bidder-info">
                                <span class="bidder-name">K***H</span>
                            </div>
                        </div>
                        <div class="bid-time">2 phút trước</div>
                        <div class="bid-amount">2,400,000,000đ</div>
                    </div>

                    <div class="bid-card outbid">
                        <div class="bid-identity">
                            <div class="bidder-info">
                                <span class="bidder-name">Sưu tầm Miền Bắc</span>
                            </div>
                        </div>
                        <div class="bid-time">5 phút trước</div>
                        <div class="bid-amount">2,350,000,000đ</div>
                    </div>
                </div>
                <div class="feed-gradient-mask"></div>
            </div>
        </div>

        <div id="bidToast" class="bid-toast">
            ⚡ Mức giá vừa tăng lên <span id="toastPrice">2.5 tỷ</span>!
        </div>
    </section>

    <!-- -----------------------------------section 3 -----------------------------------  -->
    <section class="upcoming-treasures" id="upcomingSection">
        <div class="showroom-container">
            <div class="showroom-header">
                <div class="title-group">
                    <h2 class="serif-title">SẮP LÊN SÀN</h2>
                    <p class="subtitle">NHỮNG CƠ HỘI ĐẦU TƯ TIẾP THEO</p>
                </div>
                <div class="global-countdown">
                    <span class="wait-label">PHIÊN KẾ TIẾP:</span>
                    <div class="next-timer" id="nextSessionTimer">02D : 14H : 05M</div>
                </div>
            </div>

            <div class="treasure-grid" id="treasureGrid">
                <div class="treasure-card reveal-item">
                    <div class="card-inner">
                        <div class="plate-preview">
                            <div class="plate-img-wrapper">
                                <div class="plate-mockup">51K-888.88</div>
                                <div class="glass-overlay"></div>
                            </div>
                            <div class="starting-label">KHỞI ĐIỂM: 500,000,000đ</div>
                        </div>
                        <div class="card-info">
                            <div class="fengshui-tags">
                                <span>ĐẠI CÁT</span> <span>PHÁT LỘC</span>
                            </div>
                            <h3 class="plate-id">51K-888.88</h3>
                            <div class="launch-date">Khai cuộc: 15/10 | 09:00</div>
                            <button class="btn-remind">
                                <span class="pulse-circle"></span> NHẬN THÔNG BÁO
                            </button>
                        </div>
                    </div>
                </div>

                <div class="treasure-card reveal-item">
                    <div class="card-inner">
                        <div class="plate-preview">
                            <div class="plate-img-wrapper">
                                <div class="plate-mockup">30L-666.66</div>
                                <div class="glass-overlay"></div>
                            </div>
                            <div class="starting-label">KHỞI ĐIỂM: 450,000,000đ</div>
                        </div>
                        <div class="card-info">
                            <div class="fengshui-tags">
                                <span>LỤC QUÝ</span> <span>TRƯỜNG CỬU</span>
                            </div>
                            <h3 class="plate-id">30L-666.66</h3>
                            <div class="launch-date">Khai cuộc: 16/10 | 14:00</div>
                            <button class="btn-remind">
                                <span class="pulse-circle"></span> NHẬN THÔNG BÁO
                            </button>
                        </div>
                    </div>
                </div>

                <div class="treasure-card reveal-item">
                    <div class="card-inner">
                        <div class="plate-preview">
                            <div class="plate-img-wrapper">
                                <div class="plate-mockup">43A-999.99</div>
                                <div class="glass-overlay"></div>
                            </div>
                            <div class="starting-label">KHỞI ĐIỂM: 600,000,000đ</div>
                        </div>
                        <div class="card-info">
                            <div class="fengshui-tags">
                                <span>VĨNH CỬU</span> <span>QUYỀN LỰC</span>
                            </div>
                            <h3 class="plate-id">43A-999.99</h3>
                            <div class="launch-date">Khai cuộc: 17/10 | 10:30</div>
                            <button class="btn-remind">
                                <span class="pulse-circle"></span> NHẬN THÔNG BÁO
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -----------------------------------section 4 -----------------------------------  -->
    <section class="trust-transparency" id="trustSection">
        <div class="ledger-container">
            <div class="ledger-header reveal-up">
                <span class="secure-tag"><i class="fas fa-shield-check"></i> SECURITY PROTOCOL ENABLED</span>
                <h2 class="ledger-title">NIÊM PHONG & MINH BẠCH</h2>
                <div class="header-line"></div>
            </div>

            <div class="triad-grid">
                <div class="trust-card" data-index="1">
                    <div class="watermark">KYC</div>
                    <div class="card-content">
                        <div class="scan-line"></div>
                        <div class="icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </div>
                        <h3>Xác thực định danh</h3>
                        <p>100% người tham gia được xác minh danh tính qua hệ thống KYC nâng cao, loại bỏ hoàn toàn hiện tượng đẩy giá ảo.</p>
                        <!-- <div class="seal-box">
                            <img src="https://i.imgur.com/w9U9Q7D.png" class="seal-img" alt="Verified Seal">
                        </div> -->
                    </div>
                    <div class="card-back">
                        <h4>ĐIỀU KHOẢN 3.1</h4>
                        <p>Mọi tài khoản vi phạm quy tắc đấu giá sẽ bị khóa vĩnh viễn và tịch thu tiền ký quỹ theo quy định hiện hành.</p>
                    </div>
                </div>

                <div class="trust-card" data-index="2">
                    <div class="watermark">GOV</div>
                    <div class="card-content">
                        <div class="scan-line"></div>
                        <div class="icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <h3>Liên kết Chính phủ</h3>
                        <p>Dữ liệu biển số được truy xuất trực tiếp từ Cục CSGT. Đảm bảo tính chính danh và hồ sơ gốc sạch 100%.</p>
                        <!-- <div class="seal-box">
                            <img src="https://i.imgur.com/w9U9Q7D.png" class="seal-img" alt="Gov Seal">
                        </div> -->
                    </div>
                    <div class="card-back">
                        <h4>PHÁP LÝ</h4>
                        <p>Tài sản được niêm phong điện tử. Quyền sở hữu được bảo vệ bởi Luật đấu giá tài sản số 01/2016/QH14.</p>
                    </div>
                </div>

                <div class="trust-card" data-index="3">
                    <div class="watermark">ESC</div>
                    <div class="card-content">
                        <div class="scan-line"></div>
                        <div class="icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 15V3m0 12l-4-4m4 4l4-4M2 17l.62 2.48A2 2 0 004.56 21h14.88a2 2 0 001.94-1.52L22 17" />
                            </svg>
                        </div>
                        <h3>Bảo lãnh thanh toán</h3>
                        <p>Hệ thống ký quỹ an toàn (Escrow). Tiền của bạn chỉ được chuyển đi khi hoàn tất thủ tục sang tên chính chủ.</p>
                        <!-- <div class="seal-box">
                            <img src="https://i.imgur.com/w9U9Q7D.png" class="seal-img" alt="Secure Seal">
                        </div> -->
                    </div>
                    <div class="card-back">
                        <h4>KÝ QUỸ</h4>
                        <p>Tiền đặt cọc được giữ tại ngân hàng bảo lãnh và hoàn trả 100% trong vòng 24h nếu đấu giá không thành công.</p>
                    </div>
                </div>
            </div>

            <div class="ledger-footer reveal-up">
                <p>Cần hỗ trợ pháp lý? <a href="#">Kết nối với luật sư của chúng tôi</a></p>
            </div>
        </div>
    </section>

    <!-- -----------------------------------section 5 -----------------------------------  -->
    <section class="vip-lounge" id="vipSection">
        <div class="lounge-bg-parallax"></div>

        <div class="lounge-container">
            <div class="vip-card reveal-expand">
                <div class="card-texture"></div>
                <div class="card-inner">
                    <div class="vip-header">
                        <span class="concierge-tag">PRIVATE CONCIERGE</span>
                        <h2 class="boutique-title">DỊCH VỤ SĂN TÌM ĐỘC BẢN</h2>
                    </div>

                    <div class="vip-body">
                        <p class="serif-text">
                            Bỏ lỡ phiên đấu giá? Hãy để đội ngũ chuyên gia của chúng tôi
                            săn lùng biển số trong mơ dành riêng cho bộ sưu tập của bạn
                            với sự bảo mật tuyệt đối.
                        </p>
                    </div>

                    <div class="vip-footer">
                        <button class="btn-vip-connect" onclick="triggerVIPContact()">
                            <span class="btn-label">KẾT NỐI VỚI CHUYÊN VIÊN VIP</span>
                            <div class="btn-shimmer"></div>
                        </button>

                        <div class="social-minimal" style="padding-top: 4%;">
                            <a style="color: var(--dynamic-blue);" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a style="color: var(--dynamic-blue);" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="soft-glow-border"></div>
            </div>

            <div class="legal-disclaimer">
                Dịch vụ dành riêng cho thành viên Private Club. <a style="color: var(--dynamic-blue);" href="#">Tìm hiểu điều kiện.</a>
            </div>
        </div>
    </section>


    <!-- -----------------------------------section 6 -----------------------------------  -->


    <?php include "footer.php" ?>

</body>
<script>
    // ------------------------------- section 1 ----------------------------------//
    // 1. Hiệu ứng 3D Tilt cho biển số
    const plate = document.querySelector('.glass-frame');
    if (window.innerWidth > 1024) {
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.pageX) / 25;
            const y = (window.innerHeight / 2 - e.pageY) / 25;
            gsap.to(plate, {
                rotationY: -x,
                rotationX: y,
                duration: 0.8,
                ease: "power2.out"
            });
        });
    }

    // 2. Logic Nhấn giữ để đặt giá (Long Press)
    const bidBtn = document.getElementById('btnBid');
    const progressFill = document.getElementById('bidProgress');
    let interval;
    let progress = 0;

    const startHold = () => {
        interval = setInterval(() => {
            progress += 2;
            progressFill.style.width = progress + '%';
            if (progress >= 100) {
                confirmBid();
                stopHold();
            }
        }, 20);
    };

    const stopHold = () => {
        clearInterval(interval);
        progress = 0;
        progressFill.style.width = '0%';
    };

    const confirmBid = () => {
        // Hiệu ứng loé sáng khi giá thay đổi
        gsap.fromTo("#priceDisplay", {
            opacity: 0.5,
            scale: 0.9
        }, {
            opacity: 1,
            scale: 1,
            duration: 0.5,
            ease: "expo.out"
        });
        alert("ĐỀ NGHỊ ĐẶT GIÁ ĐÃ ĐƯỢC GỬI THÀNH CÔNG!");
    };

    bidBtn.addEventListener('mousedown', startHold);
    bidBtn.addEventListener('mouseup', stopHold);
    bidBtn.addEventListener('mouseleave', stopHold);
    // Hỗ trợ Touch cho Mobile
    bidBtn.addEventListener('touchstart', startHold);
    bidBtn.addEventListener('touchend', stopHold);

    // 3. Hiệu ứng khẩn cấp cho giây cuối
    function triggerEmergency() {
        document.getElementById('timer').classList.add('emergency');
    }
    // Giả lập kích hoạt sau 3 giây để xem demo
    setTimeout(triggerEmergency, 3000);


    // ------------------------------- section 2 ----------------------------------//
    // Hàm đẩy một lệnh mới vào danh sách
    function addNewBid(name, amount) {
        const feed = document.getElementById('bidFeed');
        const totalBidsEl = document.getElementById('totalBids');

        // 1. Tạo HTML cho thẻ mới
        const newBid = document.createElement('div');
        newBid.className = 'bid-card leader new-entry';
        newBid.innerHTML = `
        <div class="bid-identity">
            <div class="crown-icon">👑</div>
            <div class="bidder-info">
                <span class="bidder-name">${name}</span>
                <span class="bidder-status">DẪN ĐẦU</span>
            </div>
        </div>
        <div class="bid-time">Vừa xong</div>
        <div class="bid-amount">${amount.toLocaleString()}đ</div>
    `;

        // 2. Chuyển thẻ leader cũ thành outbid
        const oldLeader = feed.querySelector('.leader');
        if (oldLeader) {
            oldLeader.classList.remove('leader');
            oldLeader.classList.add('outbid');
            oldLeader.querySelector('.crown-icon').style.display = 'none';
            oldLeader.querySelector('.bidder-status').innerText = 'ĐÃ BỊ VƯỢT';
        }

        // 3. Chèn vào đầu danh sách và hiệu ứng trượt
        feed.insertBefore(newBid, feed.firstChild);
        gsap.from(newBid, {
            height: 0,
            opacity: 0,
            y: -50,
            duration: 0.6,
            ease: "power3.out"
        });

        // 4. Hiệu ứng phát sáng Cyan/Gold
        gsap.to(newBid, {
            boxShadow: "0 0 40px rgba(0, 242, 255, 0.4)",
            duration: 0.3,
            yoyo: true,
            repeat: 1
        });

        // 5. Cập nhật tổng số Bids và giá trị
        totalBidsEl.innerText = parseInt(totalBidsEl.innerText) + 1;
        showToast(amount);
    }

    // Hàm hiện thông báo Toast trên Mobile
    function showToast(amount) {
        const toast = document.getElementById('bidToast');
        document.getElementById('toastPrice').innerText = (amount / 1000000000).toFixed(1) + " tỷ";

        toast.style.right = '20px';
        setTimeout(() => {
            toast.style.right = '-300px';
        }, 3000);
    }

    // Giả lập sau 5 giây có người đặt giá mới
    setTimeout(() => {
        addNewBid("Đại gia Quận 1", 2500000000);
    }, 5000);


    // ------------------------------- section 3 ----------------------------------//
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Reveal on Scroll (GSAP)
        gsap.from(".reveal-item", {
            scrollTrigger: {
                trigger: "#upcomingSection",
                start: "top 80%",
            },
            y: 80,
            opacity: 0,
            stagger: 0.2,
            duration: 1.2,
            ease: "power4.out"
        });

        // 2. Xoay 3D nhẹ khi di chuột trên Desktop
        if (window.innerWidth > 1024) {
            const cards = document.querySelectorAll('.treasure-card');
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const xc = rect.width / 2;
                    const yc = rect.height / 2;
                    const dx = x - xc;
                    const dy = y - yc;

                    gsap.to(card.querySelector('.card-inner'), {
                        rotationY: dx / 15,
                        rotationX: -dy / 15,
                        duration: 0.5
                    });
                });

                card.addEventListener('mouseleave', () => {
                    gsap.to(card.querySelector('.card-inner'), {
                        rotationY: 0,
                        rotationX: 0,
                        duration: 0.5
                    });
                });
            });
        }

        // 3. Logic Chạm và giữ (Long Press) trên Mobile
        const mobileCards = document.querySelectorAll('.treasure-card');
        mobileCards.forEach(card => {
            let timer;
            card.addEventListener('touchstart', () => {
                timer = setTimeout(() => {
                    card.style.transform = "scale(0.95)";
                    // Hiển thị tooltip hoặc thông tin chi tiết tại đây
                }, 500);
            });
            card.addEventListener('touchend', () => {
                clearTimeout(timer);
                card.style.transform = "scale(1)";
            });
        });
    });


    // ------------------------------- section 4 ----------------------------------//
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng Reveal các thẻ khi cuộn tới
        gsap.from(".trust-card", {
            scrollTrigger: {
                trigger: "#trustSection",
                start: "top 70%",
            },
            y: 0,
            opacity: 0,
            stagger: 0.3,
            duration: 1,
            ease: "power3.out",
            onComplete: () => {
                // Sau khi hiện xong, kích hoạt con dấu (Seal)
                document.querySelectorAll('.trust-card').forEach(card => {
                    card.classList.add('active');
                });
            }
        });

        // 2. Hiệu ứng Stamp (Đóng dấu) đặc biệt
        document.querySelectorAll('.trust-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.fromTo(card.querySelector('.seal-box'), {
                    scale: 3,
                    opacity: 0
                }, {
                    scale: 1,
                    opacity: 0.4,
                    duration: 0.4,
                    ease: "bounce.out"
                });
            });
        });
    });

    // ------------------------------- section 5 ----------------------------------//
    gsap.registerPlugin(ScrollTrigger);

    document.addEventListener("DOMContentLoaded", function() {
        // 1. Hiệu ứng The Greeting (Mở rộng từ tâm)
        gsap.from(".reveal-expand", {
            scrollTrigger: {
                trigger: "#vipSection",
                start: "top 80%",
            },
            scaleX: 0.8,
            opacity: 0,
            duration: 1.5,
            ease: "expo.out"
        });

        // 2. Parallax cho hình nền
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            gsap.to(".lounge-bg-parallax", {
                y: scrolled * 0.1,
                duration: 0.5,
                ease: "none"
            });
        });

        // 3. Custom Cursor cho vùng VIP (Desktop)
        if (window.innerWidth > 1024) {
            const vipCard = document.querySelector('.vip-card');
            vipCard.addEventListener('mouseenter', () => {
                // Logic đổi cursor tại đây (Vd: thêm một div nhỏ chạy theo chuột)
                console.log("Welcome to VIP Lounge");
            });
        }
    });

    function triggerVIPContact() {
        // Hiệu ứng Fade out nhẹ trước khi mở form liên hệ
        gsap.to(".vip-card", {
            opacity: 0.5,
            duration: 0.3,
            yoyo: true,
            repeat: 1
        });
        alert("Chuyên viên tư vấn Private Club sẽ kết nối với bạn trong ít phút.");
    }

    // ------------------------------- section 6 ----------------------------------//
</script>

</html>