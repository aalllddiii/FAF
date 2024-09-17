<?php
if ($_SERVER['HTTPS'] != 'on') {
	header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	exit();
}

?>
<html>

<head>
	<title>Form Pengajuan Kerjasama BEM FIKTI UG</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: "dd/mm/yy"
			});
		});
	</script>
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/sky-forms.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/sky-forms-ie8.css">
	<![endif]-->

	<!--[if lt IE 10]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/sky-forms-ie8.js"></script>
	<![endif]-->
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<?php

if (isset($_POST['kerjasama'])) {
	require_once 'db.php';
	require_once 'g_verify.php';

	if (cek_captcha($_POST["g-recaptcha-response"]) !== true) {
		echo "<script>alert('silahkan konfirmasi captcha terlebih dahulu');  window.history.back();</script>";

		die();
	}
	//PHPMailer library
	include('./mail/PHPMailerAutoload.php');

	//Buat variabel agar lebih baik
	$nama = $_POST['nama'];
	$org = $_POST['org'];
	$tgl = $_POST['tgl'];
	$desc = $_POST['desc'];
	$desc1 = $_POST['desc1'];
	$kontak = $_POST['kontak'];
	$surel = $_POST['surel'];
	if (isset($_POST['desc2'])) {
		$desc2 = $_POST['desc2'];
	} else {
		$desc2 = '-';
	}

	$query = $mysqli->prepare('INSERT INTO kerjasama (nama,org,tgl,desc0,desc1,kontak,surel)VALUES(?,?,?,?,?,?,?)');
	$query->bind_param('sssssss', $nama, $org, $tgl, $desc, $desc1, $kontak, $surel);
	if (!$query->execute()) {
		die("kesalahan terjadi!");
	}
	$query->close();

	/*
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = 'deni@ugbemfikti.org';
    $email_subject = 'Email permintaan kerjasama dari '.$deptbir;
 
    $email_message = "Detail permintaan di bawah.\n\n";
 	
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Nama: ".clean_string($nama)."\n";
    $email_message .= "Departemen / Biro: ".clean_string($deptbir)."\n";
    $email_message .= "Ketuplak / PJ: ".clean_string($pj)."\n";
    $email_message .= "Deskripsi: ".clean_string($desc)."\n";
    $email_message .= "Perkiraan tanggal kegiatan: ".clean_string($tgl)."\n";
    $email_message .= "Jenis kerjasama: ".clean_string($jenis)."\n";
    $email_message .= "Masukkan lainnya: ".clean_string($plus)."\n";
 	
	// create email headers
	$headers = 'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);
	*/

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'localhost;smtp.gmail.com';  			  			// Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               			// Enable SMTP authentication
	$mail->Username = 'bemfikti.ug@gmail.com';         			// SMTP username
	$mail->Password = 'humasbidangmib1920';
	$mail->SMTPSecure = 'tls';
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to 587?

	$mail->setFrom('bemfikti@gunadarma.ac.id', 'Noreply UG BEM FIKTI');
	$mail->addAddress('bemfikti.ug@gmail.com', 'Biro HUMAS');     // Add a recipient
	$mail->addAddress('alifwiseman@gmail.com', 'Admin');
	//$mail->addAddress('jibrilhp@outlook.com', 'Admin');     // Add a recipient


	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Permintaan kerjasama dari ' . $org;
	$mail->Body    = '<table border="1" style="border-collapse: collapse; border: 1px solid black; text-align: left;">
<tr style="border: 1px solid black; background: #00557F; color: #FFFFFF;"><th colspan="2" style="border: 1px solid black; text-align: center;">Data permintaan kerjasama.</th></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Nama yang mengajukan: </td><td>' . $nama . '</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">Organisasi / Instansi: </td><td>' . $org . '</td></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Tanggal Kerjasama: </td><td>' . $tgl . '</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">Deskripsi Kerjasama: </td><td>' . $desc . '</td></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Bentuk Kerjasama: </td><td>' . $desc1 . '</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">Keterangan Tambahan: </td><td>' . $desc2 . '</td></tr>
<tr style="border: 1px solid black;"><td style="border: 1px solid black;">Kontak: </td><td>' . $kontak . '</td></tr>
<tr style="border: 1px solid black; background: #E1EEf4; color: #00557F;"><td style="border: 1px solid black;">E-mail: </td><td>' . $surel . '</td></tr>
</table>';
	//$mail->AltBody = 'Pesan normal tanpa html';
	$ok = true;


	$isi_pesan = 'Nama yang mengajukan: ' . $nama .  chr(10) .
		'Organisasi / Instansi:' . $org . chr(10) .
		'Tanggal Kerjasama: ' . $tgl . chr(10) .
		'Bentuk kerjasama : ' . $desc1 . chr(10) .
		'Deskripsi Kerjasama:' . $desc . chr(10) .
		'Keterangan Tambahan:' . $desc2 . chr(10) .
		'Kontak : ' . $kontak . chr(10) .
		'Email :  ' . $surel . chr(10);
	$isi_pesan = urlencode($isi_pesan);
	$mail->send();
	if (!$ok) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
?>

		<body class="bg-white">
			<div class="body body-s">
				<form method="post" name="daftar" action="" class="sky-form">
					<header>Form Pengajuan Kerjasama BEM FIKTI UG</header>

					<fieldset>
						<section>
							<h3>Permintaan Anda telah kami terima, silahkan tunggu informasi lebih lanjut, terimakasih.</h3>
						</section>
					</fieldset>
				</form>
			</div>
		</body>

<?php
		die();
	}
	die();
}
?>


