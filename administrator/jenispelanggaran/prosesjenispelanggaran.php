<?php
	if ($_GET['aksi']=='tambah'){
		mysqli_query($con,"Insert into tbjenispelanggaran(nama_jenispelanggaran,bobot_pelanggaran)values('$_POST[tjenispelanggaran]','$_POST[tbobot]')");
		echo"<script>window.location='home.php?page=jenispelanggaran';</script>";
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbjenispelanggaran set nama_jenispelanggaran='$_POST[tjenispelanggaran]', bobot_pelanggaran='$_POST[tbobot]' where id_jenispelanggaran='$_POST[id]'");
		echo"<script>window.location='home.php?page=jenispelanggaran';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbjenispelanggaran  where id_jenispelanggaran='$_GET[id]'");
		echo"<script>window.location='home.php?page=jenispelanggaran';</script>";
	}
?>