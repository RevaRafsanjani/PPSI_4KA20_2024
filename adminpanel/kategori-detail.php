<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['k'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel | Category Details</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
</head>

<style>
    body {
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%),
            url("../image/loginbackground.png");
        background-size: cover;
        /* Menutupi seluruh layar */
        background-position: top;
        /* Memusatkan gambar */
        background-repeat: no-repeat;
        /* Tidak mengulang gambar */
        height: 100vh;
        /* Tinggi seluruh layar */
        margin: 0;
        /* Menghapus margin default */
        background-attachment: fixed;
    }

    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 10px;
    }

    .main-content {
        background-color: rgba(255, 255, 255, 0.8);
        /* Menambahkan latar belakang putih dengan opasitas */
        padding: 20px;
        border-radius: 15px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5 main-content">
        <h2>Category Details</h2>

        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div>
                    <label for="kategori">Category</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama'] ?>">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Save</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>

            <?php
            if (isset($_POST['editBtn'])) {
                $kategori = htmlspecialchars($_POST['kategori']);

                if ($data['nama'] == $kategori) {
            ?>
                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                    <?php
                } else {
                    $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                    $jumlahData = mysqli_num_rows($query);

                    if ($jumlahData > 0) {
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Categories already exist
                        </div>
                        <?php
                    } else {
                        $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                        $jumlahData = mysqli_num_rows($query);

                        if ($querySimpan) {
                        ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Category Updated Successfully
                            </div>
                            <meta http-equiv="refresh" content="1; url=kategori.php">
                    <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }

            if (isset($_POST['deleteBtn'])) {
                $queryCheck = mysqli_query($con, "SELECT * FROM layanan WHERE kategori_id='$id'");
                $dataCount = mysqli_num_rows($queryCheck);

                if ($dataCount > 0) {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Categories cannot be deleted because they already have services
                    </div>
                <?php
                    die();
                }

                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                if ($queryDelete) {
                ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Category Deleted Successfully
                    </div>
                    <meta http-equiv="refresh" content="1; url=kategori.php">
            <?php
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>