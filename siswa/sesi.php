<?php
ob_start();
session_start();
$nama	  = $_SESSION['nama'];
$id_siswa = $_SESSION['id_siswa'];
$isLoggedIn = $_SESSION['isLoggedIn'];
if($isLoggedIn != '3'){
    session_destroy();
    header('Location: login.php');
}
ob_flush(); ?>