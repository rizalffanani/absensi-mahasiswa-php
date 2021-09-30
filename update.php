<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:1110px; height:375px;">
<?php
$Open = mysql_connect("localhost","root","");
        if (!$Open){
        die ("Koneksi ke Engine MySQL Gagal !");
        }
$Koneksi = mysql_select_db("karyawan");
        if (!$Koneksi){
        die ("Koneksi ke Database Gagal !");
        }
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
} else {
    die ("Error. No Nik Selected! ");    
}
//Tampilkan data dari tabel karyawan
    $query    = "SELECT * FROM data_karyawan WHERE nim='$nim'";
    $sql    = mysql_query ($query);
    $hasil    = mysql_fetch_array ($sql);
    $nim    = $hasil['nim'];
    $nama_siswa    = $hasil['nama_siswa'];
    $foto    = $hasil['foto'];
    $jk        = $hasil['jk'];
    $jurusan    = $hasil['jurusan'];
	$tmp_lahir    = $hasil['tmp_lahir'];
	$tgl_lahir    = $hasil['tgl_lahir'];
	$alamat    = $hasil['alamat'];
	$nama_ibu    = $hasil['nama_ibu'];
	$email    = $hasil['email'];
	$hp    = $hasil['hp'];
//proses update data karyawan
if (isset($_POST['Edit'])) {
    $nim    = $_POST['hnim'];
    $nama_siswa    = $_POST['nama_siswa'];
    $jk        = $_POST['jk'];
    $jurusan    = $_POST['jurusan'];
    $tmp_lahir    = $_POST['tmp_lhr'];
    $tgl_lahir    = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
    $alamat    = $_POST['alamat'];
    $nama_ibu = $_POST['nama_ibu'];
    $hp    = $_POST['hp'];
    $email    = $_POST['email'];
    $foto    = $_FILES['foto'];
    //Cek Photo
    if (strlen($foto)>0) {
        //upload Photo
        if (is_uploaded_file($_FILES['foto'])) {
            move_uploaded_file ($_FILES['foto'], "images/".$foto);
            mysql_query ("UPDATE karyawan SET namafoto='$foto' WHERE nim='$nim'");
        }
    }
    //update
    $query = "UPDATE data_karyawan SET nama_siswa='$nama_siswa', jk='$jk', jurusan='$jurusan', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', nama_ibu='$nama_ibu', hp='$hp', email='$email' WHERE nim='$nim'";
    $sql = mysql_query ($query);
    //setelah berhasil update
    if ($sql) {
        echo "<h3><font color=#8BB2D9><center>Data Berhasil di update</center></font></h3>";    
    } else {
        echo "<h3><font color=red><center>Data gagal di update</center></font></h3>";    
    }
}
?>
<form action="#" method="POST" name="formedit" enctype="multipart/form-data">
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td> </td>
            <td> </td>
            <td width="550"> </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td width="550"><font color="orange" size="4" face="arial"><b>Form Script Update Data</b></font></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td width="550"> </td>
        </tr>
        <tr bgcolor="#DFE6EF" height="20">
            <td> </td>
            <td> </td>
            <td width="550" align="center"></td>
        </tr>
        <tr>
            <td width="18"> </td>
            <td width="142" height="36">NIK</td>
            <td width="550">:<b><?=$nim?>
                <input type="hidden" name="hnim" value="<?=$nim?>"></b></td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">Nama</td>
            <td><input type="text" name="nama_siswa" size="40" maxlength="30" value="<?=$nama_siswa?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">Foto</td> 
            <td><? if (empty($foto)) 
                    echo "<strong><img src='images/nopic.gif' width='70' height='110'> <br> No Image </strong>";
                    else
                    echo"<img class='shadow' align=left src='images/$foto' width='70' heigth='110'/ title='$nama_siswa'>"
                ?><br /><br /><br /><br /><br /><br /><br /><?=$namafoto?><br /><br /><input type="file" name="foto" size="49"/></td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">Jenis Kelamin</td>
            <td><input type="radio" name="jk" value="L" <? echo ($jk=='L')?"checked":""; ?>>>Laki-laki   
                <input type="radio" name="jk" value="P" <? echo ($jk=='P')?"checked":""; ?>>>Perempuan</td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">Jabatan</td>
            <td><input type="text" name="jurusan" size="25" maxlength="15" value="<?=$jurusan?>"></td>
        </tr>
        <!-- <tr>
            <td> </td>
            <td height="36">Departemen</td>
            <td><input type="text" name="dept" size="25" maxlength="16" value="<?=$dept?>"<</td>
        </tr> -->
        <tr>
            <td> </td>
            <td height="36">Tempat Lahir</td>
            <td><input type="text" name="tmp_lahir" size="25" maxlength="15" value="<?=$tmp_lahir?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">Tanggal Lahir</td>
            <td><select name="tgl_lahir">
            <?
                for ($i=0; $i<=31; $i++) {
                    $tg = ($i<10) ? "0$i" : $i;
                    $sele = ($tg==$tgl)? "selected" : "";
                    echo "<option value="$tg" $sele="">$tg</option>";    
                }
            ?>
                </select> - 
                <select name="bln">
            <?
                for ($i=0; $i<=12; $i++) {
                    $bl = ($i<10) ? "0$i" : $i;
                    $sele = ($bl==$bln)?"selected" : "";
                    echo "<option value="$bl" $sele="">$bl</option>";    
                }
            ?>
                </select> - 
                <select name="thn">
            <?
                for ($i=1949; $i<=2000; $i++) {
                    $th = ($i<1950) ? "0000" : $i;
                    $sele = ($i==$thn)?"selected" : "";
                    echo "<option value="$th" $sele="">$th</option>";    
                }
            ?>
                </select></td>
        </tr>
        <!-- <tr>
            <td> </td>
            <td height="36">Golongan Darah</td>
            <td><input type="radio" name="gol_darah" value="A" <? echo ($gol_darah=='A')?"checked":""; ?>>A   
                <input type="radio" name="gol_darah" value="AB" <? echo ($gol_darah=='AB')?"checked":""; ?>>AB   
                <input type="radio" name="gol_darah" value="B" <? echo ($gol_darah=='B')?"checked":""; ?>>B   
                <input type="radio" name="gol_darah" value="O" <? echo ($gol_darah=='O')?"checked":""; ?>>O</td>
        </tr> -->
        <tr>
            <td> </td>
            <td height="36">alamat</td>
			<td><input type="textfield" name="alamat" size="40" maxlength="30" value="<?=$alamat?>"></td>

                </select></td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">Status Pernikahan</td>
			<td><input type="text" name="nama_ibu" size="40" maxlength="30" value="<?=$nama_ibu?>"></td>

               
        </tr>
        <tr>
            <td> </td>
            <td height="36">No. Telp</td>
            <td><input type="text" name="hp" size="25" maxlength="12" value="<?=$hp?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td height="36">E-Mail</td>
            <td><input type="text" name="email" size="50" maxlength="40" value="<?=$email?>"></td>
        </tr>
        <tr>	
            <td> </td>
            <td height="20"> </td>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Update" value="update Data">  
                <input type="button" value="Cancel" onclick=location.href="index.php?page=formedit" title="kembali ke form update data"></td>
        </tr>
        <tr>
            <td> </td>
            <td height="32"></td>
            <td> </td>
        </tr>
    </table>
</form>
<?php
//Tutup koneksi engine MySQL
    mysql_close($Open);
?>
</div>