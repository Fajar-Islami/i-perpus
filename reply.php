<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Request</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/reply.css" />
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
		<li><a href="profile.php?<?php echo"$_SESSION[user]";?>"><?php echo"$_SESSION[user]";?></a></li>
   		<li><a href="pro-logout.php">Log Out</a></li>
	</div>
	<?php }else{?><a class="masuk" href="login.php">Login</a><?php }?>


<div id="menu">
	<div id="text-menu">
    	<a href="home.php">Home</a>
    	<a href="book.php">Ebook</a>
        <a href="download.php">Download</a>
        <a href="request.php">Saran</a>
        <?php if($_SESSION['level']=="1"){?><a href="member.php">Member</a><?php }?>
    </div>
</div>

<div id="reply">
	<?php
	if(isset($_GET)){
	$request=mysql_query("select*from request where id='".$_GET['id']."'");
	$data=mysql_fetch_array($request);
	}
	?>
	<form method="post">
    <table>
    	<tr>
        	<td align="right" class="text">To  </td>
            <td><input type="text" name="to" value="<?php if(isset($_GET)){echo"$data[user]";}?>" placeholder="Receiver" required="required"/></td>
        </tr>
        <tr>
        	<td align="right" class="text">Request  </td>
            <td><font class="quote">ˮ</font> <i><?php echo"$data[pesan]";?></i> <font class="quote">ˮ</font></td>
        </tr>
        <tr>
        	<td></td>
            <td><textarea name="pesan"></textarea></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" value="Reply"/></td>
        </tr>
   	</table>
    </form>
    <?php
	if($_POST){
		require"koneksi.php";
		$to=$_POST['to'];
		$pesan=$_POST['pesan'];
		$tanggal=date("l, j F Y");
		$simpan="UPDATE request SET dari='$_SESSION[user]', reply='$pesan', tgl_reply='$tanggal' WHERE id='".$_GET['id']."' ";
		$reply=mysql_query($simpan);
		if($reply){
			header('location:request.php');
		}else{mysql_error();}	
	}
	?>
</div>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>