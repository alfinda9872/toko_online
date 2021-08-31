<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Print Data User</title>
<link rel="stylesheet" type="text/css" href="tampilan.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1 class="ho">Data Pengguna</h1>
<table>
  		<tr>
  		<th>Username</th>
  		<th width="100">Nama</th>
  		<th>Jenis Kelamin</th>
  		<th>Tanggal Lahir</th>
  		<th>Email</th>
  		<th>Alamat</th>
  		<th>NO HP</th>
  		<th>Kode Pos</th>
  		<th>Status</th>
  	</tr>
  	<tr>
  		<?php
  			$fungsi = "SELECT * FROM tb_pengguna order by nama asc";
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
  				$sta  = $kerad['status'];
  			
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
  			<td><?php echo $sta; ?></td>
  		</tr>
  	<?php } ?>
  	</table>
    <script>
      window.print();
    </script>
</body>
</html>