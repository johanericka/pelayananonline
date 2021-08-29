<?php
require '../config.php';
include '../assets/phpmailer/sendmail.php';

$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nim = mysqli_real_escape_string($conn, $_POST['nim']);
$nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$passmd5 = md5($password);

if ($password == $password2) {
	$qsimpan = mysqli_query($conn, "UPDATE pengguna 
									SET nama = '$nama',
										nim = '$nim',
										nohp = '$nohp',
										email ='$email',
										user = '$userid',
										pass = '$passmd5',
										plaintext = '$password'
									WHERE user='$userid'");
	header('location:../deauth.php');
} else {
	header('location:user-edit3.php?pesan=passsalah');
}
