<script>
   $(document).ready(function(){
    $("#tanggal").datepicker({
    })
   })
  </script>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Tambah</strong> Pelanggaran
        </div>
            <div class="card-body ">
                <form action="?page=prosespelanggaran&aksi=tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">NIS</label></div>
                            <div class="col-12 col-md-9">
									<?php 
										$sql=mysqli_query($con,"Select * from tbsantri,tbkamar where tbsantri.id_kamar=tbkamar.id_kamar order by tbsantri.NIS ASC");
										$jsArray1 = "var data1 = new Array();\n";
										echo '<select name="cmbnis" id="cmbnis" onchange="changeValue(this.value)" class="form-control">';
										echo"<option value=''>Pilih NIS</option>";
										while($s=mysqli_fetch_array($sql)){
											echo"<option value='$s[NIS]'>$s[NIS]</option>";
											$jsArray1 .= "data1['" . $s['NIS'] . "'] = {nama:'" . addslashes($s['nama']) . "',kamar:'" . addslashes($s['nama_kamar']) . "'};\n";
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
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kamar</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tkamar" name="tkamar" class="form-control" readonly></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Pelanggaran</label></div>
                            <div class="col-12 col-md-9">
									<?php 
										$sql=mysqli_query($con,"Select * from tbjenispelanggaran order by id_jenispelanggaran ASC");
										$jsArray = "var data = new Array();\n";
										echo '<select name="cmbjenis" id="cmbjenis" onchange="changeValue1(this.value)" class="form-control">';
										echo"<option value=''>Pilih Jenis Pelanggaran</option>";
										while($s=mysqli_fetch_array($sql)){
											echo"<option value='$s[id_jenispelanggaran]'>$s[nama_jenispelanggaran]</option>";
											$jsArray .= "data['" . $s['id_jenispelanggaran'] . "'] = {bobot:'" . addslashes($s['bobot_pelanggaran']) . "'};\n";
										}
									?>
                                    
                                </select>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bobot</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="bobot" name="bobot" class="form-control" readonly></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tanggal" name="tanggal" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sanksi</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tsanksi" name="tsanksi" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tket" name="tket" class="form-control"></div>
                    </div>
                                                            
			</div>
            <div class="card-footer">
				<input type="submit" value="Simpan" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>
			<script type="text/javascript">
			<?php echo $jsArray1; ?>
			function changeValue(cmbnis){ 
			document.getElementById('tnama').value = data1[cmbnis].nama;
			document.getElementById('tkamar').value = data1[cmbnis].kamar;
			};
			</script>
			<script type="text/javascript">
			<?php echo $jsArray; ?>
			function changeValue1(cmbjenis){ 
			document.getElementById('bobot').value = data[cmbjenis].bobot;
			};
			</script>