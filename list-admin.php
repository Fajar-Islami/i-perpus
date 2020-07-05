<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/list.css" />
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
    <a href="pro-logout.php" title="Keluar" onClick="return confirm('Are you sure ?');"><li><img class="menu" src="images/icon/1.png"></li></a>
</div>
<div id="content">
<div id="list">
	<table>
        <tr id="title">
        	<th id="stat"></th>
            <th colspan="3">Admin</th>
        </tr>
        <?php
        $member=mysql_query("select * from user where level='1' order by level asc");
        while($list=mysql_fetch_array($member)){;?>
        <tr title="<?php echo"$list[nama]";?>">
			<td><?php if($_SESSION['user']==$list['user']){?><div id="o"></div><?php }?></td>
            <td><img id="list-foto" src="<?php if($list['foto']==""){echo"photos/01.png";}else{echo"$list[foto]";}?>"/></td>
            <td width="250px" id="user"><?php echo"$list[user]";?></td>
            <td><?php echo"$list[email]";?></td>
        </tr>
        <?php }?>
    </table>
</div>
<div id="daftar">
	<form method="post" name="add_admin">
    <table id="register">
        <tr>
            <th colspan="2" class="judul-form">Add Admin</th>
        </tr>
        <tr>
            <td class="text-input">Name</td>
            <td><input type="text" name="nama" placeholder="Full Name"required="required"/></td>
        </tr>
        <tr>
            <td class="text-input">Username</td>
            <td><input type="text" name="user" placeholder="Username" required="required"/></td>
        </tr>
        <tr>
            <td class="text-input">Email</td>
            <td><input type="text" name="email" placeholder="library@example.com" required="required"/></td>
        </tr>
        <tr>
            <td class="text-input">Password</td>
            <td><input type="password" name="pwd" placeholder="Password" required="required"/></td>
        </tr>
        <tr>
            <td class="text-input">Confirm Password</td>
            <td><input type="password" name="pwd_con" placeholder="Re-Enter Password" required="required"/></td>
        </tr>
        <tr>
            <td></td>
            <td class="submit"><input type="submit" value="Create" ></td>
        </tr>
    </table>
    </form>
    
    <?php
	if($_POST){
		require'koneksi.php';
		$nama=$_POST['nama'];
		$user=$_POST['user'];
		$email=$_POST['email'];
		$pass1=$_POST['pwd'];
		$pass2=$_POST['pwd_con'];
		if($pass1==$pass2){
			$query="insert into user(user,nama,email,password,level) values('$user','$nama','$email','$pass1','1')";
			mysql_query($query);
			header('location:list-admin.php');
		}	
	}
	?>
    
</div>
<div style="clear:both"></div>
</div>
</body>
</html>