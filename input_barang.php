<!DOCTYPE html>
<?php include "koneksi.php"; ?>
<html>
<head>
  <title>Sistem Toko Pakaian Online Atoel</title>
</head>
<script>
function myFunction() {
    var x = document.getElementById('myP');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
</script>

<body>
<div class="header">
  <?php include "slideshow.php";?>
</div>
  <?php include "menu.php"; ?>

<?php
    $userss = $_SESSION['status'];
    if($userss == "admin" or !isset($_SESSION['username'])){
      die ("Harap Masuk Sebagai Pengguna");
    }
if (isset($_POST['masuk'])){

    $namass = $_SESSION['username'];

    $namasa   = $_POST['nama_bahan'];
    $bahans   = $_POST['bahan'];
    $ukurs    = $_POST['ukur'];
    $hargas   = $_POST['harga'];
    $stocking = $_POST['stock'];
    $kons     = $_POST['kondisi'];
    $jeni     = $_POST['jenis'];
    $mer      = $_POST['merk'];
    $desi     = $_POST['desk'];
    $filename =$_FILES['gambar']['name'];
    $filesize = $_FILES['gambar']['size'];
    $explode  = explode('.',$filename);
    $extensi  = $explode[count($explode)-1];
    $move=move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar/'.$filename);

    if ($filesize == 0){
       echo "<script>alert('Masukkan Gambar Terlebih Dahulu',document.location.href='olah_admin.php')</script>";
    }
    else{



    $querys = "INSERT INTO tb_pakaian values (null,(select kode_jenis from tb_jenis_pakaian where jenis='$jeni'),(select id_pengguna from tb_pengguna where username='$namass'),'$namasa','$bahans','$ukurs','$kons','$hargas','$stocking',now(),'$filename','$mer','$desi')";
    $exe = mysqli_query($koneksi,$querys) or die (mysqli_error($koneksi));

    $querys2 = "INSERT INTO tb_jenis_memiliki_merk values (null,(select id_pengguna from tb_pengguna where username='$namass'),'$namasa',(select kode_jenis from tb_jenis_pakaian where jenis='$jeni'),'$mer')";
    $exet = mysqli_query($koneksi,$querys2) or die(mysqli_error($koneksi));
    
    if($exe){
      echo"<script>alert('Penjualan Berhasil, Silahkan Cek List Penjualan !',document.location.href='input_barang.php')</script>";
    }else{
       echo"<script>alert('Penjualan Gagal, Data Penjualan Terjadi Kesalahan !',document.location.href='input_barang.php')</script>";
    }
  }

}



?>


<div class="row">
  <div class="leftcolumns">
    <div class="cards">
      <div class="column2">

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
  </tr>
  <?php
  $nama = $_SESSION['nama'];
  $queen = "SELECT tb_pakaian.kode_pakaian, tb_pakaian.nama_bahan , tb_pakaian.bahan, tb_pakaian.ukuran, tb_pakaian.harga, tb_pakaian.stok, tb_pakaian.kondisi, tb_jenis_pakaian.jenis, tb_pakaian.tanggal, tb_pengguna.nama, tb_pakaian.merk from tb_pakaian join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis join tb_pengguna on tb_pengguna.id_pengguna=tb_pakaian.id_pengguna where tb_pengguna.nama= '$nama'";
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
    <td><?php echo $namas; ?></td>
    <td><?php echo $bahans; ?></td>
    <td><?php echo $ukuranss; ?></td>
    <td><?php echo $hargass; ?></td>
    <td><?php echo $stockss; ?></td>
    <td><?php echo $kondisis; ?></td>
    <td><?php echo $jeniss; ?></td>
    <td><?php echo $merkss; ?></td>
    <td><?php echo $tanggals; ?></td>

    
    
  </tr>
  <?php } ?> 
  </table>
  <br>

<button type="submit" onclick="myFunction()" name="buka" class="button3">EDIT</button>
<div id="myP" style="visibility: hidden;">
      
      <?php include "edit.php" ; ?>
</div>

</div>



  <form action="" method="post" enctype="multipart/form-data">
  <h2 class="ho">Input Pakaian Yang Di Jual</h2>
  <label for="namaks">Nama Pakaian</label>
  <br>
  <input type="text" id="namaks" name="nama_bahan" class="texts" required>
   <br>
  <label for="bahans">Bahan</label>
  <br>
  <input type="text" id="bahans" name="bahan" class="texts" required>
   <br>
  <label for="ukurans">Ukuran</label>
  <br>
  <input type="text" id="ukurans" name="ukur" class="texts" required>
   <br>
   <br>
  <label for="hargaks">Harga</label>
  <br>
  <input type="text" id="hargaks" name="harga" class="texts" required>
   <br>
   <br>
  <label for="stocks">Stock</label>
  <br>
  <input type="text" id="stocks" name="stock" class="texts" required>
   <br>
  <label for="as">Kondisi</label>
  <br>
  <select name="kondisi" class="select3">
    <option value="Baru">Baru</option>
    <option value="Bekas">Bekas</option>
  </select>
  <br>
  <label for="jenis">Jenis Pakaian</label>
  <br>
  <select name="jenis" class="select3">
   <?php
    $quer = "SELECT * FROM tb_jenis_pakaian order by jenis asc";
    $ceks = mysqli_query($koneksi,$quer);
    while ($ulang = mysqli_fetch_array($ceks)){
      $kodeks = $ulang['kode_pakaian'];
      $jen = $ulang['jenis'];
      echo "<option value='$jen'>$jen</option>";
    }
   ?>
  </select>
  <br>
  <label for="merk">Merk</label>
  <br>
  <input type="text" id="lname" name="merk" class="texts" required>
  <br>
  <br>
  <label for="deski">Deskripsi Produk</label>
  <br>
  <textarea name="desk" required></textarea>
  <br>
  <label for="gambar">Foto Pakaian</label>
  <br>
  <input type="file" id="file" name="gambar" required>
  <br>
  <input type="submit" name="masuk" value="JUAL">
  <input type="reset" name="reset" value="RESET">


</form>
</div>
</div>
</div>
</body>
</html>
