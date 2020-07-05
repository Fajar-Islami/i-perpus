<?php session_start();
require'koneksi.php';
if(isset($_SESSION['user'])){
	$query = "SELECT * FROM user WHERE user = '$_SESSION[user]'";
	$hasil = mysqli_query($query);
	$row = mysqli_fetch_array($hasil);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
</head>

<body>
<img class="logo" src="images/favicon.ico" width="40px" height="40px"/>
<div id="akun">
	<?php if(isset($_SESSION['user'])){?>
    <img class="foto" src="<?php if($row['foto']==""){echo"photos/01.png";}else{echo"$row[foto]";}?>"/>
</div>
	<div id="akun-opt">
    <br />
		<li><a href="profile.php"><?php echo"$_SESSION[user]";?></a></li>
   		<li><a href="pro-logout.php">Log Out</a></li>
	</div>
	<?php }else{?><a class="masuk" href="login.php">Sign In</a><?php }?>


<div id="menu">
<?php if(isset($_SESSION['user'])){?>
	<div id="text-menu">
    	<a href="home.php">Home</a>
    	<a href="book.php">Book</a>
        <a href="download.php">Download</a>
        <a href="request.php">Request</a>
    </div>
<?php }?>
</div>
<div id="cover">
	<div id="cover-text">
	Jelajahi eBook di dunia <br />lewat web, tablet, ponsel <br />mulai hari ini.
    </div>
    <div id="cover-btn">
    <a href="book.php">Jelajahi Sekarang »</a>
    </div>
</div>
<img id="responsive" src="images/respon.png"/>
<div id="footer">
	<i>B-Forgen Computer and Network Engineering</i>  |  Copyright © 2015.
</div>
</body>
</html>