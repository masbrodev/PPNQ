<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Laporan Data Pelanggaran'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../mpdf60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
include "../koneksi.php";
include "../fungsi_indotgl.php";
$sql=mysqli_fetch_array(mysqli_query($con,"Select * from tbpelanggaran,tbsantri,tbkamar,tbasrama,tbjenispelanggaran where tbpelanggaran.NIS=tbsantri.NIS and tbsantri.id_kamar=tbkamar.id_kamar and tbkamar.id_asrama=tbasrama.id_asrama and tbpelanggaran.id_jenispelanggaran=tbjenispelanggaran.id_jenispelanggaran and tbpelanggaran.id_pelanggaran='$_GET[id]' order by tbpelanggaran.id_pelanggaran DESC"));
?>

<table>
<tr>
<td><img src="../logo.png" width="80px" height="80px"></td>
<td><h2>PONDOK PESANTREN NURUL QUR'AN</h2>
<font size="1">Alamat  : Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font></td>
</tr>
</table>
<div style="width:600px; margin:auto; text-align:center">
	<h5>SURAT PELANGGARAN SANTRI</h5><hr/><br><br/>
</div>

  <table align="center" style="border-collapse:collapse; border:1px #000 solid;" width="800">
	<tr><td colspan=2>Yang bertanda tangan dibawah ini, kami pengurus Pondok Pesantren Nurul Qur'an menerangkan bahwa santri :</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>Nama </td><td>: <?php echo"$sql[nama]"; ?></td></tr>
	<tr><td>NIS </td><td>: <?php echo"$sql[NIS]"; ?></td></tr>
	<tr><td>Asrama / Kamar </td><td>: <?php echo"$sql[nama_asrama] / $sql[nama_kamar]"; ?></td></tr>
	<tr><td>Tanggal Pelanggaran </td><td>: <?php $tgl=tgl_indo($sql['tgl_pelanggaran']); echo"$tgl"; ?> </td></tr>
	<tr><td>Jenis Pelanggaran </td><td>: <?php echo"$sql[nama_jenispelanggaran]"; ?></td></tr>
	<tr><td>Bobot </td><td>: <?php echo"$sql[bobot_pelanggaran]"; ?></td></tr>
	<tr><td>Sanksi </td><td>: <?php echo"$sql[sanksi]"; ?></td></tr>
	<tr><td>Keterangan </td><td>: <?php echo"$sql[keterangan]"; ?></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td colspan=2>Dengan ini menyatakan siap menerima sanksi yang telah diberikan oleh pesantren dan apabila dikemudian hari ternyata melakukan pelanggaran yang sama dan tidak mengikuti kedisiplinan pesantren, maka saya bersedia dikeluarkan dari pesantren. Demikian surat pemberitahuan ini kami buat dan dapat digunakan sebagaimana mestinya</td></tr>
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
  <tr><td width="600" colspan=2 align=center>Santri Terkait</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600" colspan=2 align=center>..............................................</td></tr>
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