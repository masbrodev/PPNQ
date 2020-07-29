<div class="animated fadeIn">
    <div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
                    <strong>LAPORAN</strong> PERBULAN
                </div>
                <div class="card-body">
				<form method="post" action="lapperizinan/aksi_lapperizinan.php" target=_blank>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Bulan</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbbulan" class="form-control">
									<option value="01">Januari</option>
									<option value="02">Pebruari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="11">Nopember</option>
									<option value="12">Desember</option>
                                </select>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Tahun</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbtahun" class="form-control">
									<?php
									$tahun=date("Y");
									for ($i;$i<=7;$i++){
										echo"<option value='$tahun'>$tahun</option>";
										$tahun=$tahun-1;
									}
									?>
                                </select>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Perizinan</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbjenis" class="form-control">
									<?php
										$jenis=mysqli_query($con,"Select * from tbjenisizin");
										while($j=mysqli_fetch_array($jenis)){
											echo"<option value='$j[id_jenisizin]'>$j[nama_jenisizin]</option>";
										}
									?>
                                </select>
                        </div>
                    </div>
				</div>
            <div class="card-footer">
				<input type="submit" value="Cetak" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="card">
				<div class="card-header">
					<strong>LAPORAN</strong> PERSANTRI
                </div>
                <div class="card-body card-block">
					<form action="lapperizinan/aksi_lapperizinan.php" method="post" class="form-horizontal" target=_blank>
						<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">NIS</label></div>
                            <div class="col-12 col-md-9">
									<?php 
										$sql=mysqli_query($con,"Select * from tbsantri ORDER BY NIS ASC");
										$jsArray = "var data = new Array();\n";
										echo '<select name="cmbnis" id="cmbnis" onchange="changeValue(this.value)" class="form-control">';
										echo"<option value=''>Pilih NIS</option>";
										while($s=mysqli_fetch_array($sql)){
											echo"<option value='$s[NIS]'>$s[NIS]</option>";
											$jsArray .= "data['" . $s['NIS'] . "'] = {nama:'" . addslashes($s['nama']) . "'};\n";
										}
									?>
                                    
                                </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tnama" name="tnama" class="form-control" readonly></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Perizinan</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbjenis1" class="form-control">
									<?php
										$jenis=mysqli_query($con,"Select * from tbjenisizin");
										while($j=mysqli_fetch_array($jenis)){
											echo"<option value='$j[id_jenisizin]'>$j[nama_jenisizin]</option>";
										}
									?>
                                </select>
                        </div>
                    </div>
				</div>
					<div class="card-footer">
						<input type="submit" value="Cetak" class="btn btn-info btn-fill pull-left">
						<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
                    </div></form>
              </div>
            </div>
	</div>
</div>
		<script type="text/javascript">
			<?php echo $jsArray; ?>
			function changeValue(cmbnis){ 
			document.getElementById('tnama').value = data[cmbnis].nama;
			};
			</script>