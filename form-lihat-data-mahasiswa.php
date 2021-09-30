<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataMahasiswa" width="100%" cellspacing="0">
                  <thead>
<tr>
	<th width="5">No</td>&nbsp;
	<th width="60">NIM</td>&nbsp;
	<th width="160">Nama Siswa</td>&nbsp;
	<th width="60">Jenis Kelamin</td>&nbsp;   
	<th width="60">Jurusan</td>&nbsp;
	<th width="130">Action</td>&nbsp;     
</tr>
</thead>
</div>
</div>

<?php
	$Open = mysqli_connect("localhost:3306","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysqli_select_db($Open,"mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
	$Cari="SELECT * FROM data_siswa ORDER BY nim";
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array ($Tampil)) {
			$nim 		= stripslashes ($hasil['nim']);
			$nama_siswa	= stripslashes ($hasil['nama_siswa']);
			$jk			= stripslashes ($hasil['jk']);
			$foto 		= $hasil['foto'];
			$jurusan	= stripslashes ($hasil['jurusan']);
		{
	$nomer++;
?>
	
	<tr align="center" height="130">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$nim?><div align="center"></div></td>
		<td><?=$nama_siswa?><div align="center"></div></td>
		<td><?=$jk?><div align="center"></div></td>
		<td><?=$jurusan?><div align="center"></div></td>
		<td bgcolor="#EEF2F7"><div align="center">
		<a href="home-admin.php?page=lihat-nilai-siswa&nim=<?=$nim?>" class="btn btn-info">Lihat Nilai</a> | <a href="home-admin.php?page=form-detail-data-siswa&nim=<?=$nim?>"class="btn btn-success">Detail</a> | <a href="home-admin.php?page=form-edit-data-siswa&nim=<?=$nim?>"class="btn btn-warning">Edit</a> | <a href="home-admin.php?page=delete-data-siswa&nim=<?=$nim?>"class="btn btn-danger">Delete</a></div></td>
	</tr>
	
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</table>
</div>






