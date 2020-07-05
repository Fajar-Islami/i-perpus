<?php
session_start();
require"koneksi.php";
$nama=$_POST['nama'];
$user=$_POST['user'];
$email=$_POST['email'];
$jns_kel=$_POST['kel'];
$ttl=$_POST['tgl_lahir'];
$edit=mysql_query("UPDATE user SET user='$user', nama='$nama', email='$email', jns_kel='$jns_kel',ttl='$ttl' WHERE user='$_SESSION[user]'");
header('location:profile.php');
?>