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
	<form action="home-admin.php?page=edit-data-mahasiswa" method="POST" name="form-edit-data-mahasiswa" enctype="multipart/form-data">
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
				<td><input name="nim" type="text" id="nim" size="15" value="<?=$nim?>"readonly/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Siswa</td>
				<td><input type="text" name="nama_siswa" size="50" value="<?=$nama_siswa?>"/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jenis Kelamin</td>
				<td><select name="jk">
						<option value="Laki-laki" <?=$jk == 'Laki-laki' ? ' selected="selected"' : '';?>>Laki-laki
						<option value="Perempuan"  <?=$jk == 'Perempuan' ? ' selected="selected"' : '';?>>Perempuan
					</select></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Jurusan</td>
				<td>
				<select name="jurusan">
						<option value="T-Komputer" <?=$jurusan == 'T-Komputer' ? ' selected="selected"' : '';?>>Teknik Komputer
						<option value="T-Informatika" <?=$jurusan == 'T-Informatika' ? ' selected="selected"' : '';?> >Teknik Informatika
						<option value="T-Mesin" <?=$jurusan == 'T-Mesin' ? ' selected="selected"' : '';?>>Teknik Mesin
						<option value="T-Industri" <?=$jurusan == 'T-Industri' ? ' selected="selected"' : '';?>>Teknik Industri
						<option value="T-Elektro" <?=$jurusan == 'T-Elektro' ? ' selected="selected"' : '';?>>Teknik Elektro
			</select></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tempat Lahir</td>
				<td><input type="text" name="tmp_lahir" size="40" maxlength="25" value="<?=$tmp_lahir?>" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal Lahir</td>
				<td><input type="date" name="tgl_lahir" value="<?=$tgl_lahir?>" /></td>
			</tr>
			<tr>
				<td height="62">&nbsp;</td>
				<td>Alamat</td>
				<td><textarea name="alamat" rows="2" cols="40" maxlength="50"><?=$alamat?></textarea></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Ibu Kandung</td>
				<td><input type="text" name="nama_ibu" size="40" maxlength="30" value="<?=$nama_ibu?>"/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Email</td>
				<td><input type="text" name="email" size="40" maxlength="30" value="<?=$email?>"/></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>No. HP</td>
				<td><input type="text" name="hp" size="20" maxlength="12" value="<?=$hp?>"/></td>
			</tr>
			<tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit">
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