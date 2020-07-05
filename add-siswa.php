<?php
session_start();
require('koneksi.php');
if(!$_SESSION['level']=="1"){header('location:login.php');}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin : <?php echo"$_SESSION[user]"?></title>
</head>

<body>
<h2>Add Admin</h2>
<form method="post">
<table>
	<tr>
    	<td>No. Ujian</td>
        <td><input type="text" name="no_uji" required="required" /></td>
   	</tr>
    <tr>
    	<td>Nama</td>
        <td><input type="text" name="nama" required="required" /></td>
   	</tr>
    <tr>
    	<td>Tgl. Lahir</td>
        <td><input type="text" name="tgl_lhr" required="required" /></td>
   	</tr>
    <tr>
    	<td>Kelas</td>
        <td><input type="text" name="kelas" required="required" /></td>
   	</tr>
    <tr>
    	<td>Jurusan</td>
        <td><input type="text" name="jurusan" required="required" /></td>
   	</tr>
</table>
</form>
</body>
</html>