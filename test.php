<script src="jquery.js"></script>
<?php
	include "koneksi.php";
?>
<?php
	$nyaldo = "SELECT kode_saldo,jumlah FROM tb_saldo";
	$ulik   = mysqli_query($koneksi,$nyaldo) or die(mysqli_error($koneksi));
	$tampil  = mysqli_fetch_row($ulik);
	
?>
<form name="isi_saldo" action="" method="post">
<label for="saldo">Masukkan Kode Pembayaran</label><br>
<input type="text" name="isi" id="sald" class="text2" required>
<br>
<br>
<p> Isi Saldo : <input type="text" name="saldos" id="sale" class="text2" size="30" readonly></p>
<br>
<br>
<input type="submit" name="proses_isi" value="PROSES" class="button2">
<button type="submit" name="batal" onclick="myFunction()" class="button3">BATAL</button>>
</form>

<script type="text/javascript">
	$("#sald").keyup(function(){

	var isie = $("#sald").val();
	var isit = "<?php echo $sas ?>";
	var isia = "<?php echo $juma ?>";

	if( isie == isit )
	$("#sale").val(isia);

	
	});
</script>
