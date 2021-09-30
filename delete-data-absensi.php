<?php
$Open = mysqli_connect("localhost:3306","root","");
	if (!$Open){
	die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
$Koneksi = mysqli_select_db($Open,"mahasiswa");
	if (!$Koneksi){
	die ("Koneksi ke Database Gagal !");
	}
// Cek Kode
if (isset($_GET['id_absen'])) {
	$id_absen = $_GET['id_absen'];
	$query   = "SELECT * FROM absen WHERE id_absen='$id_absen'";
	$hasil   = mysqli_query($Open,$query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		?>
			<script language="JavaScript">
			alert('Error. Tidak ada NIM yang dipilih Silakan cek kembali! ');
			document.location='home-admin.php?page=lihat-nilai-siswa';
			</script>
		<?php
	}
	//proses delete data
	if (!empty($id_absen) && $id_absen != "") {
		$hapus = "DELETE FROM absen WHERE id_absen='$id_absen'";
		$sql = mysqli_query ($Open,$hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Absen Berhasil dihapus');
				document.location='home-admin.php?page=lihat-nilai-siswa';
				</script>
			<?php		
		} else {
			echo "<h2><font color=red><center>Data Mata Kuliah gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>