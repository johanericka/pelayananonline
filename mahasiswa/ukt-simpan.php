<?php
require('../config.php');
require('../assets/phpmailer/sendmail.php');

date_default_timezone_set("Asia/Jakarta");
$tanggal = date('Y-m-d H:i:s');
$nama = mysqli_real_escape_string($conn, "$_POST[nama]");
$nim = mysqli_real_escape_string($conn, "$_POST[nim]");
$prodi = mysqli_real_escape_string($conn, "$_POST[prodi]");
$notelepon = mysqli_real_escape_string($conn, "$_POST[notelepon]");
$email = mysqli_real_escape_string($conn, "$_POST[email]");
$jenissurat = mysqli_real_escape_string($conn, "$_POST[jenissurat]");
$keperluan = mysqli_real_escape_string($conn, "$_POST[keperluan]");

//cari verifikator
$qverifikator = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Surat Keterangan'");
$dverifikator = mysqli_fetch_array($qverifikator);
$pejabat = $dverifikator['pejabat'];

$qverifikator = mysqli_query($conn, "SELECT * FROM pejabat WHERE jabatan='$pejabat'");
$dverifikator = mysqli_fetch_array($qverifikator);
$verifikator = $dverifikator['nip'];

$qsimpan = mysqli_query($conn, "INSERT INTO suket (tanggal,prodi,nim,nama,notelepon,email,jenissurat,keperluan,verifikator,verifikasi,statussurat)
								VALUES ('$tanggal','$prodi','$nim','$nama','$notelepon','$email','$jenissurat','$keperluan','$verifikator','0','0')");

//cari email admin fakultas
$qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
$dadminfak = mysqli_fetch_array($qadminfak);
$emailfak = $dadminfak['email'];
$namaadmin = stripslashes($dadminfak['nama']);
$actual_link = "https://$_SERVER[HTTP_HOST]/pelayananonline/";
$subject = "Notifikasi Pengajuan Surat Keterangan";
$pesan = "Yth. " . $namaadmin . "
			<br/>
			Assalamualaikum Wr. Wb.
			<br/>
			Terdapat Pengajuan <b>Surat Keterangan</b> atas nama " . $nama . ".
			<br/>
			Silahkan klik tombol dibawah ini untuk melakukan verifikasi surat.
			<br/>
			<br/>
			<a href='" . $actual_link . "' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
			<br/>
			<br/>
			Wassalamualaikum Wr. Wb.
			";
sendmail($emailfak, $namaadmin, $subject, $pesan);

header("location:dashboard.php");
