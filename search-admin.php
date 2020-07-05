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
<!-- <link rel="stylesheet" type="text/css" href="css/profile.css" /> -->
<link rel="stylesheet" type="text/css" href="css/search.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/book.css" />
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/search.css" />
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
    <a href="pro-logout.php" title="Keluar" onClick="return confirm('Are you sure ?');"><li><img class="menu" src="images/icon/1.png"></li></a>
</div>

<?php
	$search=$_POST['search'];
	$cari=mysqli_query($koneksi, "select*from upload where nama_buku like '%$search%'");
?>
<div id="book" align="left">
	<font>Pencarian judul Ebook yang mengandung kata "<?php echo"$search";?>"</font><br></align>
	<?php
	if($cari->num_rows== 0){
		echo"<div align='center'><h1>Ebook tidak ada !!</h1> <div>";
	}else{?>
		<table>
		<?php while($data=mysqli_fetch_array($cari)){
			if($data['filetype']=='application/pdf'){
		?>
		
   	<tr id="list">
	  	
    	<td id="list-cover"><img src="<?php echo"$data[cover_buku]";?>" width="60px" height="85px"/></td>
    	<td id="list-nama"  width="720px"><a href="describe-book-admin.php?id=<?php echo"$data[id]";?>"><?php echo"$data[nama_buku]";?></a></td>
    </tr>
		<?php }else{echo"<h4><i>Uups... The book you are looking for does not exist<i></h4>";}}?>
	
	</table>
	
	<?php }?>
    <a href='book-admin.php' id='kembali'><h8><p align="left" style="margin-left:20px;">Pencarian lainnya klik disini ..</p></h8></a>
</div>


<div id="footer">
	<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>