<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Absensi Mahasiswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataMahasiswa" width="100%" cellspacing="0">
                  <thead>
	<th width="5">No</td>&nbsp;
	<th width="60">NIM Siswa</td>&nbsp;
	<th width="160">Nama Siswa</td>&nbsp;
	<th width="60">Tanggal</td>&nbsp;      
	<th width="60">Keterangan </td>&nbsp;    
	<?php if($_SESSION["username"]=='admin'){?>
	<th width="130">Action</td>&nbsp;     
	<?php }?>
	</tr>
</thead>
</div>
</div>


<?php

	$NIM_DATA = "";
	if(isset($_GET['nim'])){
		$NIM_DATA = "WHERE absen.nim='".$_GET['nim']."'";
	}elseif($_SESSION["username"]!='admin'){
		$NIM_DATA = "WHERE absen.nim='".$_SESSION["username"]."'";
	}

	$Open = mysqli_connect("localhost:3306","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysqli_select_db($Open,"mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}

	$Cari="SELECT * FROM absen INNER JOIN data_siswa ON absen.nim=data_siswa.nim ".$NIM_DATA;
	$Tampil = mysqli_query($Open,$Cari);
	$nomer=0;
    while (	$hasil = mysqli_fetch_array($Tampil)) {
			$id_absen	= stripslashes ($hasil['id_absen']);
			$nim_siswa	= stripslashes ($hasil['nim']);
			$nama =stripslashes ($hasil['nama_siswa']);
			$tgl			= stripslashes ($hasil['tgl']);
			$status	= stripslashes ($hasil['status']);
		{
	$nomer++;
?>

	<tr align="center" height="130">
		<td><?=$nomer?><div align="center"></div></td>
		<td><?=$nim_siswa?><div align="center"></div></td>
		<td><?=$nama?><div align="center"></div></td>
		<td><?=$tgl?><div align="center"></div></td>
		<td><?=$status?><div align="center"></div></td>
		<?php if($_SESSION["username"]=='admin'){?>
		<td><a href="home-admin.php?page=delete-data-absensi&id_absen=<?=$id_absen?>"class="btn btn-danger">Delete</a></td>
		<?php }?>
		</tr>
	
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</table>
</div>