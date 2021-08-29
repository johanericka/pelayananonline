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
		$actual_link = "https://$_SERVER[HTTP_HOST]";
		$subject = "Aktivasi Akun Sistem Persuratan FITK";
		$pesan = "Yth. " . $nama . "
							<br/>
							Assalamualaikum Wr. Wb.
							<br/>
							Akun anda di sistem Pelayanan Online Fakultas Humaniora UIN Maulana Malik Ibrahim Malang telah di aktifkan.
							<br/>
							Silahkan klik tombol berikut ini untuk melakukan pengajuan surat. 
							<br/>
							<a href='" . $actual_link . "' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
							<br/>
							atau klik <a href='" . $actual_link . "'>" . $actual_link . "</a>
							Wassalamualaiakum Wr. Wb.
							";
		sendmail($email, $nama, $subject, $pesan);
	}
	header('location:dashboard.php');
} else {
	header('location:daftar.php?pesan=passsalah');
}
