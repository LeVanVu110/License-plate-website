<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            --obsidian: #0B0B0B;
            --champagne: #F7E7CE;
            --titan-white: #E5E5E5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--obsidian);
            color: var(--titan-white);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .logo {
            font-weight: 700;
            font-size: 24px;
            letter-spacing: 4px;
            color: var(--champagne);
        }

        nav a {
            color: var(--titan-white);
            text-decoration: none;
            margin-left: 40px;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: color 0.3s;
        }

        nav a:hover {
            color: var(--champagne);
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            /* Giữ 100% để phủ hết màn hình */
            box-sizing: border-box;
            /* CỰC KỲ QUAN TRỌNG: Nó sẽ ép padding vào bên trong 100% */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 5%;
            /* Giảm bớt padding cho mobile */
            z-index: 9999;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
        }

        .logo {
            font-weight: 700;
            font-size: 24px;
            letter-spacing: 4px;
            color: var(--champagne);
        }

        /* --- Responsive Logic --- */
        .menu-toggle {
            display: none;
            /* Ẩn trên máy tính */
            flex-direction: column;
            cursor: pointer;
            gap: 6px;
        }

        .menu-toggle .bar {
            width: 25px;
            height: 2px;
            background-color: var(--titan-white);
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 5%;
            }

            .menu-toggle {
                display: flex;
                z-index: 1001;
            }

            nav {
                position: fixed;
                top: 0;
                right: -100%;
                /* Đẩy menu ra khỏi màn hình */
                width: 70%;
                height: 100vh;
                background: rgba(11, 11, 11, 0.98);
                /* Màu Obsidian */
                backdrop-filter: blur(15px);
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: baseline;
                transition: 0.5s cubic-bezier(0.77, 0.2, 0.05, 1);
                z-index: 1000;
                padding-top: 20%;
                padding-left: 10%;
            }

            nav.active {
                right: 0;
            }

            /* Hiện menu khi có class active */

            nav a {
                margin: 20px 0;
                font-size: 18px;
                letter-spacing: 5px;
            }

            /* Hiệu ứng biến nút Hamburger thành dấu X */
            .menu-toggle.is-active .bar:nth-child(2) {
                opacity: 0;
            }

            .menu-toggle.is-active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }

            .menu-toggle.is-active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">GATEWAY</div>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <nav id="nav-menu">
            <a>Sưu tập</a>
            <a>Định giá AI</a>
            <a>Đấu giá</a>
            <a href="">Liên hệ</a>
        </nav>
    </header>
</body>
<script>
    // ------------------------------- phần 2 nav-menu------------------------------  //

    const menuToggle = document.getElementById('mobile-menu');
    const navMenu = document.getElementById('nav-menu');

    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('is-active');
        navMenu.classList.toggle('active');
    });

    // Đóng menu khi người dùng click vào một link bất kỳ
    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', () => {
            menuToggle.classList.remove('is-active');
            navMenu.classList.remove('active');
        });
    });
</script>

</html>