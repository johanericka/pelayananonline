<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nosurat']);
$semester = mysqli_real_escape_string($conn, $_POST['semester']);
$tahunakademik = mysqli_real_escape_string($conn, $_POST['tahunakademik']);
$keperluan = mysqli_real_escape_string($conn, $_POST['keperluan']);
$namamk = mysqli_real_escape_string($conn, $_POST['namamk']);
$dosen = mysqli_real_escape_string($conn, $_POST['dosen']);
$namainstansi = mysqli_real_escape_string($conn, $_POST['namainstansi']);
$alamatinstansi = mysqli_real_escape_string($conn, $_POST['alamatinstansi']);
$tempatobservasi = mysqli_real_escape_string($conn, $_POST['tempatobservasi']);
$alamatobservasi = mysqli_real_escape_string($conn, $_POST['alamatobservasi']);
$tglmulai = mysqli_real_escape_string($conn, $_POST['tglmulai']);
$tglselesai = mysqli_real_escape_string($conn, $_POST['tglselesai']);
$tglverifikasi = date("Y-m-d H:i:s");
$nosurat = "/Un.03.1/TL.00.1/";
$bulan = date("m");
$tahun = date("Y");
$server = $_SERVER['HTTP_HOST'];

$keterangan = $nodata . $nosurat . $bulan . "/" . $tahun;
$qupdate = mysqli_query($conn, "UPDATE observasi
                                SET semester='$semester',
									tahunakademik='$tahunakademik',
									keperluan='$keperluan',
									namamk='$namamk',
									dosen='$dosen',
									namainstansi='$namainstansi',
									alamatinstansi='$alamatinstansi',
									tempatobservasi='$tempatobservasi',
									alamatobservasi='$alamatobservasi',
									tglmulai='$tglmulai',
									tglselesai='$tglselesai',
									verifikator = '$userid',
									verifikasi=1,
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
						Pengajuan <b>Surat Observasi Individu</b> anda telah disetujui.
						<br/>
						Silahkan akses <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'> <b> Sistem Persuratan FITK </b> </a> atau <a href='http://fitk.uin-malang.ac.id/mahasiswa/observasiindividu-cetak.php?nodata= $nodata'><b>KLIK DISINI</b></a> untuk mencetak surat anda.
						<br/>
						Wassalamualaiakum Wr. Wb.
						";
sendmail($email, $nama, $subject, $pesan);
header("location:dashboard.php");
