<?php
session_start();
include "administrator/koneksi.php";
$pass=md5($_POST['password']);
	$login=mysqli_query($con,"SELECT * FROM tbadmin WHERE username='$_POST[username]' AND password='$pass'");
	$ketemu=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);
	if ($ketemu > 0){
	  //session_is_registered("username");
	  //session_is_registered("namalengkap");
	  //session_is_registered("password");
	  $_SESSION[username]     = $r[username];
	  $_SESSION[namalengkap]  = $r[nama_lengkap];
	  $_SESSION[password]     = $r[password];
	  
	  header('location:administrator/home.php?page=home');
	}
	else{
	  echo "<center>LOGIN GAGAL! <br> 
			Username atau Password Anda tidak benar.<br>
			Atau account Anda sedang diblokir.<br>";
	  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
	}
?>
