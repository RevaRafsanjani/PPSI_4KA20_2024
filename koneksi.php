<?php
    $con = mysqli_connect("localhost","root","","acnursing_website");

        //Cek Koneksi
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
?>