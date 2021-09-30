<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">

<?php
//cek button
include 'koneksi.php';
if ($_POST['Submit'] == "Submit") {
	//Kirimkan Variabel
	$nim		= $_POST['nim'];
	$nama_siswa	= $_POST['nama_siswa'];
	$jk			= $_POST['jk'];
	$jurusan	= $_POST['jurusan'];
	$tmp_lahir	= $_POST['tmp_lahir'];
	$tgl_lahir	= $_POST['tgl_lahir'];
	$alamat		= $_POST['alamat'];
	$nama_ibu	= $_POST['nama_ibu'];
	$email		= $_POST['email'];
	$hp			= $_POST['hp'];

	//validasi data jika kosong
	if (empty($nama_siswa) || empty($jurusan) || empty($nama_ibu)) {
	?>
		<script language="JavaScript">
			alert('Data Harap Dilengkapi');
			document.location='home-admin.php?page=form-edit-data-siswa&nim=<?= $nim?>';
		</script>
	<?php
	}
		//Jika Validasi Terpenuhi
	else {
		include "koneksi.php";
		//cek Kode Barang di database
		//Masukan data ke Table Login
		$input	="UPDATE data_siswa SET 
		nama_siswa = '$nama_siswa', 
		jk = '$jk', 
		jurusan = '$jurusan', 
		tmp_lahir = '$tmp_lahir',
		tgl_lahir = '$tgl_lahir',
		alamat = '$alamat', 
		nama_ibu = '$nama_ibu',
		email = '$email',
		hp = '$hp' 
		WHERE nim = '$nim';";
		$query_input = mysqli_query($Open,$input);
		if ($query_input) {
				//Jika Sukses
			?>
					<script language="JavaScript">
					alert('Data Siswa Berhasil diinput');
					document.location='home-admin.php?page=form-lihat-data-mahasiswa';
					</script>
			<?php
			
		} else{

			//Jika Gagal
						echo $input;
		}	
	}
		
	//Tutup koneksi engine MySQL
	mysqli_close($Open);
}

?>
</div>