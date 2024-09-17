<?php
session_start();
include "../koneksi.php";
@$email_k = mysqli_real_escape_string($conn,$_POST['email_k']);
@$pass = mysqli_real_escape_string($conn,$_POST['pass']);

$login = mysqli_query($conn, "SELECT * FROM kompetisi WHERE email_k ='$email_k' and pass= '$pass'");

$cek= mysqli_num_rows ($login);

if ($cek == 1){
    $data = mysqli_fetch_assoc($login);
    
    if($data['email_k']=="$email_k"){
        $_SESSION['email_k'] = $email_k;
        $_SESSION['pass'] = "$pass";
        
        $kategori = $data['lomba'];
        if( $kategori =='Solo Vocal' || $kategori == 'Comic Strip'){
            $_SESSION['lomba'] = $data['lomba'];
            header("location:../user/session/individu/dashboard.php");
        }
        else{
            $_SESSION['lomba'] = $data['lomba'];
            header("location:../user/session/team/dashboard.php");
        }
    }
    else{
        header("location:../../");//kategori tidak ada
    }
}   
//elseif( $email_k == 'AdminFaF' && $pass == 'FiktiaF2k21'){
//    $_SESSION['AdminFaF'] = $email_k;
//    $_SESSION['FiktiaF2k21'] = "$pass";
//    header("location:../../Admin/page/dashboard.php");
//}
else{
    header("location:./passalah.php");//email atau password salah
}

?>