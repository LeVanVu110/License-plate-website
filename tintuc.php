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
        /* ----------------------------- section 1 -----------------------------  */
        :root {
            --titanium-white: #F5F5F7;
            --silver-grey: #A1A1A6;
            --black-matte: #0A0A0B;
        }

        .editorial-spotlight {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* Desktop: Căn trái */
            overflow: hidden;
            background: var(--black-matte);
        }

        /* Background & Effects */
        .hero-bg-container {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-image-zoom {
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=2070');
            /* Thay bằng ảnh xe/biển số thực tế */
            background-size: cover;
            background-position: center;
            /* Hiệu ứng Ken Burns giả lập bằng CSS nếu không dùng GSAP */
            animation: kenBurns 20s infinite alternate ease-in-out;
        }

        @keyframes kenBurns {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .hero-overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 50%, transparent 100%);
        }

        /* Content Styles */
        .hero-content {
            position: relative;
            z-index: 10;
            padding-left: 10%;
            /* Desktop lề trái */
            max-width: 800px;
        }

        .editorial-meta {
            margin-bottom: 20px;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            letter-spacing: 3px;
            color: var(--silver-grey);
        }

        .editorial-meta .category {
            color: #fff;
            margin-right: 15px;
            border-right: 1px solid #444;
            padding-right: 15px;
        }

        .hero-headline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            line-height: 1.1;
            color: var(--titanium-white);
            margin: 0 0 40px 0;
            font-weight: 400;
        }

        /* Button & Underline */
        .btn-discover {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            letter-spacing: 4px;
            color: #fff;
            text-decoration: none;
            position: relative;
            padding-bottom: 8px;
        }

        .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 1px;
            background: #fff;
            transition: width 0.5s ease;
        }

        .btn-discover:hover .underline {
            width: 100%;
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            text-align: center;
            opacity: 0.6;
        }

        .scroll-text {
            font-size: 9px;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 10px;
        }

        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, #fff, transparent);
            margin: 0 auto;
            animation: scrollLine 2s infinite;
        }

        @keyframes scrollLine {
            0% {
                transform: scaleY(0);
                transform-origin: top;
            }

            50% {
                transform: scaleY(1);
                transform-origin: top;
            }

            51% {
                transform: scaleY(1);
                transform-origin: bottom;
            }

            100% {
                transform: scaleY(0);
                transform-origin: bottom;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-content {
                padding-left: 0;
                margin: 0 auto;
                text-align: center;
                width: 90%;
                margin-top: 20vh;
            }

            .editorial-meta .category {
                border-right: none;
                display: block;
                margin-right: 0;
                margin-bottom: 10px;
            }

            .hero-headline {
                font-size: 2.8rem;
            }
        }

        /* ----------------------------- section 2 -----------------------------  */
        .market-pulse {
            background: #0A0A0A;
            padding: 60px 0 100px;
            font-family: 'Inter', sans-serif;
            color: #fff;
        }

        /* Ticker Styles */
        .ticker-wrapper {
            background: #000;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 15px 0;
            margin-bottom: 80px;
            overflow: hidden;
        }

        .ticker-content {
            display: flex;
            white-space: nowrap;
            animation: marquee 30s linear infinite;
        }

        .ticker-content:hover {
            animation-play-state: paused;
        }

        .ticker-item {
            display: flex;
            align-items: center;
            padding: 0 40px;
            font-family: 'Roboto Mono', monospace;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .ticker-item span {
            color: #666;
            margin-right: 10px;
        }

        .ticker-item i.up {
            color: #00FF94;
            font-style: normal;
            margin-left: 10px;
        }

        .ticker-item .dot {
            width: 6px;
            height: 6px;
            background: #00FF94;
            border-radius: 50%;
            margin-left: 10px;
            box-shadow: 0 0 10px #00FF94;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* Snap Cards Grid */
        .pulse-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5%;
        }

        .snap-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .snap-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 4px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .snap-card:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-5px);
        }

        .stat-label {
            font-size: 10px;
            letter-spacing: 2px;
            color: #888;
            display: block;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Màu sắc xu hướng */
        .up-trend .stat-value {
            color: #00FF94;
            text-shadow: 0 0 20px rgba(0, 255, 148, 0.2);
        }

        .down-trend .stat-value {
            color: #FF3131;
            text-shadow: 0 0 20px rgba(255, 49, 49, 0.2);
        }

        .gold-trend .stat-value {
            color: #D4AF37;
        }

        .sparkline-container {
            height: 60px;
            margin-bottom: 20px;
        }

        .snap-desc {
            font-size: 12px;
            color: #666;
            line-height: 1.6;
        }

        /* Responsive Mobile */
        @media (max-width: 1024px) {
            .snap-grid {
                display: flex;
                overflow-x: auto;
                padding-bottom: 20px;
                scroll-snap-type: x mandatory;
            }

            .snap-card {
                min-width: 280px;
                scroll-snap-align: center;
            }

            .snap-grid::-webkit-scrollbar {
                display: none;
            }
        }

        /* ----------------------------- section 3 -----------------------------  */

        /* ----------------------------- section 4 -----------------------------  */

        /* ----------------------------- section 5 -----------------------------  */
    </style>
</head>

<body>
    <!-- ------------------------------ section 1 ------------------------------  -->
    <section class="editorial-spotlight" id="heroSection">
        <div class="hero-bg-container">
            <div class="hero-image-zoom"></div>
            <div class="hero-overlay-gradient"></div>
        </div>

        <div class="hero-content">
            <div class="editorial-meta reveal-item">
                <span class="category">PHÂN TÍCH THỊ TRƯỜNG</span>
                <span class="read-time">5 PHÚT ĐỌC</span>
            </div>

            <h1 class="hero-headline reveal-item">
                Di sản ẩn mình<br>sau những dãy số
            </h1>

            <div class="hero-action reveal-item">
                <a href="#articleContent" class="btn-discover">
                    KHÁM PHÁ CÂU CHUYỆN
                    <span class="underline"></span>
                </a>
            </div>
        </div>

        <div class="scroll-indicator">
            <span class="scroll-text">CUỘN ĐỂ ĐỌC</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ------------------------------ section 2 ------------------------------  -->
    <section class="market-pulse" id="marketSection">
        <div class="ticker-wrapper">
            <div class="ticker-container">
                <div class="ticker-content">
                    <div class="ticker-item"><span>GIÁ TB TUẦN:</span> 1.2B <i class="up">▲ 4.2%</i></div>
                    <div class="ticker-item"><span>TOP TĂNG TRƯỞNG:</span> 30K-999.99 <i class="up">▲ 15%</i></div>
                    <div class="ticker-item"><span>NGƯỜI CHƠI MỚI:</span> +1,240 <i class="up">▲ 8%</i></div>
                    <div class="ticker-item"><span>SÀN GIAO DỊCH:</span> ĐANG MỞ <span class="dot"></span></div>
                    <div class="ticker-item"><span>GIÁ TB TUẦN:</span> 1.2B <i class="up">▲ 4.2%</i></div>
                    <div class="ticker-item"><span>TOP TĂNG TRƯỞNG:</span> 30K-999.99 <i class="up">▲ 15%</i></div>
                </div>
            </div>
        </div>

        <div class="pulse-container">
            <div class="snap-grid" id="snapCarousel">
                <div class="snap-card up-trend">
                    <div class="snap-header">
                        <span class="stat-label">CHỈ SỐ NIỀM TIN</span>
                        <h3 class="stat-value">+15.8%</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart1"></canvas>
                    </div>
                    <p class="snap-desc">Thị trường biển số ngũ quý đang đạt đỉnh mới trong tháng 10.</p>
                </div>

                <div class="snap-card neutral-trend">
                    <div class="snap-header">
                        <span class="stat-label">LƯỢT TRUY CẬP</span>
                        <h3 class="stat-value">245K</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart2"></canvas>
                    </div>
                    <p class="snap-desc">Sự quan tâm đến dòng biển số phong thủy tăng trưởng ổn định.</p>
                </div>

                <div class="snap-card down-trend">
                    <div class="snap-header">
                        <span class="stat-label">BIẾN ĐỘNG GIÁ</span>
                        <h3 class="stat-value">-2.4%</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart3"></canvas>
                    </div>
                    <p class="snap-desc">Dòng biển số phổ thông ghi nhận sự điều chỉnh giá nhẹ.</p>
                </div>

                <div class="snap-card gold-trend">
                    <div class="snap-header">
                        <span class="stat-label">GIAO DỊCH VIP</span>
                        <h3 class="stat-value">12</h3>
                    </div>
                    <div class="sparkline-container">
                        <canvas class="sparkline" id="chart4"></canvas>
                    </div>
                    <p class="snap-desc">Các phiên đấu giá kín cho giới thượng lưu tăng mạnh.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------------------------ section 3 ------------------------------  -->

    <!-- ------------------------------ section 4 ------------------------------  -->

    <!-- ------------------------------ section 5 ------------------------------  -->


    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------ section 1 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Staggered Load Animation
        const tl = gsap.timeline();

        tl.from(".hero-image-zoom", {
                scale: 1.2,
                filter: "blur(10px)",
                duration: 2,
                ease: "power2.out"
            })
            .from(".reveal-item", {
                y: 40,
                opacity: 0,
                filter: "blur(5px)",
                stagger: 0.3,
                duration: 1.5,
                ease: "power3.out"
            }, "-=1");

        // 2. Mouse Tilt Effect (Chỉ Desktop)
        if (window.innerWidth > 1024) {
            document.addEventListener("mousemove", (e) => {
                const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.01;

                gsap.to(".hero-image-zoom", {
                    x: moveX,
                    y: moveY,
                    duration: 1,
                    ease: "power2.out"
                });

                gsap.to(".hero-content", {
                    x: -moveX * 2, // Chữ trôi ngược hướng ảnh (Parallax)
                    y: -moveY * 2,
                    duration: 1,
                    ease: "power2.out"
                });
            });
        }

        // 3. Simple Parallax Scroll
        window.addEventListener("scroll", () => {
            const scrolled = window.pageYOffset;
            gsap.to(".hero-image-zoom", {
                y: scrolled * 0.3,
                ease: "none",
                duration: 0
            });
        });
    });

    // ------------------------ section 2 ------------------------ //
    document.addEventListener("DOMContentLoaded", function() {
        const charts = [];

        function createSparkline(id, data, color) {
            const canvas = document.getElementById(id);
            if (!canvas) return; // Bảo vệ nếu ID không tồn tại

            const ctx = canvas.getContext('2d');

            // Cố định kích thước canvas để tránh lỗi mất chart
            canvas.style.width = '100%';
            canvas.style.height = '100%';

            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map((_, i) => i),
                    datasets: [{
                        data: data,
                        borderColor: color,
                        borderWidth: 2,
                        pointRadius: 0,
                        fill: false,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Rất quan trọng để hiện đủ 4 cái
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }
                }
            });
        }

        // Khởi tạo lại 4 biểu đồ - Đảm bảo ID chart4 khớp với HTML
        charts.push(createSparkline('chart1', [10, 25, 20, 45, 40, 60, 85], '#00FF94'));
        charts.push(createSparkline('chart2', [30, 35, 32, 40, 38, 42, 45], '#00F2FF'));
        charts.push(createSparkline('chart3', [80, 75, 78, 70, 65, 68, 60], '#FF3131'));
        charts.push(createSparkline('chart4', [5, 10, 8, 15, 12, 18, 20], '#D4AF37'));

        // Hiệu ứng Vẽ lại khi Hover
        document.querySelectorAll('.snap-card').forEach((card, index) => {
            card.addEventListener('mouseenter', () => {
                if (charts[index]) {
                    const chart = charts[index];
                    chart.stop();
                    chart.update();
                }
            });
        });
    });
    // ------------------------ section 3 ------------------------ //

    // ------------------------ section 4 ------------------------ //

    // ------------------------ section 5 ------------------------ //
</script>

</html>