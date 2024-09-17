<?php
include_once("../koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "UPDATE kompetisi SET status_krs=2, status_ktp=2, status_berkas1=2, status_pembayaran=2 WHERE id='$id'");




header("Location: ../page/competition.php");
exit;
?>