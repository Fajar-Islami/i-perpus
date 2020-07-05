<?php
	session_start();
    require('koneksi.php');
    if(isset($_POST['upload'])){
    $fileName = $_FILES['foto']['name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $uploaddir='./photos/';
    $lokasi=$uploaddir.$fileName;
    if($fileName=="image/png" || $fileName=="image/jpeg" || $fileName=="image/jpg" ){
   		if ($move = move_uploaded_file($_FILES['foto']['tmp_name'],$lokasi)){
    		$q = "UPDATE user SET foto='photos/$fileName' WHERE user='$_SESSION[user]'";
   			mysqli_query($koneksi,$q);
			header('location:profile.php');
 		} else{
    		echo "<h3>Failed! </h3>";
    	}
    } else {
    echo "Failed to Upload : ".$fileError;
    }
}
?>