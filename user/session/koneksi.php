<?php

$host="localhost"; //host server
$user="root"; //user login
$pass =""; //password
$db = "faf2021"; //nama db
$conn = mysqli_connect($host, $user, $pass, $db) or die ("ERROR");

if (mysqli_connect_errno()) {
	echo mysqli_connect_errno();
}

if ($_SERVER["HTTPS"] != "on") {
	header("Location:https://" .
		$_SERVER["HTTP_HOST"] .
		$_SERVER["REQUEST_URI"]);
	exit();
}

?>