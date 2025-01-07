<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

// Mendapatkan informasi user yang login
$client_id = $_SESSION['client_id'] ?? null;
$username = $_SESSION['username'] ?? null;
?>