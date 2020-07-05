<?php
session_start();
require('koneksi.php');

if(isset($_POST['login'])){
$user=$_POST['user'];
$pass=$_POST['pwd'];
$sql = "SELECT * FROM user WHERE user = '$user'";
$query=$koneksi->query($sql);
$hasil = $query->fetch_assoc();

if($query->num_rows== 0){
	echo"<div align='center'><h1>Username belum terdaftar !!</h1> <a href='login.php'><h3>Kembali</h3></a><div>";
}else{
	if($pass<>$hasil['password']){
		echo"<div align='center'><h1>Password salah !!</h1> <a href='login.php'><h3>Kembali</h3></a><div>";
	}else{
		// menyimpan username dan level ke dalam session
		$_SESSION['level'] = $hasil['level'];
		$_SESSION['user'] = $hasil['user'];
		$_SESSION['password'] = $hasil['password'];
		$_SESSION['nama'] = $hasil['nama'];
		$_SESSION['tgl_lahir'] = $hasil['tgl_lahir'];
		$_SESSION['jenis-kelamin'] = $hasil['jenis_kelamin'];
		$_SESSION['email'] = $hasil['email'];
		$_SESSION['no_tlp'] = $hasil['no_tlp'];
		$_SESSION['tgl_daftar'] = $hasil['tgl_daftar'];
		$_SESSION['foto'] = $hasil['foto'];
		$nama=$hasil['nama'];
		if($_SESSION['level']=="1"){
			echo "<script>alert('Login sebagai Admin !!');window.location.href='home-admin.php'</script>";
			//header('location:home-admin.php');
		}else{
			echo "<script>alert('Login berhasil !!\\nLogin sebagai $nama');window.location.href='book.php'</script>";
	 	//header('location:home.php');
 		}
	}
}

}
?>