<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Tambah</strong> Admin
        </div>
            <div class="card-body ">
                <form action="?page=prosesadmin&aksi=tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tusername" onkeypress="return event.charCode < 48 || event.charCode  >57" name="tusername" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Lengkap</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tnama" onkeypress="return event.charCode < 48 || event.charCode  >57" name="tnama" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="temail" name="temail" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">No. Telephone</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="ttelp" name="ttelp" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tpassword" name="tpassword" class="form-control"></div>
                    </div>
                                                            
			</div>
            <div class="card-footer">
				<input type="submit" value="Simpan" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>