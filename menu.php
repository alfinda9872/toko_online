<?php  
	session_start();
	include "koneksi.php";



	if(!isset($_SESSION['username'])){
		echo "<ul>
  		     <li><a href='index.php'>Home</a></li>
 			 <li class='dropdown'>
   			 <a href='javascript:void(0)'' class='dropbtn'>Menu Pakaian</a>
    		<div class='dropdown-content'>
      		<a href='list_pakaian.php''>List Pakaian</a>
      		<a href='form_pencarian.php''>Cari Pakaian</a>
    		</div>
  			</li>
  			<li><a href='login.php'>Login</a></li>
			</ul>";	
	}else{


	function menu_admin(){
    $nama = $_SESSION['nama'];
		echo "<ul>
  		     <li><a href='index.php'>Home</a></li>
  			<li class='dropdown'>
         <a href='javascript:void(0)'' class='dropbtn'>Menu Pakaian</a>
        <div class='dropdown-content'>
          <a href='list_pakaian.php''>List Pakaian</a>
          <a href='form_pencarian.php''>Cari Pakaian</a>
        </div>
        </li>
 			 <li class='dropdown'>
   			 <a href='javascript:void(0)'' class='dropbtn'>Menu Admin</a>
    		<div class='dropdown-content'>
      		<a href='data_pakaian.php''>Data Pakaian</a>
      		<a href='data_user.php''>Data User</a>
      		<a href='olah_admin.php''>Detail Data Admin </a>
    		</div>
  			</li>
  			<li style='float:right;'><a href='logout.php'>Logout</a></li>
  			<div class='user'>
  			<li><a>| Hai, $nama |</a> </li>
  			</div>
			</ul>";


		}

	function menu_pengguna(){
    include "koneksi.php";
    $user = $_SESSION['username'];
    $nama = $_SESSION['nama'];
    $oek = "SELECT saldo FROM tb_pengguna where username ='$user'";
    $oka = mysqli_query($koneksi,$oek) or die (mysqli_error($koneksi));
    $les = mysqli_fetch_assoc($oka);
    $see  = number_format($les['saldo'],0,',','.');
		echo "<ul>
  		     <li><a href='index.php'>Home</a></li>
  			<li class='dropdown'>
         <a href='javascript:void(0)'' class='dropbtn'>Menu Pakaian</a>
        <div class='dropdown-content'>
          <a href='list_pakaian.php''>List Pakaian</a>
          <a href='form_pencarian.php''>Cari Pakaian</a>
        </div>
        </li>
 			 <li class='dropdown'>
   			 <a href='javascript:void(0)' class='dropbtn'>Menu Pengguna</a>
    		<div class='dropdown-content'>
      		<a href='list_pembelian.php''>List Pembelian</a>
      		<a href='input_barang.php''>Jual Pakaian</a>
      		<a href='halaman_profil.php''>Detail Data Pengguna</a>
    		</div>
  			</li>
  			<li style='float:right;'><a href='logout.php'>Logout</a></li>
  			<div class='user'>
  			<li class='dropdown'>
        <a href='javascript:void(0)'>| Hai, $nama |</a>
        <div class='dropdown-content'>
          <a><b>Saldo : Rp. $see</b></a> 
        </div>
        </li>
  			</div>
			</ul>";


		}

	
	
		

		$status = $_SESSION['status'];

		switch ($status) {
			case 'admin':
				$nades = menu_admin();
				break;

			default :
				$anne = menu_pengguna();
				break;

			
		}

	}
?>