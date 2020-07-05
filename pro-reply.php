<?php
session_start();
require"koneksi.php";
$to=$_POST['to'];
$pesan=$_POST['pesan'];
$tanggal=date("l, j F Y");

$simpan="UPDATE request SET dari='$_SESSION[user]' reply='$pesan', tgl_reply='$tanggal' WHERE id='".$_GET['id']."' ";
$query=mysql_query($simpan);
if($query){
	header('location:request.php');
}else{mysql_error();}
?>



