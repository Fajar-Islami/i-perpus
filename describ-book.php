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
<title><?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/profile.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
</head>

<body>
<img class="logo" src="images/favicon.jpg" width="40px" height="40px"/>
<div id="akun">
	<?php if(isset($_SESSION['user'])){?>
    <img class="foto" src="<?php if($row['foto']==""){echo"photos/01.png";}else{echo"$row[foto]";}?>"/>
</div>
	<div id="akun-opt">
    <br />
		<li><a href="profile.php?<?php echo"$_SESSION[user]";?>"><?php echo"$_SESSION[nama]";?></a></li>
   		<li><a href="pro-logout.php">Log Out</a></li>
	</div>
	<?php }else{?><a class="masuk" href="login.php">Login</a><?php }?>


<div id="menu">
	<div id="text-menu">
    	<a href="home.php">Home</a>
    	<a href="book.php">Ebook</a>
        <?php if(!isset($_SESSION['user'])){?><a href="login.php" onclick="window.alert('Harap login terlebih dahulu');">Download</a><?php }else{?><a href="download.php">Download</a><?php }?>
        <?php if(!isset($_SESSION['user'])){?><a href="login.php" onclick="window.alert('Harap login terlebih dahulu');">Saran</a><?php }else{?><a href="request.php">Saran</a><?php }?>
    </div>
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
        	<td width="175px">Judul Buku</td>
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
            <td><a href="read-book.php?id=<?php echo"$row1[id]"?>">Baca Ebook </td>
            
            <td>
            <?php if(!isset($_SESSION['user'])){?><a href="#" onclick="window.alert('Harap login terlebih dahulu');">Download Book</a><?php }else{?>
            <a href="pro-download.php?id=<?php echo"$row1[id]"?>"> Download Ebook </a><td>
            <?php }?>
        </tr>
    </table>
    </div>
</div>
   
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>