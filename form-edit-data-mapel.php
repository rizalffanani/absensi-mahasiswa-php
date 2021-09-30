<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tabel Mahasiswa</h6>
            </div>	<?php //fungsi kode otomatis
		include "koneksi.php";
		$host = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "mahasiswa";
		$hose = mysqli_connect($host,$username,$password) or die("Koneksi gagal");
		mysqli_select_db($hose,$db) or die("Database tidak bisa dibuka");
		$Cari="SELECT * FROM mapel WHERE id_mapel ='" .$_GET['id']."'";
        
        $Tampil = mysqli_query($Open,$Cari);

      
        while (	$hasil = mysqli_fetch_array($Tampil)) {
                $nama_mapel		= stripslashes ($hasil['nama_mapel']);
                $nama_dosen	= stripslashes ($hasil['NIP']);
                
            {
	?>
	<form action="home-admin.php?page=edit-mapel" method="POST" name="form-edit	-mapel" enctype="multipart/form-data">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="70%">&nbsp;</td>
				</tr>
			<tr>
				<td height="46">&nbsp;</td>
				<td>&nbsp;</td>
				<td><font size="2"><b>FORM INPUT MATA PELAJARAN</b></font></td>
			</tr>
			<tr>
			
				<td height="36">&nbsp;</td>
				<td>ID</td>
				<td><input name="id_mapel" type="text" id="id_mapel" size="15" readonly value="<?=$_GET['id']?>" /></td>
			</tr>
			<tr>
				<td height="36">&nbsp;</td>
				<td>Nama Mata Pelajaran</td>
				<td><input type="text" name="nama_mapel" size="50" maxlength="30" value="<?=$nama_mapel?>"/></td>
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

		<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
	</form>
</div>