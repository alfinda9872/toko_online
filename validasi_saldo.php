<?php include "koneksi.php"; ?>
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
        xmlhttp.open("GET","isi_saldo.php?kode_saldo="+str,true);
        xmlhttp.send();
    }
}
</script>
    <br>
    <p><label>Masukkan Kode Pembayaran</label></p>
  <input type="text" name="infut" class="text2" onkeyup="showUser(this.value)" required>
  
<div id="txtHint"><b></b></div>
