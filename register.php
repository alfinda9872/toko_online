<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<?php
  include "koneksi.php";

  if (isset($_POST['register']))
{
  

  $nama = $_POST['nama'];
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $jenis = $_POST['jenis_kelamin'];
  $tgls = $_POST['tgl'];
  $emails = $_POST['email'];
  $alam = $_POST['alamat'];
  $no = $_POST['no'];
  $kode = $_POST['kode'];

  $kyun = "SELECT username FROM tb_pengguna where username='$user'";
  $tan = mysqli_query($koneksi,$kyun);
  $san = mysqli_num_rows($tan);

  if(is_numeric($no) && is_numeric($kode)){
   

  if($san > 0){
    echo"<script>alert('Username Telah Ada, Silahkan Coba Lagi !',document.location.href='register.php')</script>";
  }

  else{


  $sql = "INSERT INTO tb_pengguna values (null,'$user','$pass','$nama','$jenis','$tgls','$emails','$alam','$no','$kode','Pengguna',null)";
  $input = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi  ));

  if($input){
    echo"<script>alert('Register Akun Berhasil, Silahkan Login !',document.location.href='login.php')</script>";
  }else{
    echo"<script>alert('Register Akun Gagal !',document.location.href='register.php')</script>";
  }

  }

   
  }else{
    echo"<script>alert('No HP dan Kode Pos Tidak Boleh Huruf !',document.location.href='register.php')</script>";
  }

}

  ?>



  <form action="" method="post">
    <div class="container">
      <h1>Toko Baju Online</h1>

      <label for="nama"><b>Nama</b></label>
      <input type="text" placeholder="Masukkan Nama" name="nama" required>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Masukkan Username" name="username" required>

      
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Masukkan Password" name="password" required>

      <label for="jk"><b>Jenis Kelamin</b></label>
      <select name="jenis_kelamin">
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>

      <label for="tgl"><b>Tanggal Lahir</b></label>
      <input type="date" name="tgl" required>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Masukkan Email" name="email" required>

      <label for="alamat"><b>Alamat</b></label>
      <textarea name="alamat" placeholder="alamat"></textarea>

      <label for="nohp"><b>No HP</b></label>
      <input type="text" placeholder="Masukkan No.HP" name="no" required>

      <label for="kode"><b>Kode Pos</b></label>
      <input type="text" placeholder="Masukkan Kode Pos" name="kode" required>


      <button type="submit" name="register" class="btn">Register</button><button onclick="window.location.href='login.php'" class="btn2">Cancel</button>
      <center>
        <p>
      <a href="index.php" style="text-decoration: none;">kembali ke menu awal</a>
  </center>
    </div>
  </form>



</body>
</html>
