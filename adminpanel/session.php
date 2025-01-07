<?php
session_start();

// Waktu timeout dalam detik (misalnya, 10 menit = 600 detik)
$timeout = 300;

// Cek apakah pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('location: login.php');
    exit;
}

// Cek waktu terakhir aktivitas
if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    if ($elapsed_time > $timeout) {
        session_unset();
        session_destroy();
        header('location: login.php?timeout=true');
        exit;
    }
}

// Perbarui waktu aktivitas terakhir
$_SESSION['last_activity'] = time();
?>