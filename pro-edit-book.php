<?php
	
	if(isset($_POST['edit'])){
        require('koneksi.php');

	$filedata = addslashes(fread(fopen($_FILES['file_buku']['tmp_name'], 'r'), $_FILES['file_buku']['size']));
	$filetype  = $_FILES['file_buku']['type'];
   	$filesize = $_FILES['file_buku']['size'];
   	$filename = $_FILES['file_buku']['name'];
   	
    $id=$_POST['id'];
	$nama_buku=$_POST['nama_buku'];
	$penerbit=$_POST['penerbit'];
	$pengarang=$_POST['pengarang'];
	$tahun_terbit=$_POST['tahun_terbit'];
	$jns_buku=$_POST['jns_buku'];
	$nama_input=$_POST['nama_admin'];
	$cover=$_FILES['cover_buku']['name'];
	$cover2=$_FILES['cover_buku']['type'];

    $dircover='./upload/cover/';
	$dirbuku ='./upload/file/';
    $loc_cover=$dircover.$cover;
	$loc_file=$dirbuku.$filename;

	if ($filetype=="application/pdf" AND $cover2=="image/png" || $cover2=="image/jpeg" || $cover2=="image/jpg" || $cover2=="image/JPG") {
		if(move_uploaded_file($_FILES['file_buku']['tmp_name'],$loc_file) && move_uploaded_file($_FILES['cover_buku']['tmp_name'],$loc_cover))
		{
			$q ="UPDATE upload SET nama_buku='$nama_buku',penerbit='$penerbit',pengarang='$pengarang',tahun_terbit='$tahun_terbit',jns_buku='$jns_buku',cover_buku='upload/cover/$cover',file_buku='upload/file/$filename',filetype='$filetype',filedata='$filedata',nama_file='$filename',filesize='$filesize',admin_input='$nama_input' WHERE id='$id'";
			mysqli_query($koneksi,$q);
			
			$upl= basename( $_FILES['file_buku']['name']);
			echo "<script>alert('File  $upl Berhasil diedit');window.location.href='book-admin.php'</script>";
			//echo "File Berhasil di Upload  file ". basename( $_FILES['file_buku']['temp_name']). " is uploaded";
			//header('location:book-admin.php');
		//Jalankan perintah insert ke database
		}
		else {
		echo "File Gagal di Upload";
		}
	   }
	else {
		echo "<div align='center'><h1>Hanya Boleh upload PDF untuk Ebook dan JPEG/GIF/PNG/JGP untuk Cover</h1> <a href='#' onclick=goBack() id='kembali'><h3>Kembali</h3></a><div>.<br>";
	}
	}
   	//move_uploaded_file($_FILES['cover_buku']['tmp_name'],$loc_cover);
	//move_uploaded_file($_FILES['file_buku']['tmp_name'],$loc_file);
	
    
	//}
?>
<script>
function goBack() {
	window.history.back();
	var input = document.getElementById ("kembali");
	input.focus ();
}
</script>