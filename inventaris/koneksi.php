<?php
$host ="localhost"; //host server
$user ="bemfikti_invent"; //user login phpMydmin
$pass ="bemfikti"; //pass login phpMyAdmin
$db ="bemfikti_inventaris"; //name database
$conn = mysqli_connect($host, $user, $pass, $db) or die ("koneksi gagal");
?>