<?php include "koneksi.php" ?>
<?php
session_start();
$used = $_SESSION['username'];
$nama_bahan = $_GET['nama_bahan'];

$sql="SELECT tb_pakaian.kode_pakaian, tb_pakaian.nama_bahan, tb_pakaian.ukuran, tb_pakaian.harga, tb_pakaian.stok, tb_pakaian.kondisi, tb_pakaian.merk  FROM tb_pakaian join tb_pengguna on tb_pengguna.id_pengguna= tb_pakaian.id_pengguna WHERE tb_pakaian.nama_bahan = '$nama_bahan'";
$result = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
while($row = mysqli_fetch_array($result)) {
    $kodee = $row['kode_pakaian'];
    $namae = $row['nama_bahan'];
    $ukure = $row['ukuran'];
    $hargae = $row['harga'];
    $stoke = $row['stok'];
    $kondisie = $row['kondisi'];
    $merke = $row['merk'];

?>
   <form action="proses_edit.php?kode_pakaian=<?php echo $kodee; ?>" method="post" enctype="multipart/form-data">
      <table  class="table3">
        <tr>
          <td>
            Nama Pakaian
            <br>
            <input type="hidden" name="koded" value="<?php echo $kodee; ?>">
            <input type="text" name="bahand" class="text2" value="<?php echo $namae; ?>" >
          </td>
          <td>
            Ukuran
            <br>
            <input type="text" name="ukurad" class="text2" value="<?php echo $ukure; ?>">
          </td>
          <td>
            Harga
            <br>
            <input type="text" name="hargak" class="text2" value="<?php echo $hargae; ?>">
          </td>
          </tr>
          <tr>
          <td>
            Stock
            <br>
            <input type="text" name="stokd" class="text2" value="<?php echo $stoke; ?>">
          </td>
          <td>
            Kondisi
            <br>
            <select name="kondisi" class="select4">
            <option value ="Baru" <?php  $kondisie == 'Baru' ? print "selected" : ""; ?>>Baru</option>
            <option value="Bekas" <?php  $kondisie == 'Bekas' ? print "selected" : ""; ?>>Bekas</option>
  </select>
          </td>
          <td>
            Merk
            <br>
            <input type="text" name="merkd" class="text2" value="<?php echo $merke; ?>">
          </td>
          </tr>
          <tr>
            <td>
               <input type="submit" name="simpen" value="SIMPAN">
                <button type="button" value="BATAL" onclick="myFunction()" class="button3">BATAL</button>
            </td>
          </tr>
      </table>
      </form>


   
<?php } ?>


