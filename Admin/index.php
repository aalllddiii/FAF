<?php
require_once('koneksi.php');

if(session_id() == '') {
        session_start(); //untuk memulai session
} 

if (isset($_GET['aksi']) && $_GET['aksi'] == 'logout') {
    session_destroy();
    header("Location: login/");
    exit();
}

if (isset($_SESSION['username']) === true) {
    //ok..
} else {
    session_destroy();
     header("Location: login/");
    exit();
}

date_default_timezone_set("Asia/Jakarta");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" href="../assets/img/logo/faf1.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dasboard Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    --> 
      <div class="logo">
        <img src="../assets/img/logo/faf1.png" class="d-block mx-auto" width="70px">
        <span class="simple-text logo-normal pb-0">Admin</span>
        <span class="simple-text d-block logo-normal py-0">FAF 3.0</span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <i class="material-icons">supervisor_account</i>
              <p class="d-inline">Acoustic</p>
              <span class="material-icons">keyboard_arrow_down</span>
            </a>
            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <ul>
              <li class="py-3"><a href="page/ak_pending.php">Validasi Berkas</a></li>
              <li><a href="page/ak_valid.php">Tim Valid</a></li>
            </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <i class="material-icons">content_paste</i>
              <p class="d-inline">Dance Cover</p>
              <span class="material-icons">keyboard_arrow_down</span>
            </a>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
              <ul>
                <li class="py-3"><a href="page/dance_pending.php">Validasi Berkas</a></li>
                <li><a href="page/dance_valid.php">Tim Valid</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page/solo.php">
              <i class="material-icons">picture_in_picture</i>
              <p>Solo Vocal</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page/comic.php">
              <i class="material-icons">question_answer</i>
              <p>Comic Strip</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Admin Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="?aksi=logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row" id="accordion2" role="tablist">
            <div class="col-lg-3 col-md-6 col-sm-6 px-1">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon"> 
                    <i class="material-icons">supervisor_account</i>
                  </div>
                  <p class="card-category">Acoustic</p>
                  <h3 class="card-title">
                    <?php
                    $akustik = mysqli_query($conn, "SELECT lomba FROM kompetisi WHERE lomba='Acoustic'");
                    $jumlah_akustik = mysqli_num_rows($akustik);
                    
                    echo $jumlah_akustik;
                    ?>
                    <small>Peserta</small>
                  </h3>
                </div>
                <div class="card-footer card-collapse row" role="tab" id="headingCAkustik">
                  <a class="collapsed" data-toggle="collapse" href="#collapseAkustik" aria-expanded="false" aria-controls="collapseAkustik">
                    Selengkapnya
                    <i class="material-icons">keyboard_arrow_down</i>
                  </a>
                </div>
                <div id="collapseAkustik" class="collapse" role="tabpanel" aria-labelledby="headingAkustik" data-parent="#accordion2">
                  <div class="sub-part col-12">
                    <h4><strong>Pending</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $pending_akustik = mysqli_query($conn, "SELECT lomba,stat_tim FROM kompetisi WHERE lomba='Acoustic' AND stat_tim=0");
                        $jumlah_pending_akustik = mysqli_num_rows($pending_akustik);
                        
                        echo $jumlah_pending_akustik;
                      ?>
                      <small>Tim</small>
                    </h5>
                    <hr>
                    <h4><strong>Valid</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $valid_akustik = mysqli_query($conn, "SELECT lomba,stat_tim FROM kompetisi WHERE lomba='Acoustic' AND stat_tim=1");
                        $jumlah_valid_akustik = mysqli_num_rows($valid_akustik);
                        
                        echo $jumlah_valid_akustik;
                      ?>
                      <small>Tim</small>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-1">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                  </div>
                  <p class="card-category">Dance Cover</p>
                  <h3 class="card-title">
                  <?php
                    $dance = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Dance Cover'");
                    $jumlah_dance = mysqli_num_rows($dance);
                    
                    echo $jumlah_dance;
                    ?>
                    <small>Tim</small>
                  </h3>
                </div>
                <div class="card-footer card-collapse row" role="tab" id="headingDance">
                  <a class="collapsed" data-toggle="collapse" href="#collapseDance" aria-expanded="false" aria-controls="collapseDance">
                    Selengkapnya
                    <i class="material-icons">keyboard_arrow_down</i>
                  </a>
                </div>
                <div id="collapseDance" class="collapse" role="tabpanel" aria-labelledby="headingDance" data-parent="#accordion2">
                  <div class="sub-part col-12">
                    <h4><strong>Pending</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $pending_dance = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Dance Cover' AND stat_tim=0");
                        $jumlah_pending_dance = mysqli_num_rows($pending_dance);
                        
                        echo $jumlah_pending_dance;
                      ?>
                      <small>Tim</small>
                    </h5>
                    <hr>
                    <h4><strong>Valid</strong></h4>
                    <h5 class="text-right">
                    <?php
                        $valid_dance = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Dance Cover' AND stat_tim=1");
                        $jumlah_valid_dance = mysqli_num_rows($valid_dance);
                        
                        echo $jumlah_valid_dance;
                      ?>
                      <small>Tim</small>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-1">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">picture_in_picture</i>
                  </div>
                  <p class="card-category">Solo Vocal</p>
                  <h3 class="card-title">
                    <?php
                    $solo = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Solo Vocal'");
                    $jumlah_solo = mysqli_num_rows($solo);
                    
                    echo $jumlah_solo;
                    ?>
                    <small>Peserta</small>
                  </h3>
                </div>
                <div class="card-footer card-collapse row" role="tab" id="headingSolo">
                  <a class="collapsed" data-toggle="collapse" href="#collapseSolo" aria-expanded="false" aria-controls="collapseSolo">
                    Selengkapnya
                    <i class="material-icons">keyboard_arrow_down</i>
                  </a>
                </div>
                <div id="collapseSolo" class="collapse" role="tabpanel" aria-labelledby="headingSolo" data-parent="#accordion2">
                  <div class="sub-part col-12">
                    <h4><strong>Pending</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $pending_solo = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Solo Vocal' AND stat_tim=0");
                        $jumlah_pending_solo = mysqli_num_rows($pending_solo);
                        
                        echo $jumlah_pending_solo;
                      ?>
                      <small>Peserta</small>
                    </h5>
                    <hr>
                    <h4><strong>Valid</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $valid_solo = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Solo Vocal' AND stat_tim=1");
                        $jumlah_valid_solo = mysqli_num_rows($valid_solo);
                        
                        echo $jumlah_valid_solo;
                      ?>
                      <small>Peserta</small>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-1">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">question_answer</i>
                  </div>
                  <p class="card-category">Comic Strip</p>
                  <h3 class="card-title">
                    <?php
                    $comic = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Comic Strip'");
                    $jumlah_comic = mysqli_num_rows($comic);
                    
                    echo $jumlah_comic;
                    ?>
                    <small>Peserta</small>
                  </h3>
                </div>
                <div class="card-footer card-collapse row" role="tab" id="headingComic">
                  <a class="collapsed" data-toggle="collapse" href="#collapseComic" aria-expanded="false" aria-controls="collapseComic">
                    Selengkapnya
                    <i class="material-icons">keyboard_arrow_down</i>
                  </a>
                </div>
                <div id="collapseComic" class="collapse" role="tabpanel" aria-labelledby="headingComic" data-parent="#accordion2">
                  <div class="sub-part col-12">
                    <h4><strong>Pending</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $pending_comic = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Comic Strip' AND stat_tim=0");
                        $jumlah_pending_comic = mysqli_num_rows($pending_comic);
                        
                        echo $jumlah_pending_comic;
                      ?>
                      <small>Peserta</small>
                    </h5>
                    <hr>
                    <h4><strong>Valid</strong></h4>
                    <h5 class="text-right">
                      <?php
                        $valid_comic = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Comic Strip' AND stat_tim=1");
                        $jumlah_valid_comic = mysqli_num_rows($valid_comic);
                        
                        echo $jumlah_valid_comic;
                      ?>
                      <small>Peserta</small>
                    </h5>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            <p>Copyright &copy; 2021 All right reserved | Biro PTI</p>
          </div>
        </div>
      </footer>
  </div>
  
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src=".assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  
</body>

</html>