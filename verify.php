<?php
require "koneksi.php";

// Mengambil token dari URL
$token = $_GET['token'];

// Memastikan token ada di URL
if (isset($token)) {
    // Cek apakah token ada di database
    $query = "SELECT * FROM clients WHERE token='$token' AND verified=0";  // Hanya memilih yang belum diverifikasi
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika token ditemukan, update status verifikasi
        $row = mysqli_fetch_assoc($result);  // Ambil data dari hasil query
        $updateQuery = "UPDATE clients SET verified=1 WHERE id=" . $row['id'];
        if (mysqli_query($con, $updateQuery)) {
            echo "<script>alert('Email verified successfully! You can now login.');window.location='login.php'</script>";
        } else {
            echo "<script>alert('Error updating verification status. Please try again later.');window.location='login.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid token or email already verified.');window.location='login.php'</script>";
    }
} else {
    echo "<script>alert('Invalid request.');window.location='login.php'</script>";
}
?>