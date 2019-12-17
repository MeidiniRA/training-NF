<?php
$sesi = $_SESSION['MEMBER'];
?>
<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a href="index.php?hal=home">Home</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php
						if(isset($sesi)){
						?>
					<ul class="navbar-nav">
					<?php
					if($sesi['level'] != 'Karyawan'){
					?>
						<li class="nav-item dropdown">
						
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Master Data</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=karyawan">Data Karyawan</a>
								 <a class="dropdown-item" href="index.php?hal=user">Data User</a>
								 <a class="dropdown-item" href="index.php?hal=divisi">Data Divisi</a>
								 <a class="dropdown-item" href="index.php?hal=jabatan">Data Jabatan</a>
								 <a class="dropdown-item" href="index.php?hal=jenis">Jenis Cuti</a>
							</div>
						</li>
						<?php } ?>
						<li class="nav-item dropdown">
							 <a class="nav-link " href="index.php?hal=cuti" id="navbar">Ambil Cuti</a>
						</li>
					</ul>
					<?php } ?>
					<ul class="navbar-nav ml-md-auto">
					<?php
						if(!isset($sesi)){ 
							//---------belum login-------
						?>
						
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?hal=login">Login<span class="sr-only">(current)</span></a>
						
						</li>
						<?php 
						}
						else{
							//---------sudah login-------
						?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
							 	<?= $sesi['level']?>
							 </a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="#">Profileku</a> 
								 <?php
								 if($sesi['level'] == 'Admin'){

								 ?>
								 <a class="dropdown-item" href="index.php?hal=user">Kelola User</a> 
								 <?php  } ?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>