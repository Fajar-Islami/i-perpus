<?php
session_start();
require('koneksi.php');
//if(!$_SESSION['level']=="0"){header('location:login.php');}

if(isset($_SESSION['user'])){
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE user = '$_SESSION[user]'");
	
	$row = mysqli_fetch_array($query);
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ebook</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/search.css" />
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
   		<li><a href="proses/pro-logout.php">Log Out</a></li>
	</div>
	<?php }else{?><a class="masuk" href="login.php">Sign In</a><?php }?>


<div id="menu">
	<div id="text-menu">
    	<a href="home.php">Home</a>
    	<a href="book.php">Ebook</a>
        <?php if(!isset($_SESSION['user'])){?><a href="#" onclick="window.alert('Harap login terlebih dahulu');">Download</a><?php }else{?><a href="download.php">Download</a><?php }?>
        <?php if(!isset($_SESSION['user'])){?><a href="#" onclick="window.alert('Harap login terlebih dahulu');">Saran</a><?php }else{?><a href="request.php">Saran</a><?php }?>
    </div>
</div>

<?php
	$search=$_POST['search'];
	$cari=mysqli_query($koneksi, "select*from upload where nama_buku like '%$search%'");
?>
<div id="book">
	<font>Pencarian judul Ebook yang mengandung kata "<?php echo"$search";?>"</font><br>
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
    	<td id="list-nama"  width="720px"><a href="describ-book.php?id=<?php echo"$data[id]";?>"><?php echo"$data[nama_buku]";?></a></td>
    </tr>
		<?php }else{echo"<h4><i>Uups... The book you are looking for does not exist<i></h4>";}}?>
	
	</table>
	
	<?php }?>
    <a href='book.php' id='kembali'><h8><p align="left" style="margin-left:20px;">Pencarian lainnya klik disini ..</p></h8></a>
</div>

<div id="footer">
	<i>No Created</i>  |  Copyright © 2019.
</div>

</body>
</html>