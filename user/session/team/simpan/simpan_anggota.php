<?php
include_once "../../sesi.php";
include_once "../../../../koneksi.php"; 
$email_k = $_SESSION['email_k'];


$nama_tim = mysqli_real_escape_string($conn,$_POST['nama_tim']);
$lomba    = mysqli_real_escape_string($conn,$_POST['lomba']);

$id_tim   = mysqli_real_escape_string($conn,$_POST['id_tim']);
$nama_a   =  mysqli_real_escape_string($conn,$_POST['nama_a']);
$npm_a    =  mysqli_real_escape_string($conn,$_POST['npm_a']);
$email_a  =  mysqli_real_escape_string($conn,$_POST['email_a']);
$nohp_a   =  mysqli_real_escape_string($conn,$_POST['nohp_a']);
$idline_a =  mysqli_real_escape_string($conn,$_POST['idline_a']);


$sql = mysqli_query($conn, "INSERT INTO anggota_tim (id_tim,nama_a,npm_a,email_a,nohp_a,idline_a) VALUES ('$id_tim','$nama_a','$npm_a','$email_a','$nohp_a','$idline_a')");


//Pas Photo
if($_FILES['foto_a']['name']){
  $nama_file_foto = $_FILES['foto_a']['name'];
  $ukuran_file_foto = $_FILES['foto_a']['size'];
  $tipe_file_foto = $_FILES['foto_a']['type'];
  $tmp_file_foto = $_FILES['foto_a']['tmp_name'];

  $nama_acak_foto = rand(0,9999) . '.';
  $nama_baru_foto = $nama_acak_foto.$lomba.'.'.$nama_tim.'.'.$nama_file_foto;
  $path_foto = "../../../../assets/berkas/foto/".$nama_baru_foto;

    if($tipe_file_foto == "image/jpeg" || $tipe_file_foto == "image/png"){
        if(move_uploaded_file($tmp_file_foto, $path_foto)){
            $query_foto = "UPDATE anggota_tim SET foto_a='$nama_baru_foto' WHERE id_tim = '$id_tim' AND npm_a = '$npm_a' ";
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
if($_FILES['ktm_a']['name']){
  $nama_file_ktm = $_FILES['ktm_a']['name'];
  $ukuran_file_ktm = $_FILES['ktm_a']['size'];
  $tipe_file_ktm = $_FILES['ktm_a']['type'];
  $tmp_file_ktm = $_FILES['ktm_a']['tmp_name'];

  $nama_acak_ktm = rand(0,9999) . '.';
  $nama_baru_ktm = $nama_acak_ktm.$lomba.'.'.$nama_tim.'.'.$nama_file_ktm;
  $path_ktm = "../../../../assets/berkas/ktm/".$nama_baru_ktm;

    if($tipe_file_ktm == "image/jpeg" || $tipe_file_ktm == "image/png"){
        if(move_uploaded_file($tmp_file_ktm, $path_ktm)){
            $query_ktm = "UPDATE anggota_tim SET ktm_a='$nama_baru_ktm' WHERE id_tim = '$id_tim' AND npm_a = '$npm_a' ";
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