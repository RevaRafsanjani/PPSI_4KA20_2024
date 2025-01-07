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

    <title>e-Learning SMKN 5 Bekasi - Detail Materi</title>
  
	
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
			  <span class="light-logo"><img src="../images/logo.jpg" width="50" alt="logo"></span>
			  <span class="dark-logo"><img src="../images/logo.jpg" width="50" alt="logo"></span>
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
				  	<img src= "../images/logo.jpg" class="float-left rounded-circle" alt="User Image">					  
					<h4 class="user-name align-self-center">
					  <span><?php echo $_SESSION['nama'] ?></span><br>
					  <span>NIP: <?php echo $_SESSION['nip'] ?></span>
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
          <a href="kelas.php">
			<img src="../images/svg-icon/sidebar-menu/layout.svg" class="svg-icon" alt="">
            <span>DATA KELAS</span>
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

		  <div class="row">	
			<?php
				$query = mysql_query("select * from matpel where id_guru='". $_SESSION['id_guru'] ."'");
				while ($row = mysql_fetch_array($query)) {
				$matpel = $row['nama_matpel'];	
				$idmatpel = $row['id_matpel'];	
				}
				$query = mysql_query("select * from kelas where id_kelas='". $_GET['id_kelas'] ."'");
				while ($row = mysql_fetch_array($query)) {
				$tingkatnya = $row['tingkat'];	
				$kelasnya	= $row['nama_kelas'];	
				}
				$query = mysql_query("select * from materi where id_materi='". $_GET['id_materi'] ."'");
				while ($row = mysql_fetch_array($query)) {
				$materinya = $row['judul'];		
				}
			?>
			<div class="col-12">
			  <div class="box box-default">
				<div class="box-header with-border" align="center">
				  <h2 class="box-title"><?php echo strtoupper($materinya) ?></h2><br>
				  <h4 class="box-title"><?php echo $matpel ?> (KELAS <?php echo $tingkatnya ?>-<?php echo $kelasnya ?>)</h4>
				</div>
				<?php 	
							function tanggal_indo($tanggal)
								{
									$bulan = array (1 =>'Januari',
														'Februari',
														'Maret',
														'April',
														'Mei',
														'Juni',
														'Juli',
														'Agustus',
														'September',
														'Oktober',
														'November',
														'Desember'
													);
									$split = explode('-', $tanggal);
									return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
								}
							
								function randpass($length){
									//    karakter yang bisa dipakai sebagai password
									$string = "abcdefghijklmnopqrstuvwxyz1234567890";
									$len = strlen($string);
									$pass = "";
									//    mengenerate password
									for($i=1;$i<=$length; $i++){
										$start = rand(0, $len);
										$pass  .= substr($string, $start, 1);
									}
									return $pass;
								}
					  
					  		if(isset($_POST['pdf'])){
								$nama_berkas	= $_POST['nama_berkas'];		
								$id_materi		= $_GET['id_materi'];	
								$ps				= randpass(5);

								$ekstensi_diperbolehkan	= array('pdf');
								$namas 			= 'id'.$ps.'-'.$_FILES['file']['name'];
								$x 				= explode('.', $namas);
								$ekstensi 		= strtolower(end($x));
								$ukuran			= $_FILES['file']['size'];
								$file_tmp 		= $_FILES['file']['tmp_name'];	

							if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
								if($ukuran < 1044070){			
									move_uploaded_file($file_tmp, '../assets/berkas/'.$namas);
									$query	= "insert into detail_materi (id_materi, nama_berkas, jenis_materi, path_materi) values ('$id_materi','$nama_berkas','PDF','$namas')";
									$query_input 	= mysql_query($query);
									if($query){
										$sukses 	= "<div class='alert alert-info' role='alert' align='center'><h3><strong>Well done! </strong>Berkas Materi berhasil tersimpan di database.</div></h3>";
									}else{
										$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Tambah Berkas Materi GAGAL ! Mohon periksa kembali</div></h3>".mysql_error();
									}
								}else{
									$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Ukuran file terlalu besar ! Mohon periksa kembali</div></h3>".mysql_error();
								}
							}else{
								$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Pastikan file yang anda upload berekstensi PDF. Mohon periksa kembali</div></h3>".mysql_error();
							}
						}
					  
					  		if(isset($_POST['video'])){
								$nama_berkas	= $_POST['nama_berkas'];		
								$id_materi		= $_GET['id_materi'];	
								$path_materi	= $_POST['path_materi'];
															
								$query	= "insert into detail_materi (id_materi, nama_berkas, jenis_materi, path_materi) values ('$id_materi','$nama_berkas','VIDEO','$path_materi')";
								$query_input 	= mysql_query($query);
									if($query){
										$sukses 	= "<div class='alert alert-info' role='alert' align='center'><h3><strong>Well done! </strong>Berkas Materi berhasil tersimpan di database.</div></h3>";
									}else{
										$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Tambah Berkas Materi GAGAL ! Mohon periksa kembali</div></h3>".mysql_error();
									}
						}
					  
					  		if(isset($_POST['ubah'])){
								$soal			= $_POST['soal'];
								$pg_a			= $_POST['pg_a'];
								$pg_b			= $_POST['pg_b'];
								$pg_c			= $_POST['pg_c'];
								$pg_d			= $_POST['pg_d'];
								$kunci_jawaban	= $_POST['kunci_jawaban'];
								$id_soal		= $_POST['id_soal'];

								$input  		= "update soal set soal ='" . $soal . "', pg_a ='" . $pg_a . "', pg_b ='" . $pg_b . "', pg_c ='" . $pg_c . "', pg_d ='" . $pg_d . "', kunci_jawaban ='" . $kunci_jawaban . "' where id_soal ='" . $id_soal . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Soal berhasil dirubah. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Data Soal GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
					  
					  		if(isset($_POST['mulai'])){
								$input  		= "update soal set status ='TERBIT' where id_materi ='" . $_GET['id_materi'] . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Ujian Berhasil Dimulai. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Memulai Ujian GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
					  
					  		if(isset($_POST['stop'])){
								$input  		= "update soal set status ='DRAFT' where id_materi ='" . $_GET['id_materi'] . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Ujian Berhasil Dihentikan. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Menghentikan Ujian GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
					  
					  		if(isset($_POST['soalnya'])){
								$soal			= $_POST['soal'];
								$pg_a			= $_POST['pg_a'];
								$pg_b			= $_POST['pg_b'];
								$pg_c			= $_POST['pg_c'];
								$pg_d			= $_POST['pg_d'];
								$kunci_jawaban	= $_POST['kunci_jawaban'];

								$input  		= "insert into soal (tanggal, soal, pg_a, pg_b, pg_c, pg_d, kunci_jawaban, status, id_materi) values (NOW(),'$soal','$pg_a','$pg_b','$pg_c','$pg_d','$kunci_jawaban','DRAFT','". $_GET['id_materi'] ."')";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Soal berhasil tersimpan di database. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Tambah Data Soal  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
					  
					  		if(isset($_POST['hapus'])){
								$id_soal		= $_POST['id_soal'];
								$input  		= "delete from soal where id_soal ='$id_soal'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Soal berhasil dihapus. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Hapus Data Soal GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}

							if(isset($sukses)) { echo $sukses; }
							if(isset($gagal)) { echo $gagal; } 
						?>
				<div class="box-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#materi" role="tab"><span><i class="ion-email mr-15"></i>DAFTAR MATERI</span></a> </li>
						
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soal" role="tab"><span><i class="ion-email mr-15"></i>DAFTAR KUIS</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#nilai" role="tab"><span><i class="ion-email mr-15"></i>HASIL KUIS</span></a> </li>
					</ul>
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="materi" role="tabpanel">
							<div class="box-body">
								<div class="timeline timeline-line-dotted">
									<span class="timeline-label">
										<a href="#" class="btn btn-info btn-rounded" title="More..." data-toggle="modal" data-target="#tambah">
											<i class="fa fa-fw fa-plus"></i> TAMBAH MATERI
										</a>
									</span>
									<div class="modal fade" id="tambah">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Pilih Jenis Materi</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
										  <form class="form" method="post" action="" enctype="multipart/form-data">
											  <div class="col-md-12" align="center"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#pdf"><img src="../images/pdf-icon.webp" alt="" width="100"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#video"><img src="../images/video.png" alt="" width="100"/></a></div> 
											  
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="tambah" class="btn btn-rounded btn-primary float-right">Simpan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<div class="modal fade" id="pdf">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Upload File PDF</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
										  <form class="form" method="post" action="" enctype="multipart/form-data">
											  	<div class="form-group">
													<label>Nama Berkas</label>
													<input type="text" name="nama_berkas" class="form-control">
												</div>	
											  	<div class="form-group">
													<label>Pilih File PDF</label>
													<input type="file" name="file" accept="application/pdf" class="form-control">
												</div>										  
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="pdf" class="btn btn-rounded btn-primary float-right">Simpan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<div class="modal fade" id="video">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Upload Link Video</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
										  <form class="form" method="post" action="" enctype="multipart/form-data">
											  	<div class="form-group">
													<label>Nama Berkas</label>
													<input type="text" name="nama_berkas" class="form-control">
												</div>	
											  	<div class="form-group">
													<label>Input Link Video</label>
													<input type="text" name="path_materi" class="form-control">
												</div>										  
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="video" class="btn btn-rounded btn-primary float-right">Simpan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<?php
										$mt=0;
										$query = mysql_query("select * from detail_materi where id_materi='". $_GET['id_materi'] ."'");
										while ($row = mysql_fetch_array($query)) {
										$mt++;
									?>
									<div class="timeline-item">
										<div class="timeline-point timeline-point-success">
											<i class="fa fa-check"></i>
										</div>
										<div class="timeline-event">
											<div class="timeline-heading">
												<h4 class="timeline-title" align="center"><?php echo $row['nama_berkas']; ?></h4>
											</div>
											<div class="timeline-body">
												<div class="col-md-12" align="center"><a href="#" data-toggle="modal" data-target="#materike<?php echo $mt; ?>">
													<?php if($row['jenis_materi']=="VIDEO"){ ?>
													<img src="../images/video.png" alt="" width="100"/>
													<?php } else { ?>
													<img src="../images/pdf-icon.webp" alt="" width="100"/>
													<?php } ?>
												</a></div>
											</div>		
											<div class="modal fade" id="materike<?php echo $mt; ?>">
											  <div class="modal-dialogs" role="application">
												<?php if($row['jenis_materi']=="VIDEO"){ $kodevideo = explode("=", $row['path_materi']) ?>
												<div class="modal-content">
												  <div class="modal-body" align="center">
												  <form class="form" method="post" action="" enctype="multipart/form-data">	
														<iframe width="800" height="450" src="https://www.youtube.com/embed/<?php echo $kodevideo[1]; ?>?autoplay=1&mute=1">
														</iframe>									  
												  </div>
												  <div class="modal-footer" align="center">
													<a href="" class="btn-rounded btn-success btn-md">SELESAI TONTON</a>
												  </div>
												  </form>
												</div>
												<?php } else { ?>
												<div class="modal-content">
												  <div class="modal-body" align="center">
												  <form class="form" method="post" action="" enctype="multipart/form-data">
													  <object width="100%" height="500" type="application/pdf" data="../assets/berkas/<?php echo $row['path_materi']; ?>?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
														<p>Insert your error message here, if the PDF cannot be displayed.</p>
													</object>		  
												  </div>
												  <div class="modal-footer" align="center">
													<a href="" class="btn-rounded btn-success btn-md">SELESAI BACA</a>
												  </div>
												  </form>
												</div>
												<?php } ?>
											  </div>
											</div>
											<div class="timeline-footer">
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="diskusi" role="tabpanel">
							<div class="box-body">
								<div class="timeline timeline-line-dotted">
									<span class="timeline-label">
										<a href="#" class="btn btn-info btn-rounded" title="More..." data-toggle="modal" data-target="#tambah">
											<i class="fa fa-fw fa-plus"></i> TAMBAH DISKUSI
										</a>
									</span>
									<div class="modal fade" id="tambah">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Tambah Diskusi</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="form-group">
													<label>Isi Diskusi</label>
													<textarea name="isi" class="form-control" id="" cols="30" rows="10" required></textarea>
												</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="tambah" class="btn btn-rounded btn-primary float-right">Simpan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<?php
										$query = mysql_query("select * from diskusi where id_materi='". $_GET['id_materi'] ."'");
										while ($row = mysql_fetch_array($query)) {
									?>
									<div class="timeline-item">
										<div class="timeline-point timeline-point-success">
											<i class="fa fa-check"></i>
										</div>
										<div class="timeline-event">
											<div class="timeline-heading">
												<h4 class="timeline-title"><?php echo $row['owner']; ?></h4>
											</div>
											<div class="timeline-body">
												<p><?php echo $row['isi']; ?>.</p>
											</div>
											<div class="timeline-footer">
												<p class="text-right"><?php echo tanggal_indo($row['tanggal']); ?></p>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="siswa" role="tabpanel">
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>NISN</th>
											<th>Nama Lengkap</th>
											<th>Tempat Tanggal Lahir</th>
											<th>Jenis Kelamin</th>
											<th>Nomor Ponsel</th>
											<th>Nama Wali</th>
											<th>Kelas</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$no = 0;
											$query = mysql_query("select * from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_kelas='". $_GET['id_kelas'] ."'");
											while ($row = mysql_fetch_array($query)) {
											$no++;
											if($row['status']=='AKTIF'){
												$badge = 'success';
											} else {
												$badge = 'danger';
											}
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $row['nisn']; ?></td>
											<td><?php echo $row['nama']; ?></td>
											<td><?php echo $row['kota_lahir']; ?>, <?php echo tanggal_indo($row['tgl_lahir']); ?></td>
											<td><?php echo $row['gender']; ?></td>
											<td><?php echo $row['no_hp']; ?></td>
											<td><?php echo $row['nama_wali']; ?></td>
											<td><?php echo $row['tingkat']; ?>-<?php echo $row['nama_kelas']; ?></td>
											<td><span class="badge badge-<?php echo $badge; ?>"><?php echo $row['status']; ?></span></td>
										</tr>
										<?php } ?>
									</tbody>
								  </table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="soal" role="tabpanel">
							<div class="col-12">
								<div class="box">
									<div class="box-header">
										<?php
											$query = mysql_query("select * from soal where id_materi='". $_GET['id_materi'] ."'");
											if ($row = mysql_fetch_array($query)) {
											if($row['status']=='DRAFT'){
										?>
										<h4 class="box-title"><button type="button" class="waves-effect waves-light btn btn-primary mb-5" data-toggle="modal" data-target="#tambahsoal"><i class="fa fa-plus"></i> TAMBAH SOAL</button></h4> 
										<?php } else { ?>
										<?php }} else { ?>
										<h4 class="box-title"><button type="button" class="waves-effect waves-light btn btn-primary mb-5" data-toggle="modal" data-target="#tambahsoal"><i class="fa fa-plus"></i> TAMBAH SOAL</button></h4> 
										<?php }?>
										<?php
											$query = mysql_query("select * from soal where id_materi='". $_GET['id_materi'] ."'");
											if ($row = mysql_fetch_array($query)) {
											if($row['status']=='DRAFT'){
										?>
										<h4 class="box-title"><button type="button" class="waves-effect waves-light btn btn-success mb-5" data-toggle="modal" data-target="#mulai"><i class="fa fa-check"></i> MULAI UJIAN</button></h4>
										<?php } else { ?>
										<h4 class="box-title"><button type="button" class="waves-effect waves-light btn btn-danger mb-5" data-toggle="modal" data-target="#stop"><i class="fa fa-pause"></i> HENTIKAN UJIAN</button></h4>
										<?php }} ?>
									</div>
									<div class="modal fade" id="tambahsoal">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Tambah Data Soal</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="" enctype="multipart/form-data">
												<div class="form-group">
													<label>Pertanyaan</label>
													<textarea name="soal" class="form-control" id="" cols="30" rows="10" required></textarea>
												</div>
												<div class="form-group">
													<label>Jawaban A</label>
													<input type="text" name="pg_a" class="form-control" required>
												</div> 
												<div class="form-group">
													<label>Jawaban B</label>
													<input type="text" name="pg_b" class="form-control" required>
												</div> 
												<div class="form-group">
													<label>Jawaban C</label>
													<input type="text" name="pg_c" class="form-control" required>
												</div> 
												<div class="form-group">
													<label>Jawaban D</label>
													<input type="text" name="pg_d" class="form-control" required>
												</div> 
												<div class="form-group">
													<label>Kunci Jawaban</label>
													<select name="kunci_jawaban" class="form-control" id="">
														<option value="A">Pilihan Ganda A</option>
														<option value="B">Pilihan Ganda B</option>
														<option value="C">Pilihan Ganda C</option>
														<option value="D">Pilihan Ganda D</option>
													</select>
												</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="soalnya" class="btn btn-rounded btn-primary float-right">Simpan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<div class="box-body">
										<div class="table-responsive">
										  <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal</th>
													<th>Soal</th>
													<th>Jawaban</th>
													<th>Kunci</th>
													<th>Status</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 0;
													$query = mysql_query("select * from soal where id_materi='". $_GET['id_materi'] ."'");
													while ($row = mysql_fetch_array($query)) {
													$no++;
													if($row['status']=='TERBIT'){
														$badge = 'success';
													} else {
														$badge = 'warning';
													}
												?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo tanggal_indo($row['tanggal']); ?></td>
													<td><?php echo $row['soal']; ?></td>
													<td>A. <?php echo $row['pg_a']; ?><br>B. <?php echo $row['pg_b']; ?><br>C. <?php echo $row['pg_c']; ?><br>D. <?php echo $row['pg_d']; ?><br><br></td>
													<td>Pilihan Ganda <?php echo $row['kunci_jawaban']; ?></td>
													<td><span class="badge badge-<?php echo $badge; ?>"><?php echo $row['status']; ?></span></td>
													<td>
														<?php if($row['status']=='DRAFT'){ ?>
														<div class="btn-group mb-5">
														  <button type="button" class="waves-effect waves-light btn btn-primary dropdown-toggle" data-toggle="dropdown">ACTION</button>
														  <div class="dropdown-menu">
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit<?php echo $no; ?>">EDIT DATA</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>">HAPUS DATA</a>
														  </div>
														</div>
														<?php } ?>
													</td>
												</tr>
												<div class="modal fade" id="edit<?php echo $no; ?>">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h4 class="modal-title">Edit Data Soal</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span></button>
													  </div>
													  <div class="modal-body">
														<form class="form" method="post" action="">
															<div class="form-group">
																<label>Pertanyaan</label>
																<textarea name="soal" class="form-control" id="" cols="30" rows="10" required><?php echo $row['soal']; ?></textarea>
															</div>
															<div class="form-group">
																<label>Jawaban A</label>
																<input type="text" name="pg_a" class="form-control" value="<?php echo $row['pg_a']; ?>" required>
															</div> 
															<div class="form-group">
																<label>Jawaban B</label>
																<input type="text" name="pg_b" class="form-control" value="<?php echo $row['pg_b']; ?>" required>
															</div> 
															<div class="form-group">
																<label>Jawaban C</label>
																<input type="text" name="pg_c" class="form-control" value="<?php echo $row['pg_c']; ?>" required>
															</div> 
															<div class="form-group">
																<label>Jawaban D</label>
																<input type="text" name="pg_d" class="form-control" value="<?php echo $row['pg_d']; ?>" required>
															</div> 
															<div class="form-group">
																<label>Kunci Jawaban</label>
																<select name="kunci_jawaban" class="form-control" id="">
																	<option value="A" <?php if($row['kunci_jawaban']=='A') echo 'selected="selected"'; ?>>Pilihan Ganda A</option>
																	<option value="B" <?php if($row['kunci_jawaban']=='B') echo 'selected="selected"'; ?>>Pilihan Ganda B</option>
																	<option value="C" <?php if($row['kunci_jawaban']=='C') echo 'selected="selected"'; ?>>Pilihan Ganda C</option>
																	<option value="D" <?php if($row['kunci_jawaban']=='D') echo 'selected="selected"'; ?>>Pilihan Ganda D</option>
																</select>
															</div> 
															<input type="hidden" name="id_soal" value="<?php echo $row['id_soal']; ?>">
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
														<button type="submit" name="ubah" class="btn btn-rounded btn-primary float-right">Simpan</button>
													  </div>
													  </form>
													</div>
												  </div>
												</div>
												<div class="modal fade" id="hapus<?php echo $no; ?>">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h4 class="modal-title">Hapus Data Soal</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span></button>
													  </div>
													  <div class="modal-body">
														<form class="form" method="post" action="">
															<div class="box-body">
																<h5>Yakin akan menghapus data soal ini ?</h5>
																<input type="hidden" name="id_soal" value="<?php echo $row['id_soal']; ?>">
															</div> 
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
														<button type="submit" name="hapus" class="btn btn-rounded btn-primary float-right">Hapus</button>
													  </div>
													  </form>
													</div>
												  </div>
												</div>
												<div class="modal fade" id="mulai">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h4 class="modal-title">Memulai Ujian</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span></button>
													  </div>
													  <div class="modal-body">
														<form class="form" method="post" action="">
															<div class="box-body">
																<h5>Yakin akan memulai ujian ? <br><br><strong>Note : anda tidak dapat menambah soal kembali saat ujian berlangsung</strong></h5>
															</div> 
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
														<button type="submit" name="mulai" class="btn btn-rounded btn-primary float-right">Mulai Ujian</button>
													  </div>
													  </form>
													</div>
												  </div>
												</div>
												<div class="modal fade" id="stop">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<h4 class="modal-title">Hentikan Ujian</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span></button>
													  </div>
													  <div class="modal-body">
														<form class="form" method="post" action="">
															<div class="box-body">
																<h5>Yakin akan menghentikan ujian yang sedang berlangsung ? </h5>
															</div> 
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
														<button type="submit" name="stop" class="btn btn-rounded btn-primary float-right">Hentikan Ujian</button>
													  </div>
													  </form>
													</div>
												  </div>
												</div>
												<?php } ?>
											</tbody>
										  </table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="nilai" role="tabpanel">
							<div class="col-9">
								<div class="box-body">
									<?php
										$query1 = mysql_query("select * from hasil inner join siswa on hasil.id_siswa=siswa.id_siswa where id_materi='". $_GET['id_materi'] ."'");
										if ($row1 = mysql_fetch_array($query1)) {
									?>
									<div class="table-responsive">
									  <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Nama Siswa</th>
												<th>Benar</th>
												<th>Salah</th>
												<th>Nilai</th>
												<th>Grade</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query = mysql_query("select * from hasil where id_materi='". $_GET['id_materi'] ."'");
												while ($row = mysql_fetch_array($query)) {
												if($row['status']=='LULUS'){
													$stat = 'success';
												} else {
													$stat = 'danger';
												}
											?>
											<tr>
												<?php
													$query2 = mysql_query("select * from siswa where id_siswa='". $row['id_siswa'] ."'");
													while ($row2 = mysql_fetch_array($query2)) {
												?>
												<td><?php echo $row2['nama'];; ?></td>
												<?php } ?>
												<td><?php echo $row['benar']; ?></td>
												<td><?php echo $row['salah']; ?></td>
												<td><?php echo $row['nilai']; ?></td>
												<td><?php echo $row['grade']; ?></td>
												<td><span class="badge badge-<?php echo $stat; ?>"><?php echo $row['status']; ?></span></td>
											</tr>
											<?php } ?>
										</tbody>
									  </table>
									</div>
									<?php } else { ?>
									<h4>Nilai belum tersedia.</h4>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			  </div>
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
	
	<script src="../main/js/template.js"></script>
	<script src="../main/js/demo.js"></script>
	
	
</body>
</html>