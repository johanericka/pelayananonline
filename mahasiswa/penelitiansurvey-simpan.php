<?php
require "../config.php";
include '../assets/phpmailer/sendmail.php';

date_default_timezone_set("Asia/Jakarta");
$tglpengajuan = date('Y-m-d H:i:s');
$jenissurat = mysqli_real_escape_string($conn, "$_POST[jenissurat]");
$nama = mysqli_real_escape_string($conn, "$_POST[nama]");
$nim = mysqli_real_escape_string($conn, "$_POST[nim]");
$prodi = mysqli_real_escape_string($conn, "$_POST[prodi]");
$jenjang = mysqli_real_escape_string($conn, "$_POST[jenjang]");
$nohp = mysqli_real_escape_string($conn, "$_POST[nohp]");
$email = mysqli_real_escape_string($conn, "$_POST[email]");
$semester = mysqli_real_escape_string($conn, "$_POST[semester]");
$tahunakademik = mysqli_real_escape_string($conn, "$_POST[tahunakademik]");
$judulpenelitian = mysqli_real_escape_string($conn, "$_POST[judulpenelitian]");
$tujuansurat = mysqli_real_escape_string($conn, "$_POST[tujuansurat]");
$alamatsurat = mysqli_real_escape_string($conn, "$_POST[alamatsurat]");
$penelitianmulai = $_POST['penelitianmulai'];
$penelitianselesai = $_POST['penelitianselesai'];
$harusselesai = date('Y-m-d', strtotime('+1 month', strtotime($penelitianmulai)));
if ($penelitianselesai > $harusselesai) {
	$penelitianselesai = $harusselesai;
} else {
	$penelitianselesai = $_POST['penelitianselesai'];
}
//cari verifikator
$qverifikator = mysqli_query($conn, "SELECT * FROM prodi WHERE namaprodi='$prodi'");
$dverifikator = mysqli_fetch_array($qverifikator);
$verifikator = $dverifikator['verifikator'];
/*
echo "verifikator = " . $verifikator . "<br/>";
echo "Jenis Surat = " . $jenissurat . "<br/>";
echo "Tgl. Pengajuan = " . $tglpengajuan . "<br/>";
echo "Nama = " . $nama . "<br/>";
echo "NIM = " . $nim . "<br/>";
echo "Prodi = " . $prodi . "<br/>";
echo "Jenjang = " . $jenjang . "<br/>";
echo "No. HP = " . $nohp . "<br/>";
echo "email = " . $email . "<br/>";
echo "Semester = " . $semester . "<br/>";
echo "Tahun Akademik = " . $tahunakademik . "<br/>";
echo "judulpenelitian = " . $judulpenelitian . "<br/>";
echo "tujuansurat = " . $tujuansurat . "<br/>";
echo "alamatsurat = " . $alamatsurat . "<br/>";
*/
$qsimpan = mysqli_query($conn, "INSERT INTO penelitiansurvey (tglpengajuan,prodi,jenjang,nim,nama,nohp,email,semester,tahunakademik,judul,namainstansi,alamatinstansi,tglmulai,tglselesai,verifikator)
												VALUES ('$tglpengajuan','$prodi','$jenjang','$nim','$nama','$nohp','$email','$semester','$tahunakademik','$judulpenelitian','$tujuansurat','$alamatsurat','$penelitianmulai','$penelitianselesai','$verifikator')");

//cari email admin fakultas
$qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
while ($dadminfak = mysqli_fetch_array($qadminfak)) {
	$emailfak = $dadminfak['email'];
	$namaadmin = $dadminfak['nama'];

	$subject = "Notifikasi Pengajuan Surat Penelitian Survey";
	$pesan = "Yth. " . $namaadmin . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Terdapat Pengajuan <b>Surat Penelitian Survey</b> atas nama " . $nama . ".
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

	$subject = "Notifikasi Pengajuan Surat Penelitian Survey";
	$pesan = "Yth. " . $namaadminprodi . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Terdapat Pengajuan <b>Surat Penelitian Survey</b> atas nama " . $nama . ".
						<br/>
						Silahkan akses sistem Persuratan <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a> untuk melakukan verifikasi surat.
						<br/>
						Wassalamualaikum Wr. Wb.
						";
	sendmail($emailprodi, $namaadminprodi, $subject, $pesan);
}

//kirim email user
$subject = "Notifikasi Pengajuan Surat Penelitian Survey";
$pesan = "Yth. " . $nama . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Pengajuan <b>Surat Penelitian Survey</b> anda sedang menunggu verifikasi dari Bagian Akademik.
						<br/>
						Akan ada email pemberitahuan selanjutnya apabila pengajuan <b>Surat Penelitian Survey</b> anda telah di verifikasi.
						<br/>
						Wassalamualaiakum Wr. Wb.
						";
sendmail($email, $nama, $subject, $pesan);

header("location:dashboard.php");
