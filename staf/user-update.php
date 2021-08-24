<?php
require '../config.php';

$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$passmd5 = md5($password);
$prodi = $_POST['prodi'];
$role = $_POST['role'];
$status = $_POST['status'];

/*
echo $nama . "<br/>";
echo $nohp . "<br/>";
echo $email . "<br/>";
echo $userid . "<br/>";
echo $password . "<br/>";
echo $password2 . "<br/>";
echo $prodi . "<br/>";
echo $role . "<br/>";
echo $status . "<br/>";
*/
if ($password == $password2) {
	$qsimpan = mysqli_query($conn, "UPDATE staff 
									SET nama = '$nama',
										nohp = '$nohp',
										email ='$email',
										prodi = '$prodi',
										username = '$userid',
										password = '$passmd5',
										plaintext = '$password',
										prodi = '$prodi',
										role = '$role',
										status = '$status'
									WHERE no='$nodata'");
	header('location: user-tampil.php');
} else {
	echo "ERROR = " . mysqli_eror;
}
