<?php include "koneksi.php" ?>
<?php
session_start();
$uss = $_SESSION['username'];
$kode_saldo = $_GET['kode_saldo'];

$sql="SELECT kode_saldo,jumlah FROM tb_saldo where kode_saldo='$kode_saldo'";
$ssl = mysqli_query($koneksi,$sql);
while ($row = mysqli_fetch_assoc($ssl)){
  $kodess = $row['kode_saldo'];
  $jumo   = $row['jumlah'];


?>
<form name="isik" action="cek_isi_saldo.php?username=<?php echo $uss ?>" method="post">
   <input type="hidden" name="kose" value="<?php echo $kodess; ?>">
   <br>
   Jumlah Saldo
   <br>
  Rp.<input type="text" class="text2" name="nyaldo" value="<?php echo $jumo ?>" readonly>
  <br>
  <br>
  <input type="submit" name="proses" value="PROSES" class="button4">
  <input type="reset" name="reset" value="reset" class="button3">
</form>
   
<?php } ?>


