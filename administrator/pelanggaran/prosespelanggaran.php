<?php
	error_reporting(0);
	$tgl=explode('/',$_POST['tanggal']);
	$tanggal=$tgl[2].'-'.$tgl[0].'-'.$tgl[1];
	if ($_GET['aksi']=='tambah'){
		mysqli_query($con,"Insert into tbpelanggaran(NIS,tgl_pelanggaran,id_jenispelanggaran,sanksi,keterangan)values('$_POST[cmbnis]','$tanggal','$_POST[cmbjenis]','$_POST[tsanksi]','$_POST[tket]')");
		$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$_POST[cmbnis]'"));
		$id=$st['id_telegram'];
		$nama=$st['nama'];
		$nis=$st['NIS'];
		$jn=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenispelanggaran where id_jenispelanggaran='$_POST[cmbjenis]'"));
		$jenis=$jn['nama_jenispelanggaran'];
		$text='Anak anda yang bernama '.$nama.', NIS : '.$nis.' Telah melakukan pelanggaran : '.$jenis.' dan dikenakan sanksi '.$_POST['tsanksi'];
		$api = 'https://api.telegram.org/bot990629266:AAFHL0WpvbQKo1qUBKyr7X_xw6hnglQ24MA/sendMessage?chat_id='.$id.'&text='.$text.'';
 		$ch = curl_init($api);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		echo"<script>window.location='home.php?page=pelanggaran';</script>";
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbpelanggaran set id_jenispelanggaran='$_POST[cmbjenis]', tgl_pelanggaran='$tanggal', sanksi='$_POST[tsanksi]', keterangan='$_POST[tket]' where id_pelanggaran='$_POST[id]'");
		echo"<script>window.location='home.php?page=pelanggaran';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbpelanggaran where id_pelanggaran='$_GET[id]'");
		echo"<script>window.location='home.php?page=pelanggaran';</script>";
	}
?>