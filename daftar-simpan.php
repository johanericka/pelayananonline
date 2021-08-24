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

/*
echo $nama . "<br/>";
echo $nim . "<br/>";
echo $nohp . "<br/>";
echo $email . "<br/>";
echo $userid . "<br/>";
echo $password . "<br/>";
echo $password2 . "<br/>";
echo $prodi . "<br/>";
*/
if ($kunci == $hasil) {
	$quser = mysqli_query($conn, "SELECT * FROM pengguna WHERE user='$user'");
	$nuser = mysqli_num_rows($quser);
	if ($nuser > 0) {
		header('location: index.php?pesan=exist');
	} else {
		if ($password == $password2) {
			$qsimpan = mysqli_query($conn, "INSERT INTO pengguna (nama,nim,nohp,email,prodi,user,pass,plaintext)
													VALUES ('$nama','$nim','$nohp','$email','$prodi','$userid','$passmd5','$password')");

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
									Silahkan akses sistem Persuratan <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan aktivasi user.
									<br/>
									Wassalamualaikum Wr. Wb.
									";
				sendmail($emailfak, $namaadmin, $subject, $pesan);
			}

			//cari email admin prodi
			$qadminprodi = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminprodi' AND prodi='$prodi'");
			while ($dadminprodi = mysqli_fetch_array($qadminprodi)) {
				$emailprodi = $dadminprodi['email'];
				$namaadminprodi = $dadminprodi['nama'];

				$subject = "Notifikasi Pendaftaran Pengguna Baru";
				$pesan = "Yth. " . $namaadminprodi . "
									<br/>
									Assalamualaikum Wr. Wb.
									<br/>
									Terdapat pendaftar baru atas nama " . $nama . ".
									<br/>
									Silahkan akses sistem Persuratan <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan aktivasi user.
									<br/>
									Wassalamualaikum Wr. Wb.
									";
				sendmail($emailprodi, $namaadminprodi, $subject, $pesan);
			}

			//kirim email user
			$subject = "Pendaftaran Sistem Persuratan FITK";
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
