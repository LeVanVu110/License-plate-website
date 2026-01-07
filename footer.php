<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Premium Footer - The Last Impression</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --footer-bg: #020202;
            --antique-gold: rgba(153, 101, 21, 0.7); /* Vàng Antique 70% opacity */
            --gold-primary: #D4AF37;
            --graphite-border: #222222;
            --ash-grey: #666666;
            --silver-white: #FFFFFF;
        }

        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #0b0b0b; }

        /* Footer Container */
        footer {
            background-color: var(--footer-bg);
            padding: 80px 10% 40px 10%;
            border-top: 0.5px solid var(--graphite-border);
            color: var(--ash-grey);
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 2fr 1.5fr;
            gap: 50px;
        }

        /* Khu vực 1: Brand Essence */
        .brand-essence .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--gold-primary);
            text-decoration: none;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .brand-essence .slogan {
            margin: 20px 0;
            font-size: 0.95rem;
            line-height: 1.6;
            max-width: 280px;
            color: #444; /* Nhấn mạnh sự trầm mặc */
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-links a {
            width: 35px;
            height: 35px;
            border: 1px solid var(--ash-grey);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ash-grey);
            text-decoration: none;
            transition: 0.4s;
            font-size: 0.9rem;
        }

        .social-links a:hover {
            border-color: var(--gold-primary);
            color: var(--gold-primary);
        }

        /* Khu vực 2: Navigation */
        .nav-links {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .nav-column h4 {
            color: var(--antique-gold);
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 2px;
            margin-bottom: 25px;
        }

        .nav-column ul { list-style: none; padding: 0; margin: 0; }
        .nav-column ul li { margin-bottom: 12px; }

        .nav-column ul li a {
            text-decoration: none;
            color: var(--ash-grey);
            font-size: 0.9rem;
            transition: 0.3s;
            position: relative;
            padding-bottom: 2px;
        }

        .nav-column ul li a:hover {
            color: var(--silver-white);
        }

        /* Gạch chân mảnh khi hover */
        .nav-column ul li a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0.5px;
            bottom: 0;
            left: 0;
            background-color: var(--gold-primary);
            transition: 0.4s;
        }

        .nav-column ul li a:hover::after { width: 100%; }

        /* Khu vực 3: Newsletter & Contact */
        .newsletter h4 {
            color: var(--antique-gold);
            text-transform: uppercase;
            font-size: 0.8rem;
            margin-bottom: 25px;
            letter-spacing: 2px;
        }

        .email-input-group {
            display: flex;
            border-bottom: 1px solid var(--graphite-border);
            padding-bottom: 5px;
            margin-bottom: 35px;
        }

        .email-input-group input {
            background: transparent;
            border: none;
            color: white;
            flex: 1;
            padding: 8px 0;
            font-size: 0.9rem;
            outline: none;
        }

        .email-input-group button {
            background: transparent;
            border: none;
            color: var(--gold-primary);
            cursor: pointer;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hotline-vip {
            display: block;
            font-size: 1.6rem;
            color: var(--ash-grey);
            text-decoration: none;
            letter-spacing: 6px;
            transition: 0.5s;
            margin-top: 10px;
        }

        .hotline-vip:hover {
            color: var(--gold-primary);
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.4);
        }

        /* Back to top */
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: transparent;
            border: 1px solid var(--graphite-border);
            color: var(--ash-grey);
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
            z-index: 100;
        }

        #backToTop:hover {
            border-color: var(--gold-primary);
            color: var(--gold-primary);
        }

        .copyright {
            margin-top: 80px;
            text-align: center;
            font-size: 0.7rem;
            letter-spacing: 1px;
            border-top: 0.5px solid #111;
            padding-top: 25px;
        }
    </style>
</head>
<body>

<div style="height: 1000px;"></div>

<footer>
    <div class="footer-grid">
        <div class="brand-essence">
            <a href="#" class="logo">HERITAGE</a>
            <p class="slogan">"Nơi giá trị con số trở thành di sản cá nhân."</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <div class="nav-links">
            <div class="nav-column">
                <h4>Dịch vụ</h4>
                <ul>
                    <li><a href="#">Định giá</a></li>
                    <li><a href="#">Đấu giá</a></li>
                    <li><a href="#">Ký gửi</a></li>
                </ul>
            </div>
            <div class="nav-column">
                <h4>Hỗ trợ</h4>
                <ul>
                    <li><a href="#">Quy trình pháp lý</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Câu hỏi thường gặp</a></li>
                </ul>
            </div>
        </div>

        <div class="newsletter">
            <h4>Bản tin danh mục số hiếm</h4>
            <div class="email-input-group">
                <input type="email" placeholder="Nhập email của bạn...">
                <button>Đăng ký</button>
            </div>
            <h4>Hotline VIP</h4>
            <a href="tel:19008888" class="hotline-vip">1900 8888</a>
        </div>
    </div>

    <div class="copyright">
        © 2026 HERITAGE AUCTION. ALL RIGHTS RESERVED.
    </div>
</footer>

<button id="backToTop" title="Lên đầu trang">
    <i class="fas fa-chevron-up"></i>
</button>
<script>
    const backToTopBtn = document.getElementById('backToTop');

    // Hiện nút Back to top khi cuộn xuống 300px
    window.onscroll = function() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            backToTopBtn.style.display = "flex";
        } else {
            backToTopBtn.style.display = "none";
        }
    };

    // Cuộn lên mượt mà
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>