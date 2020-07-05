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
<title>Request</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/request.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<link rel="stylesheet" type="text/css" href="css/index.css">
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

<div id="request-list">
	<h1> Saran, Masukan dan Request</h1>
	<hr>
	<?php 
		$request=mysqli_query($koneksi, "select*from request order by id desc limit 20");
		while($list=mysqli_fetch_array($request)){
        	$query2=mysqli_query($koneksi,"select*from user where user='$list[user]'");
			$row2=mysqli_fetch_array($query2);?> 
			<div id="list-tanggal"><i><?php echo"$list[tanggal]"; ?></i></div>
			<img id="list-foto" src="<?php if($row2['foto']==""){echo"photos/01.png";}else{echo"$row2[foto]";}?>"/>
    		<div id="list-nama"><?php echo"$list[nama]"; ?></div>
			<div id="list-user"><?php echo"$list[user]"; ?> | <?php echo"$list[email]"; ?></div>
			<div id="list-pesan"><?php echo"$list[pesan]"; ?></div>
           	<?php  /*if($list['reply']==""){?>
            	<div id="action">
            		<!-- <a href="reply.php?id=<?php echo"$list[id]";?>">Reply</a>  -->
                	<a href="pro-detele-request.phpid=<?php echo"$list[id]";?>">Delete</a>
            	</div>
            <?php }else{?>
            	<div id="action">
                	<a href="pro-detele-request.phpid=<?php echo"$list[id]";?>">Delete</a>
            	</div>
			<?php }*/?>
			<hr />
		<?php }?>
</div>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>