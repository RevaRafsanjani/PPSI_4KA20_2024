<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['k'];

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM layanan a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $length > $i; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel | Services details</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
</head>

<style>
    body {
        background-image: linear-gradient(to top, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%),
            url("../image/loginbackground.png");
        background-size: cover;
        background-position: center;
        /* Memusatkan gambar */
        background-repeat: no-repeat;
        background-attachment: fixed;
        /* Agar gambar latar belakang tetap saat halaman di-scroll */
        min-height: 100vh;
        /* Pastikan halaman selalu setinggi layar */
        margin: 0;
    }

    form div {
        margin-bottom: 10px;
    }

    .main-content {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 15px;
    }
</style>

<body>
    <?php require "navbar.php" ?>
    <div class="container mt-5 main-content">
        <h2>Services details</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Name</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Category</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="currentFoto">Service Image</label>
                    <img src="../image/<?php echo $data['foto'] ?>" alt="" width="300px">
                </div>
                <div>
                    <label for="foto">Images</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Details</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"><?php echo $data['detail']; ?></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                    <button type="submit" class="btn btn-danger" name="hapus">Delete</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $detail = htmlspecialchars($_POST['detail']);
                $target_dir = "../image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Name and category columns must be filled in
                    </div>
                    <?php
                } else {
                    // Update data without image if no new image is uploaded
                    $queryUpdate = mysqli_query($con, "UPDATE layanan SET kategori_id='$kategori', nama='$nama', detail='$detail' WHERE id='$id'");

                    if ($nama_file != '') {
                        if ($image_size > 500000) {
                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Files cannot be more than 500 kb
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Files must be of type jpg or png or gif
                                </div>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                                // Update data with new image
                                $queryUpdate = mysqli_query($con, "UPDATE layanan SET foto='$new_name' WHERE id='$id'");

                                if ($queryUpdate) {
                                ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                        Service Updated successfully
                                    </div>

                                    <!-- Redirect after successful update -->
                                    <meta http-equiv="refresh" content="1; url=layanan.php">
                            <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    } else {
                        // No image file update, just refresh page
                        if ($queryUpdate) {
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Service Updated successfully
                            </div>
                            <meta http-equiv="refresh" content="1; url=layanan.php">
                    <?php
                        }
                    }
                }
            }

            if (isset($_POST['hapus'])) {
                $queryHapus = mysqli_query($con, "DELETE FROM layanan WHERE id='$id'");

                if ($queryHapus) {
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Service Deleted Successfully
                    </div>

                    <!-- Redirect after successful deletion -->
                    <meta http-equiv="refresh" content="1; url=layanan.php">
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>