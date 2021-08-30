<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$namainstansi = mysqli_real_escape_string($conn, $_POST['namainstansi']);
$alamatinstansi = mysqli_real_escape_string($conn, $_POST['alamatinstansi']);
$tglmulai = mysqli_real_escape_string($conn, $_POST['tglmulai']);
$tglselesai = mysqli_real_escape_string($conn, $_POST['tglselesai']);
$tglverifikasi = date("Y-m-d H:i:s");
$nosurat = "/Fhm/TL.00/";
$bulan = date("m");
$tahun = date("Y");
$server = $_SERVER['HTTP_HOST'];


$keterangan = $nodata . $nosurat . $bulan . "/" . $tahun;
$qupdate = mysqli_query($conn, "UPDATE observasi
                                SET judul='$judul',
									namainstansi='$namainstansi',
									alamatinstansi='$alamatinstansi',
									tglmulai='$tglmulai',
									tglselesai='$tglselesai',
									verifikasi=1,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan',
									statussurat = 1
                                WHERE nodata='$nodata'");

/*
//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM observasi WHERE nodata='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nama = $dmhs['nama'];
$email = $dmhs['email'];

//kirim email user
$actual_link = "https://$_SERVER[HTTP_HOST]";
$surat = "Izin Observasi";
$subject = "Notifikasi Pengajuan Surat " . $surat;
$pesan = "Yth. " . $nama . "
		<br/>
		Assalamualaikum Wr. Wb.
		<br/>
		Pengajuan <b>Surat " . $surat . "</b> anda telah disetujui.
		<br/>
		Silahkan klik tombol berikut ini untuk mencetak Surat Keterangan " . $jenissurat . " anda
		<br/>
		<br/>
		<a href='" . $actual_link . "/mahasiswa/observasiindivisu-cetak.php?nodata=" . $nodata . "' style=' background-color: #0000FF;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Cetak Surat " . $surat . "</a> 
		<br/>
		<br/>
		Atau anda dapat mencetak melalui <a href='" . $actual_link . "'>Sistem Pelayanan Online Fakultas Humaniora UIN Maulana Malik Ibrahim Malang</a>
		<br/>
		<br/>		
		Wassalamualaiakum Wr. Wb.
		";
sendmail($email, $nama, $subject, $pesan);
*/
header("location:dashboard.php");
