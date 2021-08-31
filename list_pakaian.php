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
  	<div class="card">
  		<h1 class="ho">Jenis Pakaian</h1>
  		<?php
  			$no=1;
  			$muk  = "SELECT jenis FROM tb_jenis_pakaian order by jenis asc";
  			$mik  = mysqli_query($koneksi,$muk);
  			while ($test = mysqli_fetch_assoc($mik)){
  				$jeniss = $test['jenis'];
  			
  		?>
  		<p><?php echo $no; ?>&nbsp;<a href="lihat_list_pakaian.php?jenis=<?php echo $jeniss; ?>" style="text-decoration: none; font-size: 20px;"><?php echo $jeniss; ?></a><p>
  		  	<?php  $no++;} ?>
  	</div>
  </div>
</div>
</body>
</html>