<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
      <title>Print Data Saldo</title>
</head>
<body>
<center>
<h1 class="ho">Data Saldo</h1>
      <table>
            <tr>
                  <th>No</th>
                  <th>Kode Saldo</th>
                  <th>Jumlah</th>
            </tr>
            <?php
            $no=1;
                  $salm = "SELECT * FROM tb_saldo order by id_saldo";
                  $sae  = mysqli_query($koneksi,$salm);
                  while ($unlimited = mysqli_fetch_assoc($sae)){
                        $kos = $unlimited['kode_saldo'];
                        $jus = $unlimited['jumlah'];

            ?>
            <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kos; ?></td>
                  <td>Rp. <?php echo number_format($jus,0,',','.'); ?></td>
            </tr>
      <?php $no++; }  ?>
      </table>
</center>
<script>
      window.print();
</script>
</body>
</html>