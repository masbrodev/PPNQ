<?php
	if ($_GET['aksi']=='tambah'){
		mysqli_query($con,"Insert into tbjenisizin(nama_jenisizin)values('$_POST[tjenisizin]')");
		echo"<script>window.location='home.php?page=jenisizin';</script>";
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbjenisizin set nama_jenisizin='$_POST[tjenisizin]' where id_jenisizin='$_POST[id]'");
		echo"<script>window.location='home.php?page=jenisizin';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbjenisizin  where id_jenisizin='$_GET[id]'");
		echo"<script>window.location='home.php?page=jenisizin';</script>";
	}
?>