<body class="bg-white">
	<div class="body body-s">

		<form method="post" name="daftar" action="?status=success" class="sky-form">
			<header>Form Pengajuan Kerjasama BEM FIKTI UG</header>

			<fieldset>

				<section>
					<label class="input">
						<input type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Isikan Nama Yang Mengajukan.</b>
					</label>
				</section>

				<!--section>
				<label class="select">
				<select id="deptbir" name="deptbir">
				<option value="" selected disabled>Pilih Departemen / Biro</option>
				<option value="Akademik">Akademik</option>
				<option value="PSDM">PSDM</option>
				<option value="Kewirausahaan">Kewirausahaan</option>
				<option value="Kesejahteraan Mahasiswa">Kesejahteraan Mahasiswa</option>
				<option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
				<option value="Olahraga">Olahraga</option>
				<option value="Seni Budaya">Seni Budaya</option>
				<option value="HUMAS">HUMAS</option>
				<option value="PTI">PTI</option>
				</select>
				<i></i>
				</label>
				</section-->

				<section>
					<label class="input">
						<input type="text" name="org" id="org" placeholder="Nama Organisasi/Instansi" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Isikan dengan nama Organisasi/Instansi yang ingin mengajukan kerjasama dengan BEM FIKTI UG.</b>
					</label>
				</section>

				<section>
					<label class="input">
						<input type="text" name="tgl" id="datepicker" placeholder="Tanggal pelaksanaan kerjasama" autocomplete="off" required>
						<!--b class="tooltip tooltip-bottom-right"></b-->
					</label>
				</section>

				<section>
					<label class="textarea">
						<textarea name="desc" id="desc" placeholder="Deskripsi singkat kerjasama" autocomplete="off" required></textarea>
					</label>
				</section>

				<section>
					<label class="textarea">
						<textarea name="desc1" id="desc1" placeholder="Bentuk kerjasama yang ditujukan" autocomplete="off" required></textarea>
						<b class="tooltip tooltip-bottom-right">Contoh: Sebagai media partner untuk publikasi kegiatan yang akan diadakan kerjasama dengan pihak BEM FIKTI UG .</b>
					</label>
				</section>

				<section>
					<label class="textarea">
						<textarea name="desc2" id="desc2" placeholder="Keterangan tambahan (Opsional)" autocomplete="off"></textarea>
						<b class="tooltip tooltip-bottom-right">Isikan keterangan lainnya yang dianggap perlu (Opsional).</b>
					</label>
				</section>

				<section>
					<label class="input">
						<input type="text" name="kontak" id="kontak" placeholder="Contact person pihak pengaju kerjasama" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">Contact Person Pihak Pengaju Kerjasama dengan BEM FIKTI<br />Diisi dengan nomor telpon yang dapat dihubungi</b>
					</label>
				</section>

				<section>
					<label class="input">
						<input type="text" name="surel" id="surel" placeholder="E-mail Pihak Pengaju Kerjasama" autocomplete="off" required>
						<b class="tooltip tooltip-bottom-right">E-mail Pihak Pengaju Kerjasama dengan BEM FIKTI</b>
					</label>
				</section>

				<section>
					<div class="g-recaptcha" data-sitekey="6LcQEd0UAAAAAD0IiWxyxqipjBFL2HKP8lttfuzb"></div>
				</section>

			</fieldset>
			<footer>

				<input type="submit" name="kerjasama" class="button" value="Kirim form" />
			</footer>

			<!--footer>
				<a href='index.php?cek=qr'>Lupa QR Kode?</a>
			</footer-->
		</form>

	</div>
</body>