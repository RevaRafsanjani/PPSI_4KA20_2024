<?php
include('includes/dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $seName = $_POST['serviceName'];
    $cost = $_POST['cost'];

    // Proses unggah gambar
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Simpan data ke database
        $query = "INSERT INTO tblservices (ServiceName, Cost, Image) VALUES ('$serviceName', '$cost', '$image')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "Layanan berhasil ditambahkan!";
        } else {
            echo "Gagal menambahkan layanan.";
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>
