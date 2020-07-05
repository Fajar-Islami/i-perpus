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
<link rel="stylesheet" type="text/css" href="css/profile.css" />
<!--<link rel="stylesheet" type="text/css" href="css/navigation.css" />-->
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
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


</div>
<div id="profile">
	<!--<a href="edit-admin.php?user=<?php echo"$_SESSION[user]";?>"><img id="edit" src="images/services.png" title="Edit" /></a>-->
	<div id="photo">
		<img id="dp" src="<?php if(!$row['foto']==""){echo"$row[foto]";}else{echo"photos/01.png";}?>" /><br />
    	<!-- <form enctype="multipart/form-data" method="post" action="pro-upload.php" class="foto"> 
    		<input type="file" id="upload" name="foto" />
    		<label for="upload" id="upload-btn">Change Photo</label><input type="image" src="images/arrow.png"/>
		</form>-->
    </div>
    <div id="my-profile">
    	<font id="my-prof-text"><i> Profil Admin</i></font>
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
        	<td>Jenis Kelamin</td>
            <td><?php if(!$row['jenis_kelamin']==""){echo"$row[jenis_kelamin]";}else{echo"-";}?></td>
        </tr>
        <tr>
        	<td>Tanggal Lahir</td>
            <td><?php if(!$row['tgl_lahir']==""){$tgl=$row['tgl_lahir'];
            echo date("d-F-Y", strtotime($tgl));}else{echo"-";}?></td>
        </tr>
        
        <?php if($row['level']=="1"){?>
       
        <?php }else{?>
        <tr>
        	<td>Status</td>
            <td>Member</td>
        </tr>
		<?php }?>
    </table>
    </div>
</div>
<?php if(!$_SESSION['level']=="1"){?>
	<div id="my-request">
	<?php 
		$request=mysql_query("select*from request where user='$_SESSION[user]' order by id desc limit 10");
		while($list=mysql_fetch_array($request)){?>
        <div id="my">
        	<img class="pic" src="<?php if(!$row['foto']==""){echo"$row[foto]";}else{echo"photos/01.png";}?>" />
            <div id="list-tanggal"><i><?php echo"$list[tanggal]"; ?></i></div>
            <div id="list-nama">Me</div>
            <div id="list-user"><?php echo"$list[user]"; ?> | <?php echo"$list[email]"; ?></div>
            <div id="list-pesan"><?php echo"$list[pesan]"; ?></div>
        </div>
        <?php if(!$list['tgl_reply']==""){?>
            <div id="reply">
                    <?php	$data=mysql_query("select*from user where user='$list[dari]'");
                            $admin=mysql_fetch_array($data)?>
                <img class="pic" src="<?php if(!$admin['foto']==""){echo"$admin[foto]";}else{echo"photos/01.png";}?>" />
                <div id="reply-tanggal"><i><?php echo"$list[tgl_reply]"; ?></i></div>
                <div id="list-nama"><?php echo"$admin[nama]";?></div>
                <div id="reply-user"><?php echo"$admin[user]"; ?> | <?php echo"$admin[email]"; ?></div>
                <div id="list-pesan"><?php echo"$list[reply]"; ?></div>
            </div>
        <?php }?>
		<hr />
	<?php }?>
	</div>
<?php }?>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>