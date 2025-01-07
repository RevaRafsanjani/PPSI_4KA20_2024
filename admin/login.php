<?php ob_start(); session_start(); include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>e-Learning SMKN 5 Bekasi - Masuk</title>
  
	
	<link rel="stylesheet" href="../main/css/vendors_css.css">
	  
	  
	<link rel="stylesheet" href="../main/css/style.css">
	<link rel="stylesheet" href="../main/css/skin_color.css">	

</head>
<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="bg-white-10 rounded5">
							<div class="content-top-agile p-10 pb-0">
								<p><img src="../assets/logo.png" width="150" alt=""/></p>
								<h2 class="text-white">ADMIN LOGIN</h2>		
								<?php 
									if(isset($_POST['login'])){
										$nip	 	= $_POST['nip'];
										$password 	= md5($_POST['password']);
										$sql 		= "select * from admin where nip='".$nip."' and password='".$password."'";
										$query 		= mysql_query($sql) or die (mysql_error());
										// pengecekan query valid atau tidak
										if($query){
											$row = mysql_num_rows($query);
											$rows = mysql_fetch_array($query);
											// jika $row > 0 atau username dan password ditemukan
											if($row > 0){
												$_SESSION['isLoggedIn']=1;
												$_SESSION['nip']=$nip;
												$_SESSION['id_admin']= $rows['id_admin'];
												$_SESSION['nama']= $rows['nama'];
												$id_admin = $_SESSION['id_admin'];
												header('Location: index.php');
											}else{
												echo 				
												"<div class='text-white' align='center'> <i data-feather='alert-octagon' class='w-6 h-6 mr-2'></i>LOGIN GAGAL!</div>";
												}
											}

										}
									if(isset($sukses)) { echo $sukses; }
									if(isset($gagal)) { echo $gagal; }
							?>
							</div>
							<div class="p-30">
								<form action="" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
											</div>
											<input type="text" class="form-control pl-15 bg-transparent text-white plc-white" name="nip" placeholder="Nomor Induk Pegawai">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
											</div>
											<input type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-12 text-center">
										  <button type="submit" name="login" class="btn btn-danger btn-rounded mt-10">MASUK</button>
										</div>
									  </div>
								</form>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	
	<script src="../main/js/vendors.min.js"></script>

</body>
</html>