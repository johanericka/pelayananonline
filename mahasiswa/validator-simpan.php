<?php
require "../config.php";
include '../assets/phpmailer/sendmail.php';

date_default_timezone_set("Asia/Jakarta");
$tglpengajuan = date('Y-m-d H:i:s');
$nama = mysqli_real_escape_string($conn, "$_POST[nama]");
$nim = mysqli_real_escape_string($conn, "$_POST[nim]");
$prodi = mysqli_real_escape_string($conn, "$_POST[prodi]");
$nohp = mysqli_real_escape_string($conn, "$_POST[nohp]");
$email = mysqli_real_escape_string($conn, "$_POST[email]");
$jenjang = mysqli_real_escape_string($conn, "$_POST[jenjang]");
$validasi = mysqli_real_escape_string($conn, "$_POST[validasi]");
$keperluan = mysqli_real_escape_string($conn, "$_POST[keperluan]");
$judul = mysqli_real_escape_string($conn, "$_POST[judul]");
$dosen1 = mysqli_real_escape_string($conn, "$_POST[dosen1]");
$dosen2 = mysqli_real_escape_string($conn, "$_POST[dosen2]");
$validator = mysqli_real_escape_string($conn, "$_POST[validator]");

//cari verifikator
$qverifikator = mysqli_query($conn, "SELECT * FROM prodi WHERE namaprodi='$prodi'");
$dverifikator = mysqli_fetch_array($qverifikator);
$verifikator = $dverifikator['verifikator'];
/*
echo "Tgl. Pengajuan = " . $tglpengajuan . "<br/>";
echo "Nama = " . $nama . "<br/>";
echo "NIM = " . $nim . "<br/>";
echo "Prodi = " . $prodi . "<br/>";
echo "Jenjang = " . $jenjang . "<br/>";
echo "Keperluan = " . $keperluan . "<br/>";
echo "Judul = " . $judul . "<br/>";
echo "Dosen = " . $dosen . "<br/>";
echo "Validator = " . $validator . "<br/>";
echo "Verifikator = " . $verifikator . "<br/>";
*/


$qsimpan = mysqli_query($conn, "INSERT INTO validasi (tglpengajuan,prodi,jenjang,nim,nama,nohp,email,keperluan,validasi,judul,dosen1,dosen2,validator,verifikator)
											VALUES ('$tglpengajuan','$prodi','$jenjang','$nim','$nama','$nohp','$email','$keperluan','$validasi','$judul','$dosen1','$dosen2','$validator','$verifikator')");

//cari email admin fakultas
$qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
while ($dadminfak = mysqli_fetch_array($qadminfak)) {
	$emailfak = $dadminfak['email'];
	$namaadmin = $dadminfak['nama'];

	$subject = "Notifikasi Pengajuan Validasi Instrumen";
	$pesan = "Yth. " . $namaadmin . "
					<br/>
					Assalamualaikum Wr. Wb.
					<br/>
					Terdapat Pengajuan <b>Validasi Instrumen</b> atas nama " . $nama . ".
					<br/>
					Silahkan akses sistem Persuratan <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan verifikasi surat.
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

	$subject = "Notifikasi Pengajuan Validasi Instrumen";
	$pesan = "Yth. " . $namaadminprodi . "
					<br/>
					Assalamualaikum Wr. Wb.
					<br/>
					Terdapat Pengajuan <b>Validasi Instrumen</b> atas nama " . $nama . ".
					<br/>
					Silahkan akses sistem Persuratan <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan verifikasi surat.
					<br/>
					Wassalamualaikum Wr. Wb.
					";
	sendmail($emailprodi, $namaadminprodi, $subject, $pesan);
}

//kirim email user
$qmhs = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
$dmhs = mysqli_fetch_array($qmhs);
$nama = $dmhs['nama'];
$email = $dmhs['email'];

$subject = "Notifikasi Pengajuan Validasi Instrumen";
$pesan = "Yth. " . $nama . "
					<br/>
					Assalamualaikum Wr. Wb.
					<br/>
					Pengajuan <b>Validasi Instrumen</b> anda sedang menunggu verifikasi dari Bagian Akademik.
					<br/>
					Akan ada email pemberitahuan selanjutnya apabila pengajuan <b>Validasi Instrumen</b> anda telah di verifikasi.
					<br/>
					Wassalamualaiakum Wr. Wb.
					";
sendmail($email, $nama, $subject, $pesan);

header("location:dashboard.php");
