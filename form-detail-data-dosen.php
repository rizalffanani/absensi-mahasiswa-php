<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Dosen</h6>
            </div>	<?php //fungsi kode otomatis
		$host = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$Open = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
        mysqli_select_db($Open, $db) or die("Database tidak bisa dibuka");
        
        $NIP_DATA = 0;
        if($NIP = $_GET['NIP'] != null){
            $NIP_DATA = $_GET['NIP'];
        }else{
            $NIP_DATA = $_SESSION["username"];
        }
    
        $Cari="SELECT * FROM dosen WHERE NIP ='" .$NIP_DATA."'";
        
        $Tampil = mysqli_query($Open,$Cari);

        function RandomString()
		{
			$ID = "RPM".rand(0,1000);
			return $ID;
		}

        while (	$hasil = mysqli_fetch_array($Tampil)) {
                $NIP		= stripslashes ($hasil['NIP']);
                $nama_dosen	= stripslashes ($hasil['Nama_dosen']);
                
            {
	?>
	<form action="home-admin.php?page=input-data-dosen" method="POST" name="form-input-data-dosen" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="46">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="2"><b>BIODATA DOSEN</b></font></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>NIP</td>
				<td><?=$NIP?></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Dosen</td>
				<td><?=$nama_dosen?></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
        <?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
	</form>
</div>
</div>