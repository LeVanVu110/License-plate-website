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
        :root {
            --gold-champagne: #F7E7CE;
            --gold-primary: #D4AF37;
            --silver-text: #E5E5E5;
        }

        /* --------------------------- section 1 ------------------------  */
        .concierge-entrance {
            position: relative;
            height: 100vh;
            width: 100%;
            background: #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            cursor: none !important;
            /* Ẩn chuột mặc định */
        }

        /* Background & Ken Burns Effect */
        .hero-background {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .hero-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            animation: kenBurns 20s infinite alternate;
        }

        @keyframes kenBurns {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        .overlay-dark {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.8) 100%);
            z-index: 2;
        }

        /* Typography */
        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 0 5%;
        }

        .headline-wrapper {
            overflow: hidden;
            margin-bottom: 20px;
        }

        .concierge-headline {
            font-family: 'serif';
            /* Nên dùng Cormorant Garamond nếu có link font */
            font-size: clamp(2.5rem, 6vw, 5.5rem);
            font-weight: 300;
            color: var(--gold-champagne);
            letter-spacing: 5px;
            margin: 0;
            transform: translateY(100%);
        }

        .gold-line {
            width: 0;
            height: 1px;
            background: var(--gold-primary);
            margin: 15px auto 0;
            box-shadow: 0 0 10px var(--gold-primary);
        }

        .concierge-sub {
            font-family: sans-serif;
            font-size: 10px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--silver-text);
            opacity: 0;
            margin-top: 20px;
        }

        /* Custom Cursor */
        .hero-cursor {
            position: fixed;
            width: 80px;
            height: 80px;
            border: 1px solid var(--gold-primary);
            background: rgba(212, 175, 55, 0.1);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            backdrop-filter: blur(2px);
            transition: opacity 0.3s ease, transform 0.1s ease-out;
            will-change: transform;
        }

        .hero-cursor span {
            font-size: 8px;
            color: var(--gold-champagne);
            letter-spacing: 2px;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0.3;
            }
        }

        /* Hạt bụi sáng */
        .particles-container {
            position: absolute;
            inset: 0;
            z-index: 3;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(212, 175, 55, 0.4);
            border-radius: 50%;
        }

        /* Mobile Quick Actions */
        .mobile-quick-actions {
            display: none;
            position: absolute;
            bottom: 40px;
            width: 90%;
            left: 5%;
            gap: 15px;
            z-index: 20;
        }

        .action-btn-glass {
            flex: 1;
            padding: 18px 0;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: var(--gold-champagne);
            text-align: center;
            font-size: 11px;
            letter-spacing: 2px;
            text-decoration: none;
            font-family: sans-serif;
        }

        .pulse {
            animation: pulseGlow 2s infinite;
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(212, 175, 55, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .concierge-entrance {
                cursor: auto;
            }

            .hero-cursor {
                display: none;
            }

            .hero-content {
                transform: translateY(-15%);
            }

            .mobile-quick-actions {
                display: flex;
            }

            .hero-video {
                object-position: center;
            }
        }

        /* --------------------------- section 2 ------------------------  */
        .exclusive-channels {
    background: #000;
    padding: 100px 5%;
    position: relative;
    z-index: 5;
}

.channels-container {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px; /* Gutter thoáng đạt */
}

.privilege-card {
    background: #121212; /* Đen Obsidian */
    padding: 60px 40px;
    border-radius: 4px;
    position: relative;
    overflow: hidden;
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 30px 60px rgba(0,0,0,0.5); /* Deep Shadows */
    border: 1px solid rgba(255,255,255,0.03);
    text-align: center;
}

/* Hiệu ứng Glow & Hover Lift */
.card-glow {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center, rgba(212,175,55,0.15) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s;
}

.privilege-card:hover {
    transform: translateY(-20px);
    border-color: rgba(212,175,55,0.3);
}

.privilege-card:hover .card-glow { opacity: 1; }

.channels-container:hover .privilege-card:not(:hover) {
    opacity: 0.4;
    filter: blur(2px);
}

/* Typography & Icons */
.icon-box {
    height: 80px;
    margin-bottom: 30px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.gold-icon {
    width: 40px;
    height: 40px;
    color: var(--gold-primary);
}

.channel-label {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    color: var(--gold-primary);
    font-size: 12px;
    letter-spacing: 4px;
    margin-bottom: 20px;
}

.contact-value {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.8rem;
    color: #F5F5F7;
    margin-bottom: 15px;
}

.contact-value.address { font-size: 1.4rem; }

.channel-desc {
    font-size: 12px;
    color: #666;
    line-height: 1.6;
    max-width: 80%;
    margin: 0 auto;
}

/* Mobile Actions */
.mobile-direct-btn {
    display: none; /* Chỉ hiện trên mobile */
    margin-top: 30px;
    padding: 15px;
    background: rgba(212,175,55,0.1);
    border: 1px solid var(--gold-primary);
    color: var(--gold-primary);
    text-decoration: none;
    font-size: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

/* Typing Indicator Animation */
.typing-indicator {
    position: absolute;
    top: 10px; right: 40%;
    display: flex; gap: 4px;
}
.typing-indicator span {
    width: 4px; height: 4px; background: var(--gold-primary);
    border-radius: 50%; animation: bounce 1.4s infinite ease-in-out;
}
.typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
.typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

@keyframes bounce { 0%, 80%, 100% { transform: scale(0); } 40% { transform: scale(1); } }

/* RESPONSIVE */
@media (max-width: 1024px) {
    .channels-container { grid-template-columns: 1fr; gap: 20px; }
    .privilege-card { padding: 40px 20px; }
    .mobile-direct-btn { display: block; }
    .privilege-card:hover { transform: none; }
    .channels-container:hover .privilege-card:not(:hover) { opacity: 1; filter: none; }
}

        /* --------------------------- section 3 ------------------------  */

        /* --------------------------- section 4 ------------------------  */

        /* --------------------------- section 5 ------------------------  */
    </style>
</head>

<body>
    <!-- ---------------------------- section 1 ---------------------------- -->
    <section class="concierge-entrance" id="contactHero">
        <div class="hero-cursor"><span>SCROLL</span></div>
        <div class="particles-container" id="lightParticles"></div>

        <div class="hero-background">
            <div class="overlay-dark"></div>
            <video autoplay muted loop playsinline class="hero-video">
                <source src="https://player.vimeo.com/external/477117181.sd.mp4?s=d001f35f3b7c4f4a47d27e99b0c74b9d0a79a3b8&profile_id=164&oauth2_token_id=57447761" type="video/mp4">
            </video>
        </div>

        <div class="hero-content">
            <div class="headline-wrapper">
                <h1 class="concierge-headline">KẾT NỐI ĐẶC QUYỀN</h1>
                <div class="gold-line"></div>
            </div>
            <p class="concierge-sub">Chuyên viên tư vấn riêng của chúng tôi luôn sẵn sàng lắng nghe yêu cầu của quý khách.</p>
        </div>

        <div class="mobile-quick-actions">
            <a href="tel:0900000000" class="action-btn-glass pulse">GỌI NGAY</a>
            <a href="#" class="action-btn-glass">ZALO VIP</a>
        </div>
    </section>

    <!-- ---------------------------- section 2 ---------------------------- -->
     <section class="exclusive-channels" id="channelsSection">
    <div class="channels-container">
        
        <div class="privilege-card" id="hotlineCard">
            <div class="card-glow"></div>
            <div class="card-content">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24" class="gold-icon phone-icon">
                        <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="channel-label">HOTLINE VIP</h3>
                <div class="contact-value counter" data-target="0988999999">0</div>
                <p class="channel-desc">Ưu tiên xử lý các yêu cầu khẩn cấp 24/7</p>
                <a href="tel:0988999999" class="mobile-direct-btn">BẤM ĐỂ GỌI</a>
            </div>
        </div>

        <div class="privilege-card" id="chatCard">
            <div class="card-glow"></div>
            <div class="card-content">
                <div class="icon-box">
                    <div class="typing-indicator"><span></span><span></span><span></span></div>
                    <svg viewBox="0 0 24 24" class="gold-icon chat-icon">
                        <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="channel-label">PRIVATE CHAT</h3>
                <div class="contact-value">ZALO / WHATSAPP</div>
                <p class="channel-desc">Trao đổi hồ sơ và hình ảnh trực tiếp qua mã hóa</p>
                <a href="#" class="mobile-direct-btn">MỞ ZALO</a>
            </div>
        </div>

        <div class="privilege-card" id="officeCard">
            <div class="card-glow"></div>
            <div class="card-content">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24" class="gold-icon map-icon">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="channel-label">HEADQUARTERS</h3>
                <div class="contact-value address">Landmark 81, TP. HCM</div>
                <p class="channel-desc">Gặp gỡ trực tiếp và chiêm ngưỡng bộ sưu tập</p>
                <a href="#" class="mobile-direct-btn">XEM BẢN ĐỒ</a>
            </div>
        </div>

    </div>
</section>

    <!-- ---------------------------- section 3 ---------------------------- -->

    <!-- ---------------------------- section 4 ---------------------------- -->

    <!-- ---------------------------- section 5 ---------------------------- -->

    <?php include "footer.php" ?>
</body>
<script>
    // ------------------------- section 1 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Logic Custom Cursor (Fix lỗi lệch tâm và mượt mà hơn)
        const cursor = document.querySelector('.hero-cursor');
        const hero = document.getElementById('contactHero');

        // Sử dụng GSAP QuickSetter để tối ưu hiệu năng di chuyển chuột
        const xSetter = gsap.quickSetter(cursor, "x", "px");
        const ySetter = gsap.quickSetter(cursor, "y", "px");

        window.addEventListener('mousemove', (e) => {
            // Trừ đi 40 (tức 1/2 kích thước 80px của cursor) để tâm vòng tròn trùng mũi chuột
            gsap.to(cursor, {
                x: e.clientX - 750,
                y: e.clientY - 350,
                duration: 0.5,
                ease: "power2.out"
            });
        });

        // Hiệu ứng Hover vào vùng Hero
        hero.addEventListener('mouseenter', () => {
            gsap.to(cursor, {
                opacity: 1,
                scale: 1,
                duration: 0.3
            });
        });

        hero.addEventListener('mouseleave', () => {
            gsap.to(cursor, {
                opacity: 0,
                scale: 0.5,
                duration: 0.3
            });
        });

        // Hiệu ứng click chuột (bóp nhỏ vòng tròn)
        window.addEventListener('mousedown', () => gsap.to(cursor, {
            scale: 0.8,
            duration: 0.2
        }));
        window.addEventListener('mouseup', () => gsap.to(cursor, {
            scale: 1,
            duration: 0.2
        }));


        // 2. Hiệu ứng "The Arrival" (Xuất hiện khi tải trang)
        const tl = gsap.timeline();

        tl.to(".hero-video", {
                opacity: 0.7,
                duration: 2.5,
                ease: "power2.inOut"
            })
            .to(".concierge-headline", {
                translateY: 0,
                duration: 1.5,
                ease: "expo.out"
            }, "-=1.5")
            .to(".gold-line", {
                width: "100%",
                duration: 2,
                ease: "expo.inOut"
            }, "-=1")
            .to(".concierge-sub", {
                opacity: 1,
                y: -10,
                duration: 1
            }, "-=0.5");


        // 3. Tạo hạt bụi sáng (Light Particles) bay lơ lửng
        const particleContainer = document.getElementById('lightParticles');
        if (particleContainer) {
            for (let i = 0; i < 30; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                const size = Math.random() * 3 + 'px';
                p.style.cssText = `
                    position: absolute;
                    width: ${size}; height: ${size};
                    background: rgba(212, 175, 55, 0.3);
                    border-radius: 50%;
                    top: ${Math.random() * 100}%;
                    left: ${Math.random() * 100}%;
                    box-shadow: 0 0 10px #D4AF37;
                    pointer-events: none;
                `;
                particleContainer.appendChild(p);

                gsap.to(p, {
                    y: "-=100",
                    x: "+=" + (Math.random() * 50 - 25),
                    opacity: 0,
                    duration: Math.random() * 5 + 5,
                    repeat: -1,
                    ease: "none",
                    delay: Math.random() * 5
                });
            }
        }


        // 4. Hiệu ứng Scroll (Mờ dần khi cuộn xuống)
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const threshold = 700;

            gsap.to("#contactHero", {
                opacity: Math.max(0, 1 - (scrolled / threshold)),
                y: -scrolled * 0.15,
                duration: 0.1,
                ease: "none"
            });
        });


        // 5. Cảm biến nghiêng (Gravity Sensor) dành riêng cho Mobile
        if (window.DeviceOrientationEvent && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            window.addEventListener('deviceorientation', (e) => {
                // gamma: nghiêng trái/phải, beta: nghiêng trước/sau
                const tiltX = e.gamma / 12;
                const tiltY = e.beta / 12;

                gsap.to(".hero-video", {
                    x: tiltX * 8,
                    y: tiltY * 8,
                    duration: 1.2,
                    ease: "power2.out"
                });
            });
        }
    });

    // ------------------------- section 2 --------------------- //
    document.addEventListener("DOMContentLoaded", function() {
    // 1. Number Counting Animation cho Hotline
    const counters = document.querySelectorAll('.counter');
    
    const countTo = (element) => {
        const target = element.getAttribute('data-target');
        const countObj = { val: 0 };
        
        gsap.to(countObj, {
            val: target,
            duration: 2.5,
            ease: "power3.out",
            scrollTrigger: {
                trigger: element,
                start: "top 90%",
            },
            onUpdate: function() {
                // Định dạng số điện thoại đẹp: 09xx.xxx.xxx
                let raw = Math.ceil(countObj.val).toString().padStart(10, '0');
                element.innerText = raw.replace(/(\d{4})(\d{3})(\d{3})/, '$1.$2.$3');
            }
        });
    };

    counters.forEach(countTo);

    // 2. Icon Animations
    // Rung nhẹ icon điện thoại định kỳ
    gsap.to(".phone-icon", {
        rotation: 15,
        duration: 0.1,
        repeat: 5,
        yoyo: true,
        paused: true,
        id: "ring"
    });
    
    setInterval(() => {
        gsap.fromTo(".phone-icon", {rotation: -10}, {rotation: 10, duration: 0.1, repeat: 10, yoyo: true});
    }, 4000);

    // 3. Mobile Haptic Feedback (Rung phản hồi khi nhấn thẻ)
    const cards = document.querySelectorAll('.privilege-card');
    cards.forEach(card => {
        card.addEventListener('click', () => {
            if ("vibrate" in navigator) {
                navigator.vibrate(20); // Rung nhẹ 20ms
            }
        });
    });
});

    // ------------------------- section 3 --------------------- //

    // ------------------------- section 4 --------------------- //

    // ------------------------- section 5 --------------------- //

    // ------------------------- section 6 --------------------- //
</script>

</html>