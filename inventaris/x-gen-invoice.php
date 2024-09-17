<?php
// Start dompdf
require_once 'lib/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('defaultFont', 'Helvetica');
$dompdf->loadHtml('
<div style="margin-top: 5px; margin-left: auto; margin-right: auto; width: 95%; padding: 30px; padding-top: 30px;">
<h1>PEMINJAMAN PROYEKTOR BEM FIKTI UG</h1>
<h2>FIKTI.BEM.GUNADARMA.AC.ID</h2>
<table border="3px" cellpadding="10" align="center" style=" width:100%;">
<tr>
<th colspan="2">Detail Peminjam</th>
</tr>
<tr>
<td width="auto">
<center>
<h3>Kode Peminjaman</h3>
<strong>'.$kode.'</strong>
</center>
</td>
<td width="auto">
Nama : <strong>'.$nama.'</strong> <br/><br/>
NPM : <strong>'.$npm.'</strong> <br/><br/>
Organisasi : <strong>'.$divisi.'</strong>
</td>
</tr>
</table>
<br/>
<table border="3px" align="center" cellpadding="10" style="border-collapse: collapse; width:100%;">
<tr><th colspan="2">Informasi Peminjaman</th></tr>
<tr>
<td colspan="2">Tanggal Peminjaman: '.$tgl.'</td>
</tr>
<tr>
<td colspan="2">Durasi Peminjaman: '.$durasi.'</td>
</tr>
<tr>
<td colspan="2">Tanggal Pengembalian: '.$tglback.'</td>
</tr>
<tr>
<td style="width: 75%;">Biaya:</td><td style="text-align: right;">Rp. '.$biaya.'</td>
</tr>
</table>
<br/>
<table border="3px" align="center" style="border-collapse: collapse; width:100%;">
<tr><th>Ketentuan</th></tr>
<tr>
<td>
<ol>
    <li>Dengan ini saya menyatakan bahwa data di atas adalah benar.</li>
    <li>Saya berjanji akan menggunakan proyektor dengan bijaksana.</li>
    <li>Saya bersedia bertanggung jawab terhadap peminjaman proyektor sepenuhnya.</li>
    <li>Saya akan mengembalikan secara utuh dan bersih barang yang dipinjam.</li>
    <li>Jika terjadi kerusakan atau hilangnya pertalatan yang dipinjam, saya bersedia untuk mengganti peralatan tersebut dengan yang baru atau sesuai dengan kesepakan yang akan disepakati sesudahnya.</li>
    <li>Saya bersedia dikenakan denda sebesar Rp. 50.000/hari apabila peminjaman melebihi batas waktu pengembalian yang telah ditentukan (Max H+1 setelah peminjaman).</li>
</ol>
</td>
</tr>
</table>
</div>
	');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Save file
$output = $dompdf->output();
$file_to_save = './invoice/invoice'.$kode.'.pdf';
file_put_contents($file_to_save, $output);

// Output the generated PDF to Browser
//$dompdf->stream("Ticket");
?>
