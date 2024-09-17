<?php

$solo = mysqli_query($conn, "SELECT * FROM kompetisi WHERE lomba='Solo Vocal' AND stat_tim=1");

?>

<!-- paraf 1-->
<div class="wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Data Valid Peserta Solo Vocal</h5>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example text-center">
							<thead>
								<tr style="font-size:12px">
								    <th>No</th>
									<th>Instansi</th>
									<th>Nama Lengkap</th>
									<th>NPM</th>
									<th>E-mail</th>
									<th>No. HP</th>
									<th>ID Line</th>
									<th>Foto</th>
									<th>KTM</th>
									<th>Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 0; 
									while ($row = mysqli_fetch_array($solo)) {
										$no++;
										$id = $row['id'];
								?>
									<tr>
									    <td><?php echo $no; ?></td>
										<td><?php echo $row['instansi']; ?></td>
										<td><?php echo $row['nama_k']; ?></td>
										<td><?php echo $row['npm_k']; ?></td>
										<td><?php echo $row['email_k']; ?></td>
										<td><?php echo $row['nohp_k']; ?></td>
										<td><?php echo $row['idline_k']; ?></td>
										<td>
                                            <a href="<?php echo "../../assets/berkas/foto/".$row['foto_k'] ?>" download>
												<img src="<?php echo "../../assets/berkas/foto/".$row['foto_k'] ?>" style="width: 50px; height: 50px;">
											</a>
                                        </td>
										<td>
                                            <a href="<?php echo "../../assets/berkas/ktm/".$row['ktm_k'] ?>" download>
                                               <img src="<?php echo "../../assets/berkas/ktm/".$row['ktm_k'] ?>" style="width: 50px; height: 50px;"> 
											</a>
                                        </td>
										<td>
                                            <a href="<?php echo "../../assets/berkas/bukti_tf/".$row['bukti'] ?>" download>
                                                <img src="<?php echo "../../assets/berkas/bukti_tf/".$row['bukti'] ?>" style="width: 50px; height: 50px;">
											</a>
                                        </td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<!-- Codes POPUP WINDOW-->
<script type="text/javascript">
	// Popup window code
	function newPopup(url) {
		popupWindow = window.open(
			url, 'popUpWindow', 'height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
	}
</script>

<!-- end paraf 1-->