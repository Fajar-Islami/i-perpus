<?php
require('koneksi.php');

if(isset($_POST['edit'])){
	$user=$_POST['user'];
	$pass1=$_POST['pwd'];
	$nama=$_POST['nama'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$jk=$_POST['jenis_kelamin'];
	$email=$_POST['email'];
	$no_telp=$_POST['no_tlp'];
	
        $input="UPDATE user SET password='$pass1',nama='$nama',tgl_lahir='$tgl_lahir',jenis_kelamin='$jk',email='$email',no_tlp='$no_telp' WHERE user='$user'";
        mysqli_query($koneksi,$input);
        echo "<script>alert('Data anggota berhasil diubah');window.location.href='list-member.php'</script>";
    
    
}        
?>
