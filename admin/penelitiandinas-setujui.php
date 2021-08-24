<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nosurat']);
$keperluan = mysqli_real_escape_string($conn, $_POST['keperluan']);
$judulpenelitian = mysqli_real_escape_string($conn, $_POST['judulpenelitian']);
$tujuansurat = mysqli_real_escape_string($conn, $_POST['tujuansurat']);
$alamatsurat = mysqli_real_escape_string($conn, $_POST['alamatsurat']);
$tempatpenelitian = mysqli_real_escape_string($conn, $_POST['tempatpenelitian']);
$lokasipenelitian = mysqli_real_escape_string($conn, $_POST['lokasipenelitian']);
$tglmulai = mysqli_real_escape_string($conn, $_POST['penelitianmulai']);
$tglselesai = mysqli_real_escape_string($conn, $_POST['penelitianselesai']);
$tglverifikasi = date("Y-m-d H:i:s");
$nosurat = "/Un.03.1/TL.00.1/";
$bulan = date("m");
$tahun = date("Y");

$keterangan = $nodata . $nosurat . $bulan . "/" . $tahun;
$qupdate = mysqli_query($conn, "UPDATE penelitiandinas
                                SET keperluan='$keperluan',
									judul='$judulpenelitian',
									namainstansi='$tujuansurat',
									alamatinstansi='$alamatsurat',
									tempatpenelitian='$tempatpenelitian',
									lokasipenelitian='$lokasipenelitian',
									tglmulai='$tglmulai',
									tglselesai='$tglselesai',
									verifikator='$userid',
									verifikasi=1,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan'
                                WHERE no='$nodata'");
//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM penelitiandinas WHERE no='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nim = $dmhs['nim'];

$qmhs2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
$dmhs2 = mysqli_fetch_array($qmhs2);
$nama = $dmhs2['nama'];
$email = $dmhs2['email'];

//kirim email user
$subject = "Notifikasi Pengajuan Surat Penelitian Dinas";
$pesan = "Yth. " . $nama . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Pengajuan <b>Surat Penelitian Dinas</b> anda telah disetujui.
						<br/>
						Silahkan akses <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'> <b> Sistem Persuratan FITK </b> </a> atau <a href='http://fitk.uin-malang.ac.id/mahasiswa/penelitiandinas-cetak.php?nodata= $nodata'><b>KLIK DISINI</b></a> untuk mencetak surat anda.
						<br/>
						Wassalamualaiakum Wr. Wb.
						";
sendmail($email, $nama, $subject, $pesan);
header("location:dashboard.php");
