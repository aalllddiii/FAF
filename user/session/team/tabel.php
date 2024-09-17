<?php
    $sdd = "SELECT * FROM anggota_tim WHERE id_tim='$id_tim'";
    $hasil = $conn->query($sdd);
?>

<div class="card strpied-tabled-with-hover">
    <div class="card-header ">
        <h4 class="card-title">Anggota Tim</h4>
    </div>
    <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>ID Line</th>
                <th>Pas Photo</th>
                <th>KTM / Kartu Pelajar</th>
            </thead>
            <tbody>
            <?php
                $no = 0;
                while ($row = $hasil->fetch_array(MYSQLI_ASSOC)) {
                    $no++;
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_a']; ?></td>
                    <td><?= $row['npm_a']; ?></td>
                    <td><?= $row['email_a']; ?></td>
                    <td><?= $row['nohp_a']; ?></td>
                    <td><?= $row['idline_a']; ?></td>
                    <td>
						<?php if($row['foto_a'] != NULL){ ?>
							<div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <?php } else{ ?>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
						<?php if($row['ktm_a'] != NULL){ ?>
							<div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <?php } else{ ?>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>