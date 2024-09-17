<?php

$dance = mysqli_query($conn, "SELECT * FROM kompetisi RIGHT JOIN anggota_tim ON kompetisi.id = anggota_tim.id_tim WHERE kompetisi.lomba='Dance Cover' AND kompetisi.stat_tim=1");

?>

<!-- paraf 1-->
<div class="wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Data Pending Anggota Dance Cover</h5>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example text-center" style="font-size:14px">
							<thead>
								<tr style="font-size:8px">
								    <th>No</th>
								    <th>Nama Tim</th>
									<th>Nama Lengkap</th>
									<th>NPM</th>
									<th>E-mail</th>
									<th>No. HP</th>
									<th>ID Line</th>
									<th>Foto</th>
									<th>KTM</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 0; 
									while ($row = mysqli_fetch_array($dance)) {
										$no++;
										$id = $row['id'];
								?>
									<tr>
									    <td><?php echo $no; ?></td>
										<td><?php echo $row['nama_tim']; ?></td>
										<td><?php echo $row['nama_a']; ?></td>
										<td><?php echo $row['npm_a']; ?></td>
										<td><?php echo $row['email_a']; ?></td>
										<td><?php echo $row['nohp_a']; ?></td>
										<td><?php echo $row['idline_a']; ?></td>
										<td>
												<a href="<?php echo "../../assets/berkas/foto/".$row['foto_a'] ?>" download>
													<img src="<?php echo "../../assets/berkas/foto/".$row['foto_a'] ?>" style="width: 50px; height: 50px; margin-bottom:10px;">
												</a>
										</td>
										<td>
                                            <a href="<?php echo "../../assets/berkas/ktm/".$row['ktm_a'] ?>" download>
                                               <img src="<?php echo "../../assets/berkas/ktm/".$row['ktm_a'] ?>" style="width: 50px; height: 50px;"> 
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