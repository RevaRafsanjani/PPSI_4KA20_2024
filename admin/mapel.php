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

    <title>e-Learning SMKN 5 Bekasi - Data Mapel</title>
    
	
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
								$nama_matpel	= $_POST['nama_matpel'];
								$id_guru		= explode('-', $_POST['id_guru']);

								$input1  		= "insert into matpel (id_guru, nama_matpel, id_admin) values ('$id_guru[0]','$nama_matpel','". $_SESSION['id_admin'] ."')";
								$query_input1 	= mysql_query($input1);
								
								
								if($query_input1) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Mata Pelajaran $nama_matpel dengan guru $id_guru[1] berhasil tersimpan di database. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Tambah Data Mata Pelajaran  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['ubah'])){
								$nama_matpel	= $_POST['nama_matpel'];
								$id_guru		= explode('-', $_POST['id_guru']);
								$id_matpel		= $_POST['id_matpel'];

								$input1  		= "update matpel set id_guru ='" . $id_guru[0] . "',nama_matpel ='$nama_matpel' where id_matpel ='" . $id_matpel . "'";
								$query_input1 	= mysql_query($input1);
								
								if($query_input1) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Mata Pelajaran $nama_matpel dengan guru $id_guru[1] berhasil dirubah. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Data Mata Pelajaran GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['hapus'])){
								$nama_matpel			= $_POST['nama_matpel'];
								$id_matpel		= $_POST['id_matpel'];
								$input  		= "delete from matpel where id_matpel ='$id_matpel'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Mata Pelajaran $nama_matpel berhasil dihapus. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Hapus Data Mata Pelajaran GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						?>
						<div class="box-header">
							<h4 class="box-title"><button type="button" class="waves-effect waves-light btn btn-primary mb-5" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> TAMBAH MATA PELAJARAN</button></h4>
						</div>
						<div class="modal fade" id="tambah">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title">Tambah Data Mata Pelajaran</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<form class="form" method="post" action="">
									<div class="box-body">
										<div class="form-group">
										  <label>Nama Mata Pelajaran</label>
										  <input type="text" class="form-control" name="nama_matpel" required>
										</div>
										<div class="form-group">
										  <label>Nama Guru</label>
										  <select name="id_guru" id="" class="form-control">
											<?php
												$query = mysql_query("select * from guru");
												while ($row = mysql_fetch_array($query)) {
												$query1 = mysql_query("select * from matpel where id_guru='". $row['id_guru'] ."'");
												if ($row1 = mysql_fetch_array($query1)) {
											?>
											<?php } else { ?>
											<option value="<?php echo $row['id_guru']; ?>-<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
											<?php }} ?>
										  </select>
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
							if(isset($sukses)) { echo $sukses; }
							if(isset($gagal)) { echo $gagal; } 
						?>
						<div class="box-body">
							<div class="table-responsive">
							  <table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Mata Pelajaran</th>
										<th>Nama Guru</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 0;
										$query = mysql_query("select * from matpel inner join guru on matpel.id_guru=guru.id_guru");
										while ($row = mysql_fetch_array($query)) {
										$no++;
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $row['nama_matpel']; ?></td>
										<td><?php echo $row['nama']; ?></td>
										<td>
											<div class="btn-group mb-5">
											  <button type="button" class="waves-effect waves-light btn btn-primary dropdown-toggle" data-toggle="dropdown">ACTION</button>
											  <div class="dropdown-menu">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit<?php echo $no; ?>">EDIT DATA</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>">HAPUS DATA</a>
											  </div>
											</div>
										</td>
									</tr>
									<div class="modal fade" id="edit<?php echo $no; ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Edit Data Mata Pelajaran</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<div class="form-group">
													  <label>Nama Mata Pelajaran</label>
													  <input type="text" class="form-control" name="nama_matpel" value="<?php echo $row['nama_matpel']; ?>" required>
													</div>
													<div class="form-group">
													  <label>Nama Guru</label>
													  <select name="id_guru" id="" class="form-control">
														<option value="<?php echo $row['id_guru']; ?>-<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
														<?php
															$query1 = mysql_query("select * from guru");
															while ($row1 = mysql_fetch_array($query1)) {
															$query2 = mysql_query("select * from matpel where id_guru='". $row1['id_guru'] ."'");
															if ($row2 = mysql_fetch_array($query2)) {
														?>
														<?php } else { ?>
														<option value="<?php echo $row1['id_guru']; ?>-<?php echo $row1['nama']; ?>"><?php echo $row1['nama']; ?></option>
														<?php }} ?>
													  </select>
													</div>
												</div> 
										  </div>
										  <input type="hidden" name="id_matpel" value="<?php echo $row['id_matpel']; ?>">
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
											<h4 class="modal-title">Hapus Data Mata Pelajaran</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<h5>Yakin akan menghapus mata peajaran <strong><?php echo $row['nama_matpel']; ?></strong> ?</h5>
													<input type="hidden" name="id_matpel" value="<?php echo $row['id_matpel']; ?>">
													<input type="hidden" name="nama_matpel" value="<?php echo $row['nama_matpel']; ?>">
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