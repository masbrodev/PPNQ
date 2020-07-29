<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Admin" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahadmin'"><br/><br/>
			<form method="POST" action="?page=admin">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA ADMIN</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>USERNAME</th><th>NAMA LENGKAP</th><th>EMAIL</th><th>NO. TELEPHONE</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbadmin order by username ASC");
							}else{
								$sql=mysqli_query($con,"Select * from tbadmin where nama_lengkap Like '%$_POST[tcari]%' order by username ASC");
							}
								while ($s=mysqli_fetch_array($sql)){
									echo"<tr>
										<td>$no</td>
										<td>$s[username]</td>
										<td>$s[nama_lengkap]</td>
										<td>$s[email]</td>
										<td>$s[no_telp]</td>
										<td><a href='?page=editadmin&id=$s[username]'>Edit | 
										<a href='?page=prosesadmin&aksi=hapus&id=$s[username]'>Hapus</td>
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