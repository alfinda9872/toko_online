<?php
	session_start();
	include "koneksi.php";

	if(isset($_POST['simpen'])){
		$userd = $_SESSION['username'];
		$kodepe = $_GET['kode_pakaian'];
		$nama_bah = $_POST['bahand'];
		$ukurat = $_POST['ukurad'];
		$hargat = $_POST['hargak'];
		$stokt = $_POST['stokd'];
		$kondisit = $_POST['kondisi'];
		$merkt = $_POST['merkd'];

		$ubah = "UPDATE tb_pakaian set nama_bahan='$nama_bah', ukuran = '$ukurat', harga = '$hargat' , stok = '$stokt', kondisi = '$kondisit', merk = '$merkt' where kode_pakaian = '$kodepe' ";
		$ubah2 = mysqli_query($koneksi,$ubah) or die (mysqli_error($koneksi));


		if($ubah2){
			echo"<script>alert('Data Berhasil Di Simpan !',document.location.href='input_barang.php')</script>";
		}else{
			echo"<script>alert('Data Gagal Di Simpan !',document.location.href='input_barang.php')</script>";
		}

	}


?>