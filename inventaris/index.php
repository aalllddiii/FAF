<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
<img src ="https://fikti.bem.gunadarma.ac.id/wp-content/uploads/BEM-FIKTI-logo.png" width ="60px"
<div><a href="https://fikti.bem.gunadarma.ac.id" rel="nofollow" target="_blank"> BEM FIKTI UNIVERSITAS GUNADARMA</a></div>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Penyewaan Inventaris BEM FIKTI UG 2019/2020 </title>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Penyewaan Inventaris BEM FIKTI UG"/>
<meta name="author" content="PTI 2018/2019"/>

  
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800"'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel="stylesheet" href="css/style.css">
<style>
table {
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #ffffff;
}

tr:nth-child(odd) {
  background-color:#8bccc5;
}
</style>
</head>

<body>

<?php require($_SERVER['DOCUMENT_ROOT']. '/analisis.php') ; ?>
  <main id="main" class="container">
   <div class="row">
      <div class="col-xs-12 col-lg-offset-3 col-lg-6">
         <div class="m-b-md text-center">
            <h1 id="title">Form Pendaftaran Penyewaan Inventaris BEM FIKTI UG 2018/2019</h1>
            <p id="description" class="description" class="text-center">Silahkan isi data dibawah ini dengan benar.</p>
         </div>
         <form method="post" action="simpan.php" id="survey-form" name="survey-form">
            <fieldset>
               <label for="name" id="name-label">
               Nama Penyewa *
               <input class="" type="text" id="name" name="Nama_Penyewa" placeholder="Enter your Nama_Penyewa (required)" required />
               </label>
            </fieldset>
            <fieldset>
               <label for="number" id="number-label">
               NPM / NIK (jika anda eksternal Universitas Gunadarma) Penyewa *
               <input class="" type="text" id="text" name="NPM_Penyewa" placeholder="Enter your NPM_Penyewa (required)" required />
               </label>
            </fieldset>
            <fieldset>
               <label for="email" id="email-label">
               Email Penyewa *
               <input class="" type="email" id="email-label" name="Email_Penyewa" placeholder="Enter your Email_Penyewa (required)" required />
               </label>
            </fieldset>
            <fieldset>
               <label for="text" id="text-label">
               Divisi/Ormawa Penyewa *
               <input class="" type="text" id="name" name="Divisi_Ormawa_Penyewa" placeholder="Enter your Divisi_Ormawa_Penyewa (required)" required />
               </label>
            </fieldset>
			<fieldset>
               <label for="text" id="text-label">
               Keperluan *
               <input class="" type="text" id="name" name="Keperluan" placeholder="Enter your Keperluan (required)" required />
               </label>
            </fieldset>
			<fieldset>
               <label for="dropdown">
                  Nama Barang yang akan disewa *
                  <select id="dropdown" name="Nama_Barang_Pinjam" class="m-t-xs">
                     <option value="baju wasit" selected>Baju Wasit (Stock 2 pasang)</option>
                     <option value="proyektor">Proyektor (Stock 1 buah)</option>
					 <option value="rompi">Rompi (Stock 10 pcs)</option>
					 <option value="score board">Score Board (Stock 1 buah)</option>
					 <option value="toa">Toa (Stock 1 buah)</option>
					 <option value="sound system">Sound System</option>
                  </select>
               </label>
            </fieldset>
			
			<fieldset>
               <label for="date" id="date_default_timezone_get-label">
               Tanggal Penyewaan *
               <input class="" type="date" id="name" name="Tanggal_Penyewaan" placeholder="Enter your Tanggal_Penyewaan (required)" required />
               </label>
			</fieldset>
      
			<fieldset>
               <label for="email" id="email-label">
               Durasi Penyewaan (Dalam Hari) *
               <input class="" type="number" id="number" name="Durasi_Penyewaan_Dalam_Hari" placeholder="Enter your Durasi_Penyewaan_Dalam_Hari) 
               <input type="number" min="1" max="5" (required)" required />
               </label>
			</fieldset>
      <fieldset>
               <label for="date" id="date_default_timezone_get-label">
               Dikembalikan pada pukul *
               <input class="" type="time" id="name" name="jam_dikembalikan" />
               </label>
			</fieldset>
      
            <button id="submit" type="submit" class="btn">Submit the form</button>
         </form>
         <hr>
         <h5 style="color:#ffffff"> Penyewaan Barang akan dikenakan biaya sebagai berikut : </h5>
          
         <table>
  <tr>
    <th>Nama</th>
    <th>Jumlah Harga Barang</th>
    <th>Keterangan</th>
  </tr>
  <tr>
    <td>Baju Wasit</td>
    <td>Rp20.000@ 1 pasang</td>
    <td>Diskon 25% dengan ketentuan dikembalikan dalam keadaan sudah di Laundry</td>
  </tr>
  <tr>
    <td>Proyektor</td>
    <td>Rp50.000@1 buah</td>
    <td>Diskon 20% khusus untuk Alumni BEM FIKTI UG</td>
  </tr>
  <tr>
    <td>Rompi</td>
    <td>Rp50.000@10 pcs</td>
    <td>Diskon 20% dengan ketentuan dikembalikan dalam keadaan sudah di Laundry</td>
  </tr>
  <tr>
    <td>Score Board</td>
    <td>Rp30.000@1 buah</td>
    <td>-</td>
  </tr>
  <tr>
    <td>TOA</td>
    <td>Rp50.000@1 buah</td>
    <td>Tidak termasuk baterai</td>
  </tr>
  <tr>
    <td>Sound System</td>
    <td>Rp75.000@1 buah</td>
    <td>Tidak termasuk baterai</td>
  </tr>
  
</table>

         <div class="copyright m-t-sm">
          <div> Maintained By Biro PTI 2019/2020</div>
            <!-- <div>By <a href="http://www.adeleroyer.fr" title="Adèle Royer">Adèle Royer</a> with <i class="glyphicon glyphicon-heart"></i></div>-->
         </div>
      </div>
   </div>
</main>
  <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

  

</body>

</html>
