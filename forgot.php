<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Password</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/forgot.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
</head>

<body>
<img class="logo" src="images/favicon.jpg" width="40px" height="40px"/>
<div id="menu">
	<div id="text-menu">
    </div>
</div><br />
<form method="post">
<div id="table-login">
<font id="login-head">Account</font>
<table id="login" cellpadding="5px">
	<tr><td><input type="text" name="user" placeholder="Username" /></td></tr>
	<tr><td><input type="text" name="email" placeholder="Email" /></td></tr>
	<tr><td id="submit-btn"><input type="submit" value="Show Password" /></td></tr>
    <tr><td>
    	<a href="login.php"><font class="btn">Login</font></a>
        <a href="register.php"><font class="btn">Register</font></a>
    </td></tr>
</form>
	<?php
	if($_POST){
		require"koneksi.php";
		$user=$_POST['user'];
		$email=$_POST['email'];
		$query=mysql_query("select*from user where user='$user'");
		$data=mysql_fetch_array($query);
		if($email==$data['email']){?>
	<tr><td><input type="text" value="<?php echo"$data[password]";?>" readonly="readonly"/></td></tr>
		<?php }else{?>
	<tr><td><input type="text" value="Data tidak ditemukan" readonly="readonly"/></td></tr>
        <?php }?>
    <?php }?>
</table>
</div>

<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>