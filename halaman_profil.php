<!DOCTYPE html>
<?php include "koneksi.php";// error_reporting(0); ?>
<html>
<head>
	<title>Sistem Toko Pakaian Online Atoel</title>
</head>
<body>
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
<div class="header">
  <?php include "slideshow.php";?>
</div>

<?php include "menu.php"; ?>
<div class="row">
  <div class="leftcolumn">
  	<div class="card">
  		<?php
  		function rupiah($angka)
          {
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
          }

  		$usere = $_SESSION['username'];
  		if (!isset($_SESSION['username'])){
  			echo"<script>alert('Login Terlebih Dahulu!',document.location.href='login.php')</script>";
  		}

  		$akuns  = "SELECT * from tb_pengguna where username='$usere'";
  		$akuns2 = mysqli_query($koneksi,$akuns);
  		while ($p = mysqli_fetch_assoc($akuns2)){
  			$na  = $p['nama'];
  			$pa  = $p['password'];
  			$je  = $p['jk'];
  			$tg  = $p['tgl_lahir'];
  			$em  = $p['email'];
  			$al  = $p['alamat'];
  			$no  = $p['no_hp'];
  			$ko  = $p['kode_pos'];
  			$sa  = $p['saldo'];
  		}

  		if(isset($_POST['ganti'])){
  			$n    = $_POST['namae'];
  			$ps   = $_POST['passe'];
  			$jeke = $_POST['kelamin'];
  			$tl   = $_POST['tanggals'];
  			$ema  = $_POST['emails'];
  			$al   = $_POST['alamats'];
  			$ro   = $_POST['nos'];
  			$kod  = $_POST['kos'];

  			if(is_numeric($n) or is_numeric($al)){ 
  				echo "<script>alert('Nama atau Alamat Anda Tidak Boleh Berisi Angka !',document.location.href='halaman_profil.php')</script>";
  			}else if(is_numeric($ro) && is_numeric($kod)){

  				$querys = "UPDATE tb_pengguna set nama='$n', password='$ps', jk ='$jeke', tgl_lahir='$tl', email='$ema', alamat='$al', no_hp='$ro', kode_pos='$kod' where username='$usere'";
  				$pulih  = mysqli_query($koneksi,$querys) or die (mysqli_error($koneksi));

  				if($pulih){
  					echo "<script>alert('Profil Anda Berhasil di Ubah',document.location.href='halaman_profil.php')</script>";
  				}else{
  					echo"<script>alert('Profil Anda Gagal Di Ubah !',document.location.href='halaman_profil.php')</script>";
  				}


  			}else{
  				echo "<script>alert('No HP dan Kode Pos Harus Berisi Angka',document.location.href='halaman_profil.php')</script>";
  			}
  		}
  		?>
  		 <h2 class="ho">Profil <a style="text-transform: capitalize;"><?php echo $na ;?></a></h2>
  		<div class="column2"><b><label for="namaks">Saldo</label>&nbsp;:&nbsp;<label for="namaks"><?php echo rupiah($sa); ?></label></b>
  		<br>
  		<br>		
  		<button type="submit" name="nyaldo" onclick="myFunction()" class="button4">ISI SALDO</button>
  		<div id="myP" style="visibility: hidden;">
  			<?php include "validasi_saldo.php"; ?>
  		</div>
  		</div>
  		<form name="akun" method="post" action="">

  		<label for="namaks">Nama</label>
  		<br>
  		<input type="text" id="namaks" name="namae" class="texts" value="<?php echo $na; ?>" required>
   		<br>
   		<label for="namaks">Password</label>
  		<br>
  		<input type="password" id="namaks" name="passe" class="texts" value="<?php echo $pa; ?>" maxlength="8" required>
   		<br>
   		<label for="namaks">Jenis Kelamin</label>
  		<br>
  		<select name="kelamin" class="select2">
  			<option value="L" <?php  $je == 'L' ? print "selected" : ""; ?>>Laki-Laki</option>
  			<option value="P" <?php  $je == 'P' ? print "selected" : ""; ?>>Perempuan</option>
  		</select>
   		<br>
   		<label for="namaks">Tanggal Lahir</label>
  		<br>
  		<input type="date" id="namaks" name="tanggals" class="texts" value="<?php echo $tg; ?>" required>
   		<br>
   		<label for="namaks">Email</label>
  		<br>
  		<input type="email" id="namaks" name="emails" class="texts" value="<?php echo $em; ?>" required>
   		<br>
   		<label for="namaks">Alamat</label>
  		<br>
  		<textarea name="alamats" cols="30" rows="5"><?php echo $al; ?></textarea>
   		<br>
   		<label for="namaks">No.HP</label>
  		<br>
  		<input type="text" id="namaks" name="nos" class="texts" value="<?php echo $no; ?>" maxlength="12" required>
   		<br>
   		<label for="namaks">Kode Pos</label>
  		<br>
  		<input type="text" id="namaks" name="kos" class="texts" value="<?php echo $ko; ?>" required>
   		<br>
   		<br>
   		<input type="submit" name="ganti" value="UBAH">
   		&nbsp;&nbsp;&nbsp;
   		<input type="reset" value="RESET">
   		</form>
  	</div>
  </div>
</div>
</body>
</html>