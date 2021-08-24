<?php
require '../config.php';
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$passmd5 = md5($password);

echo $userid . "<br/>";
echo $nama . "<br/>";
echo $nohp . "<br/>";
echo $email . "<br/>";
echo $userid . "<br/>";
echo $password . "<br/>";
echo $passmd5 . "<br/>";

if ($password == $password2) {
	$qsimpan = mysqli_query($conn, "UPDATE staff 
									SET nama = '$nama',
										nohp = '$nohp',
										email ='$email',
										username = '$userid',
										password = '$passmd5',
										plaintext = '$password'
									WHERE username='$userid'");
	header('location: dashboard.php');
} else {
	echo "ERROR = " . mysqli_eror;
}
