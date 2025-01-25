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

		  <div class="row">	
			<?php
				$query = mysql_query("select * from matpel where id_matpel='". $_GET['id_matpel'] ."'");
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
					  
					  		if(isset($_POST['status'])){
								$query = mysql_query("select * from status_materi where id_siswa='". $_SESSION['id_siswa'] ."' and id_detail='". $_POST['id_detail'] ."'");
								if ($row = mysql_fetch_array($query)) {
								} else {
								$input  		= "insert into status_materi (id_siswa, id_detail) values ('". $_SESSION['id_siswa'] ."','". $_POST['id_detail'] ."')";
								$query_input 	= mysql_query($input);
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
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Kuis Berhasil Dimulai. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Memulai Kuis GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
					  
					  		if(isset($_POST['stop'])){
								$input  		= "update soal set status ='DRAFT' where id_materi ='" . $_GET['id_materi'] . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Kuis Berhasil Dihentikan. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Menghentikan Kuis GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
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
						
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#soal" role="tab"><span><i class="ion-email mr-15"></i>SOAL KUIS</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#nilai" role="tab"><span><i class="ion-email mr-15"></i>HASIL KUIS</span></a> </li>
					</ul>
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="materi" role="tabpanel">
							<div class="box-body">
								<div class="timeline timeline-line-dotted">
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
													<img src="../images/video.png" alt="" width="100"/><br><br>
													<?php $query1 = mysql_query("select * from status_materi where id_detail='". $row['id_detail'] ."' and id_siswa='". $_SESSION['id_siswa'] ."'"); if ($row1 = mysql_fetch_array($query1)) { ?>
													<p class="text-success"><strong>MATERI TELAH DISELESAIKAN</strong></p>
													<?php } else { ?>													
													<p class="text-danger"><strong>ANDA BELUM MENYELESAIKAN MATERI INI</strong></p>
													<?php } ?>
													<?php } else { ?>
													<img src="../images/pdf-icon.webp" alt="" width="100"/><br><br>
													<?php $query1 = mysql_query("select * from status_materi where id_detail='". $row['id_detail'] ."' and id_siswa='". $_SESSION['id_siswa'] ."'"); if ($row1 = mysql_fetch_array($query1)) { ?>
													<p class="text-success"><strong>MATERI TELAH DISELESAIKAN</strong></p>
													<?php } else { ?>													
													<p class="text-danger"><strong>ANDA BELUM MENYELESAIKAN MATERI INI</strong></p>
													<?php } ?>
													<?php } ?>
												</a></div>
											</div>		
											<div class="modal fade" id="materike<?php echo $mt; ?>">
											  <div class="modal-dialogs" role="application">
												<?php if($row['jenis_materi']=="VIDEO"){ $kodevideo = explode("=", $row['path_materi']) ?>
												<div class="modal-content">
												  <div class="modal-body" align="center">
												  <form class="form" method="post" action="" enctype="multipart/form-data">	
														<iframe width="800" height="450" src="https://www.youtube.com/embed/<?php echo $kodevideo[1]; ?>">
														</iframe>	
													  <input type="hidden" name="id_detail" value="<?php echo $row['id_detail']; ?>">
												  </div>
												  <div class="modal-footer" align="center">
													<button type="submit" name="status" class="btn-rounded btn-success btn-md">SELESAI TONTON</button>
												  </div>
												  </form>
												</div>
												<?php } else { ?>
												<div class="modal-content">
												  <div class="modal-body" align="center">
												  <form class="form" method="post" action="" enctype="multipart/form-data">
													  <object width="100%" height="500" type="application/pdf" data="../assets/berkas/<?php echo $row['path_materi']; ?>?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
														<p>Terjadi kesalahan, mohon coba kembali.</p>
													</object>	
													  <input type="hidden" name="id_detail" value="<?php echo $row['id_detail']; ?>">
												  </div>
												  <div class="modal-footer" align="center">
													<button type="submit" name="status" class="btn-rounded btn-success btn-md">SELESAI BACA</button>
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
								<div class="box-header" align="center">
								<?php
									// Query untuk mendapatkan status kuis
									$query = mysql_query("SELECT * FROM soal WHERE id_materi='". $_GET['id_materi'] ."'");
										if ($row = mysql_fetch_array($query)) {
											if ($row['status'] == 'DRAFT') {
										?>
											<h4 class="box-title">Oopps! Kuis Ini Belum Dimulai, Cek Lagi Nanti Ya!</h4>
										<?php 
											} else { 
										?>
											<h4 class="box-title">KUIS INI SUDAH DIMULAI! <br><br>
												<?php
												// Query untuk menghitung jumlah materi
												$query2 = mysql_query("SELECT COUNT(*) as total FROM detail_materi WHERE id_materi='". $_GET['id_materi'] ."'");
												$jumlahmateri = mysql_fetch_assoc($query2)['total'];

												// Query untuk menghitung materi yang telah diselesaikan oleh siswa login
												$query2 = mysql_query("
													SELECT COUNT(*) as selesai 
													FROM status_materi 
													INNER JOIN detail_materi ON status_materi.id_detail = detail_materi.id_detail 
													WHERE detail_materi.id_materi='". $_GET['id_materi'] ."' 
													AND status_materi.id_siswa='". $_SESSION['id_siswa'] ."'");
												$jumlahkerja = mysql_fetch_assoc($query2)['selesai'];

												// Hitung materi yang belum selesai
												$balan = max(0, $jumlahmateri - $jumlahkerja);

												if ($balan > 0) {
													// Jika masih ada materi yang harus diselesaikan
													echo "<a href=\"#\" class=\"waves-effect waves-light btn btn-danger mb-5\">
													<i class=\"fa fa-close\"></i> ANDA BELUM BISA MENGIKUTI KUIS INI! HARAP SELESAIKAN $balan MATERI LAGI</a>";
												} else {
													// Jika semua materi sudah selesai
													$query1 = mysql_query("
														SELECT * FROM hasil 
														WHERE id_siswa='" . $_SESSION['id_siswa'] . "' 
														AND id_materi='" . $_GET['id_materi'] . "'
													");
													if ($row1 = mysql_fetch_array($query1)) {
														echo "<a href=\"#\" class=\"waves-effect waves-light btn btn-secondary mb-5\">
														<i class=\"fa fa-thumbs-up\"></i> Kerja Bagus! Anda Sudah Mengisi Kuis Ini</a>";
													} else {
														echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#mulai\" class=\"waves-effect waves-light btn btn-success mb-5\">
														<i class=\"fa fa-check\"></i> MULAI KUIS</a>";
													}
												}
												?>
											</h4>
										<?php 
											}
										} 
										?>
									</div>
									<div class="modal fade" id="mulai">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<h4 class="modal-title">Memulai Kuis</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												  <span aria-hidden="true">&times;</span></button>
											  </div>
											  <div class="modal-body">
												<form class="form" method="post" action="ujian.php">
													<h4>Yakin akan memulai kuis sekarang? <br><br><strong>Note: Setelah kuis dimulai Anda harus menjawab seluruh pertanyaan yang ada!</strong></h4>
													<input type="hidden" name="id_materi" value="<?php echo $_GET['id_materi']; ?>">
													<input type="hidden" name="id_matpel" value="<?php echo $_GET['id_matpel']; ?>">
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
												<button type="submit" name="mulai" class="btn btn-rounded btn-primary float-right">MULAI!</button>
											  </div>
											  </form>
											</div>
										  </div>
										</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="nilai" role="tabpanel">
							<div class="col-6">
								<div class="box-body">
									<?php
										$query1 = mysql_query("select * from hasil where id_materi='". $_GET['id_materi'] ."' and id_siswa='". $_SESSION['id_siswa'] ."'");
										if ($row1 = mysql_fetch_array($query1)) {
									?>
									<div class="table-responsive">
									  <table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Total Soal</th>
												<th>Benar</th>
												<th>Salah</th>
												<th>Nilai</th>
												<th>Grade</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query = mysql_query("select * from hasil where id_materi='". $_GET['id_materi'] ."' and id_siswa='". $_SESSION['id_siswa'] ."'");
												while ($row = mysql_fetch_array($query)) {
												$total = $row['benar']+$row['salah'];
												if($row['status']=='LULUS'){
													$stat = 'success';
												} else {
													$stat = 'danger';
												}
											?>
											<tr>
												<td><?php echo $total; ?> Soal</td>
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
									<h4>Nilai Tidak Tersedia. Anda Belum Mengerjakan Kuis!</h4>
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