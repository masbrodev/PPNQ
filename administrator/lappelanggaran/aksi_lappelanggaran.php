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
?>
<?php
if (empty($_POST['cmbnis'])){ ?>
<table>
<tr>
<td><img src="../logo1.jpg" width="80px" height="80px"></td>
<td>PONDOK PESANTREN NURUL QUR'AN<br/>
<font size="1">Alamat  :Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font><br/></td>
</tr>
</table><br/>
<div style="width:600px; margin:auto; text-align:center">
	<h5>LAPORAN DATA PELANGGARAN SANTRI <br/>BULAN : <?php $bulan=tgl_indo($_POST['cmbtahun'].'-'.$_POST['cmbbulan']); echo"$bulan"; ?></h5>
	
</div>
<table align="center" style="border-collapse:collapse; border:1px #000 solid;" border="1" width="800">
  <thead>
    <tr style="background:#ddd">
	<th><i class="icon-key"></i> NO.</th>
	<th><i class="icon-archive"></i> TANGGAL</th>
	<th><i class="icon-archive"></i> NIS</th>
	<th><i class="icon-calendar"></i> NAMA SANTRI</th>
	<th><i class="icon-calendar"></i> NAMA KAMAR</th>
	<th><i class="icon-calendar"></i> JENIS PELANGGARAN</th>
	<th><i class="icon-calendar"></i> BOBOT</th>
	<th><i class="icon-calendar"></i> SANKSI</th>
	<th><i class="icon-calendar"></i> KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php
		
			$bulan=$_POST['cmbtahun'].'-'.$_POST['cmbbulan'];
			$sql=mysqli_query($con,"Select * from tbpelanggaran where left(tgl_pelanggaran,7)='$bulan' and id_jenispelanggaran='$_POST[cmbjenis]' order by id_pelanggaran DESC");
		
								$no=1;
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_pelanggaran']);
									echo"<tr>
										<td>$no</td>
										<td>$tgl</td>";
										$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$s[NIS]'"));
										echo"<td>$st[NIS]</td>
										<td>$st[nama]</td>";
										$k=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$st[id_kamar]'"));
										echo"<td>$k[nama_kamar]</td>";
										$j=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenispelanggaran where id_jenispelanggaran='$s[id_jenispelanggaran]'"));
										echo"<td>$j[nama_jenispelanggaran]</td>
										<td>$j[bobot_pelanggaran]</td>
										<td>$s[sanksi]</td>
										<td>$s[keterangan]</td>
									</tr>";
									$no++;
								} ?>
  </tbody>
  </table><br/>
  <?php
  $tanggal=tgl_indo(date("Y-m-d"));
  ?>
  <table width="800">
  <tr><td width="600">&nbsp;</td><td>Probolinggo, <?php echo"$tanggal"; ?></td></tr>
  <tr><td width="600">&nbsp;</td><td>Petugas KAMTIB</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>..............................................</td></tr>
  
</table> 
							<?php }else{ 
								$santri=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri,tbkamar where tbsantri.id_kamar=tbkamar.id_kamar and tbsantri.NIS='$_POST[cmbnis]'"))?>
								<table>
<tr>
<td><img src="../logo1.jpg" width="80px" height="80px"></td>
<td>PONDOK PESANTREN NURUL QUR'AN<br/>
<font size="1">Alamat  :Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font><br/></td>
</tr>
</table><br/>
<div style="width:600px; margin:auto; text-align:center">
	<h5>LAPORAN DATA PELANGGARAN SANTRI </h5>
	
</div>
<table align="left">
<tr><td>NIS</td><td>: <?php echo"$santri[NIS]"; ?></td></tr>
<tr><td>Nama</td><td>: <?php echo"$santri[nama]"; ?></td></tr>
<tr><td>Kamar</td><td>: <?php echo"$santri[nama_kamar]"; ?></td></tr>
</table><br/>
<table align="center" style="border-collapse:collapse; border:1px #000 solid;" border="1" width="800">
  <thead>
    <tr style="background:#ddd">
	<th><i class="icon-key"></i> NO.</th>
	<th><i class="icon-archive"></i> TANGGAL</th>
	<th><i class="icon-calendar"></i> JENIS PELANGGARAN</th>
	<th><i class="icon-calendar"></i> BOBOT</th>
	<th><i class="icon-calendar"></i> SANKSI</th>
	<th><i class="icon-calendar"></i> KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php
			$sql=mysqli_query($con,"Select * from tbpelanggaran where NIS='$_POST[cmbnis]' and id_jenispelanggaran='$_POST[cmbjenis1]' order by id_pelanggaran DESC");
								$no=1;
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_pelanggaran']);
									echo"<tr>
										<td>$no</td>
										<td>$tgl</td>";
										$j=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenispelanggaran where id_jenispelanggaran='$s[id_jenispelanggaran]'"));
										echo"<td>$j[nama_jenispelanggaran]</td>
										<td>$j[bobot_pelanggaran]</td>
										<td>$s[sanksi]</td>
										<td>$s[keterangan]</td>
									</tr>";
									$no++;
								} ?>
  </tbody>
  </table><br/>
  <?php
  $tanggal=tgl_indo(date("Y-m-d"));
  ?>
  <table width="800">
  <tr><td width="600">&nbsp;</td><td>Probolinggo, <?php echo"$tanggal"; ?></td></tr>
  <tr><td width="600">&nbsp;</td><td>Petugas KAMTIB</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>&nbsp;</td></tr>
  <tr><td width="600">&nbsp;</td><td>..............................................</td></tr>
  
</table> 
							<?php }
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();

$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>