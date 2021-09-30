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
	if (empty($_POST['nama_siswa']) || empty($_POST['jurusan']) || empty($_POST['nama_ibu'])) {
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-input-data-mahasiswa';
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
//cek Kode Barang di database
$cek=mysqli_num_rows (mysqli_query($Open,"SELECT nim FROM data_siswa WHERE nim='$_POST[nim]'"));
if ($cek > 0) {
?>
		<script language="JavaScript">
		alert('NIM sudah dipakai !, silahkan diulang kembali');
		document.location='home-admin.php?page=form-input-data-mahasiswa';
		</script>
<?php
}
//Masukan data ke Table Login
$input	="INSERT INTO data_siswa (nim, nama_siswa, jk, jurusan, tmp_lahir, tgl_lahir, alamat, nama_ibu, email, hp) VALUES ('$nim','$nama_siswa','$jk','$jurusan','$tmp_lahir','$tgl_lahir','$alamat','$nama_ibu','$email','$hp')";
$input2	="INSERT INTO login (username, nama , password , hak_akses ) VALUES ('$nim','$nama_siswa','$nim','Siswa')";
$query_input =mysqli_query($Open,$input) or die(mysqli_error($Open));
$query_input2 =mysqli_query($Open,$input2) or die(mysqli_error($Open));
	if ($query_input) {
	//Jika Sukses

		if($query_input2){
?>
		<script language="JavaScript">
		alert('Data Siswa Berhasil diinput');
		document.location='home-admin.php?page=form-input-data-mahasiswa';
		</script>
<?php
		}	else {
			//Jika Gagal
			echo "Data Siswa Gagal diinput, Silahkan diulangi!";
			}
}
	else {
	//Jika Gagal
	echo "Data Siswa Gagal diinput, Silahkan diulangi!";
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
	}
}
?>
</div>