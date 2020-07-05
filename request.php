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
<title>Request</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/request.css" />
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
        <a href="download.php">Download</a>
        <a href="request.php">Saran</a>
    </div>
</div>
<?php if(!$_SESSION['level']=="1"){?>
<div id="input-request">
	<h1><i>Ada masukan/saran ?</i></h1>
	<hr>
	<form method="post"  action="pro-request.php">
		<div id="pesan"><textarea name="pesan" cols="90" rows="5" placeholder="Masukan saran,kritik atau boleh Request ebook" required></textarea></div>
		<div id="btn-send"><input type="submit" name="send" value="Kirim" /></div>
	</form>
</div>
<?php }?>
<div id="request-list">
	<h3>SARAN YANG SUDAH MASUK</h3>
	<hr>
	<br>
	<?php 
		$request=mysqli_query($koneksi,"select*from request order by id desc limit 20");
		while($list=mysqli_fetch_array($request)){
			//if($list['reply']==""){	
        	$query2=mysqli_query($koneksi, "select*from user where user='$list[user]'");
			$row2=mysqli_fetch_array($query2);?> 
			<div id="list-tanggal"><i><?php echo"$list[tanggal]"; ?></i></div>
			<img id="list-foto" src="<?php if($row2['foto']==""){echo"photos/01.png";}else{echo"$row2[foto]";}?>"/>
    		<div id="list-nama"><?php echo"$list[nama]"; ?></div>
			<div id="list-user"><?php echo"$list[user]"; ?> | <?php echo"$list[email]"; ?></div>
			<div id="list-pesan"><?php echo"$list[pesan]"; ?></div>
			<hr />
		<?php }?>
</div>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>

</body>
</html>