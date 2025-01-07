<?php
require "koneksi.php";
$querylayanan = mysqli_query($con, "SELECT id, nama, foto, detail FROM layanan LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->

    <div class="container-fluid p-0">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Gambar 1 -->
                <div class="carousel-item active">
                    <div class="d-flex align-items-center" style="height: 90vh; background: linear-gradient(to right, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%), url('../acnursing/image/banner5.jpg'); background-size: cover; background-position: center; width: 100%;">
                        <div class="container text-start text-black">
                            <h1><strong>Welcome to AC Nursing Care</strong></h1>
                            <h3 class="warna5">Your smile and comfort</h3>
                            <h3 class="warna5">are our priorities 😊</h3>
                            <div class="mt-4">
                                <a href="contact.php" class="btn btn-outline-green text-white mb-3 button-uniform" style="border-radius: 15px;">Call Us Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gambar 2 -->
                <div class="carousel-item">
                    <div class="d-flex align-items-center" style="height: 90vh; background: linear-gradient(to right, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%), url('../acnursing/image/fitness.jpg'); background-size: cover; background-position: center; width: 100%;">
                        <div class="container text-start text-black">
                            <h1><strong>AC Nursing Care</strong></h1>
                            <h3 class="warna5">We care for you</h3>
                            <h3 class="warna5">like our own family ❤️</h3>
                            <div class="mt-4">
                                <a href="contact.php" class="btn btn-outline-green text-white mb-3 button-uniform" style="border-radius: 15px;">Call Us Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gambar 3 -->
                <div class="carousel-item">
                    <div class="d-flex align-items-center" style="height: 90vh; background: linear-gradient(to right, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%), url('../acnursing/image/banner2.jpg'); background-size: cover; background-position: center; width: 100%;">
                        <div class="container text-start text-black">
                            <h1><strong>Professional Nursing Care</strong></h1>
                            <h3 class="warna5">Providing care with passion</h3>
                            <h3 class="warna5">and dedication 🌟</h3>
                            <div class="mt-4">
                                <a href="contact.php" class="btn btn-outline-green text-white mb-3 button-uniform" style="border-radius: 15px;">Call Us Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol navigasi -->
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <div class="container-fluid" style="border: 1px solid rgb(154, 120, 196); width: 100%; margin: 0 auto;"></div>

    <!-- layanan -->
    <div class="container-fluid py-5 warna7">
        <div class="container text-center">
            <h2 class="mb-3">
                <span class="color-text2"><strong>Our</strong></span>
                <span class="color-text1"><strong>Services</strong></span>
            </h2>
            <p class="text-center text-black-50">We support individuals with disabilities by offering personalized, goal-oriented assistance, helping them thrive in the community and achieve their fullest potential.</p>
            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($querylayanan)) { ?>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="card h-100 shadow-sm" style="border-radius: 15px;">
                            <div class="image-box" style="overflow: hidden; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="..." style="transition: transform 0.3s; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title color-text3 text-center">
                                    <strong><?php echo $data['nama']; ?></strong>
                                </h4>
                                <p class="card-text text-truncate text-black-50">
                                    <?php echo $data['detail']; ?>
                                </p>
                                <a href="layanan-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-outline-brown text-white p-2 mt-auto mx-auto" style="width: 30%; border-radius: 20px;">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- tentang -->
    <div class="container-fluid py-5" style="background: linear-gradient(to left,rgb(117, 205, 212), rgb(209, 163, 253));;">
        <div class="container">
            <div class="about-section">
                <!-- Bagian Gambar -->
                <img src="../acnursing/image/gambarlogo2.jpg" alt="About Us" class="img-fluid">

                <!-- Bagian Teks -->
                <div class="about-text text-white center" style="font-size: large; text-align: justify; line-height: 1.6;">
                    <h3 class="text-dark mb-3" style="font-weight: bold;">About Us</h3>
                    <p class="indent">
                        At <strong>AC Nursing Care</strong>, we are committed to providing exceptional healthcare services tailored to your individual needs. Our mission is to ensure your comfort, happiness, and well-being by delivering compassionate, professional, and high-quality care.
                        With a dedicated team of experienced professionals, we specialize in personalized nursing solutions designed to support your daily living and enhance your quality of life. Whether it's nursing care, continence support, or daily assistance, we treat you like family, fostering trust and respect in everything we do.
                        <strong>Your smile is our priority, and your comfort is our purpose.</strong> Let us take care of you with the warmth and expertise you deserve.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>
                <strong><span class="color-text2">Most Popular</span> <span class="color-text1">Service Categories</span></strong>
            </h3>
            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-satu d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="layanan.php?kategori=Nursing Care"><strong>Nursing Care</strong></a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-dua d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="layanan.php?kategori=Community Activities"><strong>Group Activities</strong></a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-tiga d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="layanan.php?kategori=Living Support"><strong>Daily Living Support</strong></a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <div class="container-fluid mb-3" style="border: 1px solid rgb(154, 120, 196); width: 100%; margin: 0 auto;"></div>

    <!-- location Services -->
    <div class="container-fluid py-2 warna7">
        <div class="container text-center">
            <h3 style="color: #69247C;"><strong>Our Locations</strong></h3>
            <div class="row justify-content-center align-items-center py-3 warna-highlight">
                <p class="text-dark fs-5">We currently offer services in the following areas :</p>
                <p>
                    <span class="color-text4">Greater Western Sydney</span>
                    <span class="color-text1">– from Parramatta to the foothills of the Blue Mountains</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <div class="container-fluid" style="border: 1px solid rgb(154, 120, 196); width: 100%; margin: 0 auto;"></div>

    <!-- footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>