<?php
session_start();
require('koneksi.php');
if(!$_SESSION['level']=="1"){header('location:login.php');}
?>

<html>
<head>
	<title>Admin : <?php echo"$_SESSION[user]";?></title>
    <link rel="shortcut icon" href="images/favicon.jpg">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css" />
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
<div id="dashboard">

<?php
require('koneksi.php');


$result=mysqli_query($koneksi,"SELECT * FROM user where level='0'");
$user=mysqli_num_rows($result);
$result2=mysqli_query($koneksi,"SELECT * FROM user where level='1'");
$admin=mysqli_num_rows($result2);
$result3=mysqli_query($koneksi,"SELECT * FROM upload");
$buku=mysqli_num_rows($result3)
?>

<div align="center" id="box1" >
    <img class="gambar" src="images/user2.png">
    <?php echo "Jumlah User" ?><br/>
    <?php echo mysqli_num_rows($result) ?>
</div>
<div align="center" id="box2">  
    <img class="gambar" src="images/admin.png">
    <?php echo "Jumlah Admin" ?><br/>
    <?php echo mysqli_num_rows($result2) ?>
</div>
<div align="center" id="box3">
<img class="gambar" src="images/buku2.png">
    <?php echo "Jumlah Buku" ?><br/>
    <?php echo mysqli_num_rows($result3) ?>
</div>

</div>

</body>
</html>
