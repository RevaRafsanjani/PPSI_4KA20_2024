<?php
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel | Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
</head>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-image: url('../image/loginbackground.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 30px;
        background: rgba(255, 255, 255, 0.8);
        /* Putih dengan transparansi 80% */
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        /* Bayangan lembut */
    }

    .login-container h2 {
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-control {
        border-radius: 10px;
        height: 45px;
        box-shadow: none;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .alert {
        font-size: 14px;
        margin-top: 15px;
        text-align: center;
    }

    .login-container .form-label {
        font-weight: bold;
        color: #555;
    }

    .login-container p {
        text-align: center;
        font-size: 14px;
        color: #777;
    }

    .login-container p a {
        color: #007bff;
        text-decoration: none;
    }

    .login-container p a:hover {
        text-decoration: underline;
    }

    @media (max-width: 576px) {
        .login-container {
            padding: 20px;
        }

        .login-container h2 {
            font-size: 24px;
        }

        .form-control {
            font-size: 14px;
            height: 40px;
        }

        .btn-primary {
            font-size: 16px;
            padding: 12px 0;
        }
    }

    /* Untuk perangkat tablet dan layar lebih besar */
    @media (max-width: 768px) {
        .login-container {
            padding: 25px;
        }

        .login-container h2 {
            font-size: 26px;
        }
    }

    /* Responsif untuk layar yang lebih besar */
    @media (min-width: 992px) {
        .login-container {
            width: 400px;
            padding: 30px;
        }
    }
</style>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" name="loginbtn" class="btn btn-primary w-100 mt-2">Login</button>
        </form>

        <?php
        if (isset($_POST['loginbtn'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
            $countdata = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);

            if ($countdata > 0) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    header('location: ../adminpanel');
                } else {
                    echo "<div class='alert alert-warning' role='alert'>Password is incorrect</div>";
                }
            } else {
                echo "<div class='alert alert-warning' role='alert'>Account not found</div>";
            }
        }

        if (isset($_GET['message'])) {
            echo "<div class='alert alert-danger' role='alert'>" . htmlspecialchars($_GET['message']) . "</div>";
        }
        ?>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>