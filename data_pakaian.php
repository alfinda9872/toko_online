<!DOCTYPE html>
<?php include "koneksi.php";// error_reporting(0); ?>
<html>
<head>
	<title>Data Pakaian</title>
</head>
<body>

<div class="header">
  <?php include "slideshow.php";?>
</div>
<?php include "menu.php"; ?>

<?php
	if($_SESSION['status'] == "Pengguna" or !isset($_SESSION['username'])){
		die("Maaf Anda Bukan Admin");
	}
	if(isset($_POST['delete'])){

    $hape = $_POST['hapuss'];
    if($hape == "pilih"){
       echo"<script>alert('Pilih Terlebih Dahulu !',document.location.href='data_pakaian.php')</script>";
    }else{


  
    $namade = $_SESSION['username'];
    $yakin = "DELETE FROM tb_pakaian where nama_bahan = '$hape'";
    $yakinga = mysqli_query($koneksi,$yakin) or die (mysqli_error($koneksi));

    if($yakinga){
      echo"<script>alert('Hapus Berhasil !',document.location.href='data_pakaian.php')</script>";
    }else{
      echo"<script>alert('Hapus Gagal !',document.location.href='data_pakaian.php')</script>";
    }


    }

}
?>


<div class="row">
  <div class="leftcolumns">
  	<div class="cards">
  	<h1 class="ho">Data Pakaian</h1>
  	<form action="" method="post">
	<select name="hapuss" class="select2">
  	<option value="pilih">Pilih Pakaian</option>
  	<?php
  	$hap = "SELECT nama_bahan from tb_pakaian order by nama_bahan asc";
  	$haps = mysqli_query($koneksi,$hap);
  	while ($hapss = mysqli_fetch_assoc($haps))
  	{
    $hapuse = $hapss['nama_bahan'];
    echo "<option value='$hapuse'>$hapuse</option>";
  	}
  	?>
  </select>
  <a>
  <button type="submit" name="delete" class="submit2">DELETE</button>
  </form>
  <br>
  <br>
  		<table border="0" class="table2">
    <tr>
    <th>Nama</th>
    <th>Bahan</th>
    <th>Ukuran</th>
    <th>Harga</th>
    <th>Stock</th>
    <th>Kondisi</th>
    <th>Jenis</th>
    <th>Merk</th>
    <th>Tanggal Jual</th>
    <th>Penjual</th>
  </tr>
  <?php
  $queen = "SELECT tb_pakaian.kode_pakaian, tb_pakaian.nama_bahan , tb_pakaian.bahan, tb_pakaian.ukuran, tb_pakaian.harga, tb_pakaian.stok, tb_pakaian.kondisi, tb_jenis_pakaian.jenis, tb_pakaian.tanggal, tb_pengguna.nama, tb_pakaian.merk from tb_pakaian join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis join tb_pengguna on tb_pengguna.id_pengguna=tb_pakaian.id_pengguna order by tb_pakaian.kode_pakaian desc";
  $sarah = mysqli_query($koneksi,$queen);
  while ($kerad = mysqli_fetch_assoc($sarah)){
    $kodess = $kerad['kode_pakaian'];
    $namas = $kerad['nama_bahan'];
    $bahans = $kerad['bahan'];
    $ukuranss = $kerad['ukuran'];
    $hargass = $kerad['harga'];
    $stockss = $kerad['stok'];
    $kondisis = $kerad['kondisi'];
    $jeniss = $kerad['jenis'];
    $merkss = $kerad['merk'];
    $tanggals = $kerad['tanggal'];
    $namacuk = $kerad['nama'];

    
    
  

  ?>
  <tr>
    <input type="hidden" name="test" value="<?php echo $kodess; ?>">
    <td><a href="lihat_baju.php?kode_pakaian=<?php echo $kodess; ?>" style="text-decoration: none;"><?php echo $namas; ?></a></td>
    <td><?php echo $bahans; ?></td>
    <td><?php echo $ukuranss; ?></td>
    <td>Rp. <?php echo number_format($hargass,0,',','.'); ?></td>
    <td><?php echo $stockss; ?></td>
    <td><?php echo $kondisis; ?></td>
    <td><?php echo $jeniss; ?></td>
    <td><?php echo $merkss; ?></td>
    <td><?php echo $tanggals; ?></td>
    <td><?php echo $namacuk; ?></td>

    
    
  </tr>
  <?php } ?>
  </table>
  <br>
  <br>
  <form name="cets" action="cetak_data_pakaian2.php" method="post" target="_blank">
  	<input type="submit" name="cetake" value="CETAK">
  </form>
  	</div>
  </div>
</div>
</body>
</html>