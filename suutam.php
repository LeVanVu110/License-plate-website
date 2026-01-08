<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Masterpiece | Bộ Sưu Tập Độc Bản</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold-glow: rgba(212, 175, 55, 0.1);
            --silver-text: #AFAFAF;
            --obsidian: #080808;
            --gold-heritage: #D4AF37;
            --smoke-white: #F5F5F5;
            --lead-gray: #888888;
        }

        /* ---------------------------------------- section 1----------------------------------  */
        .bg-text-back {
        position: absolute;
        font-family: 'Playfair Display', serif;
        font-weight: 900;
        color: #fff;
        opacity: 0.20;
        z-index: 1;
        letter-spacing: 20px;
        pointer-events: none;
        transition: all 0.5s ease;
        text-align: center;
        width: 100%;
        font-size: 15rem; /* Desktop mặc định */
    }

    /* Container bao ngoài */
.artifact-container {
    position: relative;
    height: 100vh;
    width: 100%;
    background: #000000;
    display: flex;             /* Sử dụng Flexbox */
    flex-direction: column;    /* Xếp các thành phần theo hàng dọc */
    justify-content: center;   /* Căn giữa theo chiều dọc */
    align-items: center;       /* Căn giữa theo chiều ngang - QUAN TRỌNG */
    overflow: hidden;
}

