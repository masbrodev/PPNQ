<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Jenis Pelanggaran" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahjenispelanggaran'"><br/><br/>
			<form method="POST" action="?page=jenispelanggaran">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA JENIS PELANGGARAN</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>NAMA</th><th>BOBOT</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbjenispelanggaran order by id_jenispelanggaran ASC");
							}else{
								$sql=mysqli_query($con,"Select * from tbjenispelanggaran where nama_jenispelanggaran Like '%$_POST[tcari]%' order by id_jenispelanggaran ASC");
							}
								while ($s=mysqli_fetch_array($sql)){
									echo"<tr>
										<td>$no</td>
										<td>$s[nama_jenispelanggaran]</td>
										<td>$s[bobot_pelanggaran]</td>
										<td><a href='?page=editjenispelanggaran&id=$s[id_jenispelanggaran]'>Edit | 
										<a href='?page=prosesjenispelanggaran&aksi=hapus&id=$s[id_jenispelanggaran]'>Hapus</td>
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