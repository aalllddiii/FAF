<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
<title>[BEM FIKTI UG] Pemberitahuan Penyewaan Barang</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style type="text/css"> 
html{width: 100%;}
::-moz-selection{background:#21c5f5;color:#ffffff;}
::selection{background:#21c5f5;color:#ffffff;}
body { background-color: #f5f6f6; margin: 0; padding: 0; }
.ReadMsgBody{width: 100%;background-color: #f5f6f6;}
.ExternalClass{width: 100%;background-color: #f5f6f6;}
a{ color:#21c5f5; text-decoration:none;font-style: normal;} 
a:hover { color:#505050; text-decoration:underline;font-style: normal;}
p, div {margin: 0 !important;}
table {border-collapse: collapse;}
@media only screen and (max-width: 640px)  {
    table table{width:100% !important; }
    td[class="full_width"] {width:100% !important; }
    div[class="div_scale"] {width: 440px !important; margin: 0 auto !important;}
    table[class="table_scale"] {width: 440px !important; margin: 0 auto !important;}
    table[class="featured_area"] {width: 454px !important; margin: 0 auto !important;}
    td[class="td_scale"] {width: 440px !important; margin: 0 auto !important;}
    img[class="img_scale"] {width: 100% !important; height: auto !important;}
    img[class="divider"] {width: 440px !important; height: 2px !important;}
    table[class="spacer"] {display: none !important;}
    td[class="spacer"] {display: none !important;}
    td[class="center"] {text-align: center !important;}
    table[class="full"] {width: 400px !important; margin-left: 20px !important; margin-right: 20px !important;}
    img[class="divider"] {width: 113px !important; height: 8px !important;} 
}
@media only screen and (max-width: 479px)  {
    table table{width:100% !important; }
    td[class="full_width"] {width:100% !important; }
    div[class="div_scale"] {width: 280px !important; margin: 0 auto !important;}
    table[class="table_scale"] {width: 280px !important; margin: 0 auto !important;}
    table[class="featured_area"] {width: 290px !important; margin: 0 auto !important;}
    td[class="td_scale"] {width: 280px !important; margin: 0 auto !important;}
    img[class="img_scale"] {width: 100% !important; height: auto !important;}
    img[class="divider"] {width: 280px !important; height: 2px !important;}
    table[class="spacer"] {display: none !important;}
    td[class="spacer"] {display: none !important;}
    td[class="center"] {text-align: center !important;}
    table[class="full"] {width: 240px !important; margin-left: 20px !important; margin-right: 20px !important; }
    img[class="divider"] {width: 113px !important; height: 8px !important;}
    
}
</style>
</head>
<body bgcolor="#f5f6f6">
<table width="100%" align="center" bgcolor="#f2f3f4" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td valign="top" width="100%">
            <table align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="100%">   
                        <table class="table_scale" width="600" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="100%">

                                    <table width="600" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td class="spacer" width="30">
                                            </td>
                                            
                                            <td width="540">
                                                <table class="full" align="left" width="540" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                                                    
                                                    <!-- START OF HEADING-->
                                                    <tr>
                                                        <td class="left" style="padding-top: 0px; font-family: 'Open Sans', Arial, sans-serif; color:#3498db; font-size:16px; line-height:25px; mso-line-height-rule: exactly;" align="left">
                                                        <h3>Kepada Yth. <?php echo $nama_peminjam; ?>,</h3>                                                         
                                                        </td>
                                                    </tr>
                                                    <!-- END OF HEADING-->
                                                    
                                                    <!-- START OF TEXT-->
                                                    <tr>
                                                        <td class="left" align="left" style="padding-top: 0px; margin: 0;  font-size:13px ; color:#7f8c8d; font-family: 'Open Sans', Arial, sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
                                                            <span>
                                                            <p>Terimakasih telah melakukan penyewaan <?=$nama_barang_pinjam?> ke BEM FIKTI UG. Berikut adalah informasi mengenai rincian peminjaman Anda:</p><br/>
                                                            <p>
                                                            <table>
                                                            
                                                            <tr><td>Nama Penyewa</td><td>:</td><td><?php echo $nama_peminjam; ?></td></tr>
                                                            <tr><td>NPM / NIK</td><td>:</td><td><?php echo $npm_peminjam ; ?></td></tr>
                                                            <tr><td>Divisi</td><td>:</td><td><?php echo $divisi_ormawa_peminjam; ?></td></tr>
                                                            <tr><td>Tanggal Penyewaan</td><td>:</td><td><?php echo $tanggal_peminjaman; ?></td></tr>
                                                            <tr><td>Nama Barang Yang Disewa</td><td>:</td><td><?php echo $Nama_Barang_Pinjam; ?></td></tr>
                                                            <tr><td>Nama Barang Yang Disewa</td><td>:</td><td><?php echo $nama_barang_pinjam; ?></td></tr>
                                                            <tr><td>Tanggal Pengembalian</td><td>:</td><td><?php echo $tanggal_peminjaman ; ?></td></tr>
                                                            <tr><td>Keperluan</td><td>:</td><td><?php echo $keperluan; ?></td></tr>
                                                            <tr><td>Biaya</td><td>:</td><td><?php echo $biaya; ?></td></tr>
                                                            </table>
                                                            </p><br/>
                                                            <p>Harap segera melakukan konfirmasi ke:<br/>
                                                            1. Indira Mahayani (083891077260).<br/>
                                                            </p>
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
                                                                <li>Saya bersedia dikenakan denda sebesar biaya sewa per hari apabila peminjaman melebihi batas waktu pengembalian yang telah ditentukan (Max H+1 setelah peminjaman).</li>
                                                            </ol>
                                                            </td>
                                                            </tr>
                                                            </table>
                                                            <p>
                                                            *Silahkan download Invoice yang terdapat pada lampiran email ini.
                                                            </p>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <!-- END OF TEXT--> 
                                                    
                                                    <!-- START OF DIVIDER-->
                                                    <tr>                                                    
                                                        <td align="left" style="padding-top: 15px;">
                                                                <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td bgcolor="#e2e2e2" height="1" style="line-height:0px; font-size:0px;"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <!-- END OF DIVIDER-->
                                                    <!-- START OF TEXT-->
                                                    <tr>
                                                        <td class="left" align="left" style="padding-top: 15px; padding-bottom: 40px; margin: 0;  font-size:13px ; color:#7f8c8d; font-family: 'Open Sans', Arial, sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
                                                            <span>
                                                            <p>Hormat kami,</p>
                                                            <p>BEM FIKTI UG</p>
                                                            <p><a href="https://fikti.bem.gunadarma.ac.id">fikti.bem.gunadarma.ac.id</a></p>
                                                            <p><a href="https://fikti.bem.gunadarma.ac.id/invetaris/faq">Ketentuan Penyewaan Inventaris BEM FIKTI UG</a></p>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <!-- END OF TEXT-->     
                                                </table>
                                            </td>
                                            <td class="spacer" width="30">
                                            </td>
                                        </tr>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>