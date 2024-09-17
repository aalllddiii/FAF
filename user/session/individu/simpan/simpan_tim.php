<?php
include_once "../../sesi.php";
include_once "../../koneksi.php"; 
$email_k = $_SESSION['email_k'];

$id     = mysqli_real_escape_string($conn,$_POST['id']);
$nama_k = mysqli_real_escape_string($conn,$_POST['nama_k']);
$lomba  = mysqli_real_escape_string($conn,$_POST['lomba']);

//Pas Photo
if($_FILES['foto_k']['name']){
  $nama_file_foto = $_FILES['foto_k']['name'];
  $ukuran_file_foto = $_FILES['foto_k']['size'];
  $tipe_file_foto = $_FILES['foto_k']['type'];
  $tmp_file_foto = $_FILES['foto_k']['tmp_name'];

  $nama_acak_foto = rand(0,9999) . '.';
  $nama_baru_foto = $nama_acak_foto.$lomba.'.'.$nama_k.'.'.$nama_file_foto;
  $path_foto = "../../../../assets/berkas/foto/".$nama_baru_foto;

    if($tipe_file_foto == "image/jpeg" || $tipe_file_foto == "image/png"){
        if(move_uploaded_file($tmp_file_foto, $path_foto)){
            $query_foto = "UPDATE kompetisi SET foto_k='$nama_baru_foto', stat_foto_k='1' WHERE id = '$id'";
            $result_foto = mysqli_query($conn, $query_foto);

            echo "<script>
                    alert('Sussces - Upload Pas Photo Berhasil');
                  </script>";
            
        }else{
            echo "<script>
                    alert('Failed - Upload Pas Photo Gagal. Harap input ulang kembali');
                  <script>";
            
        }
    }else{
      echo "<script>
              alert('Failed - Upload Pas Photo Gagal. File tidak berupa JPG / JPEG / PNG, harap input ulang kembali');
            </script>";
      
    }
}

//KTM
if($_FILES['ktm_k']['name']){
  $nama_file_ktm = $_FILES['ktm_k']['name'];
  $ukuran_file_ktm = $_FILES['ktm_k']['size'];
  $tipe_file_ktm = $_FILES['ktm_k']['type'];
  $tmp_file_ktm = $_FILES['ktm_k']['tmp_name'];

  $nama_acak_ktm = rand(0,9999) . '.';
  $nama_baru_ktm = $nama_acak_ktm.$lomba.'.'.$nama_k.'.'.$nama_file_ktm;
  $path_ktm = "../../../../assets/berkas/ktm/".$nama_baru_ktm;

    if($tipe_file_ktm == "image/jpeg" || $tipe_file_ktm == "image/png"){
        if(move_uploaded_file($tmp_file_ktm, $path_ktm)){
            $query_ktm = "UPDATE kompetisi SET ktm_k='$nama_baru_ktm', stat_ktm_k='1' WHERE id = '$id'";
            $result_ktm = mysqli_query($conn, $query_ktm);

            echo "<script>
                    alert('Sussces - Upload KTM / Kartu Pelajar Berhasil');
                    document.location.href = '../dashboard.php';
                  </script>";
            
        }else{
            echo "<script>
                    alert('Failed - Upload KTM / Kartu Pelajar Gagal. Harap input ulang kembali');
                    document.location.href = '../dashboard.php';
                  <script>";
            
        }
    }else{
      echo "<script>
              alert('Failed - Upload KTM / Kartu Pelajar Gagal. File tidak berupa JPG / JPEG / PNG, harap input ulang kembali');
              document.location.href = '../dashboard.php';
            </script>";
      
    }
}
?>