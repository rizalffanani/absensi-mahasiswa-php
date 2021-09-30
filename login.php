<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysqli_query($Open, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $_SESSION['username'] = $qry['username'];
		$_SESSION['nama'] = $qry['nama'];
        $_SESSION['hak_akses'] = $qry['hak_akses'];
			if($qry['hak_akses']=="Admin"){
				header("location:home-admin.php");
			}else if($qry['hak_akses']=="Siswa")
				header("location:home-user.php");
			else if($qry['hak_akses']=="Dosen")
			    header("location:home-dosen.php");	
		}else{
			?>
			<script language="JavaScript">
				alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
				document.location='index.php';
			</script>
			<?php
		}
	}
	else if($op=="out"){
		unset($_SESSION['username']);
		unset($_SESSION['hak_akses']);
		header("location:index.php");
	}
?>
