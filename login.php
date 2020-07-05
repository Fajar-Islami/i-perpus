<?php session_start(); if(isset($_SESSION['user'])){header('location:home.php');}?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
</head>

<body>
<img class="logo" src="images/favicon.jpg" width="40px" height="40px"/>
<div id="menu">
	<div id="text-menu">
    </div>
</div><br />
<form method="post" action="pro-login.php">
<div id="table-login">
<font id="login-head">Login</font>
<table id="login" cellpadding="5px">
	<tr><td><input type="text" name="user" placeholder="Username" onkeyup="this.value = this.value.toLowerCase()"  required autofocus/></td></tr>
	<tr><td><input type="password" name="pwd" placeholder="Password" onkeyup="this.value = this.value.toLowerCase()" required/></td></tr>
	<tr><td id="submit-btn"><input name="login" type="submit" value="Masuk" /></td></tr>
</table>
</div>
</form>
<div id="content">
	<div id="content-text">
		<font size="+6">Belum punya akun ?</font><br />Daftar segera dan dapatkan eBook secara gratis.
	</div>
    <br />
	<font class="content-btn"><a href="register.php">Daftar Sekarang »</a></font>
	<!--<font class="content-btn"><a href="forgot.php">Lupa Password »</a></font>-->
</div>
<div id="footer">
<i>No Created</i>  |  Copyright © 2019.
</div>
</body>
</html>