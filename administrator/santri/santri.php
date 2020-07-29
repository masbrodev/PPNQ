<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-12">
			<input type="button" value="Tambah Santri" class="btn btn-info btn-fill pull-left" onclick="window.location.href='?page=tambahsantri'"><br/><br/>
			<form method="POST" action="?page=santri">
			<input type="text" name="tcari" size="50"><input type="submit" value="Cari">
			</form>
			<div class="card">
				<div class="card-header">
                    <strong class="card-title">DATA SANTRI</strong>
                </div>
                <div class="card-body">
					<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
					<thead>
						<tr><th>NO</th><th>NIS</th><th>NAMA</th><th>TEMPAT/TGL. LAHIR</th><th>ALAMAT</th><th>JENIS KELAMIN</th><th>KAMAR</th><th>ASRAMA</th><th>AKSI</th></tr>
                    </thead>
					<tbody>
						<?php 
							$no=1;
							if (empty($_POST['tcari'])){
								$sql=mysqli_query($con,"Select * from tbsantri order by NIS ASC");
							}else{
								$sql=mysqli_query($con,"Select * from tbsantri where nama Like '%$_POST[tcari]%' order by NIS ASC");
							}
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_lahir']);
									echo"<tr>
										<td>$no</td>
										<td>$s[NIS]</td>
										<td>$s[nama]</td>
										<td>$s[tempat_lahir], $tgl</td>
										<td>$s[alamat]</td>
										<td>$s[jenis_kelamin]</td>";
										$k=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$s[id_kamar]'"));
										echo"<td>$k[nama_kamar]</td>";
										$a=mysqli_fetch_array(mysqli_query($con,"Select * from tbasrama where id_asrama='$k[id_asrama]'"));
										echo"<td>$a[nama_asrama]</td>
										<td><a href='?page=editsantri&id=$s[NIS]'>Edit | 
										<a href='?page=prosessantri&aksi=hapus&id=$s[NIS]'>Hapus</td>
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