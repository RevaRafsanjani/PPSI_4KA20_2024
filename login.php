<?php
session_start();
require "koneksi.php";

if (isset($_GET['timeout']) && $_GET['timeout'] == 1) {
    echo "<div class='alert alert-warning text-center alert-center'>Session expired. Please log in again.</div>";
}

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Menyiapkan query untuk mencari user berdasarkan username
    $query = $con->prepare("SELECT * FROM clients WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $verif = $result->fetch_assoc();

        // Bandingkan password langsung tanpa hashing
        if ($password === $verif['password']) {
            // Mengecek apakah akun sudah diverifikasi
            if ($verif['verified'] == 1) {
                // Jika sudah diverifikasi, login berhasil
                $_SESSION['username'] = $verif['username'];
                $_SESSION['client_id'] = $verif['id'];
                $_SESSION['login'] = true;
                echo "<div class='alert alert-success alert-center' id='login-success'>Login successfully! Redirecting...</div>";
                echo "<script>setTimeout(function(){ window.location='refer.php'; }, 2000);</script>"; // Redirect setelah 2 detik
            } else {
                // Jika belum diverifikasi, arahkan kembali ke login dengan pesan error
                echo "<div class='alert alert-danger alert-center'>Please verify your Account first!</div>";
                echo "<script>setTimeout(function(){ window.location='login.php'; }, 2000);</script>"; // Redirect setelah 2 detik
            }
        } else {
            // Jika password salah
            echo "<div class='alert alert-danger alert-center'>Your password is invalid! Try Again</div>";
            echo "<script>setTimeout(function(){ window.location='login.php'; }, 2000);</script>"; // Redirect setelah 2 detik
        }
    } else {
        // Jika username tidak ditemukan
        echo "<div class='alert alert-danger alert-center'>Username not found.</div>";
        echo "<script>setTimeout(function(){ window.location='login.php'; }, 2000);</script>"; // Redirect setelah 2 detik
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | Client Login</title>
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

    .alert-center {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        width: 80%;
        max-width: 400px;
        text-align: center;
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

        <!-- Menampilkan pesan error jika ada -->
        <?php
        if (isset($_GET['error'])) {
            echo "<div class='error-message'>" . htmlspecialchars($_GET['error']) . "</div>";
        }
        ?>

        <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
    <script>
        // Mengecek apakah ada elemen dengan kelas 'alert-center'
        window.onload = function() {
            const alertElement = document.querySelector('.alert-center');
            if (alertElement) {
                // Menghilangkan alert setelah 2 detik
                setTimeout(function() {
                    alertElement.style.display = 'none';
                }, 2000); // 2000ms = 2 detik
            }
        }
    </script>
</body>

</html>