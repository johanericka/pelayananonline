<?php
require "../config.php";
include '../assets/phpmailer/sendmail.php';

date_default_timezone_set("Asia/Jakarta");
$tglpengajuan = date('Y-m-d H:i:s');
$pengusul = mysqli_real_escape_string($conn, "$_POST[pengusul]");
$nohp = mysqli_real_escape_string($conn, "$_POST[nohp]");
$email = mysqli_real_escape_string($conn, "$_POST[email]");
$prodi = mysqli_real_escape_string($conn, "$_POST[prodi]");
$jenjang = mysqli_real_escape_string($conn, "$_POST[jenjang]");
$keperluan = mysqli_real_escape_string($conn, "$_POST[keperluan]");
$namamk = mysqli_real_escape_string($conn, "$_POST[namamk]");
$kepada = mysqli_real_escape_string($conn, "$_POST[kepada]");
$alamat = mysqli_real_escape_string($conn, "$_POST[alamat]");
$tglmulai = $_POST['tglmulai'];
$tglselesai = $_POST['tglselesai'];
$harusselesai = date('Y-m-d', strtotime('+1 week', strtotime($tglmulai)));
if ($tglselesai > $harusselesai) {
	$tglselesai = $harusselesai;
} else {
	$tglselesai = $_POST['tglselesai'];
}

//cari nama pengusul
$qmhs = mysqli_query($conn, "SELECT * FROM pengguna WHERE user='$pengusul'");
$dmhs = mysqli_fetch_array($qmhs);
$nama = $dmhs['nama'];

//cari verifikator
$qverifikator = mysqli_query($conn, "SELECT * FROM prodi WHERE namaprodi='$prodi'");
$dverifikator = mysqli_fetch_array($qverifikator);
$verifikator = $dverifikator['verifikator'];

/*
echo "Tgl. Pengajuan = " . $tglpengajuan . "<br/>";
echo "Pengusul = " . $pengusul . "<br/>";
echo "Prodi = " . $prodi . "<br/>";
echo "Jenjang = " . $jenjang . "<br/>";
echo "Keperluan = " . $keperluan . "<br/>";
echo "Nama Matakuliah = " . $namamk . "<br/>";
echo "Kepada = " . $kepada . "<br/>";
echo "Alamat = " . $alamat . "<br/>";
*/

$qsimpan = mysqli_query($conn, "INSERT INTO observasikelompok (tglpengajuan,pengusul,nama,nohp,email,prodi,jenjang,keperluan,matakuliah,kepada,alamat,tglmulai,tglselesai,verifikator)
												VALUES ('$tglpengajuan','$pengusul','$nama','$nohp','$email','$prodi','$jenjang','$keperluan','$namamk','$kepada','$alamat','$tglmulai','$tglselesai','$verifikator')");
$qsimpan2 = mysqli_query($conn, "INSERT INTO observasikelompok_anggota (pengusul,nama,nim)
												VALUES ('$pengusul','$nama','$pengusul')");

//cari email admin fakultas
$qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
while ($dadminfak = mysqli_fetch_array($qadminfak)) {
	$emailfak = $dadminfak['email'];
	$namaadmin = $dadminfak['nama'];

	$subject = "Notifikasi Pengajuan Surat Observasi Kelompok";
	$pesan = "Yth. " . $namaadmin . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Terdapat Pengajuan <b>Surat Observasi Kelompok</b> atas nama " . $nama . ".
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

	$subject = "Notifikasi Pengajuan Surat Observasi Kelompok";
	$pesan = "Yth. " . $namaadminprodi . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Terdapat Pengajuan <b>Surat Observasi Kelompok</b> atas nama " . $nama . ".
						<br/>
						Silahkan akses sistem Persuratan <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan verifikasi surat.
						<br/>
						Wassalamualaikum Wr. Wb.
						";
	sendmail($emailprodi, $namaadminprodi, $subject, $pesan);
}

//kirim email user
$qmhs = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$pengusul'");
$dmhs = mysqli_fetch_array($qmhs);
$nama = $dmhs['nama'];
$email = $dmhs['email'];

$subject = "Notifikasi Pengajuan Surat Observasi Kelompok";
$pesan = "Yth. " . $nama . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Pengajuan <b>Surat Observasi Kelompok</b> anda sedang menunggu verifikasi dari Bagian Akademik.
						<br/>
						Akan ada email pemberitahuan selanjutnya apabila pengajuan <b>Surat Observasi Kelompok</b> anda telah di verifikasi.
						<br/>
						Wassalamualaiakum Wr. Wb.
						";
sendmail($email, $nama, $subject, $pesan);

header("location:observasikelompok-anggotaisi.php");
