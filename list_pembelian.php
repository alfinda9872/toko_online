<!DOCTYPE html>
<?php include "koneksi.php";// error_reporting(0); ?>
<html>
<head>
	<title>Sistem Toko Pakaian Online Atoel</title>
</head>
<body>

<div class="header">
  <?php include "slideshow.php";?>
</div>

<?php include "menu.php"; ?>



<div class="row">
  <div class="leftcolumn">
  	<div class="cardss">
	<h1 class="ho2">List Pembelian Anda</h1>
  	<table border="1" class="table6">
  		<tr>
  		<th>No</th>
  		<th>Nama Pakaian</th>
  		<th>Bahan</th>
  		<th>Ukuran</th>
  		<th>Kondisi</th>
  		<th>Jenis</th>
  		<th>Merk</th>
  		<th>Pembeli</th>
  		<th>Jumlah Beli</th>
  		<th>Harga</th>
  		<th>Total Harga</th>
  		<th>Tanggal Beli</th>
  		</tr>
  		<tr>
  		<?php
  		function rupiah($angka)
          {
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
          }
  		$no = 1;
  		$ser   = $_SESSION['username'];
  		$nae   = $_SESSION['nama'];
  		$kyuns  = "SELECT tb_pembelian.kode_pembelian, tb_pakaian.nama_bahan, tb_pakaian.bahan, tb_pakaian.ukuran, tb_pakaian.kondisi, tb_jenis_pakaian.jenis, tb_pakaian.merk, tb_pengguna.nama, tb_pembelian.jumlah, tb_pakaian.harga, tb_pembelian.total_harga, tb_pembelian.tgl_beli FROM tb_pakaian join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis join tb_pembelian on tb_pakaian.kode_pakaian=tb_pembelian.kode_pakaian join tb_pengguna on tb_pakaian.id_pengguna=tb_pengguna.id_pengguna where tb_pembelian.id_pengguna in (select tb_pengguna.id_pengguna from tb_pengguna where tb_pengguna.username = '$ser') order by tb_pembelian.kode_pembelian desc"; 
  		
  		$my = mysqli_query($koneksi,$kyuns);
  		while ($mys = mysqli_fetch_assoc($my)){
  			$koi = $mys['kode_pembelian'];
  			$nai = $mys['nama_bahan'];
  			$bai = $mys['bahan'];
  			$uki = $mys['ukuran'];
  			$kon = $mys['kondisi'];
  			$jei = $mys['jenis'];
  			$mei = $mys['merk'];
  			$pem = $mys['nama'];
  			$jum = $mys['jumlah'];
  			$har = $mys['harga'];
  			$toi = $mys['total_harga'];
  			$tgl = $mys['tgl_beli'];

  		?>
  		<tr>
  			<td><?php echo $no; ?></td>
  			<td><?php echo $nai; ?></td>
  			<td><?php echo $bai; ?></td>
  			<td><?php echo $uki; ?></td>
  			<td><?php echo $kon; ?></td>
  			<td><?php echo $jei; ?></td>
  			<td><?php echo $mei; ?></td>
  			<td><?php echo $nae; ?></td>
  			<td><?php echo $jum; ?></td>
  			<td><?php echo rupiah("$har"); ?></td>
  			<td><?php echo rupiah("$toi"); ?></td>
  			<td><?php echo $tgl; ?></td>
  		</tr>
  	<?php $no ++ ; } ?>
  	</table>
  	<br>
  	<form name="cetak" action="cetak_list_pembelian2.php?username=<?php echo $ser ?>" method="post" target="_blank">
  	<input type="hidden" name="namas" value="<?php echo $nae ;?>">;
  	<input type="submit" name="cetaks" value="CETAK">
  	</form>
  	</div>

  </div>
</div>
</body>
</html>