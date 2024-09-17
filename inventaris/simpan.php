<?php
include 'koneksi.php';

function get_data_from_url($url, $data)
{
  $user_agent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/534.57.2 (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2";
  $ambil = curl_init();
  CURL_SETOPT($ambil,CURLOPT_URL,$url);
  CURL_SETOPT($ambil,CURLOPT_USERAGENT,$user_agent);
  CURL_SETOPT($ambil,CURLOPT_POST,True);
  CURL_SETOPT($ambil,CURLOPT_POSTFIELDS,$data);
  CURL_SETOPT($ambil,CURLOPT_RETURNTRANSFER,True);
  CURL_SETOPT($ambil,CURLOPT_FOLLOWLOCATION,True);
  CURL_SETOPT($ambil,CURLOPT_COOKIEFILE,"cook2.txt");
  CURL_SETOPT($ambil,CURLOPT_COOKIEJAR,"cook2.txt");
  CURL_SETOPT($ambil,CURLOPT_CONNECTTIMEOUT,100);
  CURL_SETOPT($ambil,CURLOPT_TIMEOUT,100);
  $exec = curl_exec($ambil);
  return $exec;
}

//generate random ..
function surat_cinta_cute ($message) 
{
$postdata = http_build_query(
    array(
        'surat_cinta' => $message
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = get_data_from_url('https://cgehek3.000webhostapp.com/bot/kasitaupresensi', false, $context);
return $result;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// menyimpan data kedalam variabel

$nama_peminjam    					= htmlentities(mysqli_real_escape_string($conn,$_POST['Nama_Penyewa']));
$npm_peminjam            			= htmlentities(mysqli_real_escape_string($conn,$_POST['NPM_Penyewa']));
$email_peminjam	        			= htmlentities(mysqli_real_escape_string($conn,$_POST['Email_Penyewa']));
$divisi_ormawa_peminjam      		= htmlentities(mysqli_real_escape_string($conn,$_POST['Divisi_Ormawa_Penyewa']));
$keperluan   	        			= htmlentities(mysqli_real_escape_string($conn,$_POST['Keperluan']));
$nama_barang_pinjam        	    	= htmlentities(mysqli_real_escape_string($conn,$_POST['Nama_Barang_Pinjam']));
$tanggal_peminjaman            		= htmlentities(mysqli_real_escape_string($conn,$_POST['Tanggal_Penyewaan']));
$durasi_peminjaman_dalam_hari    	= htmlentities(mysqli_real_escape_string($conn,$_POST['Durasi_Penyewaan_Dalam_Hari']));
$jam_dikembalikan					= htmlentities(mysqli_real_escape_string($conn,$_POST['jam_dikembalikan']));

//gunanya buat anti hekel 
/*
if (!preg_match("/\\s/", $nama_peminjam) && !preg_match("^[a-z]$/i",$nama_peminjam)) {
    exit("hmm kuy namanya diperiksa");
}
*/


$tanggal_pengembalian =  date('Y-m-d', strtotime(' + ' .$durasi_peminjaman_dalam_hari. ' days',strtotime($tanggal_peminjaman)));


if ($durasi_peminjaman_dalam_hari > 5) {
	exit("Anda tidak dapat meminjam lebih dari 5 hari");
}
$range_beda = date_diff(new DateTime($tanggal_peminjaman),new DateTime($tanggal_pengembalian));

$biaya = ($range_beda->days) * 50000;

// query SQL untuk insert data

$query="INSERT INTO daftarbarangpinjam (Nama_Peminjam,NPM_Peminjam,Email_Peminjam,Divisi_Ormawa_Peminjam,Keperluan,
		Nama_Barang_Pinjam,Tanggal_Peminjaman,Durasi_Peminjaman_Dalam_Hari,Tanggal_Pengembalian,Biaya,jam_pengembalian) 
		values ('$nama_peminjam','$npm_peminjam','$email_peminjam','$divisi_ormawa_peminjam','$keperluan','$nama_barang_pinjam',
		'$tanggal_peminjaman','$durasi_peminjaman_dalam_hari','$tanggal_pengembalian','$biaya','$jam_dikembalikan')";
if (mysqli_query($conn, $query)) {
	//pertama dia kirim via line dulu
	$pesan = "[ Pesan Peminjaman Inventaris ]" . chr(10) .
	"Nama peminjam : " . $nama_peminjam . chr(10) . 
	"Email : " . $email_peminjam .  chr(10) . 
	"Barang yang dipinjam : " . $nama_barang_pinjam . chr(10) . 
	"Biaya : Rp" . $biaya . chr(10) . chr(10) .
	"Pesan ini otomatis dari PTI Hmm, silahkan tanyakan jika ada kendala :)";
	surat_cinta_cute ($pesan);
	
	//kedua dia kirim via email
	//cek type dari NPM atau NIK
	if (strlen($npm_peminjam) <= 8 ) {
		$type= "Internal";
	} else {
		$type= "Eksternal";
	}

	include ('lib/mail/PHPMailerAutoload.php');

	$mail = new PHPMailer;

	$name_of_attachment = generateRandomString();
		$get_attachment = 'http://jibrilhp.ccug.gunadarma.ac.id/x-gen-invoice.php?nama='. urlencode($nama_peminjam) .'&npm='.urlencode($npm_peminjam) .'&divisi='. urlencode($divisi_ormawa_peminjam) .'&tgl='.urlencode($tanggal_peminjaman) .'&tglblk='. urlencode($tanggal_pengembalian) .'&durasi='. urlencode($durasi_peminjaman_dalam_hari) .'&biaya='. urlencode($biaya) .'&biaya_per=5&sewa='. urlencode($nama_barang_pinjam);
		file_put_contents("invoice/" . $name_of_attachment . ".pdf",get_data_from_url($get_attachment));

	if($type == 'Internal'){
		//ambil attachment
		// Email ke peminjam internal.
		$mail->isSMTP();                                      			// Set mailer to use SMTP
		//$mail->Host = 'localhost;hosting.gunadarma.ac.id';  			  			// Specify main and backup SMTP servers
		//$mail->SMTPAuth = true;                               			// Enable SMTP authentication
		//$mail->Username = 'bemfikti@gunadarma.ac.id';         			// SMTP username
		//$mail->Password = '#KolaborasiBermanfaat';                     			// SMTP password
		$mail->Host = 'localhost;smtp.gmail.com';  			  			// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               			// Enable SMTP authentication
		$mail->Username = 'bemfikti.ug@gmail.com';         			// SMTP username
		$mail->Password = 'humasbidangmib1920';       
		$mail->SMTPSecure = 'tls';  
		$mail->addAttachment('invoice/' . $name_of_attachment . '.pdf');                          			// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    			// TCP port to connect to
		$mail->setFrom('bemfikti.ug@gmail.com', 'BEM FIKTI UG');		// Set email sender
		$mail->addAddress($email_peminjam, $nama_peminjam);     							// Add a recipient
		$mail->isHTML(true);                                  			// Set email format to HTML
		$mail->Subject = 'Konfirmasi Penyewaan Barang BEM FIKTI';	// Set email subject
		ob_start();
		include('content-internal.php');
		$mail->Body = ob_get_contents();
		ob_end_clean();
		$mail->send();													// Kirim email
	}else{
		// Email ke peminjam eksternal
		
		
		$mail->isSMTP();                                      			// Set mailer to use SMTP
		//$mail->Host = 'localhost;hosting.gunadarma.ac.id';  			  			// Specify main and backup SMTP servers
		//$mail->SMTPAuth = true;                               			// Enable SMTP authentication
		//$mail->Username = 'bemfikti@gunadarma.ac.id';         			// SMTP username
		//$mail->Password = '#KolaborasiBermanfaat';                     			// SMTP password
		//$mail->SMTPSecure = 'tls';                            			// Enable TLS encryption, `ssl` also accepted
		$mail->Host = 'localhost;smtp.gmail.com';  			  			// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               			// Enable SMTP authentication
		$mail->Username = 'bemfikti.ug@gmail.com';         			// SMTP username
		$mail->Password = 'humasbidangmi1819';       
		$mail->Port = 587;                                    			// TCP port to connect to
		$mail->setFrom('bemfikti.ug@gmail.com', 'BEM FIKTI UG');		// Set email sender
		$mail->addAddress($email_peminjam, $nama_peminjam);     		
		$mail->addAttachment('invoice/' . $name_of_attachment . '.pdf');					// Add a recipient
		$mail->isHTML(true);                               				// Set email format to HTML
		$mail->Subject = 'Konfirmasi Penyewaan BEM FIKTI';	// Set email subject
		ob_start();
		include('content-eksternal.php');
		$mail->Body = ob_get_contents();
		ob_end_clean();
		$mail->send();													// Kirim email
	}

	// Email ke bendum & kabid4
	$mail->isSMTP();                                      			// Set mailer to use SMTP
	//$mail->Host = 'localhost;hosting.gunadarma.ac.id';  			  			// Specify main and backup SMTP servers
	//$mail->SMTPAuth = true;                               			// Enable SMTP authentication
	//$mail->Username = 'bemfikti@gunadarma.ac.id';         			// SMTP username
	//$mail->Password = '#KolaborasiBermanfaat';                     			// SMTP password
	//$mail->SMTPSecure = 'tls';                            			// Enable TLS encryption, `ssl` also accepted
	$mail->Host = 'localhost;smtp.gmail.com';  			  			// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               			// Enable SMTP authentication
		$mail->Username = 'bemfikti.ug@gmail.com';         			// SMTP username
		$mail->Password = 'humasbidangmib1920';       
	$mail->Port = 587;                                    			// TCP port to connect to
	$mail->setFrom('bemfikti.ug@gmail.com', 'BEM FIKTI UG');		// Set email sender
	//$mail->addAddress('rikoarfendo01@gmail.com', 'Jibril Hartri Putra');			// Add a recipient
	//$mail->addAddress('fahrilhebat@gmail.com', 'Pemberitahuan Peminjaman Inventaris');			// Add a recipient
	$mail->addAddress('alifwiseman@gmail.com', 'Pemberitahuan Peminjaman Inventaris');			// Add a recipient
	//$mail->addAddress('indiramahayani03@gmail.com', 'Bagian Keuangan BEM FIKTI UG');	// Add a recipient
	$mail->isHTML(true);                                  			// Set email format to HTML
	$mail->Subject = 'Penyewaan Barang BEM FIKTI UG';				// Set email subject
	ob_start();
	include('content-bem.php');
	$mail->Body = ob_get_contents();
	ob_end_clean();
	$mail->addAttachment('invoice/' . $name_of_attachment . '.pdf');
	$mail->send();		
	//ketiga kasih tahu kalau udah di email + harga

	echo 'Terima kasih, silahkan cek email anda!';
} else {
	echo 'Terjadi kesalahan :( hubungi @ug_bemfikti';
}

// mengalihkan ke halaman index.php

?>