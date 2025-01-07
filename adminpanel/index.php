<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$querylayanan = mysqli_query($con, "SELECT * FROM layanan");
$jumlahlayanan = mysqli_num_rows($querylayanan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel | Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
    <style>
        body {
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%), url("../image/loginbackground.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .main-content {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .summary-card {
            border-radius: 15px;
            padding: 20px;
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .summary-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .summary-card .icon {
            font-size: 5rem;
            margin-bottom: 15px;
        }

        .summary-kategori {
            background: linear-gradient(45deg, #ff6b6b, #f9cb9c);
        }

        .summary-layanan {
            background: linear-gradient(45deg, #1dd1a1, #48dbfb);
        }

        .summary-card h3 {
            font-size: 1.8rem;
            margin: 10px 0;
        }

        .summary-card p {
            margin: 0;
            font-size: 1rem;
        }

        .summary-card a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .summary-card a:hover {
            text-decoration: underline;
        }

        nav ol.breadcrumb {
            background-color: transparent;
        }

        nav ol.breadcrumb li {
            color: #333;
            font-weight: bold;
        }

        nav ol.breadcrumb li i {
            margin-right: 5px;
        }

        .no-decoration {
            text-decoration: none;
            color: inherit;
        }

        .no-decoration:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5 main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
        <h2 class="text-center mb-4">Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</h2>
        <p class="text-center">This is your dashboard for managing the AC Nursing Database.</p>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <!-- Bungkus seluruh kartu dengan elemen <a> -->
                    <a href="kategori.php" class="no-decoration">
                        <div class="summary-card summary-kategori">
                            <div class="icon">
                                <i class="fa-solid fa-list"></i>
                            </div>
                            <h3><strong>Edit Category</strong></h3>
                            <p><?php echo $jumlahKategori; ?> Categories</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <!-- Bungkus seluruh kartu dengan elemen <a> -->
                    <a href="layanan.php" class="no-decoration">
                        <div class="summary-card summary-layanan">
                            <div class="icon">
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </div>
                            <h3><strong>Edit Services</strong></h3>
                            <p><?php echo $jumlahlayanan; ?> Services</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>