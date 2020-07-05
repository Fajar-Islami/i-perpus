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
        <a href="download.php">Download</a>
        <a href="request.php">Saran</a>
    </div>
</div>
<div id="profile">
	<!--<a href="edit.php?user=<?php echo"$_SESSION[user]";?>"><img id="edit" src="images/services.png" title="Edit" /></a>-->
	<div id="photo">
		<img id="dp" src="<?php if(!$row['foto']==""){echo"$row[foto]";}else{echo"photos/01.png";}?>" /><br />
    	<!--<form enctype="multipart/form-data" method="post" action="pro-upload.php" class="foto">
    		<input type="file" id="upload" name="foto" />
    		<label for="upload" name="upload" id="upload-btn">Change Photo</label><input type="image" src="images/arrow.png"/>
		</form>-->
    </div>
    <div id="my-profile">
    	<font id="my-prof-text"><i>My Profile</i></font>
    </div>
    <div id="text">
    <table>
    	<tr>
        	<td width="175px">Nama</td>
            <td><?php echo"$row[nama]";?></td>
        </tr>
        <tr>
        	<td>Username</td>
            <td><?php echo"$row[user]";?></td>
        </tr>
        <tr>
        	<td>Email</td>
            <td><?php echo"$row[email]";?></td>
        </tr>
        <tr>
        	<td>Jenis Kelamin</td>
            <td><?php if(!$row['jenis_kelamin']==""){echo"$row[jenis_kelamin]";}else{echo"-";}?></td>
        </tr>
        <tr>
        	<td>Tanggal Lahir</td>
            <td><?php if(!$row['tgl_lahir']==""){$tgl=$row['tgl_lahir'];
            echo date("d-F-Y", strtotime($tgl));}else{echo"-";}?></td>
        </tr>
        <?php if($row['level']=="1"){?>
        <tr>
        	<td></td>
            <td><a href="dashboard.php"><input type="button" value="Admin Page" /></a></td>
        </tr>
        <?php }else{?>
        <tr>
        	<td>Status</td>
            <td>User</td>
        </tr>
        <tr>
        	<td>Nomor Telepon</td>
            <td><?php if(!$row['no_tlp']==""){echo"$row[no_tlp]";}else{echo"-";}?></td>
        </tr>
        <tr>
        	<td>Tanggal Daftar</td>
            <td><?php if(!$row['tgl_daftar']==""){$dftr=$row['tgl_daftar'];
            echo date("d-F-Y H:i:s", strtotime($dftr));}else{echo"-";}?></td>
        </tr>
		<?php }?>
    </table>
    </div>
</div>
<?php if(!$_SESSION['level']=="1"){?>
	<div id="my-request">
    <h3>Saran yang pernah saya kirim</h3>
    <hr><br>
    <?php 
		$request=mysqli_query($koneksi,"select*from request where user='$_SESSION[user]' order by id desc limit 10");
		while($list=mysqli_fetch_array($request)){?>
        <div id="my">
        	<img class="pic" src="<?php if(!$row['foto']==""){echo"$row[foto]";}else{echo"photos/01.png";}?>" />
            <div id="list-nama">Me</div>
            <div id="list-user"> <?php echo"$list[email]"; ?></div>
            <div id="list-pesan"><?php echo"$list[pesan]"; ?></div>
        </div>
        
		<hr />
	<?php }?>
	</div>
<?php }?>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>