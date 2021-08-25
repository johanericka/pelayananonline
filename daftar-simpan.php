<?php
require 'config.php';
include 'assets/phpmailer/sendmail.php';

$kunci = mysqli_real_escape_string($conn, $_POST['kunci']);
$hasil = mysqli_real_escape_string($conn, $_POST['hasil']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nim = mysqli_real_escape_string($conn, $_POST['nim']);
$nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$passmd5 = md5($password);
$prodi = $_POST['prodi'];
$token = md5(microtime());


if ($kunci == $hasil) {
	$quser = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim' or email='$email'");
	$nuser = mysqli_num_rows($quser);
	if ($nuser > 0) {
		header('location: index.php?pesan=exist');
	} else {
		if ($password == $password2) {
			$qsimpan = mysqli_query($conn, "INSERT INTO pengguna (nama,nim,nohp,email,prodi,user,pass,plaintext,token)
													VALUES ('$nama','$nim','$nohp','$email','$prodi','$userid','$passmd5','$password','$token')");

			//kirim email notifikasi			

			//cari email admin fakultas
			$qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
			while ($dadminfak = mysqli_fetch_array($qadminfak)) {
				$emailfak = $dadminfak['email'];
				$namaadmin = $dadminfak['nama'];

				$subject = "Notifikasi Pendaftaran Pengguna Baru";
				$pesan = "Yth. " . $namaadmin . "
									<br/>
									Assalamualaikum Wr. Wb.
									<br/>
									Terdapat pendaftar baru atas nama " . $nama . ".
									<br/>
									Silahkan klik tombol berikut ini untuk melakukan aktivasi pengguna.
									<br/>
									<a href='https://humaniora.uin-malang.ac.id/pelayananonline/' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
									<br/>
									Wassalamualaikum Wr. Wb.
									";
				sendmail($emailfak, $namaadmin, $subject, $pesan);
			}

			//kirim email user
			$subject = "Pendaftaran Sistem Pelayanan Online Fakultas Humaniora UIN Malang";
			$pesan = "Yth. " . $nama . "
									<br/>
									Assalamualaikum Wr. Wb.
									<br/>
									Pendaftaran anda sedang menunggu aktivasi dari Bagian Administrasi.
									<br/>
									Akan ada email pemberitahuan selanjutnya apabila akun anda sudah di aktivasi.
									<br/>
									Wassalamualaiakum Wr. Wb.
									";
			sendmail($email, $nama, $subject, $pesan);

			header('location: index.php?pesan=success');
		} else {
			header('location: daftar.php?pesan=passsalah');
		}
	}
} else {
	header('location: daftar.php?pesan=hitungsalah');
}
