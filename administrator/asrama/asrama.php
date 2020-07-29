<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Asrama" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahasrama'"><br/><br/>
			<form method="POST" action="?page=asrama">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA ASRAMA</strong>
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
								$sql=mysqli_query($con,"Select * from tbasrama order by id_asrama ASC");
							}else{
								$sql=mysqli_query($con,"Select * from tbasrama where nama_asrama Like '%$_POST[tcari]%' order by id_asrama ASC");
							}
								while ($s=mysqli_fetch_array($sql)){
									echo"<tr>
										<td>$no</td>
										<td>$s[nama_asrama]</td>
										<td><a href='?page=editasrama&id=$s[id_asrama]'>Edit | 
										<a href='?page=prosesasrama&aksi=hapus&id=$s[id_asrama]'>Hapus</td>
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