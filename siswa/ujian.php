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

    <title>e-Learning SMKN 5 Bekasi - Kuis</title>
  
	
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
				$query = mysql_query("select * from matpel where id_matpel='". $_POST['id_matpel'] ."'");
				while ($row = mysql_fetch_array($query)) {
				$matpel = $row['nama_matpel'];	
				$idmatpel = $row['id_matpel'];	
				}
				$query = mysql_query("select * from materi where id_materi='". $_POST['id_materi'] ."'");
				while ($row = mysql_fetch_array($query)) {
				$materinya = $row['judul'];		
				}
			?>
			  <h4 class="box-title">UJIAN <?php echo strtoupper($matpel) ?> MATERI <?php echo strtoupper($materinya) ?></h4>
			</div>
			<div class="box-body wizard-content">
				<form action="hasil.php" method="post" class="tab-wizard wizard-circle">
					<?php
						$no=0;
						$query = mysql_query("select * from soal where id_materi='". $_POST['id_materi'] ."' order by RAND()");
						$jumlah=mysql_num_rows($query);
						while ($row = mysql_fetch_array($query)) {
						$no++;
						$id=$row["id_soal"];
						$pertanyaan=$row["soal"];
						$pilihan_a=$row["pg_a"];
						$pilihan_b=$row["pg_b"];
						$pilihan_c=$row["pg_c"];
						$pilihan_d=$row["pg_d"];
					?>
					<h6></h6>
					<section>
						<div class="row">
							<h4 class=""><?php echo $row['soal']; ?></h4>
						</div>
						<div class="form-group">
							<div class="radio">
								<input name="pilihan[<?php echo $id; ?>]" value="A" type="radio" id="Option_1<?php echo $id; ?>" checked>
								<label for="Option_1<?php echo $id; ?>"><?php echo $pilihan_a; ?></label>                    
							</div>
							<div class="radio">
								<input name="pilihan[<?php echo $id; ?>]" value="B" type="radio" id="Option_2<?php echo $id; ?>" >
								<label for="Option_2<?php echo $id; ?>"><?php echo $pilihan_b; ?></label>   
							</div>
							<div class="radio">
								<input name="pilihan[<?php echo $id; ?>]" value="C" type="radio" id="Option_3<?php echo $id; ?>" >
								<label for="Option_3<?php echo $id; ?>"><?php echo $pilihan_c; ?></label>   
							</div>
							<div class="radio">
								<input name="pilihan[<?php echo $id; ?>]" value="D" type="radio" id="Option_4<?php echo $id; ?>" >
								<label for="Option_4<?php echo $id; ?>"><?php echo $pilihan_d; ?></label>   
							</div>
						</div>
						<input type="hidden" name="id[]" value=<?php echo $id; ?>>
						<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
						<input type="hidden" name="id_materi" value=<?php echo $_POST['id_materi']; ?>>
					</section>
					<?php } ?>
				</form>
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