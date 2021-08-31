<?php

	include "koneksi.php";

	$username = $_POST['username'];
	$password  = $_POST['password'];
	$sql = "SELECT * FROM tb_admin  WHERE username='$username' AND password='$password'";
	$pilih = mysqli_query($koneksi,$sql);
// index email, password, dan status dari table user_employer);
	$row   = mysqli_num_rows($pilih);
	$sel   = mysqli_fetch_array($pilih);

	$sqls = "SELECT * FROM tb_pengguna  WHERE username='$username' AND password='$password'";
	$pilihh = mysqli_query($koneksi,$sqls);
// index email, password, dan status dari table user_employer);
	$rows   = mysqli_num_rows($pilihh);
	$sels   = mysqli_fetch_array($pilihh);
	if ($row == 1) {
		session_start();
		$_SESSION['username'] =$sel['username'];
		$_SESSION['password'] =$sel['password'];
		$_SESSION['nama'] =$sel['nama'];
		$_SESSION['status'] =$sel['status'];
		header('location: index.php?');
	}  else if ($rows == 1) {
		session_start();
		$_SESSION['username'] =$sels['username'];
		$_SESSION['password'] =$sels['password'];
		$_SESSION['nama'] =$sels['nama'];
		$_SESSION['status'] =$sels['status'];
		$_SESSION['saldo'] = $sels['saldo'];
		header('location: index.php?');
	}

	else {
   		echo"<script>alert('Username atau Password Anda Salah Atau Belum Terdaftar Di Database Kami Silahkan Ingat-Ingat Kembali !',document.location.href='login.php')</script>";
	}


?>