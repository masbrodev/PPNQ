<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Perizinan" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahperizinan'"><br/><br/>
			<form method="POST" action="?page=perizinan">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA PERIZINAN</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>NIS</th><th>NAMA</th><th>KAMAR</th><th>ASRAMA</th><th>JENIS IZIN</th><th>TANGGAL IZIN</th><th>TANGGAL KEMBALI</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbperizinan order by id_perizinan DESC");
							}else{
								$sql=mysqli_query($con,"Select * from tbperizinan,tbsantri where tbsantri.NIS=tbperizinan.NIS and tbsantri.nama Like '%$_POST[tcari]%' order by tbperizinan.id_perizinan DESC");
							}
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_izin']);
									$tgl2=tgl_indo($s['tgl_kembali']);
									echo"<tr>
										<td>$no</td>";
										$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$s[NIS]'"));
										echo"<td>$st[NIS]</td>
										<td>$st[nama]</td>";
										$k=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$st[id_kamar]'"));
										echo"<td>$k[nama_kamar]</td>";
										$a=mysqli_fetch_array(mysqli_query($con,"Select * from tbasrama where id_asrama='$k[id_asrama]'"));
										echo"<td>$a[nama_asrama]</td>";
										$j=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenisizin where id_jenisizin='$s[id_jenisizin]'"));
										echo"<td>$j[nama_jenisizin]</td>
										<td>$tgl</td>
										<td>$tgl2</td>
										<td><a href='?page=editperizinan&id=$s[id_perizinan]'>Edit</a> | 
										<a href='?page=prosesperizinan&aksi=hapus&id=$s[id_perizinan]'>Hapus</a> | 
										<a href='perizinan/cetakperizinan.php?id=$s[id_perizinan]' target=_blank>Cetak</a></td>
									</tr>";
									$no++;
								}
						?>
						
                    </tbody>
                    </table>
				</div>
            </div>
        </div>
	</div>
</div>