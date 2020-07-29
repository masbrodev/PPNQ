<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Jenis Izin" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahjenisizin'"><br/><br/>
			<form method="POST" action="?page=jenisizin">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA JENIS PERIZINAN</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>NAMA</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbjenisizin order by id_jenisizin ASC");
							}else{
								$sql=mysqli_query($con,"Select * from tbjenisizin where nama_jenisizin Like '%$_POST[tcari]%' order by id_jenisizin ASC");
							}
								while ($s=mysqli_fetch_array($sql)){
									echo"<tr>
										<td>$no</td>
										<td>$s[nama_jenisizin]</td>
										<td><a href='?page=editjenisizin&id=$s[id_jenisizin]'>Edit | 
										<a href='?page=prosesjenisizin&aksi=hapus&id=$s[id_jenisizin]'>Hapus</td>
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