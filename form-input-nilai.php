<div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>	<?php //fungsi kode otomatis
		$host = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$hose = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
		mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");


		function RandomString()
		{
		
			$ID = "N-".rand(0,800);
			return $ID;
		}
	?>
	<form action="home-admin.php?page=input-nilai" method="POST" name="form-input-nilai" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="3"><b>FORM ABSENSI MAHASISWA HARIAN</b></font></td>
			</tr>
			<tr>
				<td width="5%" height="36">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Tanggal</td>
				<td><input name="tgl" type="date" id="id_nilai" value="<?= date("Y-m-d")?>"  />
					</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>NIM Siswa</td>
				<td><?php
					mysqli_connect($host,$username,$password) or die("Koneksi gagal");
					mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
					$result = mysqli_query($hose,"SELECT * FROM data_siswa");    
					$jsArray = "var nim_siswa = new Array();\n";    
					echo '<select name="nim_siswa" onchange="changeValue(this.value)">';    
					echo '<option> -- Pilih NIM -- </option>';    
					while ($row = mysqli_fetch_array($result)) {    
						echo '<option value="' . $row['nim'] . '">' . $row['nim'] . ' - ' . $row['nama_siswa'] .'</option>';
						}    
					echo '</select>';
					?>
				</td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Keterangan</td>
				<td> 
	        <input type="radio" name="ket" value="a"><label class="radio-inline">Absen</label>
	        <input type="radio" name="ket" value="s"><label class="radio-inline">Sakit</label>
	        <input type="radio" name="ket" value="i"><label class="radio-inline">Izin</label>
        </td>
			</tr>
			<tr>
				<td height="72">&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Submit">&nbsp;&nbsp;&nbsp;
					<input type="reset" name="reset" value="Reset"></td>
			</tr>
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
			</tr>
		</table>
	</form>
</div>