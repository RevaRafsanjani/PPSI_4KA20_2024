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

    <title>e-Learning SMKN 5 Bekasi - Dashboard</title>
    
	
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
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="kelas.php">
						<div class="box-body">
							<?php
								$query = mysql_query("select count(*) as hasil from kelas");
								while ($row = mysql_fetch_array($query)) {
							?>
							<div class="font-size-24"><?php echo $row['hasil']; ?></div>
							<?php } ?>
							<span>TOTAL KELAS</span>
						</div>
						<div class="box-body bg-danger">
							<p>
								<span class="mdi mdi-book-open-page-variant font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="kelas.php">
						<div class="box-body">
							<?php
								$query = mysql_query("select count(*) as hasil from siswa");
								while ($row = mysql_fetch_array($query)) {
							?>
							<div class="font-size-24"><?php echo $row['hasil']; ?></div>
							<?php } ?>
							<span>TOTAL SISWA</span>
						</div>
						<div class="box-body bg-success">
							<p>
								<span class="mdi mdi-account-edit font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="kelas.php">
						<div class="box-body">
							<?php
								$query = mysql_query("select count(*) as hasil from materi where id_guru='". $_SESSION['id_guru'] ."'");
								while ($row = mysql_fetch_array($query)) {
							?>
							<div class="font-size-24"><?php echo $row['hasil']; ?></div>
							<?php } ?>
							<span>TOTAL MATERI</span>
						</div>
						<div class="box-body bg-info">
							<p>
								<span class="mdi mdi-book font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="kelas.php">
						<div class="box-body">
							<?php
								$query = mysql_query("select count(*) as hasil from diskusi where owner='". $_SESSION['nama'] ."'");
								while ($row = mysql_fetch_array($query)) {
							?>
							<div class="font-size-24"><?php echo $row['hasil']; ?></div>
							<?php } ?>
							<span>TOTAL DISKUSI</span>
						</div>
						<div class="box-body bg-warning">
							<p>
								<span class="mdi mdi-comment-processing-outline font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
			</div>
		  <!-- /.row -->

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