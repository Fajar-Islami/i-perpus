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
<title>Book</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
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
		<li><a href="profile.php"><?php echo"$_SESSION[nama]";?></a></li>
   		<li><a href="pro-logout.php">Log Out</a></li>
	</div>
	<?php }else{?><a class="masuk" href="login.php">Login</a><?php }?>


<div id="menu">
	<div id="text-menu">
    	<a href="home.php">Home</a>
    	<a href="book.php">Ebook</a>
        <?php if(!isset($_SESSION['user'])){?><a href="login.php" onclick="window.alert('Harap login terlebih dahulu');">Download</a><?php }else{?><a href="download.php">Download</a><?php }?>
        <?php if(!isset($_SESSION['user'])){?><a href="login.php" onclick="window.alert('Harap login terlebih dahulu');">Saran</a><?php }else{?><a href="request.php">Saran</a><?php }?>
    </div>
</div>

<div id="book">
	<font>Daftar Ebook</font>
    <div id="content">
    <table>
        <tr>
        <div id="category">
            <form method="post">
                    <select name="cat" onChange="this.form.submit()">
                    <option> ~ Kategori ~ </option>
                    <option value="<?php echo"all";?>">All</option>
                    <option value="<?php echo"Agama";?>">Agama</option>
                    <option value="<?php echo"Kesehatan";?>">Kesehatan</option>
                    <option value="<?php echo"Komputer";?>">Komputer</option>
                    <option value="<?php echo"Novel";?>">Novel</option>
                    <option value="<?php echo"Tutorial";?>">Tutorial</option>
                </select>
            </form>
        </div>
        </tr>
        <tr>
        <div id="search">
            <form method="post" action="search.php">
                <input type="hidden" name="kategori" value="<?php $cat=$_POST['cat'];?>"/>
                <input type="text" name="search" placeholder="Cari Judul Ebook..."/>
                <input type="submit" value="Cari" />
            </form>
        </div>
        </tr>
        <td><?php
        
        if(isset($_POST['cat'])){
            $kategori=$_POST['cat'];
            
            if($kategori!='all'){
                echo"Menampilkan untuk kategori \"$kategori\"";
            }else{
                echo"Menampilkan semua kategori ebook";
            }
        }
        ?></td>
    </table>
    </div>
    <table>
    	<tr>
		<?php
        $i = 1;
        $book=mysqli_query($koneksi, "select * from upload where filetype='application/pdf' order by id desc");
        if($_POST){
            $cat=$_POST['cat'];
            if($cat!='all'){
                    $book=mysqli_query($koneksi, "select * from upload where jns_buku='$cat' order by id desc");
            }
        }
        
        if($book->num_rows== 0){
            echo"<div align='center'><h1>Ebook tidak ada !!</h1> <div>";
        }else{?>

        <?php while($list=mysqli_fetch_array($book)){;?>
    		<td>
                <div id="book-list">
                    <a href="describ-book.php?id=<?php echo"$list[id]"?>">
                    <img id="list-cover" src="<?php echo"$list[cover_buku]";?>" title="<?php echo"$list[nama_buku]";?>"/>
                    </a>
                </div>
               <a href="describ-book.php?id=<?php echo"$list[id]"?>"><p align="center"><?php echo"$list[nama_buku]"?> <br> 
               <?php echo"$list[tahun_terbit]"?></p></a>
    		</td>
           
		<?php
            if($i % 6 == 0){echo '</tr><tr>';}
            $i++;
        }?>
        </tr>
        </table>
        <?php }?>
        
</div>

<div id="footer">
	<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>