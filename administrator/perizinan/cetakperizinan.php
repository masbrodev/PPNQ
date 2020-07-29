<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Laporan Data Perizinan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../mpdf60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
include "../koneksi.php";
include "../fungsi_indotgl.php";
$sql=mysqli_fetch_array(mysqli_query($con,"Select * from tbperizinan,tbsantri,tbkamar,tbasrama,tbjenisizin where tbperizinan.NIS=tbsantri.NIS and tbsantri.id_kamar=tbkamar.id_kamar and tbkamar.id_asrama=tbasrama.id_asrama and tbperizinan.id_jenisizin=tbjenisizin.id_jenisizin and tbperizinan.id_perizinan='$_GET[id]' order by tbperizinan.id_perizinan DESC"));
$tgl_kembali=tgl_indo($sql['tgl_kembali']);
?>

<table>
<tr>
<td><img src="../logo.png" width="80px" height="80px"></td>
<td><h2>PONDOK PESANTREN NURUL QUR'AN</h2>
<font size="1">Alamat  : Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font></td>
</tr>
</table>
<div style="width:600px; margin:auto; text-align:center">
	<h5>SURAT IZIN</h5><hr/><br><br/>
</div>

  <table align="center" style="border-collapse:collapse; border:1px #000 solid;" width="800">
	<tr><td colspan=2>Yang bertandatangan dibawah ini, kami pengurus Pondok Pesantren Nurul Qur'an memberikan izin kepada :</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>Nama </td><td>: <?php echo"$sql[nama]"; ?></td></tr>
	<tr><td>NIS </td><td>: <?php echo"$sql[NIS]"; ?></td></tr>
	<tr><td>Asrama / Kamar </td><td>: <?php echo"$sql[nama_asrama] / $sql[nama_kamar]"; ?></td></tr>
	<tr><td>Tanggal Izin </td><td>: <?php $tgl=tgl_indo($sql['tgl_izin']); echo"$tgl"; ?> </td></tr>
	<tr><td>Keperluan </td><td>: <?php echo"$sql[nama_jenisizin]"; ?></td></tr>
	<tr><td>Tanggal Kembali </td><td>: <?php echo"$tgl_kembali"; ?></td></tr>
	<tr><td>Keterangan </td><td>: <?php echo"$sql[keterangan]"; ?></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td colspan=2>Demikian surat ini kami dibuat dengan penuh rasa tanggungjawab dan untuk dipergunakan sebagaimana mestinya.</td></tr>
  </table><br/><br/>
  <?php
  $tanggal=tgl_indo(date("Y-m-d"));
  ?>
  <table width="800">
  <tr><td width="600">&nbsp;</td><td>Probolinggo, <?php echo"$tanggal"; ?></td></tr>
  <tr><td width="600">Pengurus Pesantren</td><td>Petugas KAMTIB</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">..............................................</td><td>..............................................</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600"><i><b>NB : Surat izin ini harus diserahkan kembali kepada keamanan</b></i></td></tr>
  
</table>
<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();

$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>