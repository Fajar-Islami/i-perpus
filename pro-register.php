<?php
require('koneksi.php');

if(isset($_POST['create'])){
	$user=$_POST['user'];
	$pass1=$_POST['pwd'];
	//$pass2=md5['$pass1'];
	//$pass2=$_POST['pwd_con'];
	$nama=$_POST['nama'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$jk=$_POST['jenis_kelamin'];
	$email=$_POST['email'];
	$no_telp=$_POST['no_tlp'];
	
	$sql="SELECT * FROM user WHERE user='$user'";
	$query=$koneksi->query($sql);
	if($query->num_rows !=0){
		echo"<div align='center'><h1>Username sudah terdaftar !!</h1> <a href='#' onclick=goBack() id='kembali'><h3>Kembali</h3></a><div>";
	}else{
		$input="INSERT INTO user values('0','$user','$pass1','$nama','$tgl_lahir','$jk','$email','$no_telp',now(),'')";
		$daftar=$koneksi->query($input);
		if($daftar){
			//echo"<div align='center'><h1>Pendaftaran sukses !!</h1> <a href='login.php'><h3>Kembali</h3></a><div>";	
			echo "<script>alert('Pendaftaran sukses');window.location.href='login.php'</script>";
		}else{
			//echo"<div align='center'><h1>Proses gagal</h1><div>";	
			echo "<script>alert('Proses gagal');window.location.href='register.php'</script>";
		}
		//mysqli_query($koneksi,$query);
		//header('location:login.php');
	}
		
	/*
	}else{
		header('location:register.php');
		echo"<script language=\"javascript\">";
		echo"window.alert('Password Salah')";
	}
	*/
}

?>
<html>
<script>
function goBack() {
	window.history.back();
	var input = document.getElementById ("kembali");
	input.focus ();
}
</script>
</html>