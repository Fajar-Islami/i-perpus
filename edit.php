<?php session_start();
require('koneksi.php');
if(isset($_SESSION['user'])){
	$query = "SELECT * FROM user WHERE user = '$_SESSION[user]'";
	$hasil = mysqli_query($koneksi,$query);
	$row = mysqli_fetch_array($koneksi,$hasil);
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/edit.css" />
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
		<li><a href="profile.php?<?php echo"$_SESSION[user]";?>"><?php echo"$_SESSION[user]";?></a></li>
   		<li><a href="pro-logout.php">Log Out</a></li>
	</div>
	<?php }else{?><a class="masuk" href="login.php">Login</a><?php }?>


<div id="menu">
	<div id="text-menu">
    	<a href="home.php">Home</a>
    	<a href="book.php">Buku</a>
        <a href="download.php">Download</a>
        <a href="request.php">Saran</a>
    </div>
</div>
<div id="profile">
	<div id="photo">
		<img id="dp" src="<?php if(!$row['foto']==""){echo"$row[foto]";}else{echo"photos/01.png";}?>" /><br />
    	<form enctype="multipart/form-data" method="post" action="pro-upload.php" class="foto">
    		<input type="file" id="upload" name="foto" />
    		<label for="upload" id="upload-btn">Change Photo</label><input type="image" src="images/arrow.png"/>
		</form>
    </div>
    <div id="my-profile">
    	<font id="my-prof-text"><i>My Profile</i></font>
    </div>
    <div id="text">
    <form method="post" action="pro-edit.php">
    <table>
    	<tr>
        	<td width="175px">Name</td>
            <td><input type="text" name="nama" value="<?php echo"$row[nama]";?>" placeholder="Fullname" required="required"/></td>
        </tr>
        <tr>
        	<td>Username</td>
            <td><input type="text" name="user" value="<?php echo"$row[user]";?>" placeholder="Username" required="required"/></td>
        </tr>
        <tr>
        	<td>Email</td>
            <td><input type="text" name="email" value="<?php echo"$row[email]";?>" placeholder="Email" required="required"/></td>
        </tr>
        <tr>
        	<td>Gender</td>
            <td>
            	<input type="radio" name="kel" value="Laki-Laki"/>Male 
                <input type="radio" name="kel" value="Perempuan"/>Female
            </td>
        </tr>
        <tr>
        	<td>Date of Birth</td>
            <td><input type="text" name="tgl_lahir" value="<?php echo"$row[ttl]";?>" placeholder="Date"/></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" value="Save" /> <a href="profile.php"><input type="button" value="Cancel" /></a></td>
        </tr>
    </table>
    </form>
    </div>
</div>
<?php if(!$_SESSION['level']=="1"){?>
	<div id="my-request">
	<?php 
		$request=mysql_query("select*from request where user='$_SESSION[user]'");
		while($list=mysql_fetch_array($request)){?>
		<div id="list-tanggal"><i><?php echo"$list[tanggal]"; ?></i></div>
		<div id="list-pesan"><?php echo"$list[pesan]"; ?></div>
		<hr />
	<?php }?>
	</div>
<?php }?>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>