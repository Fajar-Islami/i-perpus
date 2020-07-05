<?php
session_start();
require('koneksi.php');
$query=mysqli_query($koneksi, "delete from upload where id='". $_GET['id'] ."'");
//$hapus=mysqli_query($koneski,$query);
echo "<script>alert('Data buku berhasil dihapus');window.location.href='list-delete-book.php'</script>";

?>