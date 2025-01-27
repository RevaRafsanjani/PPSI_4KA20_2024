<?php
require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$querylayanan = mysqli_query($con, "SELECT * FROM layanan WHERE nama='$nama'");
$layanan = mysqli_fetch_array($querylayanan);

$querylayananTerkait = mysqli_query($con, "SELECT * FROM layanan WHERE id!='$layanan[id]' ORDER BY RAND() LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | Service Details</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php require "navbar.php"; ?>
    <!-- banner -->
    <div class="container-fluid bannerservice d-flex align-items-center">
        <div class="container">
            <h1 class="text-dark text-center"><strong>Services</strong></h1>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-2">
                    <img src="image/<?php echo $layanan['foto']; ?>" class="w-100 img-thumbnail" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1 class="mb-4">
                        <strong><?php echo $layanan['nama']; ?></strong>
                    </h1>
                    <p class="indent1 fs-5 text-effect" style="text-align: justify;">
                        <?php echo $layanan['detail']; ?>
                    </p>
                    <a href="contact.php?nama=<?php echo $layanan['nama']; ?>" class="btn btn-outline-brown text-white p-2">Need Help?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <div class="container-fluid" style="border: 1px solid rgb(154, 120, 196); width: 100%; margin: 0 auto;"></div>

    <!-- layanan terkait -->
    <div class="container-fluid py-5 warna7">
        <div class="container">
            <h2 class="text-center text-dark mb-5">
                <strong><span class="color-text2">Related</span> <span class="color-text1">Services Of</span></strong>
            </h2>

            <?php
            if (mysqli_num_rows($querylayananTerkait) > 0) {
                // Jika ada layanan terkait, tampilkan daftar layanan
            ?>
                <div class="container-fluid">
                    <div class="row">
                        <?php while ($data = mysqli_fetch_array($querylayananTerkait)) { ?>
                            <div class="col-md-6 col-lg-3 mb-2 mt-3">
                                <a href="layanan-detail.php?nama=<?php echo $data['nama']; ?>">
                                    <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail layanan-terkait-image" alt="">
                                </a>
                                <p class="text-center mt-3" style="color: #69247C; font-size: 1.2rem;"><strong><?php echo $data['nama']; ?></strong></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Tombol lihat lebih banyak -->
                <div class="text-center mt-2" style="margin-top: 10px;">
                    <a class="btn btn-outline-brown text-white p-2" href="layanan.php">See more</a>
                </div>
            <?php
            } else {
                // Jika tidak ada layanan terkait, tampilkan pesan
            ?>
                <div class="text-center text-dark">
                    Oops, no related services found &#58;&#40;
                </div>

                <div class="text-center mt-3">
                    <a class="btn btn-outline-brown text-white p-2" href="layanan.php">Check other services</a>
                </div>
            <?php
            }
            ?>

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