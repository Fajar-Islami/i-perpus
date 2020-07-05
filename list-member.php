<?php session_start();
require('koneksi.php');
if(isset($_SESSION['user'])){
	$query = mysqli_query($koneksi,"SELECT * FROM user WHERE user = '$_SESSION[user]'");
	//$hasil = mysqli_query($koneksi,$query);
	$row = mysqli_fetch_array($query);
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/list.css" />
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
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
<div id="content">
<div id="list">
    <h1>Kelola Data Anggota</h1><hr /><br />
	<table >
        <tr id="title">
        	<th id="stat"></th>
            <th>Username</th>
            <th>Nama</th>
            <th>Password</th>
            <th width="150px">Tanggal Lahir</th>
            <th width="120px">Jenis Kelamin</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Tanggal Daftar</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        require('koneksi.php');
        $member=mysqli_query($koneksi, "select * from user where level='0'");
        while($list=mysqli_fetch_array($member)){;?>
        <tr title="<?php echo"$list[user]";?>">
			<!-- <td><?php if($_SESSION['user']==$list['user']){?><div id="o"></div><?php }?></td> -->
            <td><img id="list-foto" src="<?php if($list['foto']==""){echo"photos/01.png";}else{echo"$list[foto]";}?>"/></td>
            <td width="150px" id="user"><b><?php echo"$list[user]";?></td></b>
            <td width="auto" id="user">&nbsp;&nbsp;<?php echo"$list[nama]";?>&nbsp;&nbsp;</td>
            <td  width="auto" id="user">&nbsp;&nbsp;<?php echo"$list[password]";?>&nbsp;&nbsp;</td>
            <td  width="auto" id="user">&nbsp;&nbsp;<?php if(!$list['tgl_lahir']==""){$tgl=$list['tgl_lahir'];
            echo date("d-F-Y", strtotime($tgl));}else{echo"-";}?>&nbsp;&nbsp;</td>
            <td width="auto" id="user">&nbsp;&nbsp;<?php echo"$list[jenis_kelamin]";?>&nbsp;&nbsp;</td>
            <td width="auto" id="user">&nbsp;&nbsp;<?php echo"$list[email]";?>&nbsp;&nbsp;</td>
            <td width="auto" id="user">&nbsp;&nbsp;<?php echo"$list[no_tlp]";?>&nbsp;&nbsp;</td>
            <td width="auto" id="user">&nbsp;&nbsp;<?php echo"$list[tgl_daftar]";?>&nbsp;&nbsp;</td>
            <td ><a href="edit-anggota.php?user=<?php echo"$list[user]";?>" ><img src="images/info-edit.png"  title="Edit"/></a></td>
            <td><a href="pro-blokir.php?user=<?php echo"$list[user]";?>" onclick="return confirm('Yakin ingin hapus username <?php echo"$list[user]";?> ?');"><img src="images/info-red.png" title="Hapus" /></a></td>
        </tr>
        <?php }?>
    </table>
</div>
    
    <?php
	if($_POST){
		require('koneksi.php');
		$nama=$_POST['nama'];
		$user=$_POST['user'];
		$email=$_POST['email'];
		$pass1=$_POST['pwd'];
		$pass2=$_POST['pwd_con'];
		if($pass1==$pass2){
			$query="insert into user(user,nama,email,password) values('$user','$nama','$email','$pass1')";
			mysql_query($query);
			header('location:list-member.php');
		}	
	}
	?>

</div>
<div style="clear:both"></div>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</div>
</body>
</html>