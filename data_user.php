<!DOCTYPE html>
<?php include "koneksi.php";// error_reporting(0); ?>
<html>
<head>
	<title>Data Pengguna</title>
</head>
<body>

<div class="header">
  <?php include "slideshow.php";?>
</div>
<?php include "menu.php"; ?>
<?php
	if($_SESSION['status'] == "Pengguna"  or !isset($_SESSION['username'])){
		echo "<script>alert('Maaf Anda Bukan Admin',document.location.href='index.php')</script>";
	}

	if(isset($_POST['delete'])){

    $hape = $_POST['hapuss'];
    if($hape == "pilih"){
       echo"<script>alert('Pilih Nama Terlebih Dahulu !',document.location.href='data_user.php')</script>";
    }else{


  
    $yakin = "DELETE FROM tb_pengguna where username = '$hape'";
    $yakinga = mysqli_query($koneksi,$yakin) or die (mysqli_error($koneksi));

    if($yakinga){
      echo"<script>alert('Hapus Akun User Berhasil !',document.location.href='data_user.php')</script>";
    }else{
      echo"<script>alert('Hapus Akun User Gagal !',document.location.href='data_user.php')</script>";
    }


    }

}


?>
<div class="row">
  <div class="leftcolumns">
  	<div class="cardss">
  	<h1 class="ho">Data Pengguna</h1>
  	<form action="" method="post">
	<select name="hapuss" class="select2">
  	<option value="pilih">Pilih Nama Akun</option>
  	<?php
  	$hap = "SELECT * FROM tb_pengguna order by nama asc";
  	$haps = mysqli_query($koneksi,$hap);
  	while ($hapss = mysqli_fetch_assoc($haps))
  	{
  	$namas  = $hapss['nama'];
    $havuse = $hapss['username'];
    echo "<option value='$havuse'>$namas</option>";
  	}
  	?>
  </select>
  <a>
  <button type="submit" name="delete" class="submit2">DELETE</button>
  </form>
  <br>
  <br>
  	<table class="table9" >
  		<tr>
  		<th>Username</th>
  		<th width="100">Nama</th>
  		<th>Jenis Kelamin</th>
  		<th>Tanggal Lahir</th>
  		<th>Email</th>
  		<th>Alamat</th>
  		<th>NO HP</th>
  		<th>Kode Pos</th>
  		<th>Status</th>
  	</tr>
  	<tr>
  		<?php
  			$fungsi = "SELECT * FROM tb_pengguna order by nama asc";
  			$exce   = mysqli_query($koneksi,$fungsi);
  			while ($kerad = mysqli_fetch_assoc($exce)){
  				$us   = $kerad['username'];
  				$na   = $kerad['nama'];
  				$je   = $kerad['jk'];
  				$ta   = $kerad['tgl_lahir'];
  				$em   = $kerad['email'];
  				$al   = $kerad['alamat'];
  				$no   = $kerad['no_hp'];
  				$ko   = $kerad['kode_pos'];
  				$sta  = $kerad['status'];
  			
  		?>
  		<tr>
  			<td><?php echo $us; ?></td>
  			<td><?php echo $na; ?></td>
  			<td><?php echo $je; ?></td>
  			<td><?php echo $ta; ?></td>
  			<td><?php echo $em; ?></td>
  			<td><?php echo $al; ?></td>
  			<td><?php echo $no; ?></td>
  			<td><?php echo $ko; ?></td>
  			<td><?php echo $sta; ?></td>
  		</tr>
  	<?php } ?>
  	</table>
  	<br>
  	<br>	
  	<form name="ceks" action="cetak_data_user2.php" method="post" target="_blank">
  	<input type="submit" name="cetakan" value="CETAK DATA">
  	</form>
  </div>
</div>
</div>
</body>
</html>