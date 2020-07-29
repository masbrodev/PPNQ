<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Pelanggaran" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahpelanggaran'"><br/><br/>
			<form method="POST" action="?page=pelanggaran">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari" >
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA PELANGGARAN</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>TANGGAL</th><th>NIS</th><th>NAMA</th><th>KAMAR</th><th>ASRAMA</th><th>JENIS PELANGGARAN</th><th>BOBOT</th><th>SANKSI</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbpelanggaran order by id_pelanggaran DESC");
							}else{
								$sql=mysqli_query($con,"Select * from tbpelanggaran,tbsantri where tbsantri.NIS=tbpelanggaran.NIS and tbsantri.nama Like '%$_POST[tcari]%' order by tbpelanggaran.id_pelanggaran DESC");
							}
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_pelanggaran']);
									echo"<tr>
										<td>$no</td>
										<td>$tgl</td>";
										if (empty($_POST['tcari'])){
											$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$s[NIS]' "));
										}else{
											$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$s[NIS]' and nama Like '%$_POST[tcari]%'"));
										}
										echo"<td>$st[NIS]</td>
										<td>$st[nama]</td>";
										$k=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$st[id_kamar]'"));
										echo"<td>$k[nama_kamar]</td>";
										$a=mysqli_fetch_array(mysqli_query($con,"Select * from tbasrama where id_asrama='$k[id_asrama]'"));
										echo"<td>$a[nama_asrama]</td>";
										$j=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenispelanggaran where id_jenispelanggaran='$s[id_jenispelanggaran]'"));
										echo"<td>$j[nama_jenispelanggaran]</td><td>$j[bobot_pelanggaran]</td>
										<td>$s[sanksi]</td>
										<td><a href='?page=editpelanggaran&id=$s[id_pelanggaran]'>Edit</a> | 
										<a href='?page=prosespelanggaran&aksi=hapus&id=$s[id_pelanggaran]'>Hapus</a> |
										<a href='pelanggaran/cetakpelanggaran.php?id=$s[id_pelanggaran]' target=_blank>Cetak</a></td>
									</tr>";
									$no++;
								}
						?>
						
                    </tbody>
                    </table>
				</div>
            </div>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA PEMANGGILAN</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>NIS</th><th>NAMA</th><th>KAMAR</th><th>ASRAMA</th><th>JUMLAH BOBOT</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$tanggal=date("Y-m-d");
							$no=1;
								$sql=mysqli_query($con,"Select * from tbtmp order by NIS DESC");
								while ($s=mysqli_fetch_array($sql)){
									echo"<tr>
										<td>$no</td>";
										$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$s[NIS]' "));
										echo"<td>$st[NIS]</td>
										<td>$st[nama]</td>";
										$k=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$st[id_kamar]'"));
										echo"<td>$k[nama_kamar]</td>";
										$a=mysqli_fetch_array(mysqli_query($con,"Select * from tbasrama where id_asrama='$k[id_asrama]'"));
										echo"<td>$a[nama_asrama]</td>
										<td>$s[bobot]</td>
										<td><a href='pelanggaran/cetakpemanggilan.php?id=$s[id_pelanggaran]' target=_blank>Cetak Pemanggilan</a></td>
									</tr>";
									$no++;
									if ($tanggal>$s['tanggal']){
										mysqli_query($con,"Delete from tbtmp where id='$s[id]'");
									}
								}
						?>
						
                    </tbody>
                    </table>
				</div>
            </div>
        </div>
	</div>
</div>