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
?>
<?php 
if (empty($_POST['cmbnis'])){ ?>
<table>
<tr>
<td><img src="../logo1.jpg" width="80px" height="80px"></td>
<td>PONDOK PESANTREN NURUL QUR'AN<br/>
<font size="1">Alamat  : Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font><br/></td>
</tr>
</table><br/>
<div style="width:600px; margin:auto; text-align:center">
	<h5>LAPORAN DATA PERIZINAN SANTRI <br/>BULAN : <?php $bulan=tgl_indo($_POST['cmbtahun'].'-'.$_POST['cmbbulan']); echo"$bulan"; ?></h5>
	
</div>
<table align="center" style="border-collapse:collapse; border:1px #000 solid;" border="1" width="800">
  <thead>
    <tr style="background:#ddd">
	<th><i class="icon-key"></i> NO.</th>
	<th><i class="icon-calendar"></i> NIS</th>
	<th><i class="icon-calendar"></i> NAMA SANTRI</th>
	<th><i class="icon-calendar"></i> NAMA KAMAR</th>
	<th><i class="icon-archive"></i> TGL. IZIN</th>
	<th><i class="icon-calendar"></i> JENIS PERIZINAN</th>
	<th><i class="icon-calendar"></i> TGL. KEMBALI</th>
	<th><i class="icon-calendar"></i> KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php
		
			$bulan=$_POST['cmbtahun'].'-'.$_POST['cmbbulan'];
			$sql=mysqli_query($con,"Select * from tbperizinan where left(tgl_izin,7)='$bulan' and id_jenisizin='$_POST[cmbjenis]' order by id_perizinan DESC");
								$no=1;
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_izin']);
									$tgl_kembali=tgl_indo($s['tgl_kembali']);
									echo"<tr>
										<td>$no</td>";
										$st=mysqli_fetch_array(mysqli_query($con,"Select * from tbsantri where NIS='$s[NIS]'"));
										echo"<td>$st[NIS]</td>
										<td>$st[nama]</td>";
										$k=mysqli_fetch_array(mysqli_query($con,"Select * from tbkamar where id_kamar='$st[id_kamar]'"));
										echo"<td>$k[nama_kamar]</td><td>$tgl</td>";
										$j=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenisizin where id_jenisizin='$s[id_jenisizin]'"));
										echo"<td>$j[nama_jenisizin]</td>
										<td>$tgl_kembali</td>
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
<font size="1">Alamat  : Jl.Ir.H juanda no 41 Patokan Kraksaan Probolinggo Jawa Timur</font><br/></td>
</tr>
</table><br/>
<div style="width:600px; margin:auto; text-align:center">
	<h5>LAPORAN DATA PERIZINAN SANTRI </h5>
	
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
	<th><i class="icon-calendar"></i> JENIS PERIZINAN</th>
	<th><i class="icon-calendar"></i> TGL. KEMBALI</th>
	<th><i class="icon-calendar"></i> KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php
		$bulan=$_POST['cmbtahun'].'-'.$_POST['cmbbulan'];
			$sql=mysqli_query($con,"Select * from tbperizinan where NIS='$_POST[cmbnis]' and id_jenisizin='$_POST[cmbjenis1]' order by id_perizinan DESC");
								$no=1;
								while ($s=mysqli_fetch_array($sql)){
									$tgl=tgl_indo($s['tgl_izin']);
									$tgl_kembali=tgl_indo($s['tgl_kembali']);
									echo"<tr>
										<td>$no</td>
										<td>$tgl</td>";
										$j=mysqli_fetch_array(mysqli_query($con,"Select * from tbjenisizin where id_jenisizin='$s[id_jenisizin]'"));
										echo"<td>$j[nama_jenisizin]</td>
										<td>$tgl_kembali</td>
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