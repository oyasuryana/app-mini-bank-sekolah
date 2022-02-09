<?php
SESSION_START();
if(!isset($_SESSION['user'])){
	header("Location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>appBank @ Aplikasi Mini Bank</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no"/>		
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
	</head>
	<body>

		<main role="main">	
			<nav class="navbar navbar-expand-md bg-info navbar-dark">
				<a class="navbar-brand" href="index.php">
					<img class="img-responsive img-thumbnail" src="images/logo.jpg" width="64" height="64" alt="Not Image">
				</a>				
			
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#daftar-menu">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="daftar-menu">
					<ul class="navbar-nav">
						<li class="navbar-item">
							<a class="nav-link" href="index.php">Dashboard</a>
						</li>
					<?php 
						if ($_SESSION['level']=='cs') {
						
						?>
						<li class="navbar-item">
							<a class="nav-link" href="index.php?modul=NasabahTampil">Data Nasabah</a>
						</li>
						
					<?php }
					
					if ($_SESSION['level']=='teller') {
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Transaksi</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="index.php?modul=SimpananTambah">Simpanan</a>
								<a class="dropdown-item" href="index.php?modul=PenarikanTambah">Penarikan</a>
							</div>
						</li>
						<?php } 
						
						if ($_SESSION['level']=='manager'){
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Laporan</a>
							<div class="dropdown-menu">
							<?php if ($_SESSION['level']=='teller' || $_SESSION['level']=='manager') {?>
								<a class="dropdown-item" href="index.php?modul=Laporan">Penerimaan</a>
								<a class="dropdown-item" href="index.php?modul=SimpananSaldo">Saldo Nasabah</a>
								<a class="dropdown-item" href="index.php?modul=MutasiRekening">Mutasi Rekening</a>
								<?php } 
								if ($_SESSION['level']=='cs' || $_SESSION['level']=='manager') { ?>
								<a class="dropdown-item" href="index.php?modul=NasabahTampil">Data Nasabah</a>
								<?php 
								}							
							?>
							</div>
						</li>
						
						<?php } 
						if ($_SESSION['level']=='nasabah'){
						
						?>
						<li class="navbar-item">
							<a class="nav-link" href="index.php?modul=MutasiRekeningNasabah">Mutasi Rekening</a>
						</li>
						
						<li class="navbar-item">
							<a class="nav-link" href="index.php?modul=formGantiPassword">Ganti Password</a>
						</li>
						
						
						
						<?php } ?>
						
						<li class="navbar-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
			</nav>	
			
			<div class="container-fluid mt-2">
				<?php
				include('konfigurasi.php');

				include('fungsi.php');

				if(isset($_GET['modul'])){
					include($_GET['modul'].'.php');
				} else {
				  if($_SESSION['level']=='cs'){
					include('csPanel.php');					  
				  } else if ($_SESSION['level']=='teller') {
					include('tellerPanel.php');					  					  
				  }	else if ($_SESSION['level']=='manager') {
					include('csPanel.php');					  
					include('tellerPanel.php');
				  }	else if ($_SESSION['level']=='nasabah') {
					include('nasabahPanel.php');					  					  
				  }	else{
					header('Location: http://localhost/apl_tabungan/');
				  }		
				}
				?>
			
			</div> <!--container-fluid-->
			
			
		</main>	

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
		
	</body>
</html>
