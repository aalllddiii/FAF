<?php
include_once "../../sesi.php";
include_once "../../koneksi.php"; 
$email_k = $_SESSION['email_k'];

$id       = mysqli_real_escape_string($conn,$_POST['id']);
$nama_tim = mysqli_real_escape_string($conn,$_POST['nama_tim']);
$lomba    = mysqli_real_escape_string($conn,$_POST['lomba']);
//Pas Photo
if($_FILES['bukti']['name']){
  $nama_file_bukti = $_FILES['bukti']['name'];
  $ukuran_file_bukti = $_FILES['bukti']['size'];
  $tipe_file_bukti = $_FILES['bukti']['type'];
  $tmp_file_bukti = $_FILES['bukti']['tmp_name'];

  $nama_acak_bukti = rand(0,9999) . '.';
  $nama_baru_bukti = $nama_acak_bukti.$lomba.'.'.$nama_tim.'.'.$nama_file_bukti;
  $path_bukti = "../../../../assets/berkas/bukti_tf/".$nama_baru_bukti;

    if($tipe_file_bukti == "image/jpeg" || $tipe_file_bukti == "image/png"){
        if(move_uploaded_file($tmp_file_bukti, $path_bukti)){
            $query_bukti = "UPDATE kompetisi SET bukti='$nama_baru_bukti', stat_bukti='1' WHERE id = '$id'";
            $result_bukti = mysqli_query($conn, $query_bukti);
            echo "<script>
                    alert('Sussces - Upload Bukti Pembayaran Berhasil');
                    document.location.href = '../dashboard.php';
                  </script>";
            
        }else{
            echo "<script>
                    alert('Failed - Upload Bukti Pembayaran Gagal. Harap input ulang kembali');
                    document.location.href = '../dashboard.php';
                  <script>";
            
        }
    }else{
      echo "<script>
              alert('Failed - Upload Bukti Pembayaran Gagal. File tidak berupa JPG / JPEG / PNG, harap input ulang kembali');
              document.location.href = '../dashboard.php';
            </script>";
      
    }
}
?>