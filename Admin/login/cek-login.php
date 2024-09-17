<?php
session_start();
include "../koneksi.php";
@$username = mysqli_real_escape_string($conn,$_POST['username']);
@$pass = mysqli_real_escape_string($conn,$_POST['pass']);

$login = mysqli_query($conn, "SELECT * FROM panitia WHERE username ='$username' and pass= '$pass'");

$cek= mysqli_num_rows ($login);

if ($cek == 1){
    $data = mysqli_fetch_assoc($login);
    
    if($data['username']=="$username"){
        $_SESSION['username'] = $username;
        $_SESSION['pass'] = "$pass";
        
        header("location:../");
        
    }
}   
//elseif( $username == 'AdminFaF' && $pass == 'FiktiaF2k21'){
//    $_SESSION['AdminFaF'] = $username;
//    $_SESSION['FiktiaF2k21'] = "$pass";
//    header("location:../../Admin/page/dashboard.php");
//}
else{
    header("location:./passalah.php");//email atau password salah
}

?>