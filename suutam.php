<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Obsidian Gallery | Digital Plate Vault</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --matte-black: #121212;
            --rose-gold: #B76E79;
            --gold-glow: rgba(183, 110, 121, 0.4);
            --text-serif: 'Cinzel', serif;
            --text-sans: 'Inter', sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: var(--matte-black);
            color: #fff;
            font-family: var(--text-sans);
            /* Cho phép cuộn ngang nhưng ẩn thanh cuộn dọc */
            overflow-y: hidden; 
            overflow-x: auto;
        }

        /* Ẩn thanh cuộn để giao diện sạch sẽ */
        body::-webkit-scrollbar { display: none; }
        body { -ms-overflow-style: none; scrollbar-width: none; }

        .ambient-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 50% 50%, #1a1a1a 0%, var(--matte-black) 100%);
            z-index: -1;
        }

        /* Cấu trúc Gallery */
        .gallery-wrapper {
            display: flex;
            width: fit-content; /* Rất quan trọng để kéo dài theo chiều ngang */
            height: 100vh;
        }

        .section {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 8vw;
            flex-shrink: 0;
            position: relative;
        }

        .section-title {
            position: absolute;
            top: 15%; /* Hạ xuống một chút để tránh header */
            left: 8vw;
            font-family: var(--text-serif);
            font-size: clamp(1.5rem, 5vw, 3rem);
            color: var(--rose-gold);
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        /* Plate Card Design */
        .plate-card {
            position: relative;
            width: 450px;
            height: 280px;
            background: #1a1a1a;
            border: 1px solid rgba(255,255,255,0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.5s ease;
            z-index: 10;
        }

        .plate-card:hover {
            transform: scale(1.05);
            border-color: var(--rose-gold);
            box-shadow: 0 0 50px var(--gold-glow);
        }

        .plate-number {
            font-size: 3.5rem;
            font-weight: 700;
            color: #222;
            background: linear-gradient(145deg, #fff, #ccc);
            padding: 10px 30px;
            border-radius: 8px;
            letter-spacing: 2px;
            user-select: none;
        }

        /* X-Ray Layer */
        .xray-layer {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 30px;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        /* Khi click và giữ sẽ hiện X-ray */
        .plate-card:active .xray-layer { opacity: 1; }

        .narrative-box {
            width: 300px;
            margin-left: 40px;
            font-style: italic;
            border-left: 2px solid var(--rose-gold);
            padding-left: 20px;
            color: #aaa;
        }

        .scroll-hint {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.7rem;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.4);
            z-index: 100;
        }
    </style>
</head>
<body>

    <div class="ambient-bg"></div>

    <div class="gallery-wrapper">
        <section class="section">
            <h2 class="section-title">The Legends</h2>
            <div style="display: flex; align-items: center;">
                <div class="plate-card">
                    <div class="plate-number">51K-999.99</div>
                    <div class="xray-layer">
                        <h4 style="color: var(--rose-gold); font-family: var(--text-serif);">X-RAY DATA</h4>
                        <p>• Định giá: 4.2 Tỷ VNĐ</p>
                        <p>• Trạng thái: Sưu tầm</p>
                    </div>
                </div>
                <div class="narrative-box">
                    "Biểu tượng của quyền lực tối thượng."
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Eternal Wealth</h2>
            <div style="display: flex; align-items: center;">
                <div class="plate-card">
                    <div class="plate-number">30K-888.88</div>
                    <div class="xray-layer">
                        <h4 style="color: var(--rose-gold); font-family: var(--text-serif);">X-RAY DATA</h4>
                        <p>• Định giá: 3.8 Tỷ VNĐ</p>
                    </div>
                </div>
                <div class="narrative-box">
                    "Sự thịnh vượng vĩnh cửu từ lòng đất Thủ Đô."
                </div>
            </div>
        </section>
        
        <section class="section">
            <h2 class="section-title">Asset Growth</h2>
            <div style="width: 600px; height: 300px; border: 1px solid var(--rose-gold); padding: 20px;">
                <p>Biểu đồ tăng trưởng tài sản số...</p>
                <svg viewBox="0 0 500 100">
                    <path d="M0,80 Q125,70 250,40 T500,10" fill="none" stroke="#B76E79" stroke-width="3" />
                </svg>
            </div>
        </section>
    </div>

    <div class="scroll-hint">LĂN CHUỘT ĐỂ DI CHUYỂN NGANG</div>

    <script>
        // XỬ LÝ LĂN CHUỘT NGANG
        window.addEventListener("wheel", (evt) => {
            // Nếu dùng chuột lăn dọc (deltaY), ta chuyển nó thành cuộn ngang (scrollLeft)
            if (evt.deltaY !== 0) {
                evt.preventDefault();
                window.scrollBy({
                    left: evt.deltaY * 3, // Nhân 3 để cuộn nhanh và mượt hơn
                    behavior: 'smooth'
                });
            }
        }, { passive: false });

        // HIỆU ỨNG PARALLAX 3D CHO CARD
        const cards = document.querySelectorAll('.plate-card');
        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 15;
                const rotateY = (centerX - x) / 15;

                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)`;
            });
        });
    </script>
</body>
</html>