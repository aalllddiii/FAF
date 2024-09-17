<?php
include_once("../koneksi.php");

$id = $_GET['id'];

$result= mysqli_query($conn, "DELETE FROM kompetisi WHERE id=$id");


header("Location: ../page/comic.php");
exit;
?>