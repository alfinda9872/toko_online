<?php
$server="localhost";
$username="root";
$password="";
$database="10116172_AplikasiTokoOnline";
$koneksi = mysqli_connect ($server,$username,$password) or die("Gagal");
mysqli_select_db($koneksi,$database) or die("Database tidak di temukan");
?>
