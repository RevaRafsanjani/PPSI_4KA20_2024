<?php
session_start();
require "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Pastikan data diterima dari register.php
if (isset($_GET['username'], $_GET['email'], $_GET['password'])) {
    $username = mysqli_real_escape_string($con, $_GET['username']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $password = mysqli_real_escape_string($con, $_GET['password']); // Tidak lagi menggunakan hash
    $token = md5($email . date('Y-m-d H:i:s'));

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Cek duplikasi email
    //$result = $con->query("SELECT * FROM clients WHERE email = '$email'");
    //if ($result->num_rows > 0) {
       // echo "<script>alert('Email already registered! Please use another email.');window.location='register.php'</script>";
        //exit;
    //}

    // Create PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'acnursing19@gmail.com';
        $mail->Password   = 'muak cdow gmme oovy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('from@ACNursing.com', 'AC Nursing account Verification');
        $mail->addAddress($email, $username);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Verify Your Email';
        $mail->Body    = 'Hello! <b>' . $username . '</b> Thank you for registration, <br> Please verify your account! </br> <a href="http://localhost/acnursing/verify.php?token=' . $token . '">Verification</a>';

        if ($mail->send()) {
            // Jika email berhasil dikirim, simpan data ke database
            $query = "INSERT INTO clients(username, email, password, token) VALUES('$username', '$email', '$password', '$token')";
            if ($con->query($query) === TRUE) {
                echo "<script>alert('Username registered successfully! Please check your email for verification.');window.location='login.php'</script>";
            } else {
                echo "<script>alert('Error: Could not register user. Please try again later.');window.location='register.php'</script>";
            }
        }
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');window.location='register.php'</script>";
    }
} else {
    echo "<script>alert('Invalid request.');window.location='register.php'</script>";
}
?>