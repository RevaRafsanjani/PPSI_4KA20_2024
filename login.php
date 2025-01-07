<?php
session_start();
require "koneksi.php";

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM clients WHERE username='$username'");
    $data = mysqli_fetch_array($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['client_id'] = $data['id']; // Simpan client_id
        $_SESSION['login'] = true;
        header('location: refer.php'); // Arahkan ke halaman refer
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    .login-container {
        background-color: #ffffff;
        padding: 40px;
        /* Sesuaikan padding dengan register-container */
        border-radius: 15px;
        /* Sesuaikan border-radius */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        /* Sesuaikan max-width dengan register-container */
        margin: 10px;
        /* Tambahkan margin untuk jarak */
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 15px;
        /* Kurangi jarak */
        font-size: 28px;
        /* Kurangi ukuran font */
        color: #007bff;
    }

    .login-container .form-label {
        font-weight: bold;
        color: #333;
    }

    .login-container .form-control {
        border-radius: 8px;
        /* Kurangi border-radius */
        padding: 8px;
        /* Kurangi padding */
        font-size: 16px;
        /* Kurangi ukuran font */
        width: 100%;
    }

    .login-container .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .login-container .form-group {
        margin-bottom: 15px;
        /* Kurangi jarak antar elemen */
    }

    .login-container button {
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

    .login-container button:hover {
        background-color: #0056b3;
    }

    .login-container p a {
        text-decoration: none;
        /* Menghilangkan garis bawah */
        color: #007bff;
        /* Warna teks biru */
    }

    .login-container .error-message {
        padding: 10px;
        border-radius: 5px;
        background-color: #f8d7da;
        color: #721c24;
        margin-bottom: 20px;
    }

    .login-container .success-message {
        padding: 10px;
        border-radius: 5px;
        background-color: #d4edda;
        color: #155724;
        margin-bottom: 20px;
    }


    /* Additional spacing between columns */
    .form-control {
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="login-container">
        <h2>Login as Client</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

        <?php if (isset($error)) echo "<div class='error-message'>$error</div>"; ?>

        <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>

</html>