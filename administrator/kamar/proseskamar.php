<?php
	if ($_GET['aksi']=='tambah'){
		mysqli_query($con,"Insert into tbkamar(nama_kamar,id_asrama,kuantitas)values('$_POST[tkamar]','$_POST[cmbasrama]','$_POST[tkuantitas]')");
		echo"<script>window.location='home.php?page=kamar';</script>";
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbkamar set nama_kamar='$_POST[tkamar]', id_asrama='$_POST[cmbasrama]' where id_kamar='$_POST[id]'");
		echo"<script>window.location='home.php?page=kamar';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbkamar  where id_kamar='$_GET[id]'");
		echo"<script>window.location='home.php?page=kamar';</script>";
	}
?>