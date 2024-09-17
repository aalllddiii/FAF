<?php
$g_response = $_POST['g-recaptcha-response'];
function cek_captcha($g_response) {
$curl = curl_init();
    curl_setopt_array($curl,[
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL =>'https://www.google.com/recaptcha/api/siteverify',
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => [
          'secret' => '6LcQEd0UAAAAAN4QgLlMf3KKMgCrZL6dz1yOs3VG',
          'response' => $g_response,
      ],
    ]);
    
    $captcha_success = json_decode(curl_exec($curl));
	if ($captcha_success->success===false) {
		$apakah=false;
	} else if ($captcha_success->success===true) {
		$apakah=true;
	}
	
	return $apakah;
}


?>