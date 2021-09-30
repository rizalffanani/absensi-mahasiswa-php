<?php
//buka koneksi ke engine MySQL
	$Open = mysqli_connect("localhost:3306","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
		else{
		// print ("Engine Connected<br>");
		}
//koneksi ke database
	$Koneksi = mysqli_select_db($Open, "mahasiswa");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
		else{
		// print ("Database Connected<br><br><br>");
		}
?>