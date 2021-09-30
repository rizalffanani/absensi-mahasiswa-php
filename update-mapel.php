<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1114px; height:377px;">

<?php
//cek button
include 'koneksi.php';
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
	$id_mapel	= $_POST['id_mapel'];
	$nama_mapel	= $_POST['nama_mapel'];
//Cek Foto

//validasi data jika kosong
	if (empty($_POST['nama_mapel'])) {
		echo "string";
?>
	<script language="JavaScript">
		alert('Data Harap Dilengkapi');
		document.location='home-admin.php?page=form-edit-data-mapel&id=<?= $id_mapel;?>';
	</script>
<?php
	}
	//Jika Validasi Terpenuhi
	else {
	include "koneksi.php";
//Masukan data ke Table Login
$input	="UPDATE mapel SET 
nama_mapel = '$nama_mapel'
WHERE id_mapel = '$id_mapel';";
$query_input = mysqli_query($Open,$input);
	if ($query_input) {
	//Jika Sukses

		
?>
		<script language="JavaScript">
		alert('Data Dosen Berhasil diupdate');
		document.location='home-admin.php?page=form-lihat-data-mapel';
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