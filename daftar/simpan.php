<?php
include '../koneksi.php';
if (isset($_POST['daftar'])) {
    $lomba           =mysqli_real_escape_string($conn,$_POST['lomba']);
    $nama_tim        =mysqli_real_escape_string($conn,$_POST['nama_tim']);
    $instansi        =mysqli_real_escape_string($conn,$_POST['instansi']);
    $nama_k          =mysqli_real_escape_string($conn,$_POST['nama_k']);
    $npm_k           =mysqli_real_escape_string($conn,$_POST['npm_k']);
    $email_k         =mysqli_real_escape_string($conn,$_POST['email_k']);
    $pass            =mysqli_real_escape_string($conn,$_POST['pass']);
    $nohp_k          =mysqli_real_escape_string($conn,$_POST['nohp_k']);
    $idline_k        =mysqli_real_escape_string($conn,$_POST['idline_k']);

    if ($lomba == "Comic Strip" || $lomba == "Solo Vocal" || $lomba == "Acoustic" || $lomba == "Dance Cover"){

        $query = mysqli_query($conn, "INSERT INTO kompetisi (lomba,nama_tim,instansi,nama_k,npm_k,email_k,pass,nohp_k,idline_k) VALUES ('$lomba','$nama_tim','$instansi','$nama_k','$npm_k','$email_k','$pass','$nohp_k','$idline_k')");

        if ($query) {
            header("location:./sukses.php");
        }else{
        header("location:./emailterdaftar.php");
        }       
    }
    else{
        echo "<script>
                alert('Failed - Lomba Tidak Tersedia');
                document.location.href = './';
            <script>";
    }                    
}
?>