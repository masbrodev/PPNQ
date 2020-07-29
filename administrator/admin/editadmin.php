<?php
	$s=mysqli_fetch_array(mysqli_query($con,"Select * from tbadmin where username='$_GET[id]'"));
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit</strong> Admin
        </div>
            <div class="card-body ">
                <form action="?page=prosesadmin&aksi=edit" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo"$s[username]";?>">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tusername" name="tusername" onkeypress="return event.charCode < 48 || event.charCode  >57" class="form-control" value="<?php echo"$s[username]";?>" readonly></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tnama" name="tnama" onkeypress="return event.charCode < 48 || event.charCode  >57" class="form-control" value="<?php echo"$s[nama_lengkap]";?>"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="temail" name="temail" class="form-control" value="<?php echo"$s[email]";?>"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">No. Telephone</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="ttelp" name="ttelp" class="form-control" value="<?php echo"$s[no_telp]";?>"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tpassword" name="tpassword" class="form-control"></div>
                    </div>
                                                            
			</div>
            <div class="card-footer">
				<input type="submit" value="Edit" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>