<!DOCTYPE html>
<?php include "koneksi.php";// error_reporting(0); ?>
<html>
<head>
	<title>Pembelian</title>
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



<div class="row">
  <div class="leftcolumnss">
  	<div class="cards">
  		<?php
  		$kodes = $_GET['kode_pakaian'];
      if(!isset($kodes)){
        die ("Kode Pakaian Tidak Di Temukan");
      }
      function rupiah($angka)
          {
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
          }

  		if (!isset($kodes)){
  			echo "Nama Pakaian Tidak Ditemukan";
  		}else{

  		}
  		$kud = "SELECT  tb_pakaian.kode_pakaian, tb_pakaian.nama_bahan, tb_pakaian.bahan, tb_pakaian.ukuran, tb_pakaian.kondisi, tb_pakaian.harga, tb_pakaian.stok, tb_pakaian.tanggal, tb_pakaian.gambar, tb_pakaian.merk, tb_pakaian.deskripsi, tb_jenis_pakaian.jenis, tb_pengguna.nama FROM tb_pakaian join tb_jenis_pakaian on tb_pakaian.kode_jenis=tb_jenis_pakaian.kode_jenis join tb_pengguna on tb_pengguna.id_pengguna=tb_pakaian.id_pengguna where tb_pakaian.kode_pakaian = '$kodes'";
  		$myt = mysqli_query($koneksi,$kud);
  		while ($ulang = mysqli_fetch_assoc($myt)){
  			$kod 	= $ulang['kode_pakaian'];
  			$nam 	= $ulang['nama_bahan'];
  			$bahs = $ulang['bahan'];
  			$uku 	= $ulang['ukuran'];
  			$kons = $ulang['kondisi'];
  			$hars = $ulang['harga'];
  			$sto 	= $ulang['stok'];
  			$tan 	= $ulang['tanggal'];
  			$game = $ulang['gambar'];
  			$mers = $ulang['merk'];
  			$des 	= $ulang['deskripsi'];
  			$jen 	= $ulang['jenis'];
  			$nem 	= $ulang['nama'];
  		}
  		?>
      <h2><?php echo "$nam"; ?></h2>
      <div style="float: left;"><?php echo "<img src='gambar/$game' width='300px' height='400px'>";?></div>
      <div class="column3">
      <table border="0" class="table8">
            <tr>
            <td width="300px">Bahan : <?php echo "$bahs";?></td>
            <td>Tanggal : <?php echo "$tan"; ?></td>
            </tr>
            <tr>
            <td>Ukuran : <?php echo "$uku"; ?></td>
            <td>Merk : <?php echo "$mers"; ?></td>
            </tr>
            <tr>
            <td>Kondisi : <?php echo "$kons"; ?></td>
            <td>Jenis : <?php echo "$jen"; ?></td>
            </tr>
            <tr>
            <td>Stock : <?php echo "$sto"; ?></td>
            <td>Penjual : <?php echo "$nem"; ?></td>
            </tr>
            <tr>
            <td style="color: red;" colspan="2"><b>Harga : <?php echo rupiah("$hars"); ?></td>
            </tr>
            <tr>
              <td>
                Deskripsi Pakaian : 
              </td>
            </tr>
            <tr>
             <td style="word-wrap: break-word; max-width: 377px;" colspan="2"><?php echo "$des"; ?></td>
            </tr>
            <tr>
            <td><button type="submit" onclick="myFunction()" name="beli" class="button2">BELI</button>
                <input type="button" name="back" class="button3" onclick="window.location.href='index.php'" value="KEMBALI"> </td>
            </tr>
      </table>
      <div id="myP" style="visibility: hidden;">
        <?php 
        if(!isset($_SESSION['username'])){
          echo "login dulu baru beli...";
        }else if($_SESSION['status'] == "admin"){
          echo "Khusus Pembeli";
        }else{

        ?>
        <?php include"pembelian_baju.php"; ?>
      </div>
    <?php } ?>
      </div>
	</div>
  </div>
</div>
</body>
</html>
