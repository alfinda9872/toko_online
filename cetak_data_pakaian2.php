<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Data Pakaian</title>
  <link rel="stylesheet" type="text/css" href="tampilan.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<center>
<h1 class="ho">Data Pakaian</h1>
<table border="0">
    <tr>
    <th>Gambar</th>
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
  $queen = "SELECT tb_pakaian.kode_pakaian, tb_pakaian.nama_bahan , tb_pakaian.bahan, tb_pakaian.ukuran, tb_pakaian.harga, tb_pakaian.stok, tb_pakaian.kondisi, tb_jenis_pakaian.jenis, tb_pakaian.tanggal, tb_pengguna.nama, tb_pakaian.merk, tb_pakaian.gambar from tb_pakaian join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis join tb_pengguna on tb_pengguna.id_pengguna=tb_pakaian.id_pengguna order by tb_pakaian.kode_pakaian desc";
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
    $gams    = $kerad['gambar'];

    
    
  

  ?>
  <tr>
    <input type="hidden" name="test" value="<?php echo $kodess; ?>">
    <td><?php echo "<img src='gambar/$gams' width='100px' height='100px'"; ?></td>
    <td><?php echo $namas; ?></a></td>
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

</center>
    <script>
        window.print();
    </script>
</body>
</html>