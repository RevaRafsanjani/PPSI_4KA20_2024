<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | About Us</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<style>
    /* Efek Fade In untuk teks */
    .text-effect {
        opacity: 0;
        animation: fadeIn 2s forwards;
    }

    /* Efek hover untuk teks */
    .text-effect:hover {
        color: rgb(137, 66, 179);
        /* Mengubah warna teks saat hover */
        transform: scale(1.05);
        /* Membesarkan teks */
        transition: 0.3s ease-in-out;
    }

    /* FadeIn Animation */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Efek Typing (opsional) */
    .text-effect.typing {
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        animation: typing 3s steps(30) 1s forwards, blink 0.75s step-end infinite;
    }

    /* Typing Animation */
    @keyframes typing {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    /* Efek blink cursor */
    @keyframes blink {
        50% {
            border-color: transparent;
        }
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid bannerservice d-flex align-items-center">
        <div class="container">
            <h1 class="text-dark text-center"><strong>About Us</strong></h1>
        </div>
    </div>

    <!-- main -->
    <div class="container-fluid py-5">
        <div class="container fs-5 mt-3">
            <h2>
                <span class="color-text1"><strong>Welcome To</strong></span>
                <span class="color-text2"><strong>AC Nursing</strong></span>
            </h2>
            <div class="row align-items-center">
                <!-- Kolom Teks -->
                <div class="col-md-6 order-md-1" style="text-align: justify;">
                    <p class="indent text-effect">
                        At <strong>AC Nursing Care</strong>, we are committed to providing exceptional healthcare services tailored to your individual needs. Our mission is to ensure your comfort, happiness, and well-being by delivering compassionate, professional, and high-quality care. With a dedicated team of experienced professionals, we specialize in personalized nursing solutions designed to support your daily living and enhance your quality of life.
                    </p>
                    <p class="indent text-effect">
                        Whether it's nursing care, continence support, or daily assistance, we treat you like family, fostering trust and respect in everything we do.
                    </p>
                    <p class="text-effect">
                        <strong>Your smile is our priority, and your comfort is our purpose.</strong> Let us take care of you with the warmth and expertise you deserve.😊
                    </p>
                </div>
                <!-- Kolom Gambar -->
                <div class="col-md-6 order-md-2 mb-4">
                    <img src="../acnursing/image/aboutus.jpg" alt="About Us" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>