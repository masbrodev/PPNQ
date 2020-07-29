<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Surat Panggilan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../mpdf60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
include "../koneksi.php";
include "../fungsi_indotgl.php";
$hari=date("d")+1;
$bulan=tgl_indo(date("Y-m").'-'.$hari);
$tahun=date("Y");
$sql=mysqli_fetch_array(mysqli_query($con,"Select * from tbpelanggaran,tbsantri,tbkamar,tbasrama,tbjenispelanggaran where tbpelanggaran.NIS=tbsantri.NIS and tbsantri.id_kamar=tbkamar.id_kamar and tbkamar.id_asrama=tbasrama.id_asrama and tbpelanggaran.id_jenispelanggaran=tbjenispelanggaran.id_jenispelanggaran order by tbpelanggaran.id_pelanggaran DESC"));
?>

<table>
<tr>
<td><img src="../logo.png" width="80px" height="80px"></td>
<td><h2>PONDOK PESANTREN NURUL QUR'AN</h2>
<font size="1">Alamat  : Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font></td>
</tr>
</table><br/>
<hr/>
<table align="left" style="border-collapse:collapse; border:1px #000 solid;" width="800">
<tr><td>Nomor</td><td>: /684/PPNQ/I/<?php echo"$tahun"; ?></td></tr>
<tr><td>Lampiran</td><td>: -</td></tr>
<tr><td>Perihal</td><td>: Pemanggilan Orang Tua</td></tr>
</table><br/><br/>
<table align="center" style="border-collapse:collapse; border:1px #000 solid;" width="800">
<tr><td>Kepada Yth :</td></tr>
<tr><td><b>Orang Tua/Wali dari <?php echo"$sql[nama]"; ?></b></td></tr>
<tr><td>Di-</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Tempat</u></b></td></tr>
</table><br />

  <table align="center" style="border-collapse:collapse; border:1px #000 solid;" width="800">
	<tr><td colspan=2><b><i>Assalamu'alaikum War, Wab.</b></i></td></tr>
	<tr><td colspan=2>Yang bertanda tangan dibawah ini, kami pengurus Pondok Pesantren Nurul Qur'an menerangkan bahwa santri, dengan ini kami menyampaikan kepada Bapak/Ibu/Wali Santri atas nama :</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td>Nama </td><td>: <?php echo"$sql[nama]"; ?></td></tr>
	<tr><td>NIS </td><td>: <?php echo"$sql[NIS]"; ?></td></tr>
	<tr><td>Asrama / Kamar </td><td>: <?php echo"$sql[nama_asrama] / $sql[nama_kamar]"; ?></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr><td colspan=2>Telah beberapa kali melakukan pelanggaran tata tertib Pondok Pesantren Nurul Qur'an. Berkaitan dengan hal diatas maka dengan ini kami sampaikan surat panggilan orang tua dengan harapan Bapak/Ibu/Wali Santri dapat hadir di Pondok Pesantren Nurul Qur'an pada tanggal <b><?php echo"$bulan"; ?>, Jam 08.00 WIB.</b></td></tr>
	<tr><td colspan=2>Demikian surat pemberitahuan ini kami sampaikan, atas perhatian dan partisipasinya kami sampaikan terimakasih.</td></tr>
	<tr><td colspan=2><b><i>Wassalamu'alaikum War, Wab.</b></i></td></tr>
  </table><br/><br/>
  <?php
  $tanggal=tgl_indo(date("Y-m-d"));
  ?>
  <table width="800">
  <tr><td width="600">&nbsp;</td><td>Probolinggo, <?php echo"$tanggal"; ?></td></tr>
  <tr><td width="600">Orang Tua/Wali</td><td>Petugas KAMTIB</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">..............................................</td><td>..............................................</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600" colspan=2 align=center>Pengurus Pesantren</td></tr>
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