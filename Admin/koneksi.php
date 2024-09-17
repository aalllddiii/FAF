<?php

$host="localhost"; //host server
$user="root"; //user login
$pass =""; //password
//$db ="technofair8"; //name database
$db ="faf2021"; //name database
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