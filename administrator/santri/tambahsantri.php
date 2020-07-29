<script>
   $(document).ready(function(){
    $("#tanggal").datepicker({
    })
   })
  </script>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Tambah</strong> Santri
        </div>
            <div class="card-body ">
                <form action="?page=prosessantri&aksi=tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">NIS</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tnis" onkeypress="return hanyaAngka (event)" name="tnis" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tnama" name="tnama" onkeypress="return event.charCode < 48 || event.charCode  >57" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tempat Lahir</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="ttempat" name="ttempat" onkeypress="return event.charCode < 48 || event.charCode  >57" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Lahir</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tanggal" name="tanggal" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="talamat" name="talamat" class="form-control"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Jenis Kelamin</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="jenkel" name="jenkel" value="Laki-Laki" class="form-check-input">Laki-Laki
                                        </label>
                                    </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input type="radio" id="jenkel" name="jenkel" value="Perempuan" class="form-check-input">Perempuan
                                            </label>
                                        </div>
                                </div>
                            </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Kamar</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbkamar" class="form-control">
									<?php 
										$sql=mysqli_query($con,"Select * from tbkamar order by id_kamar ASC");
										while($s=mysqli_fetch_array($sql)){
											echo"<option value='$s[id_kamar]'>$s[nama_kamar]</option>";
										}
									?>
                                    
                                </select>
                        </div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID. Telegram</label></div>
                        <div class="col-12 col-md-9"><input type="text" onkeypress="return hanyaAngka (event)" id="ttelegram" name="ttelegram" class="form-control"></div>
                    </div>
                                                            
			</div>
            <div class="card-footer">
				<input type="submit" value="Simpan" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
 
      return false;
    return true;
  }
 </script>