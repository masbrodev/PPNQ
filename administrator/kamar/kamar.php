<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Kamar" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahkamar'"><br/><br/>
			<form method="POST" action="?page=kamar">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA KAMAR</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>NAMA KAMAR</th><th>NAMA ASRAMA</th><th>Kuantitas</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbkamar order by id_kamar ASC");
							}else{
								$sql=mysqli_query($con,"Select * from tbkamar where nama_kamar Like '%$_POST[tcari]%' order by id_kamar ASC");
							}
								while ($s=mysqli_fetch_array($sql)){
									echo"<tr>
										<td>$no</td>
										<td>$s[nama_kamar]</td>";
										$as=mysqli_fetch_array(mysqli_query($con,"Select * from tbasrama where id_asrama='$s[id_asrama]'"));
										echo"<td>$as[nama_asrama]</td>
										<td>$s[kuantitas]</td>
										<td><a href='?page=editkamar&id=$s[id_kamar]'>Edit | 
										<a href='?page=proseskamar&aksi=hapus&id=$s[id_kamar]'>Hapus</td>
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