<?php
	$d=mysqli_fetch_array(mysqli_query($con,"Select * from tbperizinan,tbsantri,tbkamar where tbperizinan.id_perizinan='$_GET[id]' and tbperizinan.NIS=tbsantri.NIS and tbsantri.id_kamar=tbkamar.id_kamar"));
?>
<script>
   $(document).ready(function(){
    $("#tanggal").datepicker({
    })
   })
  </script>
  <script>
   $(document).ready(function(){
    $("#tanggal2").datepicker({
    })
   })
  </script>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit</strong> Perizinan
        </div>
            <div class="card-body ">
                <form action="?page=prosesperizinan&aksi=edit" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo"$d[id_perizinan]";?>">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">NIS</label></div>
                            <div class="col-12 col-md-9">
									<?php 
										$sql=mysqli_query($con,"Select * from tbsantri,tbkamar where tbsantri.id_kamar=tbkamar.id_kamar order by tbsantri.NIS ASC");
										$jsArray = "var data = new Array();\n";
										echo '<select name="cmbnis" id="cmbnis" onchange="changeValue(this.value)" class="form-control" disabled>';
										echo"<option value=''>Pilih NIS</option>";
										while($s=mysqli_fetch_array($sql)){
											if ($d['NIS']==$s['NIS']){
												echo"<option value='$s[NIS]' selected>$s[NIS]</option>";
											}else{
												echo"<option value='$s[NIS]'>$s[NIS]</option>";
											}
											$jsArray .= "data['" . $s['NIS'] . "'] = {nama:'" . addslashes($s['nama']) . "',kamar:'" . addslashes($s['nama_kamar']) . "'};\n";
										}
									?>
                                    
                                </select>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tnama" name="tnama" class="form-control" value="<?php echo"$d[nama]"; ?>" readonly></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kamar</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tkamar" name="tkamar" class="form-control" value="<?php echo"$d[nama_kamar]"; ?>" readonly></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Izin</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbjenis" class="form-control">
								<option value="">Pilih Jenis Izin</option>
									<?php 
										$sql1=mysqli_query($con,"Select * from tbjenisizin order by id_jenisizin ASC");
										while($s1=mysqli_fetch_array($sql1)){
											if ($d['id_jenisizin']==$s1['id_jenisizin']){
												echo"<option value='$s1[id_jenisizin]' selected>$s1[nama_jenisizin]</option>";
											}else{
												echo"<option value='$s1[id_jenisizin]'>$s1[nama_jenisizin]</option>";
											}
										}
									?>
                                </select>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Izin</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php echo"$d[tgl_izin]"; ?>"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Kembali</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tanggal2" name="tanggal2" class="form-control" value="<?php echo"$d[tgl_kembali]"; ?>"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tket" name="tket" class="form-control" value="<?php echo"$d[keterangan]"; ?>"></div>
                    </div>                                     
			</div>
            <div class="card-footer">
				<input type="submit" value="Edit" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>