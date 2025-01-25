<?php
// Konfigurasi koneksi database
$host = 'localhost';
$dbname = 'elearning';
$username = '';
$password = ''; // Sesuaikan dengan database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $kota_lahir = $_POST['kota_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $gender = $_POST['gender'];
        $nama_wali = $_POST['nama_wali'];
        $no_hp = $_POST['no_hp'];
        $id_kelas = $_POST['id_kelas'];
        $password = md5($_POST['password']);
        $status = "AKTIF";
        $id_admin = 1; // Default admin ID

        $stmt = $pdo->prepare("INSERT INTO siswa 
            (nisn, nama, kota_lahir, tgl_lahir, gender, nama_wali, no_hp, id_kelas, status, password, id_admin) 
            VALUES (:nisn, :nama, :kota_lahir, :tgl_lahir, :gender, :nama_wali, :no_hp, :id_kelas, :status, :password, :id_admin)");

        $stmt->bindParam(':nisn', $nisn);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kota_lahir', $kota_lahir);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':nama_wali', $nama_wali);
        $stmt->bindParam(':no_hp', $no_hp);
        $stmt->bindParam(':id_kelas', $id_kelas);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id_admin', $id_admin);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registrasi berhasil!');
                window.location.href = '../index.html'; //
            </script>";
        } else {
            echo "<script>
                alert('Gagal melakukan registrasi.');
                window.history.back();
            </script>";
        }
    }
} catch (PDOException $e) {
    echo "<script>
        alert('Error: " . $e->getMessage() . "');
        window.history.back();
    </script>";
}
?>