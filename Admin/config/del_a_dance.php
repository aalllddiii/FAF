<?php
include_once("../koneksi.php");

$id = $_GET['id_a'];

$result= mysqli_query($conn, "DELETE FROM anggota_tim WHERE id_a=$id");


header("Location: ../page/dance_pending.php");
exit;
?>