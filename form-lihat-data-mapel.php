<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mata Kuliah</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataMahasiswa" width="100%" cellspacing="0">
                  <thead>
	<th width="5">No</td>&nbsp;
	<th width="30%">NIM Siswa</td>&nbsp;
	<th width="50%">Nama Siswa</td>&nbsp;
	<th width="30%">Aksi</td>&nbsp;
	</tr>
</thead>
</div>
</div>


<?php

	$NIM_DATA = 0;
	if(isset($_GET['nim'])){
		$NIM_DATA = $_GET['nim'];
	}else{
		$NIM_DATA = $_SESSION["username"];
	}

	$Open = mysqli_connect("localhost:3306","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysqli_select_db($Open,"mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}

	$Cari="SELECT * FROM mapel";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array($Tampil)) {
			$id_mapel = stripslashes ($hasil['id_mapel']);
			$nama_mapel	= stripslashes ($hasil['nama_mapel']);
			$nip =stripslashes ($hasil['NIP']);
		{
	$nomer++;
?>

	<tr align="center" height="130">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$id_mapel?><div align="center"></div></td>
		<td><?=$nama_mapel?><div align="center"></div></td>
		<td> <a href="home-admin.php?page=form-edit-data-mapel&id=<?=$id_mapel?>"class="btn btn-warning">Edit</a> | <a href="home-admin.php?page=delete-data-mapel&id=<?=$id_mapel?>"class="btn btn-danger">Delete</a></div></td></td>
		</tr>
	
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</table>
</div>