/* Biển số trung tâm */
.plate-artifact {
    width: 450px;              /* Kích thước Desktop */
    height: 110px;
    background: linear-gradient(135deg, #fff 0%, #dcdcdc 50%, #fff 100%);
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #aaa;
    z-index: 10;
    margin: 0 auto;            /* Đảm bảo lề tự động căn giữa */
    box-shadow: 0 40px 100px rgba(0,0,0,1);
    filter: drop-shadow(0 20px 50px rgba(0,0,0,0.8));
    transform-style: preserve-3d; /* Giúp hiệu ứng nghiêng mượt hơn */
}

        /* 2. Quầng sáng sau biển số */
        .glow-backdrop {
            position: absolute;
            width: 60vw;
            height: 60vw;
            background: radial-gradient(circle, var(--gold-glow) 0%, rgba(0, 0, 0, 0) 70%);
            z-index: 2;
            pointer-events: none;
        }

        /* 3. Tấm biển số */
        .plate-wrapper {
            z-index: 10;
            perspective: 1000px;
            /* Tạo không gian 3D */
        }

        .plate-artifact {
            width: 550px;
            height: 120px;
            background: linear-gradient(135deg, #fff 0%, #dcdcdc 50%, #fff 100%);
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            /* Để chứa hiệu ứng Shine */
            box-shadow: 0 40px 100px rgba(0, 0, 0, 1);
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #aaa;
            filter: drop-shadow(0 20px 50px rgba(0, 0, 0, 0.8));
        }

        .plate-inner {
            font-size: 3.5rem;
            font-weight: 900;
            color: #111;
            letter-spacing: 10px;
            font-family: 'Arial', sans-serif;
        }

        /* 4. Hiệu ứng ánh sáng quét (Shine Streak) */
        .shine-streak {
            position: absolute;
            top: 0;
            left: -150%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.4),
                    transparent);
            transform: skewX(-20deg);
            animation: shine 6s infinite;
        }

        @keyframes shine {
            0% {
                left: -150%;
            }

            20% {
                left: 150%;
            }

            100% {
                left: 150%;
            }
        }

        /* Chỉ dẫn cuộn */
    .scroll-guide {
        position: absolute;
        bottom: 30px;
        text-align: center;
        z-index: 20;
        color: var(--silver-text);
    }

    .scroll-text {
        font-size: 0.7rem;
        letter-spacing: 4px;
        display: block;
    }

    /* --- RESPONSIVE CHO MOBILE --- */
    @media (max-width: 768px) {
        .artifact-container {
            align-items: center;
            padding-top: 0; /* Có thể chỉnh padding để đẩy lên cao nếu cần */
            height: 65vh;
        }

        .bg-text-back {
            font-size: 2rem; /* Thu nhỏ font */
            letter-spacing: 11px;
            top: 55%; /* Đẩy lên trên biển số */
        }

        .plate-artifact {
            width: 50vw; /* Tràn lề 50vw */ 
            height: auto;
            aspect-ratio: 16/5;
        }

        .plate-inner {
            font-size: 4vw; /* Chữ trong biển số tự co giãn 4vw */
            letter-spacing: 5px;
        }

        .scroll-text {
            display: none; /* Ẩn chữ trên mobile */
        }

        .arrow-down {
            animation: pulse 2s infinite; /* Hiệu ứng Pulse cho mũi tên */
        }
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.2); opacity: 0.8; }
        100% { transform: scale(1); opacity: 0.3; }
    }

        /* ---------------------------------------- section 2----------------------------------  */
        .heritage-hall {
            background-color: var(--obsidian);
            position: relative;
            padding: 150px 0;
        }

        /* Đường kẻ dẫn dắt dọc */
        .vertical-line-guide {
            position: absolute;
            top: 0;
            left: 50%;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, var(--gold-heritage), transparent);
            opacity: 0.3;
            z-index: 1;
        }

        .heritage-block {
            display: flex;
            align-items: center;
            min-height: 100vh;
            padding: 100px 8%;
            position: relative;
            z-index: 2;
        }

        /* Bố cục 60/40 */
        .showcase-container {
            flex: 0 0 60%;
            display: flex;
            justify-content: center;
        }

        .story-container {
            flex: 0 0 40%;
            padding: 0 50px;
        }

        /* Khung kính ảo cho biển số */
        .glass-frame {
            width: 80%;
            aspect-ratio: 16/9;
            background: linear-gradient(145deg, #111, #000);
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 50px 100px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            will-change: transform, opacity;
        }

        .plate-mini {
            background: #fff;
            padding: 15px 40px;
            border-radius: 5px;
            font-size: 3rem;
            font-weight: 900;
            color: #000;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
        }

        /* Typography */
        .sub-headline {
            color: var(--gold-heritage);
            font-size: 0.8rem;
            letter-spacing: 5px;
            display: block;
            margin-bottom: 20px;
        }

        .main-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--smoke-white);
            margin-bottom: 30px;
        }

        .description {
            color: var(--lead-gray);
            line-height: 1.8;
            font-size: 1.1rem;
            max-width: 500px;
        }

        /* Đảo ngược cho block-right */
        .block-right .story-container {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        /* Mobile CSS cho Section 2 */
@media (max-width: 768px) {
    .heritage-block {
        flex-direction: column !important; /* Ép về một hàng dọc */
        text-align: center;
        gap: 30px;
    }
    /* Đảm bảo ảnh luôn nằm trên văn bản */
    .heritage-block.reverse {
        flex-direction: column-reverse !important;
    }
    .story-content {
        width: 100%;
        padding: 0 10px;
    }
    .showcase-image-wrapper {
        width: 100%;
        height: auto;
    }
}

        /* ---------------------------------------- section 3----------------------------------  */


        /* ---------------------------------------- section 4----------------------------------  */


        /* ---------------------------------------- section 5----------------------------------  */


        /* ---------------------------------------- section 6----------------------------------  */


        /* ---------------------------------------- section 7----------------------------------  */
    </style>
</head>

<body>
    <!-- -----------------------------------section 1 -----------------------------------  -->
    <section class="artifact-container">
    <div class="bg-text-back" id="bgText">MASTERPIECE</div>
    <div class="glow-backdrop"></div>

    <div class="plate-wrapper">
        <div class="plate-artifact" id="mainPlate">
            <div class="plate-content">
                <div class="plate-inner">30K - 999.99</div>
                <div class="shine-streak"></div>
            </div>
        </div>
    </div>

    <div class="scroll-guide">
        <span class="scroll-text">SCROLL TO EXPLORE</span>
        <div class="arrow-down"></div>
    </div>
</section>
    <!-- -----------------------------------section 2 -----------------------------------  -->
    <section class="heritage-hall">
        <div class="vertical-line-guide"></div>

        <div class="heritage-block block-left">
            <div class="showcase-container">
                <div class="glass-frame parallax-img">
                    <div class="plate-mini car-plate">29A - 888.88</div>
                </div>
            </div>
            <div class="story-container">
                <span class="sub-headline">BIỂU TƯỢNG QUYỀN LỰC</span>
                <h2 class="main-title">Đại Phát Thiên Thu</h2>
                <p class="description">
                    Con số 8 tượng trưng cho sự vĩnh cửu và thịnh vượng. Với dãy ngũ quý 8,
                    tấm biển không chỉ là định danh, mà là một lời khẳng định về vị thế
                    độc tôn và tầm vóc của người sở hữu trong giới thượng lưu.
                </p>
            </div>
        </div>

        <div class="heritage-block block-right">
            <div class="story-container">
                <span class="sub-headline">DI SẢN TỐC ĐỘ</span>
                <h2 class="main-title">30L - 999.99</h2>
                <p class="description">
                    Số 9 - con số của sự trường thọ và viên mãn. Đây là tác phẩm dành riêng
                    cho những quý tộc mong muốn tìm kiếm sự hoàn mỹ tuyệt đối trong từng
                    chi tiết nhỏ nhất của bộ sưu tập xe cá nhân.
                </p>
            </div>
            <div class="showcase-container">
                <div class="glass-frame parallax-img">
                    <div class="plate-mini car-plate">30L - 999.99</div>
                </div>
            </div>
        </div>
    </section>
    <!-- -----------------------------------section 3 -----------------------------------  -->


    <!-- -----------------------------------section 4 -----------------------------------  -->


    <!-- -----------------------------------section 5 -----------------------------------  -->


    <!-- -----------------------------------section 6 -----------------------------------  -->


    <!-- -----------------------------------section 7 -----------------------------------  -->



    <?php include "footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        // -------------------------------------- section 1 ------------------------------- //
        const plate = document.getElementById('mainPlate');
    const isMobile = window.innerWidth <= 768;

    // 1. Hiệu ứng lơ lửng chung (Floating)
    gsap.to(plate, {
        y: -15,
        duration: 3,
        ease: "power1.inOut",
        yoyo: true,
        repeat: -1
    });

    if (!isMobile) {
        // --- CHẾ ĐỘ DESKTOP: Nghiêng theo chuột ---
        document.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;

            const rotateX = (centerY - clientY) / 25;
            const rotateY = (clientX - centerX) / 25;

            gsap.to(plate, {
                rotateX: rotateX,
                rotateY: rotateY,
                duration: 0.5,
                ease: "power2.out"
            });
        });
    } else {
        // --- CHẾ ĐỘ MOBILE: Nghiêng tự động (Auto-tilt) ---
        gsap.to(plate, {
            rotateY: 15,
            rotateX: 5,
            duration: 2.5,
            ease: "sine.inOut",
            yoyo: true,
            repeat: -1
        });
        
        // Đẩy tiêu đề nền lên trên biển số một chút bằng GSAP nếu cần tinh chỉnh
        gsap.set("#bgText", { y: -100 });
    }
        // -------------------------------------- section 2 ------------------------------- //
        // Đăng ký plugin với GSAP
    gsap.registerPlugin(ScrollTrigger);

    // Kiểm tra nếu các phần tử tồn tại trước khi chạy để tránh lỗi
    const blocks = gsap.utils.toArray(".heritage-block");
    
    blocks.forEach((block) => {
        const subTitle = block.querySelector(".sub-headline");
        const mainTitle = block.querySelector(".main-title");
        const desc = block.querySelector(".description");
        const imgFrame = block.querySelector(".glass-frame");

        // Tạo Timeline cho từng block
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: block,
                start: "top 80%", // Kích hoạt khi block cách đỉnh màn hình 80%
                toggleActions: "play none none reverse"
            }
        });

        tl.from(subTitle, {
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: "power3.out"
        })
        .from(mainTitle, {
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        }, "-=0.6")
        .from(desc, {
            y: 40,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        }, "-=0.7");

        // Hiệu ứng Zoom hình ảnh từ 1.1 về 1
        gsap.fromTo(imgFrame, 
            { 
                scale: 1.15, 
                opacity: 0 
            }, 
            { 
                scale: 1, 
                opacity: 1, 
                duration: 1.5, 
                ease: "power2.out",
                scrollTrigger: {
                    trigger: imgFrame,
                    start: "top 90%",
                }
            }
        );
    });

        // -------------------------------------- section 3 ------------------------------- //


        // -------------------------------------- section 4 ------------------------------- //


        // -------------------------------------- section 5 ------------------------------- //


        // -------------------------------------- section 6 ------------------------------- //


        // -------------------------------------- section 7 ------------------------------- //
    </script>
</body>

</html>