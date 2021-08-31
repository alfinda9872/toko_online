<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>



<div class="bg-img">
  <form action="loginmasuk.php" method="post">
    <div class="container">
      <h1>Toko Baju Online</h1>

      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Masukkan Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Masukkan Password" name="password" required>

      <button type="submit" class="btn">Login</button><button onclick="window.location.href='register.php'" class="btn2">Register</button>
      <center>
        <p>
      <a href="index.php" style="text-decoration: none;">kembali ke menu awal</a>
  </center>
    </div>
  </form>
</div>


</body>
</html>
