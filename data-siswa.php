<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<titleAdmin : <?php echo"$_SESSION[user]"?></title>
</head>

<body>
<h2>Data Siswa</h2>
<a href="add-admin.php"><i>Add Student</i></a>
<table>
	<tr>
        <th rowspan="2">No. Ujian</th>
        <th rowspan="2">Nama</th>
        <th colspan="10">Mata Pelajaran</th>
        <th colspan="2" rowspan="2">Aksi</th>
   	</tr>
    <tr>
    	<th>B.Indonesia</th>
        <th>Matematika</th>
        <th>B.Inggris</th>
        <th>Fisika</th>
        <th>Kimia</th>
        <th>Biologi</th>
        <th>Ekonomi</th>
        <th>Geologi</th>
        <th>Sosiologi</th>
        <th>Ket.</th>
<?php
	$query=mysql_query("select*from user");
	while($data=mysql_fetch_array($query)){
?>
	<tr>
        <td><?php echo"$data[no_uji]";?></td>
        <td><?php echo"$data[nama]";?></td>
        <td><a href="edit-admin.php">Edit</a></td>
        <td><a href="del-admin.php">Delete</a></td>
   	</tr>
<?php
	}
?>
</table>
</body>
</html>