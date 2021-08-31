<script src="jquery.js"></script>
<?php include "koneksi.php"; ?>
<?php 
$kos = $_GET['kode_pakaian'];
$ses = $_SESSION['username'];
$pem = $_SESSION['nama'];
$sale = $_SESSION['saldo'];

	$tru = "SELECT saldo from tb_pengguna where username = '$ses'";
	$olah = mysqli_query($koneksi,$tru);
	$nya = mysqli_fetch_assoc($olah);
	$nye = $nya['saldo'];

	$myu = "SELECT tb_pakaian.kode_pakaian, tb_pakaian.nama_bahan, tb_pakaian.harga, tb_pakaian.stok from tb_pakaian join tb_pengguna on tb_pakaian.id_pengguna=tb_pengguna.id_pengguna where tb_pakaian.kode_pakaian = '$kos'";
	$myuc = mysqli_query($koneksi,$myu) or die (mysqli_error($koneksi));
	while ($ryuk = mysqli_fetch_assoc($myuc)){
		$koder = $ryuk['kode_pakaian'];
		$nabah = $ryuk['nama_bahan'];
		$harse = $ryuk['harga'];
		$stik  = $ryuk['stok'];
	} 
?>
	<h2 class="ho">Beli Pakaian ini</h2>
	<form method="post" action="proses_pembelian.php?kode_pakaian=<?php echo $koder; ?>">
	<table>
	<tr>
	<td><label for="namaks">Nama Pakaian</label> </td><td><label> <?php echo $nabah; ?></label></td>
  	</tr>
  	<tr>
  	<td><label for="harge">Harga</label></td><td><label style="color: red;"><?php echo rupiah("$harse"); ?></label></td>
  	</tr>
  	<input type="hidden" name="harae" id="hark" value="<?php echo $harse; ?>">
  	<tr>
  	<td><label for="pembeli">Pembeli</label></td><td><label><b><?php echo $pem; ?></b></label></td>
  	</tr>
  	<tr>
  	<td><label for="saldo">Saldo Saat Ini</label></td><td><label><b><?php echo rupiah("$nye"); ?></b></label></td>
  	</tr>
  	<tr>
  	<td><label for="put">Jumlah Beli</label></td><td><label><input type="number" name="jums" class="text2" id="jes" required></label></td>
  	</tr>
  	<td><label for="tol">Total Harga</label></td><td><label for="totali"><input type="text"  class= "text2" name="total" id="totale" readonly=""></a></label></td>
  	<tr>
  	<td><input type="submit" name="proses" class="button2" value="PROSES"></td><td><button type="button" onclick="myFunction()" name="back" class="button3">BATAL</button></td>
  	</tr>
  </table>

</form>
	<script type="text/javascript">
	$("#jes").keyup(function(){
	total = $("#jes").val()* $("#hark").val();
	$("#totale").val(total);
	});
	</script>
