<?php
include_once("../koneksi.php");

$id = $_GET['id'];

$result= mysqli_query($conn, "DELETE FROM kompetisi WHERE id=$id");
$sql= mysqli_query($conn, "DELETE FROM anggota_tim WHERE id_tim=$id");


header("Location: ../page/dance_pending.php");
exit;
?>
