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
<link rel="stylesheet" type="text/css" href="css/book.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<script type="text/javascript" src="js/jquery.min_2.js"></script>
<script type="text/javascript" src="js/akun-opt.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

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
            <form method="post" action="search-admin.php">
                <input type="hidden" name="kategori" value="<?php $cat=$_POST['cat'];?>"/>
                <input type="text" name="search" placeholder="Cari Judul EBook..."/>
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
                    <a href="describe-book-admin.php?id=<?php echo"$list[id]"?>">
                    <img id="list-cover" src="<?php echo"$list[cover_buku]";?>" title="<?php echo"$list[nama_buku]";?>"/>
                    </a>
                </div>
               <a href="describe-book-admin.php?id=<?php echo"$list[id]"?>"><p align="center"><?php echo"$list[nama_buku]"?> <br> 
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