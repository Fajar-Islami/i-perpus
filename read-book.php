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
<title>Book</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/read-book.css" />
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
		<li><a href="profile.php"><?php echo"$_SESSION[nama]";?></a></li>
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

<div id="buku">
<?php
	$buku=mysqli_query($koneksi,"SELECT * from upload where id='".$_GET['id']."' ");
	$data=mysqli_fetch_array($buku);
?>
	<embed src="<?php echo"$data[file_buku]";?>#toolbar=0&navpanes=0&scrollbar=0"
	type="application/pdf"
		width="90%"
    	height="85%"
		type="application/pdf">
	</embed>
</div>

<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>