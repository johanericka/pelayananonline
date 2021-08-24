<?php
require('config.php');
//session_start();

if (!isset($_POST['userid'], $_POST['password'])) {
	header('location:index.php?pesan=gagal');
}

$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$password = mysqli_real_escape_string($conn, strtolower($_POST['password']));
//echo $userid;
//echo $password;

//cek apakah yang login dosen / mahasiswa
$quser = mysqli_query($dbsiakad, "SELECT * FROM useraccount2 WHERE kode='$userid' AND lower(pass)='$password'");
$datauser = mysqli_fetch_array($quser);
$jmluser = mysqli_num_rows($quser);
if ($jmluser > 0) {
	//cek user dosen / mahasiswa
	$nama = $datauser['nama'];
	$email = $datauser['email'];
	if (strlen($userid) == 5) {
		//echo "User dosen";
		session_start();
		$kdprodi = substr($userid, 0, 2);
		$qprodi = mysqli_query($conn, "SELECT * FROM prodi WHERE kodeprodi='$kdprodi'");
		$dataprodi = mysqli_fetch_array($qprodi);
		$namaprodi = $dataprodi['namaprodi'];
		echo "Nama Prodi = " . $namaprodi;
		$_SESSION['userid'] = $userid;
		$_SESSION['nama'] = $nama;
		$_SESSION['role'] = 'dosen';
		$_SESSION['prodi'] = $namaprodi;
		header('location:dosen/dashboard.php');
	} else {
		//echo "User mahasiswa";
		session_start();
		$_SESSION['userid'] = $userid;
		$_SESSION['nama'] = $nama;
		$_SESSION['email'] = $email;
		$_SESSION['role'] = 'mahasiswa';
		echo "User Mahasiswa";

		if (strlen($userid) == 8) {
			//mahasiswa NIM lama
			$kdprodi = substr($userid, 2, 2);
			echo "Kode Prodi = " . $kdprodi;
		} else {
			//mahasiswa NIM baru
			$kdprodi = substr($userid, 2, 5);
			echo "Kode Prodi = " . $kdprodi;
		}
		$qprodi = mysqli_query($conn, "SELECT * FROM prodi WHERE kodeprodi='$kdprodi'");
		$dataprodi = mysqli_fetch_array($qprodi);
		$namaprodi = $dataprodi['namaprodi'];
		$jenjang = $dataprodi['jenjang'];
		$_SESSION['prodi'] = $namaprodi;
		$_SESSION['jenjang'] = $jenjang;
		header('location:mahasiswa/dashboard.php');
	}
} else {
	//user staff
	$sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$userid' AND password=md5('$password')");
	$datauser = mysqli_fetch_array($sql);
	$nama = $datauser['nama'];
	$prodi = $datauser['prodi'];
	$role = $datauser['role'];
	$email = $datauser['email'];
	$status = $datauser['status'];
	$jmldata = mysqli_num_rows($sql);
	if ($jmldata > 0) {
		if ($status == 1) {
			echo "User tendik";
			session_start();
			$_SESSION['userid'] = $userid;
			$_SESSION['nama'] = $nama;
			$_SESSION['role'] = $role;
			$_SESSION['prodi'] = $prodi;
			$_SESSION['email'] = $email;
			header('location:staf/dashboard.php');
		} else {
			header('location:index.php?pesan=notactive');
		}
	} else {
		header('location:index.php?pesan=gagal');
	}
}
