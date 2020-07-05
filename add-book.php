<?php
session_start();
require('koneksi.php');
if(!$_SESSION['level']=="1"){header('location:login.php');}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/download.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div id="bar">
<img id="logo" src="images/favicon.jpg">
    <div id="space"></div>
    <a href="home-admin.php" title="Beranda"><li><img class="menu" src="images/icon/6.png"></li></a>
    <a href="book-admin.php" title="Ebook"><li><img class="menu" src="images/icon/13.png"></li></a>
    <hr>
    <a href="dashboard.php" title="Dashboard"><li><img class="menu" src="images/icon/14.png"></li></a>
    <!-- <a href="list-admin.php" title="Admin"><li><img class="menu" src="images/icon/10.png"></li></a>-->
    <a href="list-member.php" title="Kelola Data Anggota"><li><img class="menu" src="images/icon/12.png"></li></a> 
    <a href="add-book.php" title="Tambah Ebook"><li><img class="menu" src="images/icon/17.png"></li></a>
    <!-- <a href="edit-book.php" title="Edit Book"><li><img class="menu" src="images/icon/18.png"></li></a> -->
    <a href="list-delete-book.php" title="Hapus Ebook"><li><img class="menu" src="images/icon/11.png"></li></a>
    <a href="list-request.php" title="Saran, Masukan dan Request"><li><img class="menu" src="images/icon/9.png"></li></a>
    <hr>
    <a href="profile-admin.php" title="Profil"><li><img class="menu" src="images/icon/16.png"></li></a>
    <a href="pro-logout.php" title="Keluar" onClick="return confirm('Yakin ingin keluar ?');"><li><img class="menu" src="images/icon/1.png"></li></a>
</div>

<div id="input-download">
	<form method="post" action="pro-input-download.php" enctype="multipart/form-data">
    <h1> Tambah Ebook</h1>
	<hr>
    	<table>
		<tr><td>Judul Ebook</td><td><input type="text" name="nama_buku" required /></td></tr>
        <tr><td>Penerbit</td><td><input type="text" name="penerbit" required/></td></tr>
        <tr><td>Pengarang</td><td><input type="text" name="pengarang" required /></td></tr>
        <tr><td>Tahun Terbit</td><td><input type="number" name="tahun_terbit" required onkeypress="return hanyaAngka(event)" maxlength="4" min="1" max="2019" /></td></tr>
        <tr><td>Kategori</td><td><select name="jns_buku" placeholder="Masukan Kategori Ebook.." required>
                    <option value="Agama">Agama</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Komputer">Komputer</option>
                    <option value="Novel">Novel</option>
                    <option value="Tutorial">Tutorial</option>
                </select></td></tr>
        <tr><td>Cover Ebook</td><td><input type="file" name="cover_buku" accept="image/*" required/></td></tr>
        <tr><td>File Ebook</td><td><input type="file" name="file_buku" accept="application/*" required /></td></tr>
        <tr><td>ID Admin</td><td><input type="text" name="nama_admin" readonly value="<?php echo"$_SESSION[user]";?>" required/></td></tr>
        <tr><td></td><td><input type="submit" name="add" value="Tambah Ebook" /></td></tr>
        </table>
	</form>
</div>
<br />
<div id="buku">
	<table>
	<tr id="judul">
    <?php 
        $download=mysqli_query($koneksi,"select*from upload ");
        if($download->num_rows != 0){ ?>
        <td colspan="2">Ebook</td>
        <td id="action">  Ukuran</td>
        <?php } ?>
    	
    </tr>
<?php 
$download=mysqli_query($koneksi,"select*from upload ");
if($download->num_rows== 0){
    echo"<div align='center'><h1>Ebook tidak ada !!</h1> <div>";
}else{
$download=mysqli_query($koneksi,"select * from upload order by id desc limit 5");
while($list=mysqli_fetch_array($download)){
$size=$list['filesize']/1048576;
?>  
	<tr id="list">
    	<td id="list-cover"><a href="<?php echo"$list[cover_buku]";?>"><img src="<?php echo"$list[cover_buku]";?>" width="50px" height="75px"/></a></td>
    	<td id="list-nama"  width="720px"><?php echo"$list[nama_buku]";?></td>
        <td class="action-book"><?php echo round($size,2)." MB";?></td>
    </tr>
<?php }}?>
	</table>
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

}
</script>


</body>

</html>