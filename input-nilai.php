<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">
<?php
include "koneksi.php";
//cek button

if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$tgl	= $_POST['tgl'];
	$nim_siswa	= $_POST['nim_siswa'];
	$ket = $_POST['ket'];
	if (empty($nim_siswa) || empty($ket)) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-input-nilai';
	</script>
	
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
	$cek=mysqli_num_rows (mysqli_query($Open,"SELECT id_absen FROM absen WHERE tgl='$tgl' AND nim='$nim_siswa'"));
	if ($cek > 0) {
	?>
			<script language="JavaScript">
			alert('Sudah Absen');
			document.location='home-admin.php?page=form-input-nilai';
			</script>
	<?php
	}
		//Masukan data ke Table
		$input	="INSERT INTO absen (tgl, nim, status) VALUES ('$tgl','$nim_siswa','$ket')";
		$query_input =mysqli_query($Open,$input);
			if ($query_input) {
			//Jika Sukses
		?>
		<script language="JavaScript">
		alert('Data Berhasil diinput');
		document.location='home-admin.php?page=lihat-nilai-siswa';
		</script>
<?php
	}
	else {
	//Jika Gagal
	echo "Data Gagal diinput, Silahkan diulangi!";
	}
	
//Tutup koneksi engine MySQL
	mysqli_close($Open);
	}

}else{
}

?>
</div>