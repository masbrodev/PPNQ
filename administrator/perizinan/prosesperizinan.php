<?php
	//error_reporting(0);
	$tgl=explode('/',$_POST['tanggal']);
	$tanggal=$tgl[2].'-'.$tgl[0].'-'.$tgl[1];
	$tgl2=explode('/',$_POST['tanggal2']);
	$tanggal2=$tgl2[2].'-'.$tgl2[0].'-'.$tgl2[1];
	if ($_GET['aksi']=='tambah'){
		mysqli_query($con,"Insert into tbperizinan(NIS,tgl_izin,id_jenisizin,tgl_kembali,keterangan)values('$_POST[cmbnis]','$tanggal','$_POST[cmbjenis]','$tanggal2','$_POST[tket]')");
		$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$_POST[cmbnis]'"));
		$id=$st['id_telegram'];
		$nama=$st['nama'];
		$nis=$st['NIS'];
		$jn=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenisizin where id_jenisizin='$_POST[cmbjenis]'"));
		$jenis=$jn['nama_jenisizin'];
		$text='Anak anda yang bernama '.$nama.', NIS : '.$nis.' Telah melakukan perizinan : '.$jenis.' dan harus kembali pada tanggal '.$_POST['tanggal2'].' Jam/Hari, Keterangan : '.$_POST['tket'] ;
		$api = 'https://api.telegram.org/bot990629266:AAFHL0WpvbQKo1qUBKyr7X_xw6hnglQ24MA/sendMessage?chat_id='.$id.'&text='.$text.'';
 		$ch = curl_init($api);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		echo"<script>window.location='home.php?page=perizinan';</script>";
	}elseif($_GET['aksi']=='edit'){
		mysqli_query($con,"Update tbperizinan set id_jenisizin='$_POST[cmbjenis]', tgl_izin='$tanggal', tgl_kembali='$tanggal2', keterangan='$_POST[tket]' where id_perizinan='$_POST[id]'");
		echo"<script>window.location='home.php?page=perizinan';</script>";
	}elseif($_GET['aksi']=='hapus'){
		mysqli_query($con,"Delete from tbperizinan where id_perizinan='$_GET[id]'");
		echo"<script>window.location='home.php?page=perizinan';</script>";
	}
?>