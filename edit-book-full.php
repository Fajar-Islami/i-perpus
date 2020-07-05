<?php
session_start();
require('koneksi.php');
if(!$_SESSION['level']=="1"){header('location:login.php');}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
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
    <a href="pro-logout.php" title="Keluar" onClick="return confirm('Yakin ingin keluar?');"><li><img class="menu" src="images/icon/1.png"></li></a>
</div>
    
<?php
    require('koneksi.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    $query1 =mysqli_query($koneksi, "SELECT * FROM upload WHERE id = $id");
    $row1 = mysqli_fetch_array($query1);
    // var_dump($row1);exit;

    
    ?>
    
    <div id="input-download">
    <form method="post" action="pro-edit-book.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row1['id'] ?>"/>
    <h1> Edit Ebook</h1>
	<hr>
    <table>
    
        <tr>
        	<td width="175px">Judul Ebook</td>
            <td><input type="text" name="nama_buku" value="<?php echo $row1['nama_buku'] ?>" required /></td>
        </tr>
        <tr>
        	<td>Penerbit</td>
            <td><input type="text" name="penerbit" value="<?php echo $row1['penerbit'] ?>" required /></td>
        </tr>
        <tr>
        	<td>Pengarang</td>
            <td><input type="text" name="pengarang" value="<?php echo $row1['pengarang'] ?>" required/></td>
        </tr>
        <tr>
        	<td>Tahun Terbit</td>
            <td><input type="number" name="tahun_terbit" value="<?php echo $row1['tahun_terbit'] ?>" required onkeypress="return hanyaAngka(event)" maxlength="4" min="1" max="2019" /></td>
        </tr>
        <tr>
        	<td>Kategori</td>
            <td><select name="jns_buku" placeholder="Masukan Kategori Ebook.." required value="<?php echo $row1['jns_buku']?>">
                    <option value="Agama">Agama</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Komputer">Komputer</option>
                    <option value="Novel">Novel</option>
                    <option value="Tutorial">Tutorial</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td>Cover Ebook</td>
            <td><input type="file" name="cover_buku" accept="image/*" required/></td>
        </tr>
        <tr>
        	<td>File Ebook</td>
            <td><input type="file" name="file_buku" acccept="application/*" required /></td>
        </tr>
        <tr><td>ID Admin</td><td><input type="text" name="nama_admin" readonly value="<?php echo"$_SESSION[user]";?>" required/></td></tr>
        <tr>
        <tr><td></td><td><input type="submit" name="edit" value="Edit Ebook" /></td></tr>
        </tr>
    </form>
    </table>
    </div>
    <?php } ?>
<script>
function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>
</div>