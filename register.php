<?php
require "koneksi.php";
session_start();

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Simpan data ke tabel clients
    $query = "INSERT INTO clients (username, password, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Registration successful. Please login!";
        header('location: login.php'); // Arahkan ke halaman login
        exit;
    } else {
        $error = "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<style>
    body {
        background-image: url("image/banner3.jpg");
        background-size: cover;
        /* Membuat gambar menutupi seluruh kontainer */
        background-position: center;
        /* Memusatkan gambar */
        background-attachment: fixed;
        /* Menjaga gambar tetap pada posisi saat scroll */
        background-color: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .register-container {
        background-color: #ffffff;
        padding: 40px;
        /* Kurangi padding */
        border-radius: 15px;
        /* Kurangi border-radius */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        /* Kurangi ukuran maksimum */
        margin: 10px;
        /* Tambahkan margin untuk jarak */
    }

    .register-container h2 {
        text-align: center;
        margin-bottom: 15px;
        /* Kurangi jarak */
        font-size: 28px;
        /* Kurangi ukuran font */
        color: #007bff;
    }

    .register-container .form-label {
        font-weight: bold;
        color: #333;
    }

    .register-container .form-control {
        border-radius: 8px;
        /* Kurangi border-radius */
        padding: 8px;
        /* Kurangi padding */
        font-size: 16px;
        /* Kurangi ukuran font */
        width: 100%;
    }

    .register-container .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .register-container .form-group {
        margin-bottom: 15px;
        /* Kurangi jarak antar elemen */
    }

    .register-container button {
        margin-top: 15px;
        /* Kurangi jarak */
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px;
        /* Kurangi padding */
        border-radius: 8px;
        /* Kurangi border-radius */
        font-size: 16px;
        width: 100%;
        /* Sesuaikan dengan lebar container */
    }

    .register-container button:hover {
        background-color: #0056b3;
    }

    .register-container p a {
        text-decoration: none;
        /* Menghilangkan garis bawah */
        color: #007bff;
        /* Warna teks biru */
    }

    .register-container .error-message,
    .register-container .success-message {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .register-container .error-message {
        background-color: #f8d7da;
        color: #721c24;
    }

    .register-container .success-message {
        background-color: #d4edda;
        color: #155724;
    }

    /* Additional spacing between columns */
    .form-control {
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="register-container">
        <h2>Register as a new Client</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>

        <?php if (isset($error)) echo "<div class='error-message'>$error</div>"; ?>
        <?php if (isset($_SESSION['success'])) echo "<div class='success-message'>$_SESSION[success]</div>"; ?>

        <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>

</html>