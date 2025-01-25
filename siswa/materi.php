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

    <title>e-Learning SMKN 5 Bekasi - Materi</title>
  
	
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
			?>
			<div class="col-12">
			  <div class="box box-default">
				<div class="box-header with-border" align="center">
				  <h2 class="box-title">MATERI <?php echo $matpel ?></h2><br>
				  <h4 class="box-title">KELAS <?php echo $tingkatnya ?>-<?php echo $kelasnya ?></h4>
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
						
							if(isset($_POST['tambah'])){
								$detail			= $_POST['detail'];
								$judul			= $_POST['judul'];						
								$ps				= randpass(5);

								$ekstensi_diperbolehkan	= array('png','jpg','rar','zip','pdf','docx','doc','xls','xlsx');
								$namas 			= 'id'.$ps.'-'.$_FILES['file']['name'];
								$x 				= explode('.', $namas);
								$ekstensi 		= strtolower(end($x));
								$ukuran			= $_FILES['file']['size'];
								$file_tmp 		= $_FILES['file']['tmp_name'];	

							if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
								if($ukuran < 1044070){			
									move_uploaded_file($file_tmp, '../assets/berkas/'.$namas);
									$query	= "insert into materi (tanggal, detail, judul, path_berkas, id_matpel, id_guru) values (NOW(),'$detail','$judul','$namas','$idmatpel','". $_SESSION['id_guru'] ."')";
									$query_input 	= mysql_query($query);
									if($query){
										$sukses 	= "<div class='alert alert-info' role='alert' align='center'><h3><strong>Well done! </strong>Data Materi berhasil tersimpan di database.</div></h3>";
									}else{
										$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Tambah Data Materi GAGAL ! Mohon periksa kembali</div></h3>".mysql_error();
									}
								}else{
									$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Ukuran file terlalu besar ! Mohon periksa kembali</div></h3>".mysql_error();
								}
							}else{
								$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Pastikan file yang anda upload berektensi png,jpg,rar,zip,pdf,docx,doc,xls,xlsx. Mohon periksa kembali</div></h3>".mysql_error();
							}
						}
					  
					  	if(isset($_POST['berkas'])){
							$id_materi	    = $_POST['id_materi'];
							
							$ekstensi_diperbolehkan	= array('png','jpg','rar','zip','pdf','docx','doc','xls','xlsx');
							$namas 			= $_FILES['file']['name'];
							$x 				= explode('.', $namas);
							$ekstensi 		= strtolower(end($x));
							$ukuran			= $_FILES['file']['size'];
							$file_tmp 		= $_FILES['file']['tmp_name'];	

							if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
								if($ukuran < 1044070){			
									move_uploaded_file($file_tmp, '../assets/berkas/'.$namas);
									$query  		= "update materi set path_berkas ='" . $namas . "' where id_materi ='" . $id_materi . "'";
									$query_input 	= mysql_query($query);
									if($query){
										$sukses 	= "<div class='alert alert-info' role='alert' align='center'><h3><strong>Well done! </strong>Berkas Materi berhasil tersimpan di database.</div></h3>";
									}else{
										$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Update Berkas Materi GAGAL ! Mohon periksa kembali</div></h3>".mysql_error();
									}
								}else{
									$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Ukuran Berkas terlalu besar ! Mohon periksa kembali</div></h3>".mysql_error();
								}
							}else{
								$gagal 	= "<div class='alert alert-danger' role='alert' align='center'><h3><strong>Oh snap! </strong>Pastikan file yang anda upload berektensi png,jpg,rar,zip,pdf,docx,doc,xls,xlsx. Mohon periksa kembali</div></h3>".mysql_error();
							}
						}
						  
						  	if(isset($_POST['ubah'])){
								$detail			= $_POST['detail'];
								$judul			= $_POST['judul'];	
								$id_materi		= $_POST['id_materi'];

								$input  		= "update materi set detail ='" . $detail . "', judul ='" . $judul . "' where id_materi ='" . $id_materi . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Materi berhasil dirubah. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Data Materi GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['hapus'])){
								$id_materi		= $_POST['id_materi'];
								$input  		= "delete from materi where id_materi ='$id_materi'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Materi berhasil dihapus. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Hapus Data Materi GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}

							if(isset($sukses)) { echo $sukses; }
							if(isset($gagal)) { echo $gagal; } 
						?>
				<div class="box-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#materi" role="tab"><span><i class="ion-person mr-15"></i>DAFTAR MATERI</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#siswa" role="tab"><span><i class="ion-email mr-15"></i>DAFTAR TEMAN</span></a> </li>
					</ul>
					<div class="tab-content tabcontent-border">
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
						<div class="tab-pane active" id="materi" role="tabpanel">
							<div class="col-12">
								<div class="box">									
									<div class="box-body">
										<div class="table-responsive">
										  <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal</th>
													<th>Judul</th>
													<th>Detail</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 0;
													$query = mysql_query("select * from materi where id_matpel='$idmatpel'");
													while ($row = mysql_fetch_array($query)) {
													$no++;
												?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo tanggal_indo($row['tanggal']); ?></td>
													<td><?php echo $row['judul']; ?></td>
													<td><?php echo $row['detail']; ?></td>
													<td><a href="diskusi.php?id_kelas=<?php echo $_GET['id_kelas']; ?>&id_matpel=<?php echo $_GET['id_matpel']; ?>&id_materi=<?php echo $row['id_materi']; ?>" class="waves-effect waves-light btn btn-primary mb-5"><i class="fa fa-book"></i> LIHAT DETAIL</a>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										  </table>
										</div>
									</div>
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