<!DOCTYPE html>
<?php include "koneksi.php"; error_reporting(0); ?>
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
    
     <?php
          function rupiah($angka)
          {
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
          }

          $namass = $_SESSION['username'];
          $nadeshiko = "SELECT tb_pakaian.kode_pakaian, tb_pakaian.bahan, tb_pakaian.nama_bahan,tb_pakaian.ukuran, tb_pakaian.stok, tb_pakaian.gambar, tb_pakaian.harga, tb_pengguna.nama from tb_pakaian join tb_pengguna on tb_pakaian.id_pengguna=tb_pengguna.id_pengguna where tb_pakaian.id_pengguna NOT IN ( select tb_pengguna.id_pengguna from tb_pengguna where tb_pengguna.username='$namass') order by tb_pakaian.kode_pakaian desc";
          $kirigiri = mysqli_query($koneksi,$nadeshiko);

          while ($myucel = mysqli_fetch_assoc($kirigiri)){
            $kodep = $myucel['kode_pakaian'];
            $namap = $myucel['nama_bahan'];
            $stop = $myucel['stok'];
            $bah = $myucel['bahan'];
            $gam = $myucel['gambar'];
            $har = $myucel['harga'];
            $uks = $myucel['ukuran'];
            $namae = $myucel['nama'];
            $test = mysqli_num_rows($kirigiri);
        
          ?>
          
          <div class="column">
            <a href="lihat_baju.php?kode_pakaian=<?php echo $kodep; ?>">
        <?php echo "<img src='gambar/$gam' class='imge'/>"; ?>
        <div class="content"> 
          <a style="text-transform: capitalize;"><?php echo "$namap"; ?> (<?php echo "$uks" ;?>)</a>
          <br>
          <hr>
          <a style="color:red;"><?php echo rupiah("$har"); ?></a>
        </div>
      </a>
    </div>
      
      

    <?php } ?>


  </div>
  <div class="rightcolumn">
    <div class="card">
      <h3>Pakaian Murah Saat Ini</h3>
      <?php
        $kurs  = "SELECT * FROM tb_pakaian order by harga asc limit 3";
        $kursed = mysqli_query($koneksi,$kurs);
        while ($uls = mysqli_fetch_assoc($kursed)){
            $id_pakaian = $uls['kode_pakaian'];
            $nama_pakai = $uls['nama_bahan'];
            $harge      = $uls['harga'];
            $bar        = $uls['gambar'];
      ?>
      <input type="hidden" value="<?php echo $id_pakaian; ?>" >
      <div class="fakeimg2" style="height: 100px;"><?php echo "<img src='gambar/$bar' width='50px'"; ?>
        <p style="float: left; text-transform: capitalize;" ><a href="lihat_baju.php?kode_pakaian=<?php echo $id_pakaian; ?>" style="text-decoration: none"><?php echo $nama_pakai; ?></a></p>
      </div>
      <?php } ?>
    </div>
    <div class="card">
      <h2>The Creator</h2>
          <p>- 10116172 - Adrian Syahputra A</p>
          <P>- 10116153 - Andika Bratadirja S</P>
          <p>- 10116163 - Anastasia Tania J</p>
          <p>- 10116184 - Ferian Ezra L</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2><br></h2>
</div>

</body>
</html>
