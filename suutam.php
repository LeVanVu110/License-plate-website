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
        }

        /* ---------------------------------------- section 1----------------------------------  */
        .artifact-container {
            position: relative;
            height: 100vh;
            width: 100%;
            background: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* 1. Tiêu đề ẩn phía sau */
        .bg-text-back {
            position: absolute;
            font-family: 'Playfair Display', serif;
            font-size: 15vw;
            font-weight: 900;
            color: #fff;
            opacity: 0.20;
            z-index: 1;
            letter-spacing: 20px;
            pointer-events: none;
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

        /* 5. Scroll Guide */
        .scroll-guide {
            position: absolute;
            bottom: 30px;
            text-align: center;
            z-index: 20;
            color: var(--silver-text);
            font-size: 0.7rem;
            letter-spacing: 4px;
            opacity: 0.6;
        }

        .arrow-down {
            width: 1px;
            height: 40px;
            background: linear-gradient(to bottom, var(--silver-text), transparent);
            margin: 15px auto 0;
        }

        /* ---------------------------------------- section 2----------------------------------  */


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
        <div class="bg-text-back">MASTERPIECE</div>

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
            <p>KHÁM PHÁ DI SẢN</p>
            <div class="arrow-down"></div>
        </div>
    </section>
    <!-- -----------------------------------section 2 -----------------------------------  -->

    <!-- -----------------------------------section 3 -----------------------------------  -->


    <!-- -----------------------------------section 4 -----------------------------------  -->


    <!-- -----------------------------------section 5 -----------------------------------  -->


    <!-- -----------------------------------section 6 -----------------------------------  -->


    <!-- -----------------------------------section 7 -----------------------------------  -->



    <?php include "footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        // -------------------------------------- section 1 ------------------------------- //
        const plate = document.getElementById('mainPlate');

        // 1. Hiệu ứng lơ lửng (Floating)
        gsap.to(plate, {
            y: -15,
            duration: 3,
            ease: "power1.inOut",
            yoyo: true,
            repeat: -1
        });

        // 2. Hiệu ứng nghiêng theo chuột (Mouse Tilt)
        document.addEventListener('mousemove', (e) => {
            const {
                clientX,
                clientY
            } = e;
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;

            // Tính toán độ nghiêng (tối đa 15 độ)
            const rotateX = (centerY - clientY) / 25;
            const rotateY = (clientX - centerX) / 25;

            gsap.to(plate, {
                rotateX: rotateX,
                rotateY: rotateY,
                duration: 0.5,
                ease: "power2.out"
            });
        });
        // -------------------------------------- section 2 ------------------------------- //


        // -------------------------------------- section 3 ------------------------------- //


        // -------------------------------------- section 4 ------------------------------- //


        // -------------------------------------- section 5 ------------------------------- //


        // -------------------------------------- section 6 ------------------------------- //


        // -------------------------------------- section 7 ------------------------------- //
        
    </script>
</body>

</html>