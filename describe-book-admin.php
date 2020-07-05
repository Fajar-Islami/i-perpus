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
<link rel="stylesheet" type="text/css" href="css/profile.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
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

<div id="profile">

    <?php
    require('koneksi.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    $query1 =mysqli_query($koneksi, "SELECT * FROM upload WHERE id = $id");
    $row1 = mysqli_fetch_array($query1);
    // var_dump($row1);exit;
} 
    
    ?>

	<!--<a href="edit.php?user=<?php echo"$_SESSION[user]";?>"><img id="edit" src="images/services.png" title="Edit" /></a>-->
	<div id="photo">
		<img id="dp" src="<?php if(!$row1['cover_buku']==""){echo"$row1[cover_buku]";}else{echo"photos/01.png";}?>" /><br />
    </div>
    <div id="my-profile">
    	<font id="my-prof-text"><i>Deskripsi Ebook</i></font>
    </div>
    <div id="text">
    <table>
    <tr>
        	<td width="175px">Judul Ebook</td>
            <td><?= $row1['nama_buku'] ?></td>
            <!-- <td><?php echo"$row1";?></td> -->
        </tr>
        <tr>
        	<td>Penerbit</td>
            <td><?= $row1['penerbit'] ?></td>
            <!-- <td><?php echo"$row1[penerbit]";?></td> -->
        </tr>
        
        <tr>
        	<td>Pengarang</td>
            <td><?= $row1['pengarang'] ?></td>
            <!-- <td><?php echo"$row1[pengarang]";?></td> -->
        </tr>
        <tr>
        	<td>Tahun Terbit</td>
            <td><?= $row1['tahun_terbit'] ?></td>
            <!-- <td><?php if(!$row1['tahun_terbit']==""){echo"$row[tahun_terbit]";}else{echo"-";}?></td> -->
        </tr>
        <tr>
        	<td>Kategori</td>
            <td><?= $row1['jns_buku'] ?></td>
            <!-- <td><?php if(!$row['jns_buku']==""){echo"$row[jns_buku]";}else{echo"-";}?></td> -->
        </tr>
        <tr>
            <td><a href="read-book-admin.php?id=<?php echo"$row1[id]"?>">Baca Ebook </td>
            <td><a href="edit-book-full.php?id=<?php echo"$row1[id]"?>">Edit Ebook </td>
            <td><a href="pro-download.php?id=<?php echo"$row1[id]"?>"> Download Ebook </a><td>
        </tr>
    </table>
    </div>
</div>
   
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>