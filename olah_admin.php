<!DOCTYPE html>
<?php include "koneksi.php";// error_reporting(0); ?>
<html>
<head>
      <title>Data Pengguna</title>
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

function myFunctions() {
    var x = document.getElementById('myPS');
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

<?php
      if($_SESSION['status'] == "Pengguna" or !isset($_SESSION['username']))
      {
            die("Maaf Anda Bukan Admin");
      }

      if(isset($_POST['daftar'])){
            $nama = $_POST['nama'];
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $jenis = $_POST['jenis_kelamin'];
            $tgls = $_POST['tgl'];
            $emails = $_POST['email'];
            $alam = $_POST['alamat'];
            $no = $_POST['no'];
            $kode = $_POST['kode'];
            $filename =$_FILES['gambar']['name'];
            $filesize = $_FILES['gambar']['size'];
            $explode  = explode('.',$filename);
            $extensi  = $explode[count($explode)-1];
            $move=move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar/'.$filename);

            $cek = "SELECT username FROM tb_admin where username='$user'";
            $cek2 = mysqli_query($koneksi,$cek) or die (mysqli_error($koneksi));
            $cek3 = mysqli_num_rows($cek2);

            if($cek3 > 0){
                  echo "<script>alert('Username Telah Terdaftar',document.location.href='olah_admin.php')</script>";
            }else if(is_numeric($alam)){
                  echo "<script>alert('Alamat Tak Boleh Angka',document.location.href='olah_admin.php')</script>";
            }else if($filesize == 0){
                  echo "<script>alert('Masukkan Foto Terlebih Dahulu',document.location.href='olah_admin.php')</script>";
            } else if(is_numeric($no) && is_numeric($kode)){
                  $sql = "INSERT INTO tb_admin values (null,'$user','$pass','$nama','$jenis','$tgls','$emails','$alam','$no','$kode','admin','$filename')";
                  $input = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

                  if($input){
                        echo"<script>alert('Tambah Admin Berhasil, Silahkan Login !',document.location.href='olah_admin.php')</script>";
                   }else{
                        echo"<script>alert('Tambah Admin  Gagal !',document.location.href='olah_admin.php')</script>";
                  }

            }else{
                  echo "<script>alert('No HP dan Kode Pos Tidak Boleh Huruf',document.location.href='olah_admin.php')</script>";
            }

      }

      if(isset($_POST['isi'])){
            $sik = $_POST['kodex'];
            $sak = $_POST['jumx'];
            if ($sik == 0 && $sak == 0){
                  echo "<script>alert('Mohon Kode dan Jumlah Saldo Tidak Boleh = 0',document.location.href='olah_admin.php')</script>";
            }else{

            if(is_numeric($sik) && is_numeric($sak)){

                  $ceko = "SELECT kode_saldo from tb_saldo where kode_saldo ='$sik'";
                  $cekos = mysqli_query($koneksi,$ceko) or die(mysqli_error($koneksi));
                  $ceksa = mysqli_num_rows($cekos);

                  if($ceksa > 0){
                        echo "<script>alert('Kode Saldo Telah Terdaftar, Silahkan Ulangi',document.location.href='olah_admin.php')</script>";
                  }else{
                        $inpo = "INSERT INTO tb_saldo values (null,'$sik','$sak')";
                        $ck   = mysqli_query($koneksi,$inpo) or die (mysqli_error($koneksi));

                        if($ck){
                              echo "<script>alert('Saldo Baru Telah Di Tambahkan!',document.location.href='olah_admin.php')</script>";
                        }else{
                               echo "<script>alert('Saldo Gagal Di Tambahkan!!',document.location.href='olah_admin.php')</script>";
                        }
                  }
            }else{
                  echo "<script>alert('Kode Saldo dan Jumlah Harus Angka.!',document.location.href='olah_admin.php')</script>";
            }
      }
}
?>
<div class="row">
  <div class="leftcolumns">
      <div class="cardss">
      <div class="column3">
      <h1 class="ho">Data Admin</h1>
      <table class="table2">
            <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>JK</th>
                  <th>Tanggal Lahir</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>NO_HP</th>
                  <th>KODE POS</th>
                  <th>Foto</th>
            </tr>
            <?php
                  $fungsi = "SELECT * FROM tb_admin order by nama asc";
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
                        $fo   = $kerad['gambar'];
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
                  <td><?php echo "<img src='gambar/$fo' width='100px' height='100px' />"; ?></td>
            </tr>
      <?php } ?>
      </table>
      <br>
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
      <form name="ceo" action="cetak_saldo2.php" method="post" target="_blank">
      <input type="submit" name="cekes" value="CETAK DATA">
      </form>
      <p><button type="submit" onclick="myFunctions()" name="open" class="button3">TAMBAHKAN SALDO BARU</button>
      <div id="myPS" style="visibility: hidden;">
      <br>
      <form name="tamb" action="" method="post">
      <a>Kode Saldo</a><br>
      <input type="text" name="kodex" placeholder="Masukkan Kode Saldo" class="texts">
      <br>
      <a>Jumlah Saldo</a><br>
      <input type="text" name="jumx" placeholder="Masukkan Jumlah Saldo" class="texts">
      <br>
      <br>
      <input type="submit" name="isi" value="Proses">
      <input type="reset" name="reset" value="RESET">
      </form>
      </div>
      </div>
      <h1 class="ho">Tambah Admin</h1>
      <button type="submit" name="buka" class="button3" onclick="myFunction()">TAMBAHKAN</button>
      <div id="myP" style="visibility: hidden;">
      <br>
      <form name="cek" enctype="multipart/form-data" method="post" action="">
      <label for="nama"><b>Nama</b></label>
      <br>
      <input type="text" placeholder="Masukkan Nama" name="nama" class="texts" required>
      <br>
      <label for="username"><b>Username</b></label>
      <br>
      <input type="text" placeholder="Masukkan Username" name="username"  class="texts" required>
      <br>
      <label for="password"><b>Password</b></label>
      <br>
      <input type="password" placeholder="Masukkan Password" name="password"  class="texts" required>
      <br>
      <label for="jk"><b>Jenis Kelamin</b></label>
      <br>
      <select name="jenis_kelamin" class="select2">
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
      <br>
      <label for="tgl"><b>Tanggal Lahir</b></label>
      <br>
      <input type="date" name="tgl" required class="texts">
      <br>
      <label for="email"><b>Email</b></label>
      <br>
      <input type="email" placeholder="Masukkan Email" name="email" class="texts"  required>
      <br>
      <label for="alamat"><b>Alamat</b></label>
      <br>
      <textarea name="alamat" placeholder="alamat"></textarea>
      <br>
      <label for="nohp"><b>No HP</b></label>
      <br>
      <input type="text" placeholder="Masukkan No.HP" name="no" class="texts" required>
      <br>
      <label for="kode"><b>Kode Pos</b></label>
      <br>
      <input type="text" placeholder="Masukkan Kode Pos" name="kode" class="texts" required>
      <br>
      <label><b>Tambahkan Gambar</b></label>
      <br>
      <input type="file" name="gambar">
      <br>
      <br>
      <input type="submit" name="daftar" value="DAFTAR">
      <input type="reset" name="reset" value="RESET">
      </form>
      </div>
      
</div>
</div>
</div>
</body>
</html>