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

    <title>e-Learning SMKN 5 Bekasi - Data Kelas</title>
    
	
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
								$nama_kelas		= $_POST['nama_kelas'];
								$tingkat		= $_POST['tingkat'];
								$id_guru		= explode('-', $_POST['id_guru']);

								$input  		= "insert into kelas (nama_kelas, tingkat, id_admin) values ('$nama_kelas','$tingkat','". $_SESSION['id_admin'] ."')";
								$query_input 	= mysql_query($input);
								$idkelas		= mysql_insert_id();
								$input1  		= "insert into wali_kelas (id_guru, id_kelas, id_admin) values ('$id_guru[0]','$idkelas','". $_SESSION['id_admin'] ."')";
								$query_input1 	= mysql_query($input1);
								
								
								if($query_input1) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Kelas $tingkat-$nama_kelas dengan wali kelas $id_guru[1] berhasil tersimpan di database. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'> <strong>Oh snap! Tambah Data Kelas  GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['ubah'])){
								$nama_kelas		= $_POST['nama_kelas'];
								$tingkat		= $_POST['tingkat'];
								$id_guru		= explode('-', $_POST['id_guru']);
								$id_kelas		= $_POST['id_kelas'];

								$input  		= "update kelas set nama_kelas ='" . $nama_kelas . "', tingkat ='" . $tingkat . "' where id_kelas ='" . $id_kelas . "'";
								$query_input 	= mysql_query($input);
								$input1  		= "update wali_kelas set id_guru ='" . $id_guru[0] . "' where id_kelas ='" . $id_kelas . "'";
								$query_input1 	= mysql_query($input1);
								
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'><strong>Sukses ! Data Kelas $tingkat-$nama_kelas dengan wali kelas $id_guru[1] berhasil dirubah. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Ubah Data Kelas GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						  
						  	if(isset($_POST['hapus'])){
								$nama			= $_POST['nama'];
								$id_kelas		= $_POST['id_kelas'];
								$input1  		= "delete from wali_kelas where id_kelas ='$id_kelas'";
								$query_input1 	= mysql_query($input1);
								$input  		= "delete from kelas where id_kelas ='$id_kelas'";
								$query_input 	= mysql_query($input);
								if($query_input) {
								$sukses 		= "<div class='callout callout-success'> <strong>Sukses ! Data Kelas $nama berhasil dihapus. </strong></div><br>";
								} else $gagal 	= "<div class='callout callout-danger'><strong>Oh snap! Hapus Data Kelas GAGAL ! Mohon periksa kembali</strong></div><br>".mysql_error();
							}
						?>
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
										<th>Nama Kelas</th>
										<th>Wali Kelas</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 0;
										$query = mysql_query("select * from kelas inner join wali_kelas on kelas.id_kelas=wali_kelas.id_kelas inner join guru on wali_kelas.id_guru=guru.id_guru");
										while ($row = mysql_fetch_array($query)) {
										$no++;
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td>Kelas <?php echo $row['tingkat']; ?>-<?php echo $row['nama_kelas']; ?></td>
										<td><?php echo $row['nama']; ?></td>
										<td>
											<a href="materi.php?id_kelas=<?php echo $row['id_kelas']; ?>" class="waves-effect waves-light btn btn-primary mb-5"><i class="fa fa-book"></i> LIHAT MATERI</a>
										</td>
									</tr>
									<div class="modal fade" id="edit<?php echo $no; ?>">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title">Edit Data Kelas</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<div class="form-group">
													  <label>Nama Kelas</label>
													  <input type="text" class="form-control" name="nama_kelas" value="<?php echo $row['nama_kelas']; ?>" required>
													</div>
													<div class="form-group">
													  <label>Tingkat Kelas</label>
													  <select name="tingkat" id="" class="form-control">
														<option value="X" <?php if($row['tingkat']=='X') echo 'selected="selected"'; ?>>Kelas X</option>
														<option value="XI" <?php if($row['tingkat']=='XI') echo 'selected="selected"'; ?>>Kelas XI</option>
														<option value="XII" <?php if($row['tingkat']=='XII') echo 'selected="selected"'; ?>>Kelas XII</option>
													  </select>
													</div>
													<div class="form-group">
													  <label>Wali Kelas</label>
													  <select name="id_guru" id="" class="form-control">
														<option value="<?php echo $row['id_guru']; ?>-<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
														<?php
															$query1 = mysql_query("select * from guru");
															while ($row1 = mysql_fetch_array($query1)) {
															$query2 = mysql_query("select * from wali_kelas where id_guru='". $row1['id_guru'] ."'");
															if ($row2 = mysql_fetch_array($query2)) {
														?>
														<?php } else { ?>
														<option value="<?php echo $row1['id_guru']; ?>-<?php echo $row1['nama']; ?>"><?php echo $row1['nama']; ?></option>
														<?php }} ?>
													  </select>
													</div>
												</div> 
										  </div>
										  <input type="hidden" name="id_kelas" value="<?php echo $row['id_kelas']; ?>">
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
											<h4 class="modal-title">Hapus Data Kelas</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span></button>
										  </div>
										  <div class="modal-body">
											<form class="form" method="post" action="">
												<div class="box-body">
													<h5>Yakin akan menghapus Kelas <strong><?php echo $row['tingkat']; ?>-<?php echo $row['nama_kelas']; ?></strong> ?</h5>
													<input type="hidden" name="id_kelas" value="<?php echo $row['id_kelas']; ?>">
													<input type="hidden" name="nama" value="<?php echo $row['tingkat']; ?>-<?php echo $row['nama_kelas']; ?>">
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