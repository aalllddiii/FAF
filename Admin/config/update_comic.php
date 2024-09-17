<?php
include_once("../koneksi.php");
if(isset($_POST['update']))
{
  $id = $_POST['id'];

  $lomba           =mysqli_real_escape_string($conn,$_POST['lomba']);
  
  $instansi        =mysqli_real_escape_string($conn,$_POST['instansi']);
  $nama_k          =mysqli_real_escape_string($conn,$_POST['nama_k']);
  $npm_k           =mysqli_real_escape_string($conn,$_POST['npm_k']);
  $email_k         =mysqli_real_escape_string($conn,$_POST['email_k']);
  $nohp_k          =mysqli_real_escape_string($conn,$_POST['nohp_k']);
  $idline_k        =mysqli_real_escape_string($conn,$_POST['idline_k']);

  $result = mysqli_query($conn, "UPDATE kompetisi SET instansi='$instansi', nama_k='$nama_k', npm_k='$npm_k', email_k='$email_k', nohp_k='$nohp_k', idline_k='$idline_k' WHERE id='$id'");
  
  //Pas Photo
  if($_FILES['foto_k']['name']){
    $nama_file_foto = $_FILES['foto_k']['name'];
    $ukuran_file_foto = $_FILES['foto_k']['size'];
    $tipe_file_foto = $_FILES['foto_k']['type'];
    $tmp_file_foto = $_FILES['foto_k']['tmp_name'];

    $nama_acak_foto = rand(0,9999) . '.';
    $nama_baru_foto = $nama_acak_foto.$lomba.'.'.$nama_k.'.'.$nama_file_foto;
    $path_foto = "../../assets/berkas/foto/".$nama_baru_foto;

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
                alert('Failed - Upload Pas Photo Gagal. File tidak berupa JPG / JPEG / PNG, harap input ulang   kembali');
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
    $path_ktm = "../../assets/berkas/ktm/".$nama_baru_ktm;

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
                alert('Failed - Upload KTM / Kartu Pelajar Gagal. File tidak berupa JPG / JPEG / PNG, harap   input ulang kembali');
                document.location.href = '../dashboard.php';
              </script>";

      }
  }
  
  //bukti pembayaran
  if($_FILES['bukti']['name']){
    $nama_file_bukti = $_FILES['bukti']['name'];
    $ukuran_file_bukti = $_FILES['bukti']['size'];
    $tipe_file_bukti = $_FILES['bukti']['type'];
    $tmp_file_bukti = $_FILES['bukti']['tmp_name'];
  
    $nama_acak_bukti = rand(0,9999) . '.';
    $nama_baru_bukti = $nama_acak_bukti.$lomba.'.'.$nama_k.'.'.$nama_file_bukti;
    $path_bukti = "../../assets/berkas/bukti_tf/".$nama_baru_bukti;
  
      if($tipe_file_bukti == "image/jpeg" || $tipe_file_bukti == "image/png"){
          if(move_uploaded_file($tmp_file_bukti, $path_bukti)){
              $query_bukti = "UPDATE kompetisi SET bukti='$nama_baru_bukti', stat_bukti='1' WHERE id = '$id'";
              $result_bukti = mysqli_query($conn, $query_bukti);
              echo "<script>
                      alert('Sussces - Upload Bukti Pembayaran Berhasil');
                    </script>";
              
          }else{
              echo "<script>
                      alert('Failed - Upload Bukti Pembayaran Gagal. Harap input ulang kembali');
                    <script>";
              
          }
      }else{
        echo "<script>
                alert('Failed - Upload Bukti Pembayaran Gagal. File tidak berupa JPG / JPEG / PNG, harap input ulang kembali');
              </script>";
        
      }
  }

 //   header("Location: view");
 header ("location: ../page/comic.php"); 
}

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM kompetisi WHERE id='$id'");

while($out = mysqli_fetch_array($result)){
  $lomba           = $out['lomba'];
  $instansi        = $out['instansi'];
  $nama_k          = $out['nama_k'];
  $npm_k           = $out['npm_k'];
  $email_k         = $out['email_k'];
  $pass            = $out['pass'];
  $nohp_k          = $out['nohp_k'];
  $idline_k        = $out['idline_k'];
  $foto_k          = $out['foto_k'];
  $ktm_k           = $out['ktm_k'];
  $bukti           = $out['bukti'];
  
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" href="../../assets/pictures/logo/tf.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      Update Peserta
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto  +Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-12 m-5 p-5">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">UPDATE PESERTA</h4>
              <p class="card-category">ID : <?php echo $id; ?></p>
            </div>
            <div class="card-body">
              <form method="post" action="update_comic.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="lomba" value="<?php echo $lomba; ?>">
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Instansi</label>
                      <input type="text" class="form-control" name="instansi" value="<?php echo $instansi; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nama Ketua</label>
                      <input type="text" class="form-control" name="nama_k" value="<?php echo $nama_k; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">NPM Ketua</label>
                      <input type="text" class="form-control" name="npm_k" value="<?php echo $npm_k; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email Ketua</label>
                      <input type="email" class="form-control" name="email_k" value="<?php echo $email_k; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">No.Handphone Ketua</label>
                      <input type="text" class="form-control" name="nohp_k" value="<?php echo $nohp_k; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ID Line Ketua</label>
                      <input type="text" class="form-control" name="idline_k" value="<?php echo $idline_k; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <label>
                          <strong class="d-block">Upload Pas Photo</strong>
                          <small>File Berupa JPG/JPEG/PNG</small>
                      </label>
                      <div>
                  	    <span class="btn btn-primary btn-round btn-file btn-width">
                  	      <input type="file" name="foto_k" value="<?php echo $foto_k; ?>"/>
                  	    </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <label>
                          <strong class="d-block">Upload KTM</strong>
                          <small>File Berupa JPG/JPEG/PNG</small>
                      </label>
                      <div>
                  	    <span class="btn btn-primary btn-round btn-file btn-width">
                  	      <input type="file" name="ktm_k" value="<?php echo $ktm_k; ?>"/>
                  	    </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-md-12">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <label>
                        <strong class="d-block">Upload Pembayaran</strong>
                        <small>File Berupa JPG/JPEG/PNG</small>
                      </label>
                      <div>
                  	    <span class="btn btn-primary btn-round btn-file btn-width">
                  	      <input type="file" name="bukti" value="<?php echo $bukti; ?>"/>
                  	    </span>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" name="update" class="btn btn-primary pull-right">Update Peserta</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  </body>
</html>