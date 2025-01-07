<?php
session_start();
session_unset();
session_destroy();
header('location: login.php'); // Pastikan path menuju login.php benar
exit;
?>