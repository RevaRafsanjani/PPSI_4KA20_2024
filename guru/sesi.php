<?php
ob_start();
session_start();
$nama	  = $_SESSION['nama'];
$id_guru = $_SESSION['id_guru'];
$isLoggedIn = $_SESSION['isLoggedIn'];
if($isLoggedIn != '2'){
    session_destroy();
    header('Location: login.php');
}
ob_flush(); ?>