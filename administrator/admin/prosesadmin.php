<?php
	if ($_GET['aksi']=='tambah'){
		$pass=md5($_POST['tpassword']);
		mysqli_query($con,"Insert into tbadmin(username,nama_lengkap,email,no_telp,password)values('$_POST[tusername]','$_POST[tnama]','$_POST[temail]','$_POST[ttelp]','$pass')");
		echo"<script>window.location='home.php?page=admin';</script>";
	}elseif($_GET['aksi']=='edit'){
		$pass=md5($_POST['tpassword']);
		if (!empty($_POST['tpassword'])){
			mysqli_query($con,"Update tbadmin set nama_lengkap='$_POST[tnama]',email='$_POST[temail]',no_telp='$_POST[ttelp]',password='$pass' where username='$_POST[id]'");
		}else{
			mysqli_query($con,"Update tbadmin set nama_lengkap='$_POST[tnama]',email='$_POST[temail]',no_telp='$_POST[ttelp]' where username='$_POST[id]'");
		}
		echo"<script>window.location='home.php?page=admin';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbadmin  where username='$_GET[id]'");
		echo"<script>window.location='home.php?page=admin';</script>";
	}
?>