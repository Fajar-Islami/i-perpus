<?php session_start();
require('koneksi.php');
if(isset($_SESSION['user'])){
	$query =mysqli_query($koneksi, "SELECT * FROM user WHERE user = '$_SESSION[user]'");
	//$hasil = mysqli_query($koneksi,$query);
	$row = mysqli_fetch_array($query);
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<!-- <link rel="stylesheet" type="text/css" href="css/profile.css" /> -->
<link rel="stylesheet" type="text/css" href="css/search.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/book.css" />
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/search.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>

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

<?php
	$search=$_POST['search'];
	$cari=mysqli_query($koneksi, "select*from upload where nama_buku like '%$search%'");
?>
<div id="download">
<h1> Hapus Ebook</h1>
	<hr>
    <div id="search">
            <form method="post" action="search-delete-admin.php">
                <input type="hidden" name="kategori" value="<?php $cat=$_POST['cat'];?>"/>
                <input type="text" name="search" placeholder="Cari Judul Ebook..."/>
                <input type="submit" value="Cari" />
            </form>
        </div>
	<table>
	
<?php 
$download2=mysqli_query($koneksi,"select*from upload ");
$download=mysqli_query($koneksi,"select*from upload where nama_buku like '%$search%'");
if($download->num_rows== 0 AND $download2->num_rows== 0 ){
    //echo"<div align='center'><h1>Ebook tidak ada !!</h1> <div>";
}elseif($download->num_rows== 0){
    echo"<div align='center'><h1>Ebook tidak ada !!</h1> <div>";
}
else{ ?>
    <tr id="judul">
    	
        <td colspan="2">Ebook</td>
        <td id="action"><?php if(!$_SESSION['level']=="1"){echo"Download";}else{echo"Hapus";}?></td>
        
    </tr>

    <?php
    while($list=mysqli_fetch_array($download)){?>
	<tr id="list">
    	<td id="list-cover"><a href="<?php echo"$list[cover_buku]";?>"><img src="<?php echo"$list[cover_buku]";?>" width="50px" height="75px"/></a></td>
    	<td id="list-nama"  width="720px"><?php echo"$list[nama_buku]";?></td>
        <td class="action-book">
        	<?php if(!$_SESSION['level']=="1"){?><a href="pro-download.php?id=<?php echo"$list[id]";?>"><img src="images/download.png" /></a>
        	<?php }else{?><a href="pro-delete-book.php?id=<?php echo"$list[id]";?>" onclick="return confirm('Yakin ingin hapus data <?php echo"$list[nama_buku]";?> ?');"><img src="images/info-red.png" /></a><?php }?>
        </td>
    </tr>
<?php }?>
<?php }?>
	</table>
</div>


<div id="footer">
	<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>