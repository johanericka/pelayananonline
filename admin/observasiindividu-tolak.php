<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
$tglverifikasi = date("Y-m-d H:i:s");

$qupdate = mysqli_query($conn, "UPDATE observasi
                                SET verifikasi=2,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan',
									statussurat='2'
                                WHERE nodata='$nodata'");

//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM observasi WHERE nodata='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nama = $dmhs['nama'];
$email = $dmhs['email'];

//kirim email user
$actual_link = "https://$_SERVER[HTTP_HOST]/pelayananonline/";
$surat = "Izin Observasi";
$subject = "Notifikasi Pengajuan Surat " . $surat;
$pesan = "Yth. " . stripslashes($nama) . "
		<br/>
		Assalamualaikum Wr. Wb.
		<br/>
		Mohon maaf, pengajuan <b>Surat " . $surat . "</b> anda telah ditolak dengan alasan <b>$keterangan</b>.
		<br/>
		Silahkan ajukan kembali permohonan surat izin observasi dengan memperhatikan alasan penolakan diatas.
		<br/>
		<br/>
		<a href='" . $actual_link . "' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
		<br/>
		<br/>
		Wassalamualaiakum Wr. Wb.
		";
sendmail($email, stripslashes($nama), $subject, $pesan);
header("location:dashboard.php");
