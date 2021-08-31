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
        xmlhttp.open("GET","cek_cari.php?nama_bahan="+str,true);
        xmlhttp.send();
    }
}
</script>
<form>
  <p>Silahkan Cari Pakaian Yang Anda Inginkan : </p>
  <br>
  <input type="text" name="nama" class="texts" onkeyup="showUser(this.value)">
</form>
<br>
<div id="txtHint"><b>Cari dan Temukan Pakaian Mu...</b></div>
