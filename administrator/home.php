<?php
	error_reporting(0);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PP. NURUL QUR'AN</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
	<link href="assets/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
	  <script src="assets/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
	  <script src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>
	  <script src="assets/jquery-ui-1.11.4/jquery-ui.min.js"></script>
	  <link rel="stylesheet" href="assets/jquery-ui-1.11.4/jquery-ui.theme.css">


    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <a class="navbar-brand" href="./"><img src="logo1.jpg" alt="Logo" width="100px" height="100px"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="?page=home"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Beranda</font></a>
                    </li>
                    <h3 class="menu-title"><font face="sans-serif">DATA MASTER</font></h3><!-- /.menu-title -->
					<li>
                        <a href="?page=admin"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Data Admin</font></a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
						<i class="menu-icon fa fa-laptop"></i><font face="sans-serif">Data Asrama</font></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="?page=asrama"><font face="sans-serif">Asrama</font></a></li>
                            <li><i class="fa fa-id-badge"></i><a href="?page=kamar"><font face="sans-serif">Kamar</font></a></a></li>
                        </ul>
                    </li>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
						<i class="menu-icon fa fa-laptop"></i><font face="sans-serif">Data Jenis</font></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="?page=jenisizin"><font face="sans-serif">Jenis Perizinan</font></a></li>
                            <li><i class="fa fa-id-badge"></i><a href="?page=jenispelanggaran"><font face="sans-serif">Jenis Pelanggaran</font></a></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=santri"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Data Santri</font></a>
                    </li>
                    
                    <h3 class="menu-title"><font face="sans-serif">PROSES</FONT></h3><!-- /.menu-title -->

                    <li>
                        <a href="?page=perizinan"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Perizinan</font></a>
                    </li>
					<li>
                        <a href="?page=pelanggaran"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Pelanggaran</font></a>
                    </li>
                    <h3 class="menu-title"><font face="sans-serif">LAPORAN</FONT></h3><!-- /.menu-title -->

                    <li>
                        <a href="?page=lapperizinan"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Perizinan</font></a>
                    </li>
					<li>
                        <a href="?page=lappelanggaran"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Pelanggaran</font></a>
                    </li>
					<li class="active">
                        <a href="logout.php"> <i class="menu-icon fa fa-dashboard"></i><font face="sans-serif">Keluar</font></a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <h4><font face="sans-serif">PONDOK PESANTREN NURUL QUR'AN</font></h4>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
			<?php
				include"koneksi.php";
				include"fungsi_indotgl.php";
				$santri=mysqli_query($con,"Select * from tbsantri order by NIS ASC");
				while ($s=mysqli_fetch_array($santri)){
					$pel=mysqli_query($con,"Select * from tbpelanggaran,tbjenispelanggaran where tbpelanggaran.aktif='Y' and tbpelanggaran.id_jenispelanggaran=tbjenispelanggaran.id_jenispelanggaran and tbpelanggaran.NIS='$s[NIS]'");
					$bobot=0;
					$no=0;
						while($p=mysqli_fetch_array($pel)){
							$bobot=$bobot+$p['bobot_pelanggaran'];
							$no++;
						}
						$jumlah=$bobot;
						//echo"$jumlah";
					if ($jumlah > 79){
						$tanggal=date("Y-m-d");
						mysqli_query($con,"Insert into tbtmp(tanggal,NIS,bobot)values('$tanggal','$s[NIS]','$jumlah')");
						$id=$s['id_telegram'];
						$nama=$s['nama'];
						$nis=$s['NIS'];
						$text='Anak anda yang bernama '.$nama.', NIS : '.$nis.' Telah melakukan pelanggaran dengan bobot rata-rata pelanggaran : '.$jumlah.' Oleh karena itu kami mengharap kehadiran bapak/ibu untuk mendatangi Pondok Pesantren Nurul Qur`an';
						$api = 'https://api.telegram.org/bot990629266:AAFHL0WpvbQKo1qUBKyr7X_xw6hnglQ24MA/sendMessage?chat_id='.$id.'&text='.$text.'';
						$ch = curl_init($api);
						curl_setopt($ch, CURLOPT_HEADER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						$result = curl_exec($ch);
						curl_close($ch);
						mysqli_query($con,"Update tbpelanggaran set aktif='N' where NIS='$s[NIS]'");
					}
				}
				if ($_GET['page']=='asrama'){
					include"asrama/asrama.php";
				}elseif($_GET['page']=='tambahasrama'){
					include"asrama/tambahasrama.php";
				}elseif($_GET['page']=='prosesasrama'){
					include"asrama/prosesasrama.php";
				}elseif($_GET['page']=='editasrama'){
					include"asrama/editasrama.php";
				}elseif ($_GET['page']=='kamar'){
					include"kamar/kamar.php";
				}elseif($_GET['page']=='tambahkamar'){
					include"kamar/tambahkamar.php";
				}elseif($_GET['page']=='proseskamar'){
					include"kamar/proseskamar.php";
				}elseif($_GET['page']=='editkamar'){
					include"kamar/editkamar.php";
				}elseif ($_GET['page']=='admin'){
					include"admin/admin.php";
				}elseif($_GET['page']=='tambahadmin'){
					include"admin/tambahadmin.php";
				}elseif($_GET['page']=='prosesadmin'){
					include"admin/prosesadmin.php";
				}elseif($_GET['page']=='editadmin'){
					include"admin/editadmin.php";
				}elseif ($_GET['page']=='jenisizin'){
					include"jenisizin/jenisizin.php";
				}elseif($_GET['page']=='tambahjenisizin'){
					include"jenisizin/tambahjenisizin.php";
				}elseif($_GET['page']=='prosesjenisizin'){
					include"jenisizin/prosesjenisizin.php";
				}elseif($_GET['page']=='editjenisizin'){
					include"jenisizin/editjenisizin.php";
				}elseif ($_GET['page']=='jenispelanggaran'){
					include"jenispelanggaran/jenispelanggaran.php";
				}elseif($_GET['page']=='tambahjenispelanggaran'){
					include"jenispelanggaran/tambahjenispelanggaran.php";
				}elseif($_GET['page']=='prosesjenispelanggaran'){
					include"jenispelanggaran/prosesjenispelanggaran.php";
				}elseif($_GET['page']=='editjenispelanggaran'){
					include"jenispelanggaran/editjenispelanggaran.php";
				}elseif ($_GET['page']=='santri'){
					include"santri/santri.php";
				}elseif($_GET['page']=='tambahsantri'){
					include"santri/tambahsantri.php";
				}elseif($_GET['page']=='prosessantri'){
					include"santri/prosessantri.php";
				}elseif($_GET['page']=='editsantri'){
					include"santri/editsantri.php";
				}elseif ($_GET['page']=='perizinan'){
					include"perizinan/perizinan.php";
				}elseif($_GET['page']=='tambahperizinan'){
					include"perizinan/tambahperizinan.php";
				}elseif($_GET['page']=='prosesperizinan'){
					include"perizinan/prosesperizinan.php";
				}elseif($_GET['page']=='editperizinan'){
					include"perizinan/editperizinan.php";
				}elseif ($_GET['page']=='pelanggaran'){
					include"pelanggaran/pelanggaran.php";
				}elseif($_GET['page']=='tambahpelanggaran'){
					include"pelanggaran/tambahpelanggaran.php";
				}elseif($_GET['page']=='prosespelanggaran'){
					include"pelanggaran/prosespelanggaran.php";
				}elseif($_GET['page']=='editpelanggaran'){
					include"pelanggaran/editpelanggaran.php";
				}elseif($_GET['page']=='lapperizinan'){
					include"lapperizinan/lapperizinan.php";
				}elseif($_GET['page']=='lappelanggaran'){
					include"lappelanggaran/lappelanggaran.php";
				}else{
					echo"Selamat Datang di Aplikasi Perizinan dan Pelanggaran Santri Pondok Pesantren Nurul Qur'an<br/>
					<img src='../logo.jpg'>";
				}
			?>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
