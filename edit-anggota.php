<?php
session_start();
require('koneksi.php');
if(!$_SESSION['level']=="1"){header('location:login.php');}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin : <?php echo"$_SESSION[user]";?></title>
<link rel="shortcut icon" type="x-image/icon" href="images/favicon.jpg" />
<link rel="stylesheet" type="text/css" href="css/download.css" />
<link rel="stylesheet" type="text/css" href="css/navigation.css" />
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div id="bar">
<img id="logo" src="images/favicon.jpg">
    <div id="space"></div>
    <a href="home-admin.php" title="Beranda"><li><img class="menu" src="images/icon/6.png"></li></a>
    <a href="book-admin.php" title="Ebook"><li><img class="menu" src="images/icon/13.png"></li></a>
    <hr>
    <a href="dashboard.php" title="Dashboard"><li><img class="menu" src="images/icon/14.png"></li></a>
    <!-- <a href="list-admin.php" title="Admin"><li><img class="menu" src="images/icon/10.png"></li></a>-->
    <a href="list-member.php" title="Kelola Data Anggota"><li><img class="menu" src="images/icon/12.png"></li></a> 
    <a href="add-book.php" title="Tambah Ebook"><li><img class="menu" src="images/icon/17.png"></li></a>
    <!-- <a href="edit-book.php" title="Edit Book"><li><img class="menu" src="images/icon/18.png"></li></a> -->
    <a href="list-delete-book.php" title="Hapus Ebook"><li><img class="menu" src="images/icon/11.png"></li></a>
    <a href="list-request.php" title="Saran, Masukan dan Request"><li><img class="menu" src="images/icon/9.png"></li></a>
    <hr>
    <a href="profile-admin.php" title="Profil"><li><img class="menu" src="images/icon/16.png"></li></a>
    <a href="pro-logout.php" title="Keluar" onClick="return confirm('Yakin ingin keluar ?');"><li><img class="menu" src="images/icon/1.png"></li></a>
</div>
    
<?php
    require('koneksi.php');
    if(isset($_GET['user'])){
        $user = $_GET['user'];
        $query2 =mysqli_query($koneksi, "SELECT * FROM user WHERE level='0' AND user = '$user' ");
        $row1 = mysqli_fetch_array($query2);
    //var_dump($row1);

    ?>
    
    
    <div id="input-download">
    <form method="post" action="pro-edit-anggota.php" >
    <h1> Edit Anggota</h1>
    <hr>
    <br>
    <table>
        <tr>
        	<td width="175px">User</td>
            <td><input type="text" name="user" readonly value="<?php echo $row1['user'] ?>" required /></td>
        </tr>
        <tr>
        	<td>Password</td>
            <td><input type="text" name="pwd" placeholder="Masukan Password" value="<?php echo $row1['password'] ?>" onkeyup="this.value = this.value.toLowerCase()" pattern=".{8,}" required title="Minimal password 8 karakter" /></td>
        </tr>
        <tr>
        	<td>Nama Lengkap</td>
            <td><input type="text" name="nama" value="<?php echo $row1['nama'] ?>" style="text-transform: capitalize;" placeholder="Masukan Nama Panjang" required onkeypress="return harusHuruf(event)"/></td>
        </tr>
        <tr>
        	<td>Tanggal lahir</td>
            <td><input type="date" name="tgl_lahir"  id="tgl_lhr" value="<?php echo $row1['tgl_lahir'] ?>" required="required" onchange="TDate()" /></td>
        </tr>
        <tr>
        	<td>Jenis Kelamin</td>
            <td><select name="jenis_kelamin"  required value="<?php echo $row1['jenis_kelamin']?>">
                    <option value="Laki - laki">Laki - laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td>Email</td>
            <td><input type="email" name="email" placeholder="library@example.com" value="<?php echo $row1['email'] ?>" required /></td>
        </tr>
        <tr>
        	<td>Nomer Telepon</td>
            <td><input type="text" name="no_tlp" placeholder="Masukan Nomor Telepon" value="<?php echo $row1['no_tlp'] ?>" required onkeypress="return hanyaAngka(event)" maxlength="14" /></td>
        </tr>
            <td></td>
            <td><input type="submit" name="edit" value="Edit Anggota" /></td>
        </tr>
        </tr>
    </form>
    </table>
    
    </div>
    
    
    <?php }?>
</div>
<script>
    function hanyaAngka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }

    function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode >122)&&charCode>32)

        return false;
        return true;
    }

    function TDate() {
    var UserDate = document.getElementById("tgl_lhr").value;
    var ToDate = new Date();

    if (new Date(UserDate).getTime() >= ToDate.getTime()) {
          alert("Tanggal harus lebih kecil dari hari ini");
          document.getElementById("tgl_lhr").valueAsDate = new Date();
          return false;
     }
    return true;
}
</script>
</body>
</html>