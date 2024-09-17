<?php
include_once("../koneksi.php");

$id = $_GET['id'];

$result= mysqli_query($conn, "UPDATE kompetisi SET stat_tim=1 WHERE id='$id'");


header("Location: ../page/ak_pending.php");
exit;
?>