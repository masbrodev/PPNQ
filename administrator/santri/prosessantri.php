<?php
	error_reporting(0);
	$tgl=explode('/',$_POST['tanggal']);
	$tanggal=$tgl[2].'-'.$tgl[0].'-'.$tgl[1];
	if ($_GET['aksi']=='tambah'){
		$cek=mysqli_num_rows(mysqli_query($con,"Select * from tbsantri where id_telegram='$_POST[ttelegram]'"));
		if ($cek > 0){
			echo"<script>window.alert('Maaf id telegram yang anda masukkan sudah terdaftar');window.location.href='home.php?page=santri'</script>";
		}else{
			mysqli_query($con,"Insert into tbsantri(NIS,nama,tempat_lahir,tgl_lahir,alamat,jenis_kelamin,id_kamar,id_telegram)values('$_POST[tnis]','$_POST[tnama]','$_POST[ttempat]','$tanggal','$_POST[talamat]','$_POST[jenkel]','$_POST[cmbkamar]','$_POST[ttelegram]')");
			echo"<script>window.location='home.php?page=santri';</script>";
		}
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbsantri set nama='$_POST[tnama]', tempat_lahir='$_POST[ttempat]', tgl_lahir='$tanggal', alamat='$_POST[talamat]', jenis_kelamin='$_POST[jenkel]', id_kamar='$_POST[cmbkamar]', id_telegram='$_POST[ttelegram]' where NIS='$_POST[id]'");
			echo"<script>window.location='home.php?page=santri';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbsantri where NIS='$_GET[id]'");
		echo"<script>window.location='home.php?page=santri';</script>";
	}
?>