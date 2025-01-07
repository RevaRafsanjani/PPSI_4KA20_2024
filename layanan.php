<?php
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// get layanan by nama layanan/keyword
if (isset($_GET['keyword'])) {
    $querylayanan = mysqli_query($con, "SELECT * FROM layanan WHERE nama LIKE '%$_GET[keyword]%'");
}
// get layanan by kategori
else if (isset($_GET['kategori'])) {
    $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);

    $querylayanan = mysqli_query($con, "SELECT * FROM layanan WHERE kategori_id='$kategoriId[id]'");
}
// get layanan deafult
else {
    $querylayanan = mysqli_query($con, "SELECT * FROM layanan");
}

$countData = mysqli_num_rows($querylayanan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | Services</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<style>
    /* Center the dropdown button */
    .dropdown {
        display: inline-block;
        margin-bottom: 20px;
    }

    /* Adjust spacing and alignment for service cards */
    .row.justify-content-center {
        gap: 20px;
    }

    /* Enhance hover effect for dropdown items */
    .dropdown-item:hover {
        background-color: #f1f1f1;
        color: #000;
    }

    /* Add hover animation for services */
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid bannerservice d-flex align-items-center">
        <div class="container">
            <h1 class="text-dark text-center"><strong>Services</strong></h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5 text-center">
        <h2 class="text-center mb-3">
            <strong><span class="color-text2">Our</span> <span class="color-text1">Services</span></strong>
        </h2>
        <p class="text-center text-black-50 mb-4">We support individuals with disabilities by offering personalized, goal-oriented assistance, helping them thrive in the community and achieve their fullest potential.</p>

        <!-- Dropdown Categories -->
        <div class="dropdown mb-5">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 15px;">
                Select Category
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border-radius: 15px;">
                <li><a class="dropdown-item" href="layanan.php">All Services</a></li>
                <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                    <li><a class="dropdown-item" href="layanan.php?kategori=<?php echo $kategori['nama']; ?>"><?php echo $kategori['nama']; ?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="row justify-content-center">
            <?php
            if ($countData < 1) {
                echo '<h4 class="text-center my-5">The service you are searching for doesn\'t exist yet &#58;&#40;</h4>';
            }
            ?>

            <?php while ($layanan = mysqli_fetch_array($querylayanan)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg" style="border-radius: 15px;">
                        <div class="image-box" style="overflow: hidden; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <img src="image/<?php echo $layanan['foto']; ?>" class="card-img-top" alt="..." style="transition: transform 0.3s; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h4 class="text-center card-title color-text3">
                                <strong><?php echo $layanan['nama']; ?></strong>
                            </h4>
                            <p class="card-text text-truncate text-black-50">
                                <?php echo $layanan['detail']; ?>
                            </p>
                            <a href="layanan-detail.php?nama=<?php echo $layanan['nama']; ?>" class="btn btn-outline-brown text-white p-2 mt-auto mx-auto" style="width: 50%; border-radius: 20px;">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>