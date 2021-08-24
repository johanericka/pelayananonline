<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nosurat']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
$tglverifikasi = date("Y-m-d H:i:s");

$qupdate = mysqli_query($conn, "UPDATE observasi
                                SET verifikator='$userid',
									verifikasi=2,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan'
                                WHERE no='$nodata'");

//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM observasi WHERE no='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nama = $dmhs['nama'];
$email = $dmhs['email'];

//kirim email user
$subject = "Notifikasi Pengajuan Surat Observasi Individu";
$pesan = "Yth. " . $nama . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Mohon maaf, pengajuan <b>Surat Observasi Individu</b> anda telah ditolak oleh Program Studi dengan alasan <b>$keterangan</b>.
						<br/>
						Silahkan akses <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'> <b> Sistem Persuratan FITK </b> </a> mencetak melakukan pengajuan ulang / menghapus pengajuan anda.
						<br/>
						Wassalamualaiakum Wr. Wb.
						";
sendmail($email, $nama, $subject, $pesan);
header("location:dashboard.php");