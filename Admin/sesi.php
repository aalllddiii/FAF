<?php

if(session_id() == '') {
        session_start(); //untuk memulai session
} 

if (isset($_GET['aksi']) && $_GET['aksi'] == 'logout') {
    session_destroy();
    header("Location: ../login/");
    exit();
}

if (isset($_SESSION['username']) === true) {
    //ok..
} else {
    session_destroy();
     header("Location: ../login/");
    exit();
}

date_default_timezone_set("Asia/Jakarta");
