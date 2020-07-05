<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daftar</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/register.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
</head>

<body>
<img class="logo" src="images/favicon.jpg" width="40px" height="40px"/>
<div id="menu">
	<div id="text-menu">
    </div>
</div>
<div id="table-register">
    <form method="post" action="pro-register.php">
    <table id="register">
        <tr>
            <td colspan="2" class="judul-form">Daftar</td>
        </tr>
        <tr>
            <td class="text-input">Username</td>
            <td><input type="text" name="user" placeholder="Masukan Username"  onkeyup="this.value = this.value.toLowerCase()" required autofocus/></td>
        </tr>
        <tr>
            <td class="text-input">Password</td>
            <td><input type="password" name="pwd" placeholder="Masukan Password" onkeyup="this.value = this.value.toLowerCase()" pattern=".{8,}" required title="Minimal password 8 karakter"/></td>
        </tr>
        <tr>
            <td class="text-input">Nama Panjang</td>
            <td><input type="text" name="nama" style="text-transform: capitalize;" placeholder="Masukan Nama Panjang" required onkeypress="return harusHuruf(event)"/></td>
        </tr>
        <tr>
            <td class="text-input">Tanggal Lahir</td>
            <td><input type="date" name="tgl_lahir" id="tgl_lhr" placeholder="Tanggal Lahir" required="required" onchange="TDate()"/></td>
        </tr>
        <tr>
            <td class="text-input">Jenis Kelamin</td>
            <td>
                <input type="radio" name="jenis_kelamin"  value="Laki - laki" required /> Laki - laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" required /> Perempuan
            </td>
        </tr>
        <tr>
            <td class="text-input">Email</td>
            <td><input type="email" name="email" placeholder="library@example.com" required="required"/></td>
        </tr>
        <tr>
            <td class="text-input">Nomor Telepon</td>
            <td><input type="text" name="no_tlp" placeholder="Masukan Nomor Telepon" required onkeypress="return hanyaAngka(event)" maxlength="14"/></td>
        </tr>
        <tr>
            <td class="text-input"></td>
            <td><input type="checkbox" required="required"/> 
            Saya menyetujui bahwa data yang saya isikan ini benar dan saya siap bertanggung jawab
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="submit"><input type="submit" name="create" value="Daftar"  ></td>
        </tr>
    </table>
    </form>
</div>

<div id="content">
	<div id="content-text">
		<font size="+6">Daftar Sekarang !</font><br />Daftar segera dan dapatkan eBook secara gratis.
	</div>
    <br />
	<font class="content-btn"><a href="login.php">       Login  »     </a></font>
</div>

<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>

<script>
    function hanyaAngka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }

    function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode >122)&&charCode>32)

        return false;
        return true;
    }

    function TDate() {
    var UserDate = document.getElementById("tgl_lhr").value;
    var ToDate = new Date();

    if (new Date(UserDate).getTime() >= ToDate.getTime()) {
          alert("Tanggal harus lebih kecil dari hari ini");
          document.getElementById("tgl_lhr").valueAsDate = new Date();
          return false;
     }
    return true;
}
</script>
</body>
</html>
