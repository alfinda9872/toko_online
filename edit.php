<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","cek_edit.php?nama_bahan="+str,true);
        xmlhttp.send();
    }
}
</script>
<form>
  <select name="hapuss" class="select2" onchange="showUser(this.value)">
  <option value="pilih">Pilih Pakaian</option>
   <?php 
  $nama = $_SESSION['nama'];
  $hap = "SELECT tb_pakaian.nama_bahan from tb_pakaian where tb_pakaian.id_pengguna in ( SELECT tb_pengguna.id_pengguna from tb_pengguna where tb_pengguna.nama = '$nama')";
  $haps = mysqli_query($koneksi,$hap);
  while ($hapss = mysqli_fetch_assoc($haps)){
    $hapuse = $hapss['nama_bahan'];
    echo "<option value='$hapuse'>$hapuse</option>";
  }
  ?>
  </select>
</form>
<br>
<div id="txtHint"><b>Pilih Data Pakaian Yang Mau di Ubah...</b></div>
