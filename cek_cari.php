<?php
include "koneksi.php";
?>

<table>
	<tr>
	<th>Nama Pakaian</th>
	<th>Stock</th>
	<th>Bahan</th>
	<th>Harga</th>
	<th>Ukuran</th>
	<th>Gambar</th>
	<th>Nama Penjual</th>
	</tr>
	<tr>
	<?php
		$bahe  = $_GET['nama_bahan'];
		$nyari = "SELECT tb_pakaian.kode_pakaian, tb_pakaian.bahan, tb_pakaian.nama_bahan,tb_pakaian.ukuran, tb_pakaian.stok, tb_pakaian.gambar, tb_pakaian.harga, tb_pengguna.nama, tb_jenis_pakaian.jenis from tb_pakaian join tb_pengguna on tb_pakaian.id_pengguna=tb_pengguna.id_pengguna join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis where tb_pakaian.nama_bahan like '%".$bahe. "%'";
          
          $kiri = mysqli_query($koneksi,$nyari);

          while ($myucel = mysqli_fetch_assoc($kiri)){
            $kodep = $myucel['kode_pakaian'];
            $namap = $myucel['nama_bahan'];
            $stop = $myucel['stok'];
            $bah = $myucel['bahan'];
            $gam = $myucel['gambar'];
            $har = $myucel['harga'];
            $uks = $myucel['ukuran'];
            $namae = $myucel['nama'];
         ?>
		<td><a href="lihat_baju.php?kode_pakaian=<?php echo $kodep; ?>" style="text-decoration: none;"><?php echo $namap; ?></a></td>
		<td><?php echo $stop; ?></td>
		<td><?php echo $bah; ?></td>
		<td>Rp.<?php echo number_format($har,0,',','.'); ?></td>
		<td><?php echo $uks; ?></td>
		<td><?php echo "<img src='gambar/$gam' width='100px' height='100px'>"; ?></td>
		<td><?php echo $namae; ?></td>
	</tr>
	<?php }  ?>
</table>

