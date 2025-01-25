<?php include "sesi.php";
include "../koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>e-Learning SMKN 5 Bekasi - Hasil Kuis</title>
  
	
	<link rel="stylesheet" href="../main/css/vendors_css.css">
	  
	  
	<link rel="stylesheet" href="../main/css/style.css">
	<link rel="stylesheet" href="../main/css/skin_color.css">

</head>
<body class="hold-transition light-skin sidebar-mini theme-primary">
<div class="wrapper">

  <header class="main-header">
	<div class="d-flex align-items-center logo-box pl-20">		
		<a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block push-btn" data-toggle="push-menu" role="button">
			<img src="../images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
		</a>
		<a href="index.php" class="logo">
		  <div class="logo-lg">
			  <span class="light-logo"><img src="../assets/logosmk.png" width="50" alt="logo"></span>
			  <span class="dark-logo"><img src="../assets/logosmk.png" width="50" alt="logo"></span>
		  </div>
		</a>
	</div>  
    
    <nav class="navbar navbar-static-top pl-10">
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item d-md-none">
				<a href="#" class="waves-effect waves-light nav-link rounded push-btn" data-toggle="push-menu" role="button">
					<img src="../images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded full-screen" title="Full Screen">
					<img src="../images/svg-icon/fullscreen.svg" class="img-fluid svg-icon" alt="">
			    </a>
			</li>
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">		
		  
	      
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
				<img src="../images/svg-icon/user.svg" class="rounded svg-icon" alt="" />
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-header bg-img" style="background-image: url(../images/user-info.jpg)" data-overlay="3">
				  <div class="flexbox align-self-center">					  
				  	<img src= "../assets/logosmk.png" class="float-left rounded-circle" alt="User Image">					  
					<h4 class="user-name align-self-center">
					  <span><?php echo $_SESSION['nama'] ?></span><br>
					  <span>NISN: <?php echo $_SESSION['nisn'] ?></span>
					</h4>
				  </div>
              </li>
              <li class="user-body">
				    <a class="dropdown-item" href="profil.php"><i class="ion ion-person"></i> Profil Saya</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php"><i class="ion-log-out"></i> Keluar</a>
              </li>
            </ul>
          </li>	
			
        </ul>
      </div>
    </nav>
  </header>
  
  
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
		<li>
          <a href="index.php">
			<img src="../images/svg-icon/sidebar-menu/dashboard.svg" class="svg-icon" alt="">
            <span>DASHBOARD</span>
          </a>
        </li> 
		<li class="active">
          <a href="mapel.php">
			<img src="../images/svg-icon/sidebar-menu/icons.svg" class="svg-icon" alt="">
            <span>DATA MATA PELAJARAN</span>
          </a>
        </li> 
		<li>
          <a href="logout.php">
            <img src="../images/svg-icon/sidebar-menu/logout.svg" class="svg-icon" alt="">
			<span>KELUAR</span>
          </a>
        </li> 
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
	  <div class="container-full">	  
		<section class="content">
		  <div class="box box-default">
			<div class="box-header with-border">
			<?php
				if(isset($_POST['jumlah'])){
														$pilihan=$_POST["pilihan"];
														$id_soal=$_POST["id"];
														$jumlah=$_POST['jumlah'];
			
														$score=0;
														$benar=0;
														$salah=0;
														$kosong=0;
			
														for ($i=0;$i<$jumlah;$i++){
															//id nomor soal
															$nomor=$id_soal[$i];

															//jika user tidak memilih jawaban
															if (empty($pilihan[$nomor])){
																$kosong++;
															}else{
																//jawaban dari user
																$jawaban=$pilihan[$nomor];

																//cocokan jawaban user dengan jawaban di database
																$query = mysql_query("select * from soal where id_soal='$nomor' and kunci_jawaban='$jawaban' and id_materi='". $_POST['id_materi'] ."'");


																$cek=mysql_num_rows($query);

																if($cek){
																	//jika jawaban cocok (benar)
																	$benar++;
																}else{
																	//jika salah
																	$salah++;
																}

															} 
																	/*RUMUS
																	Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
																	hasil= 100 / jumlah soal * jawaban yang benar
																	*/

																	// Ambil jumlah soal dari materi yang sedang dikerjakan
																	$id_materi = $_POST['id_materi']; // Pastikan id_materi sudah diterima dari form
																	$result = mysql_query("select * from soal where id_materi='$id_materi'");
																	$jumlah_soal = mysql_num_rows($result);

																	// Hitung nilai berdasarkan jumlah soal dari materi ini
																	if ($jumlah_soal > 0) {
																		$score = 100 / $jumlah_soal * $benar;
																	} else {
																		$score = 0; // Jika tidak ada soal, nilai 0
																	}
																	$hasil = number_format($score, 1);
																}
												
																//Lakukan Pengecekan  Data  dalam Database
																$cek = mysql_num_rows(mysql_query("select id_siswa from hasil where id_siswa='$_SESSION[id_siswa]' and id_materi='". $_POST['id_materi'] ."'"));

																//Pemberian kondisi lulus/ tidak lulus
																 
																$id_siswa= ucwords($_SESSION['id_siswa']);
					
																if($hasil>=85){
																$input  		= "insert into hasil (id_siswa,benar,salah,kosong,nilai,tanggal,grade,status,id_materi) Values ('$id_siswa','$benar','$salah','$kosong','$hasil',NOW(),'A','LULUS','". $_POST['id_materi'] ."')";
																$query_input 	= mysql_query($input);
																	if($query_input) {
																		$sukses = "<div class='alert alert-success alert-dismissible' align='center'><h3><i class='icon fa fa-check'></i> ANDA LULUS !</h3><h4>ANDA MENJAWAB $benar JAWABAN BENAR DARI $jumlah_soal TOTAL SOAL DENGAN SCORE $hasil DAN GRADE A</h4></div>";
																		} else {
																		$gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Catat Data Ujian  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
																	}
																} else if($hasil>=75 and $hasil<85){
																$input  		= "insert into hasil (id_siswa,benar,salah,kosong,nilai,tanggal,grade,status,id_materi) Values ('$id_siswa','$benar','$salah','$kosong','$hasil',NOW(),'B','LULUS','". $_POST['id_materi'] ."')";
																$query_input 	= mysql_query($input);
																	if($query_input) {
																		$sukses = "<div class='alert alert-success alert-dismissible' align='center'><h3><i class='icon fa fa-check'></i> ANDA LULUS !</h3><h4>ANDA MENJAWAB $benar JAWABAN BENAR DARI $jumlah_soal TOTAL SOAL DENGAN SCORE $hasil DAN GRADE B</h4></div>";
																		} else {
																		$gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Catat Data Ujian  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
																	}
																} else if($hasil>=60 and $hasil<75){
																$input  		= "insert into hasil (id_siswa,benar,salah,kosong,nilai,tanggal,grade,status,id_materi) Values ('$id_siswa','$benar','$salah','$kosong','$hasil',NOW(),'C','LULUS','". $_POST['id_materi'] ."')";
																$query_input 	= mysql_query($input);
																	if($query_input) {
																		$sukses = "<div class='alert alert-success alert-dismissible' align='center'><h3><i class='icon fa fa-check'></i> ANDA LULUS !</h3><h4>ANDA MENJAWAB $benar JAWABAN BENAR DARI $jumlah_soal TOTAL SOAL DENGAN SCORE $hasil DAN GRADE C</h4></div>";
																		} else {
																		$gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Catat Data Ujian  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
																	}
																} else if($hasil>=50 and $hasil<60){
																$input  		= "insert into hasil (id_siswa,benar,salah,kosong,nilai,tanggal,grade,status,id_materi) Values ('$id_siswa','$benar','$salah','$kosong','$hasil',NOW(),'D','TIDAK LULUS','". $_POST['id_materi'] ."')";
																$query_input 	= mysql_query($input);
																	if($query_input) {
																		$sukses = "<div class='alert alert-danger alert-dismissible' align='center'><h3><i class='icon fa fa-ban'></i> ANDA TIDAK LULUS !</h3><h4>ANDA MENJAWAB $benar JAWABAN BENAR DARI $jumlah_soal TOTAL SOAL DENGAN SCORE $hasil DAN GRADE D</h4></div>";
																		} else {
																		$gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Catat Data Ujian  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
																	}
																} else {
																$input  		= "insert into hasil (id_siswa,benar,salah,kosong,nilai,tanggal,grade,status,id_materi) Values ('$id_siswa','$benar','$salah','$kosong','$hasil',NOW(),'E','TIDAK LULUS','". $_POST['id_materi'] ."')";
																$query_input 	= mysql_query($input);
																	if($query_input) {
																		$sukses = "<div class='alert alert-danger alert-dismissible' align='center'><h3><i class='icon fa fa-ban'></i> ANDA TIDAK LULUS !</h3><h4>ANDA MENJAWAB $benar JAWABAN BENAR DARI $jumlah_soal TOTAL SOAL DENGAN SCORE $hasil DAN GRADE E</h4></div>";
																		} else {
																		$gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Catat Data Ujian  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
																	}
																}
					
															
															}
			?>
				<div class="box-body">
					<?php if(isset($sukses)) { echo $sukses; } if(isset($gagal)) { echo $gagal; } ?>
				</div>
				<p align="center"><a href="mapel.php" class="btn btn-info btn-rounded"><i class="fa fa-fw fa-backward"></i> KEMBALI KE MATERI</a></p>
			</div>
		  </div>

		</section>
	  </div>
  </div>
  
   <footer class="main-footer">
   <p>&copy; 2024 SMKN 5 Bekasi by Kelompok 3 | All Rights Reserved</p>
  </footer>
  
  
  <div class="control-sidebar-bg"></div>
</div>
	<script src="../main/js/vendors.min.js"></script>
    
	<script src="../assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
    <script src="../assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
	
	
	<script src="../main/js/template.js"></script>
	<script src="../main/js/demo.js"></script>
    <script src="../main/js/pages/steps.js"></script>
	
    
	
</body>
</html>