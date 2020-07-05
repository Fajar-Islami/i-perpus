<?php
session_start();
require('koneksi.php');
$user="delete from user where user='" . $_GET['user'] . "'";
$request="delete from request where user='" . $_GET['user'] . "'";
$blokir=mysqli_query($koneksi,$user);
$hapus=mysqli_query($koneksi,$request);
if($blokir && $hapus){
	echo "<script>alert('Data anggota berhasil dihapus');window.location.href='list-member.php'</script>";
	
}
?>