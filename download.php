<?php session_start();
require('koneksi.php');
if(isset($_SESSION['user'])){
	$query =mysqli_query($koneksi, "SELECT * FROM user WHERE user = '$_SESSION[user]'");
	//$hasil = mysqli_query($koneksi,$query);
	$row = mysqli_fetch_array($query);
}else{
	header('location:login.php');
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Download</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/download.css" />
<link rel="stylesheet" type="text/css" href="css/book.css" />
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

<div id="download">

	<div id="book2">
	<font>Daftar Ebook</font>
	</div>
	<div id="search2">
            <form method="post" action="download-user.php">
                <input type="hidden" name="kategori" value="<?php $cat=$_POST['cat'];?>"/>
                <input type="text" name="search" placeholder="Cari Judul Ebook..."/>
                <input type="submit" value="Cari" name="cari" />
            </form>
        </div>
	<br>
	
	<table>
	<tr id="judul">
		<?php 
			$download=mysqli_query($koneksi,"select*from upload ");
			if($download->num_rows== 0){
				echo"<div align='center'><h1>Ebook tidak ada !!</h1> <div>";
			}else{ ?>
				<td colspan="2">Book</td>
        		<td id="action">Download</td>
        <?php } ?>
    
	</tr>
	<?php 
if(isset($_POST['cari'])){
    $search=$_POST['search'];
    $cari=mysqli_query($koneksi, "select*from upload where nama_buku like '%$search%'");
    while($list=mysqli_fetch_array($cari)){?>
        <tr id="list">
            <td id="list-cover"><a href="<?php echo"$list[cover_buku]";?>"><img src="<?php echo"$list[cover_buku]";?>" width="50px" height="75px"/></a></td>
            <td id="list-nama"  width="720px"><?php echo"$list[nama_buku]";?></td>
            <td class="action-book"><a href="pro-download.php?id=<?php echo"$list[id]";?>"><img src="images/download.png" /></a></td>
        </tr>
  
<?php }?>
<?php }?>
<?php 
$download=mysqli_query($koneksi,"select * from upload order by id desc");
while($list=mysqli_fetch_array($download)){?>
	<tr id="list">
    	<td id="list-cover"><a href="<?php echo"$list[cover_buku]";?>"><img src="<?php echo"$list[cover_buku]";?>" width="50px" height="75px"/></a></td>
    	<td id="list-nama"  width="720px"><?php echo"$list[nama_buku]";?></td>
        <td class="action-book"><a href="pro-download.php?id=<?php echo"$list[id]";?>"><img src="images/download.png" /></a></td>
    </tr>
<?php }?>
	</table>
</div>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
<body>
</body>
</html>