<?php
require '../config.php';
include '../assets/phpmailer/sendmail.php';

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
	$qsimpan = mysqli_query($conn, "UPDATE pengguna 
									SET nama = '$nama',
										nohp = '$nohp',
										email ='$email',
										prodi = '$prodi',
										user = '$userid',
										pass = '$passmd5',
										plaintext = '$password',
										prodi = '$prodi',
										role = '$role',
										status = '$status'
									WHERE no='$nodata'");

	if ($status == '1') {
		//kirim email user
		$subject = "Aktivasi Akun Sistem Persuratan FITK";
		$pesan = "Yth. " . $nama . "
							<br/>
							Assalamualaikum Wr. Wb.
							<br/>
							Akun anda di sistem persuratan FITK telah di aktifkan.
							<br/>
							Silahkan akses sistem persuratan FITK <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan pengajuan surat. 
							<br/>
							Wassalamualaiakum Wr. Wb.
							";
		sendmail($email, $nama, $subject, $pesan);
	}
	header('location:dashboard.php');
} else {
	header('location:daftar.php?pesan=passsalah');
}
