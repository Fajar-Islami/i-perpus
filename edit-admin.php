<?php session_start();
require('koneksi.php');
if(isset($_SESSION['user'])){
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE user = '$_SESSION[user]'");
	//$hasil = mysqli_query($koneksi,$query);
	$row = mysqli_fetch_array($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/profile.css" />
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
    <a href="pro-logout.php" title="Keluar" onClick="return confirm('Are you sure ?');"><li><img class="menu" src="images/icon/1.png"></li></a>
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
            <td><input type="date" name="tgl_lahir" value="<?php echo"$row[tgl_lahir]";?>" placeholder="Date"/></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" value="Save" /> <a href="profile-admin.php"><input type="button" value="Cancel" /></a></td>
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