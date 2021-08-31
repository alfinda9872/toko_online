<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tampilan.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php
          $nadeshiko = "SELECT * FROM tb_pakaian  order by kode_pakaian desc limit 3 ";
          $kirigiri = mysqli_query($koneksi,$nadeshiko);

          while ($myucel = mysqli_fetch_assoc($kirigiri)){
            $kodep = $myucel['kode_pakaian'];
            $namap = $myucel['nama_bahan'];
            $stop = $myucel['stok'];
            $bah = $myucel['bahan'];
            $gam = $myucel['gambar'];
            $test = mysqli_num_rows($kirigiri);
        
          ?>
<div class="mySlides fade">
    <a href="lihat_baju.php?kode_pakaian=<?php echo $kodep; ?>"><?php echo "<img src='gambar/$gam' width='100%' height='300px'/>"; ?></a>
</div>





<?php } ?>
<br>

<div style="text-align:center">
  <span class="dot" ></span> 
  <span class="dot" ></span> 
  <span class="dot" ></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</body>
</html> 
