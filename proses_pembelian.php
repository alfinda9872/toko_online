<?php include "koneksi.php"; ?>

<?php
	session_start();
	if(isset($_POST['proses'])){
		if(!isset($_GET['kode_pakaian'])){
			echo"<script>alert('Kode Pakaian Tidak di Temukan!',document.location.href='lihat_baju.php')</script>";
		}
		else
		{
			$kodex  = $_GET['kode_pakaian'];
			$users  = $_SESSION['username'];
			$jume   = $_POST['jums'];
			$totala = $_POST['total'];
		if($jume == 0 && $totala == 0){
			echo "<script>alert('Maaf Jumlah Pesanan Tidak Boleh 0',document.location.href='lihat_baju.php?kode_pakaian=$kodex')</script>";
		}else{


			$manggil = "SELECT stok from tb_pakaian where kode_pakaian='$kodex'";
			$cute    = mysqli_query($koneksi,$manggil);
			$cute2   = mysqli_fetch_assoc($cute);
			$cute3   = mysqli_num_rows($cute);
			$stoke   = $cute2['stok'];
			$jumsook = $stoke - $jume;

			$manggil2 = "SELECT saldo from tb_pengguna where username='$users'";
			$kute     = mysqli_query($koneksi,$manggil2);
			$kute2    = mysqli_num_rows($kute);
			$kute3    = mysqli_fetch_assoc($kute);
			$sali     = $kute3['saldo'];
			$jumsal   = $sali - $totala;


			if ($jume > $stoke){
				echo"<script>alert('Stock Telah Habis !',document.location.href='lihat_baju.php?kode_pakaian=$kodex')</script>";
			}else if ($totala > $sali){
				echo"<script>alert('Saldo Anda Tidak Cukup, Isi Ulang Terlebih Dahulu !',document.location.href='lihat_baju.php?kode_pakaian=$kodex')</script>";
			}else{


		    $toti   = "UPDATE tb_pengguna set saldo = '$jumsal' where username='$users'";
		    $toti2  = mysqli_query($koneksi,$toti) or die (mysqli_error($koneksi));

			$belit  = "UPDATE tb_pakaian set stok = '$jumsook' where kode_pakaian='$kodex'";
			$belit2 = mysqli_query($koneksi,$belit) or die(mysqli_error($koneksi));	

			$masuk = "INSERT INTO tb_pembelian values(null,'$kodex',(SELECT id_pengguna FROM tb_pengguna where username='$users'),'$jume','$totala',now())";
			$pros = mysqli_query($koneksi,$masuk) or die (mysqli_error($koneksi));

			$masuk2 = "INSERT INTO tb_cek_pembelian values((SELECT id_pengguna from tb_pengguna where username='$users'),'$kodex',now())";
			$pros2  = mysqli_query($koneksi,$masuk2) or die(mysqli_error($koneksi));

			if($pros){
				echo"<script>alert('Pakaian Telah Di Beli, Silahkan Cek List Pembelian !',document.location.href='lihat_baju.php?kode_pakaian=$kodex')</script>";
			}else{
			    echo"<script>alert('Pakaian Gagal Di Beli, Terjadi Kesalahan Data',document.location.href='lihat_baju.php'?kode_pakaian=$kodex)</script>";
			}
		}
	}

	}
}


?>