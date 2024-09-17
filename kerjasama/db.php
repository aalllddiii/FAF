<?php
date_default_timezone_set('Asia/Jakarta');
$server = 'localhost';
$username = 'bemfikti_priv';
$password = 'priv-ugbemfik17';
$database = 'bemfikti_priv';

$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    die();
}
?>
