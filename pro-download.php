<?php

require('koneksi.php');
 	
	
	$data=@mysqli_query($koneksi,"select*from upload where id=" . $_GET['id']);
	
	if($row=@mysqli_fetch_assoc($data)){
		$filedata=$row['filedata'];
		$filename=$row['nama_file'];
		$filetype=$row['filetype'];
		
		$back_dir=$row['file_buku'];
	}

	header('Content-type: ' . $filetype);
	header("Content-Transfer-Encoding: binarynn"); 
	header("Pragma: no-cache");
	header("Expires: 0");
	header('Content-disposition: attachment; filename="' . $filename . '"'); 
	readfile($back_dir);
	exit();
?>