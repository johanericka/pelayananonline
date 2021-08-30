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
$judul = mysqli_real_escape_string($conn, "$_POST[judul]");
$namamk = mysqli_real_escape_string($conn, "$_POST[namamk]");
$namainstansi = mysqli_real_escape_string($conn, "$_POST[namainstansi]");
$alamatinstansi = mysqli_real_escape_string($conn, "$_POST[alamatinstansi]");
$tglmulai = $_POST['tglmulai'];
$tglselesai = $_POST['tglselesai'];
/*
$harusselesai = date('Y-m-d', strtotime('+1 week', strtotime($tglmulai)));
if ($tglselesai > $harusselesai) {
	$tglselesai = $harusselesai;
} else {
	$tglselesai = $_POST['tglselesai'];
}
*/

//cari verifikator
$qverifikator = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Izin Observasi'");
$dverifikator = mysqli_fetch_array($qverifikator);
$pejabat = $dverifikator['pejabat'];

$qverifikator = mysqli_query($conn, "SELECT * FROM pejabat WHERE jabatan='$pejabat'");
$dverifikator = mysqli_fetch_array($qverifikator);
$verifikator = $dverifikator['nip'];

$qsimpan = mysqli_query($conn, "INSERT INTO observasi (tglpengajuan,prodi,nim,nama,nohp,email,judul,namamk,namainstansi,alamatinstansi,tglmulai,tglselesai,verifikator,statussurat)
											VALUES ('$tglpengajuan','$prodi','$nim','$nama','$nohp','$email','$judul','$namamk','$namainstansi','$alamatinstansi','$tglmulai','$tglselesai','$verifikator','0')");

/*
//cari email admin fakultas
$qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
while ($dadminfak = mysqli_fetch_array($qadminfak)) {
	$emailfak = $dadminfak['email'];
	$namaadmin = $dadminfak['nama'];

	$surat = "Izin Observasi";
	$subject = "Notifikasi Pengajuan Surat " . $surat;
	$pesan = "Yth. " . $namaadmin . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Terdapat Pengajuan <b>Surat " . $surat . "</b> atas nama " . $nama . ".
						Silahkan klik tombol dibawah ini untuk melakukan verifikasi surat.
						<br/>
						<br/>
                        <a href='https://humaniora.uin-malang.ac.id/pelayananonline/' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
						<br/>
						<br/>
						Wassalamualaikum Wr. Wb.
						";
	sendmail($emailfak, $namaadmin, $subject, $pesan);
}

//kirim email user
$subject = "Notifikasi Pengajuan Surat " . $surat;
$pesan = "Yth. " . $nama . "
		<br/>
		Assalamualaikum Wr. Wb.
		<br/>
		Pengajuan <b>Surat " . $surat . "</b> anda sedang menunggu verifikasi dari Bagian Administrasi.
		<br/>
		Akan ada email pemberitahuan selanjutnya apabila pengajuan <b>Surat " . $surat . "</b> anda telah di verifikasi.
		<br/>
		Wassalamualaiakum Wr. Wb.
		";
sendmail($email, $nama, $subject, $pesan);
*/
header("location:dashboard.php");
