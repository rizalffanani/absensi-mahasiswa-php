<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>	<?php //fungsi kode otomatis
		$host = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$Open = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
        mysqli_select_db($Open, $db) or die("Database tidak bisa dibuka");
        
        $NIM_DATA = 0;
        if($nim = $_GET['nim'] != null){
            $NIM_DATA = $_GET['nim'];
        }else{
            $NIM_DATA = $_SESSION["username"];
        }
    
        $Cari="SELECT * FROM data_siswa WHERE nim ='" .$NIM_DATA."'";
        
        $Tampil = mysqli_query($Open,$Cari);

        function RandomString()
		{
			$ID = "RPM".rand(0,1000);
			return $ID;
		}

        while (	$hasil = mysqli_fetch_array($Tampil)) {
                $nim		= stripslashes ($hasil['nim']);
                $nama_siswa	= stripslashes ($hasil['nama_siswa']);
                $nama_ibu	= stripslashes ($hasil['nama_ibu']);
                $jk			= stripslashes ($hasil['jk']);
                $jurusan	= stripslashes ($hasil['jurusan']);
                $tmp_lahir	= stripslashes ($hasil['tmp_lahir']);
                $tgl_lahir  = stripslashes ($hasil['tgl_lahir']);
                $alamat	    = stripslashes ($hasil['alamat']);
                $email	    = stripslashes ($hasil['email']);
                $hp	    = stripslashes ($hasil['hp']);
            {
	?>
	
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="46">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="2"><b>BIODATA MAHASISWA</b></font></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>NIM</td>
				<td><p><?=$nim?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Siswa</td>
				<td><p><?=$nama_siswa?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jenis Kelamin</td>
				<td><p><?=$jk?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jurusan</td>
				<td><p><?=$jurusan?></p></td>
			</tr>
	
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tempat Lahir</td>
				<td><p><?=$tmp_lahir?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Lahir</td>
				<td><?=$tgl_lahir?>
				</td>
			</tr>
			<tr>
				<td height="62">&nbsp;</td>
				<td>Alamat</td>
				<td><p><?=$alamat?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Ibu Kandung</td>
				<td><p><?=$nama_ibu?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Email</td>
				<td><p><?=$email?></p></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>No. HP</td>
				<td><p><?=$hp?></p></td>
			</tr>
			<tr>
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
	
</div>
</div>