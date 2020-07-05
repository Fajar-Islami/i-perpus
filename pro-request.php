<?php 
require('koneksi.php');
require('pro-login.php');
if(isset($_POST['send'])){
$user="$_SESSION[user]";
$nama="$_SESSION[nama]";
$email="$_SESSION[email]";
$pesan=$_POST['pesan'];
//$tanggal=date("l, j F Y");
$query="INSERT INTO request(id, user, nama, email, pesan, tanggal) values('','$user','$nama','$email','$pesan',now())";
$request=mysqli_query($koneksi, $query);
//echo"<script language=\"javascript\">";
if($request){
	echo "<script>alert('Saran berhasil terkirim');window.location.href='request.php'</script>";
	//header('location:request.php');
	//echo"window.alert('Request has been send')";
}else{
	echo "<script>alert('Saran gagal terkirim');window.location.href='request.php'</script>";
	//header('location:request.php');
	//echo"window.alert('Request has not send')";
}
//echo"</script>";
}
?>