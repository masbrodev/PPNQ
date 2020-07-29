<?php
	if ($_GET['aksi']=='tambah'){
		mysqli_query($con,"Insert into tbasrama(nama_asrama)values('$_POST[tasrama]')");
		echo"<script>window.location='home.php?page=asrama';</script>";
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbasrama set nama_asrama='$_POST[tasrama]' where id_asrama='$_POST[id]'");
		echo"<script>window.location='home.php?page=asrama';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbasrama  where id_asrama='$_GET[id]'");
		echo"<script>window.location='home.php?page=asrama';</script>";
	}
?>