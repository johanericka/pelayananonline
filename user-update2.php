<?php
require 'config.php';
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nim = mysqli_real_escape_string($conn, $_POST['nim']);
$nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$passmd5 = md5($password);

/*
echo $userid . "<br/>";
echo $nama . "<br/>";
echo $nohp . "<br/>";
echo $email . "<br/>";
echo $userid . "<br/>";
echo $password . "<br/>";
echo $password2 . "<br/>";
echo $passmd5 . "<br/>";
*/

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
	header('location:deauth.php');
} else {
	header('location: daftar.php?pesan=passsalah');
}
