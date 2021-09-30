<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");//jika belum login jangan lanjut
}
//cek level user
if($_SESSION['hak_akses']!="Admin"){
    die("Anda bukan Admin");//jika bukan admin jangan lanjut
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Program Aplikasi Data Mahasiswa</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home-admin.php">
	<div class="sidebar-brand-icon rotate-n-15">
	  <i class="fas fa-laugh-wink"></i>
	</div>
	<div class="sidebar-brand-text mx-3">SISTEM KEHADIRAN</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
	<a class="nav-link" href="home-admin.php">
	  <i class="fas fa-fw fa-tachometer-alt"></i>
	  <span>Home</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
	Input Data 
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
	<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
	  <i class="fas fa-fw fa-folder"></i>
	  <span>Mahasiswa</span>
	</a>
	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	  <div class="bg-white py-2 collapse-inner rounded">
		<a class="collapse-item" href="home-admin.php?page=form-input-data-mahasiswa">&nbsp;Input Data Mahasiswa</a>
		<a class="collapse-item" href="home-admin.php?page=form-lihat-data-mahasiswa">&nbsp;Lihat Data Mahasiswa</a>
	  </div>
	</div>
  </li>



   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
	<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
	  <i class="fas fa-fw fa-chart-area"></i>
	  <span>Absensi</span>
	</a>
	<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	  <div class="bg-white py-2 collapse-inner rounded">
		<a class="collapse-item" href="home-admin.php?page=form-input-nilai">&nbsp;Input Absensi</a>
		<a class="collapse-item" href="home-admin.php?page=lihat-nilai-siswa">&nbsp;Lihat Absensi</a>
	  </div>
	</div>
  </li>

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
	Input Nilai dan Mapel
  </div> -->


  <!-- Nav Item - Charts -->
  <!-- <li class="nav-item">
	<a class="nav-link" href="home-admin.php?page=form-input-nilai">
	  <i class="fas fa-fw fa-chart-area"></i>
	  <span>&nbsp;Input Absensi</span></a>
  </li> -->

  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
	<a class="nav-link" href="home-admin.php?page=form-input-mapel">
	  <i class="fas fa-fw fa-table"></i>
	  <span>&nbsp;Input Mapel</span></a>
  </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	  <!-- Sidebar Toggle (Topbar) -->
	  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	  </button>

	  <!-- Topbar Search -->
	  <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
		  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
		  <div class="input-group-append">
			<button class="btn btn-primary" type="button">
			  <i class="fas fa-search fa-sm"></i>
			</button>
		  </div>
		</div>
	  </form> -->

	  <!-- Topbar Navbar -->
	  <ul class="navbar-nav ml-auto">

		<!-- Nav Item - Search Dropdown (Visible Only XS) -->
		<li class="nav-item dropdown no-arrow d-sm-none">
		  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-search fa-fw"></i>
		  </a>
		  <!-- Dropdown - Messages -->
		  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
			<form class="form-inline mr-auto w-100 navbar-search">
			  <div class="input-group">
				<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
				  <button class="btn btn-primary" type="button">
					<i class="fas fa-search fa-sm"></i>
				  </button>
				</div>
			  </div>
			</form>
		  </div>
		</li>

		
		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
		  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small">&nbsp;<?php echo $_SESSION['username'];?></span>
			<img class="img-profile rounded-circle" src="foto/1.png">
		  </a>
		  <!-- Dropdown - User Information -->
		  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			<a class="dropdown-item" href="home-admin.php">
			  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
			  Profile
			</a>
			<a class="dropdown-item" href="?page=help-woy">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
				  &nbsp;Help
                </a>
			<a class="dropdown-item" href="index.php" 	>
			  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
			  Logout
			</a>
		  </div>
		</li>

	  </ul>

	</nav>
	<!-- End of Topbar -->

	<!-- Begin Page Content -->
	<div class="container-fluid">
	  <?php
			$page = (isset($_GET['page']))? $_GET['page'] : "main";
			switch ($page) {
				case 'form-input-data-mahasiswa' : include "form-input-data-mahasiswa.php"; break;
				case 'form-lihat-data-mahasiswa' : include "form-lihat-data-mahasiswa.php"; break;
				case 'form-lihat-data-mapel' : include "form-lihat-data-mapel.php"; break;
				case 'form-input-mapel' : include "form-input-mapel.php"; break;
				case 'form-input-nilai' : include "form-input-nilai.php"; break;
				case 'form-edit-data-siswa' : include "form-edit-data-siswa.php"; break;
				case 'form-edit-data-mapel' : include "form-edit-data-mapel.php"; break;
				case 'form-detail-data-siswa' : include "form-detail-data-mahasiswa.php"; break;
				case 'input-data-mahasiswa' : include "input-data-mahasiswa.php"; break;
				case 'edit-data-mahasiswa' : include "update-mahasiswa.php"; break;
				case 'edit-mapel' : include "update-mapel.php"; break;
				case 'input-mapel' : include "input-mapel.php"; break;
				case 'input-nilai' : include "input-nilai.php"; break;
				case 'lihat-nilai-siswa' : include "form-lihat-data-nilai.php"; break;
				case 'delete-data-siswa' : include "delete-data-siswa.php"; break;
				case 'delete-data-absensi' : include "delete-data-absensi.php"; break;
				
				case 'help-woy': include "help.php"; break;
				case 'main' :
				default : include 'aboutuser.php';	
			}
			?>
	<!-- /.container-fluid -->

  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
	<div class="container my-auto">
	  <div class="copyright text-center my-auto">
		<span>Copyright &copy; 2021</span>
	  </div>
	</div>
  </footer>
  <!-- End of Footer -->

<!-- End of Content Wrapper -->

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
	  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	</div>
	<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	<div class="modal-footer">
	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	  <a class="btn btn-primary" href="login.html">Logout</a>
	</div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/jquery.dataTables.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script>
	$(document).ready( function () {
    $('#dataMahasiswa').DataTable();
} );
</script>

<!-- <br>
<table width="1306" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td width="10" bgcolor="#7FFF00">&nbsp;</td>
	<td width="140" height="120" bgcolor="#7FFF00"><div align="center"><img src="image/logo.png" width="100" height="90"></div></td>
	<td width="10" bgcolor="#7FFF00">&nbsp;</td>
	<td width="1136" bgcolor="#7FFF00"><div align="center"><span class="header">SIAKAD TERBAGUS<br><br></span>
	<b>University of AshiDICKy</b><span class="header"><br></span></div></td>
	<td width="10" bgcolor="#7FFF00"></td>
</tr>
<tr bgcolor="#DCDCDC">
	<td>&nbsp;</td>
	<td height="27"><div align="left"><strong><?php echo "Tanggal : ".date("d-M-y");?></strong></div></td>
	<td>&nbsp;</td>
	<td align="right">Selamat Datang&nbsp;<font color="#FF6600"><strong> <?=$_SESSION['nama']?></strong></font>&nbsp;|&nbsp;<a href="logout.php">Log Out >>&nbsp;&nbsp;</a></td>
	<td>&nbsp;</td>
</tr> -->

<!-- <tr bgcolor="#DCDCDC">
	<td>&nbsp;</td>
	<td rowspan="4" valign="top"><table width="144" height="400" bgcolor="#7FFF00" border="0" cellspacing="0" cellpadding="0" align="top">
		<tr>
		<td valign="top"><ul class="navbar">
			<li><b>MAIN MENU</b></li><br>
			<li><a href="home-admin.php?page=form-input-data-mahasiswa" title="input-data-mahasiswa">&nbsp;Input Siswa</a></li>
			<li><a href="home-admin.php?page=form-input-mapel" title="input mapel">&nbsp;Input Mapel</a></li>
			<li><a href="home-admin.php?page=form-input-nilai" title="input nilai">&nbsp;Input Nilai</a></li>
			<li><a href="home-admin.php?page=form-lihat-data-mahasiswa" title="lihat-data-mahasiswa">&nbsp;View Mahasiswa</a></li>
			<li><a href="home-admin.php?page=form-input-data-dosen" title="input-data-donsen">&nbsp;Input Dosen</a></li>
			<li><a href="home-admin.php?page=lihat-data-dosen" title="lihat-data-mahasiswa">&nbsp;View Dosen</a></li>
		</ul></td>
		</tr></table></td>
	<td rowspan="4">&nbsp;</td>
	<td rowspan="4" valign="top"><table width="1136" height="400" bgcolor="white" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="936" valign="top">
			</td>	
		</tr></table></td>
	<td rowspan="4">&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
</tr>
<tr bgcolor="#DCDCDC">
    	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
</tr>
<tr bgcolor="#7FFF00">
	<td height="36" colspan="5" bgcolor="#7FFF00"><div align="right" style="margin:0 10px 0 0;"><font color="#000">Development 2015 | by Raja Putra Media</font><br></div></td>
</tr>
</table>
<div align="center"></div> 
</body>
</html>