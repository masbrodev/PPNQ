<?php
	$s=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$_GET[id]'"));
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit</strong> Kamar
        </div>
            <div class="card-body ">
                <form action="?page=proseskamar&aksi=edit" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo"$s[id_kamar]";?>">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Kamar</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="tkamar" name="tkamar" class="form-control" value="<?php echo"$s[nama_kamar]";?>"></div>
                    </div>
					<div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Asrama</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cmbasrama" class="form-control">
									<?php 
										$sql=mysqli_query($con,"Select * from tbasrama order by id_asrama ASC");
										while($s1=mysqli_fetch_array($sql)){
											if ($s1['id_asrama']==$s['id_asrama']){
												echo"<option value='$s1[id_asrama]' selected>$s1[nama_asrama]</option>";
											}else{
												echo"<option value='$s1[id_asrama]'>$s1[nama_asrama]</option>";
											}
										}
									?>
                                    
                                </select>
                        </div>
                    </div>
                    <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">  Kuantitas</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tkuantitas" name="tkuantitas" class="form-control" value="<?php echo"$s[kuantitas]";?>"></div>
                        </div>                                     
			</div>
            <div class="card-footer">
				<input type="submit" value="Edit" class="btn btn-info btn-fill pull-left">
				<input type="reset" class="btn btn-danger btn-fill pull-left" value="Reset">
            </div>
				</form>
    </div>	
</div>