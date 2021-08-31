<?php
	include "koneksi.php";

	$usa = $_GET['username'];
	if(isset($_POST['proses'])){
			$pros = $_POST['nyaldo'];
			$proy = $_POST['kose'];

			$mai = "SELECT saldo from tb_pengguna where username='$usa'";
			$ex  = mysqli_query($koneksi,$mai) or die (mysqli_error($koneksi));
			$namfil = mysqli_fetch_assoc($ex);
			$saldoo = $namfil['saldo'];
			$jumsoe  = $saldoo + $pros;

			$mei = "UPDATE tb_pengguna set saldo='$jumsoe' where username='$usa'";
			$ez  = mysqli_query($koneksi,$mei) or die (mysqli_error($koneksi));

			$mal = "DELETE from tb_saldo where kode_saldo = '$proy'";
			$max = mysqli_query($koneksi,$mal) or die(mysqli_error($koneksi));

			if($ez){
				echo "<script>alert('Selamat Saldo Anda Telah Terisi, Silahkan Relogin',document.location.href='halaman_profil.php')</script>";
			}else{
				echo "<script>alert('Maaf Kode Pembayaran Anda Salah',document.location.href='halaman_profil.php')</script>";
			}

		
	}
?>