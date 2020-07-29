<?php
	$s=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenispelanggaran where id_jenispelanggaran='$_GET[id]'"));
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit</strong> Jenis Pelanggaran
        </div>
            <div class="card-body ">
                <form action="?page=prosesjenispelanggaran&aksi=edit" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo"$s[id_jenispelanggaran]";?>">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Jenis Pelanggaran</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tjenispelanggaran" onkeypress="return event.charCode < 48 || event.charCode  >57" name="tjenispelanggaran" class="form-control" value="<?php echo"$s[nama_jenispelanggaran]";?>"></div>
                    </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bobot</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="tbobot" name="tbobot" class="form-control" value="<?php echo"$s[bobot_pelanggaran]";?>"></div>
                    </div>                                        
			</div>
            <div class="card-footer">
				<input type="submit" value="Edit" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>