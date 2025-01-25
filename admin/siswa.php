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

    <title>e-Learning SMKN 5 Bekasi - Data Siswa</title>
    
	
	<link rel="stylesheet" href="../main/css/vendors_css.css">
	  
	  
	<link rel="stylesheet" href="../main/css/style.css">
	<link rel="stylesheet" href="../main/css/skin_color.css">
     
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
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
					  <span>NIP: <?php echo $_SESSION['nip'] ?></span>
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
		<li>
          <a href="admin.php">
			<img src="../images/svg-icon/sidebar-menu/members.svg" class="svg-icon" alt="">
            <span>DATA ADMIN</span>
          </a>
        </li> 
		<li>
          <a href="guru.php">
			<img src="../images/svg-icon/sidebar-menu/members.svg" class="svg-icon" alt="">
            <span>DATA GURU</span>
          </a>
        </li> 
		<li>
          <a href="kelas.php">
			<img src="../images/svg-icon/sidebar-menu/layout.svg" class="svg-icon" alt="">
            <span>DATA KELAS</span>
          </a>
        </li>
		<li>
          <a href="mapel.php">
			<img src="../images/svg-icon/sidebar-menu/icons.svg" class="svg-icon" alt="">
            <span>DATA MATA PELAJARAN</span>
          </a>
        </li>
		<li>
          <a href="siswa.php">
			<img src="../images/svg-icon/sidebar-menu/members.svg" class="svg-icon" alt="">
            <span>DATA SISWA</span>
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
				
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title"><button type="button" class="waves-effect waves-light btn btn-primary mb-5" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> TAMBAH SISWA</button></h4>
						</div>
						<div class="modal fade" id="tambah">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Tambah Data Siswa</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<form class="form" method="post" action="">
									<div class="box-body">
										<div class="form-group">
										  <label>Nomor Induk Siswa Nasional</label>
										  <input type="text" class="form-control" name="nisn" required>
										</div>
										<div class="form-group">
										  <label>Nama Lengkap Siswa</label>
										  <input type="text" class="form-control" name="nama" required>
										</div>
										<div class="form-group">
										  <label>Kota Kelahiran</label>
										  <input type="text" class="form-control" name="kota_lahir" required>
										</div>
										<div class="form-group">
										  <label>Tanggal Lahir</label>
										  <input type="date" class="form-control" name="tgl_lahir" required>
										</div>
										<div class="form-group">
										  <label>Jenis Kelamin</label>
										  <select name="gender" id="" class="form-control">
											<option value="PRIA">PRIA</option>
											<option value="WANITA">WANITA</option>
										  </select>
										</div>
										<div class="form-group">
										  <label>Nama Wali Siswa</label>
										  <input type="text" class="form-control" name="nama_wali" required>
										</div>
										<div class="form-group">
										  <label>Nomor Ponsel</label>
										  <input type="text" class="form-control" name="no_hp" required>
										</div>
										<div class="form-group">
										  <label>Kelas</label>
										  <select name="id_kelas" id="" class="form-control">
											<?php
												$query = mysql_query("select * from kelas");
												while ($row = mysql_fetch_array($query)) {
											?>
											<option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['tingkat']; ?>-<?php echo $row['nama_kelas']; ?></option>
											<?php }?>
										  </select>
										</div>
										<div class="form-group">
										  <label>Password</label>
										  <input type="password" class="form-control" name="password" required>
										</div>
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
								$nama			= $_POST['nama'];
								$nisn			= $_POST['nisn'];
								$kota_lahir		= $_POST['kota_lahir'];
								$tgl_lahir		= $_POST['tgl_lahir'];
								$gender			= $_POST['gender'];
								$no_hp			= $_POST['no_hp'];
								$id_kelas		= $_POST['id_kelas'];
								$nama_wali		= $_POST['nama_wali'];
								$password		= md5($_POST['password']);

								$input  		= "insert into siswa (nama, no_hp, nisn, password, kota_lahir, tgl_lahir, gender, status, id_kelas, nama_wali, id_admin) values ('$nama','$no_hp','$nisn','$password','$kota_lahir','$tgl_lahir','$gender','AKTIF','$id_kelas[0]', '$nama_wali','". $_SESSION['id_admin'] ."')";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Siswa $nama berhasil tersimpan di database. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Tambah Data Siswa  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['ubah'])){
								$nama			= $_POST['nama'];
								$nisn			= $_POST['nisn'];
								$kota_lahir		= $_POST['kota_lahir'];
								$tgl_lahir		= $_POST['tgl_lahir'];
								$gender			= $_POST['gender'];
								$no_hp			= $_POST['no_hp'];
								$id_kelas		= $_POST['id_kelas'];
								$nama_wali		= $_POST['nama_wali'];
								$id_siswa		= $_POST['id_siswa'];

								$input  		= "update siswa set nama ='" . $nama . "', nisn ='" . $nisn . "', no_hp ='" . $no_hp . "', kota_lahir ='" . $kota_lahir . "', tgl_lahir ='" . $tgl_lahir . "', gender ='" . $gender . "', id_kelas ='" . $id_kelas . "', nama_wali ='" . $nama_wali . "' where id_siswa ='" . $id_siswa . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Siswa $nama berhasil dirubah. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Data Siswa GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['nonaktifkan'])){
								$nama			= $_POST['nama'];
								$id_siswa		= $_POST['id_siswa'];

								$input  		= "update siswa set status ='NON-AKTIF' where id_siswa ='" . $id_siswa . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Siswa $nama berhasil dinonaktifkan. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Status Siswa GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['aktifkan'])){
								$nama			= $_POST['nama'];
								$id_siswa		= $_POST['id_siswa'];

								$input  		= "update siswa set status ='AKTIF' where id_siswa ='" . $id_siswa . "'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Siswa $nama berhasil diaktifkan. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Status Siswa GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['hapus'])){
								$nama			= $_POST['nama'];
								$id_siswa		= $_POST['id_siswa'];
								$input  		= "delete from siswa where id_siswa ='$id_siswa'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Siswa $nama berhasil dihapus. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Hapus Data Siswa GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}

							if(isset($sukses)) { echo $sukses; }
							if(isset($gagal)) { echo $gagal; } 
						?>
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
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 0;
										$query = mysql_query("select * from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas");
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
										<td>
											<div class="btn-group mb-5">
											  <button type="button" class="waves-effect waves-light btn btn-primary dropdown-toggle" data-toggle="dropdown">ACTION</button>
											  <div class="dropdown-menu">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit<?php echo $no; ?>">EDIT DATA</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>">HAPUS DATA</a>
												<?php
													if($row['status']=='AKTIF'){
												?>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#nonaktif<?php echo $no; ?>">NON-AKTIFKAN</a>
												<?php
													} else {
												?>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#aktif<?php echo $no; ?>">AKTIFKAN</a>
												<?php } ?>
											  </div>
											</div>
										</td>
									</tr>
									<div class="modal fade" id="edit<?php echo $no; ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Edit Data Siswa</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<div class="form-group">
													  <label>Nomor Induk Siswa Nasional</label>
													  <input type="text" class="form-control" name="nisn" required value="<?php echo $row['nisn']; ?>">
													</div>
													<div class="form-group">
													  <label>Nama Lengkap Siswa</label>
													  <input type="text" class="form-control" name="nama" required value="<?php echo $row['nama']; ?>">
													</div>
													<div class="form-group">
													  <label>Kota Kelahiran</label>
													  <input type="text" class="form-control" name="kota_lahir" required value="<?php echo $row['kota_lahir']; ?>">
													</div>
													<div class="form-group">
													  <label>Tanggal Lahir</label>
													  <input type="date" class="form-control" name="tgl_lahir" required value="<?php echo $row['tgl_lahir']; ?>">
													</div>
													<div class="form-group">
													  <label>Jenis Kelamin</label>
													  <select name="gender" id="" class="form-control">
														<option value="PRIA" <?php if($row['gender']=='PRIA') echo 'selected="selected"'; ?>>PRIA</option>
														<option value="WANITA" <?php if($row['gender']=='WANITA') echo 'selected="selected"'; ?>>WANITA</option>
													  </select>
													</div>
													<div class="form-group">
													  <label>Nomor Ponsel</label>
													  <input type="text" class="form-control" name="no_hp" required value="<?php echo $row['no_hp']; ?>">
													</div>
													<div class="form-group">
													  <label>Nama Wali Siswa</label>
													  <input type="text" class="form-control" name="nama_wali" required value="<?php echo $row['nama_wali']; ?>">
													</div>
													<div class="form-group">
													  <label>Kelas</label>
													  <select name="id_kelas" id="" class="form-control">
														<?php
															$query1 = mysql_query("select * from kelas");
															while ($row1 = mysql_fetch_array($query1)) {
														?>
														<option value="<?php echo $row1['id_kelas']; ?>" <?php if($row['id_kelas']==$row1['id_kelas']) echo 'selected="selected"'; ?>><?php echo $row1['tingkat']; ?>-<?php echo $row1['nama_kelas']; ?></option>
														<?php }?>
													  </select>
													</div>
													<input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa']; ?>">
												</div> 
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="ubah" class="btn btn-rounded btn-primary float-right">Simpan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<div class="modal fade" id="aktif<?php echo $no; ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Aktifkan Siswa</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<h5>Yakin akan mengaktifkan kembali siswa <strong><?php echo $row['nama']; ?></strong> ?</h5>
													<input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa']; ?>">
													<input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
												</div> 
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="aktifkan" class="btn btn-rounded btn-primary float-right">Aktifkan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<div class="modal fade" id="nonaktif<?php echo $no; ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Nonaktifkan Siswa</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<h5>Yakin akan menonaktifkan siswa <strong><?php echo $row['nama']; ?></strong> ?</h5>
													<input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa']; ?>">
													<input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
												</div> 
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Batal</button>
											<button type="submit" name="nonaktifkan" class="btn btn-rounded btn-primary float-right">Nonaktifkan</button>
										  </div>
										  </form>
										</div>
									  </div>
									</div>
									<div class="modal fade" id="hapus<?php echo $no; ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Hapus Data Siswa</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<h5>Yakin akan menghapus siswa <strong><?php echo $row['nama']; ?></strong> ?</h5>
													<input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa']; ?>">
													<input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
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
									<?php } ?>
								</tbody>
							  </table>
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
	
	
	<script src="https://www.amcharts.com/lib/4/core.js"></script>
	<script src="https://www.amcharts.com/lib/4/charts.js"></script>
	<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
	    
	
	<script src="../main/js/template.js"></script>
	<script src="../main/js/pages/dashboard3.js"></script>
	<script src="../main/js/demo.js"></script>
	
	
</body>
</html>