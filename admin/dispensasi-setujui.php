<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$kegiatan = mysqli_real_escape_string($conn, $_POST['kegiatan']);
$tujuansurat = mysqli_real_escape_string($conn, $_POST['tujuansurat']);
$alamatsurat = mysqli_real_escape_string($conn, $_POST['alamatsurat']);
$tglmulai = mysqli_real_escape_string($conn, $_POST['penelitianmulai']);
$tglselesai = mysqli_real_escape_string($conn, $_POST['penelitianselesai']);
$tglverifikasi = date("Y-m-d H:i:s");
$nosurat = "/FHm/KM.01.2/";
$bulan = date("m");
$tahun = date("Y");

$keterangan = $nodata . $nosurat . $bulan . "/" . $tahun;

$qupdate = mysqli_query($conn, "UPDATE dispensasi
                                SET kegiatan='$kegiatan',
									namainstansi='$tujuansurat',
									alamatinstansi='$alamatsurat',
									tglmulai='$tglmulai',
									tglselesai='$tglselesai',
									verifikasi=1,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan',
									statussurat=1
                                WHERE nodata='$nodata'");
/*								
//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM dispensasi WHERE nodata='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nim = $dmhs['nim'];

$qmhs2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
$dmhs2 = mysqli_fetch_array($qmhs2);
$nama = $dmhs2['nama'];
$email = $dmhs2['email'];

//kirim email user
$actual_link = "https://$_SERVER[HTTP_HOST]";
$surat = "Izin Dispensasi Kegiatan";
$subject = "Notifikasi Pengajuan Surat " . $surat;
$pesan = "Yth. " . $nama . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Pengajuan <b>Surat " . $surat . "</b> anda telah disetujui.
						<br/>
						Silahkan klik tombol berikut ini untuk mencetak surat anda
						<br/>
						<br/>
						<a href='" . $actual_link . "/mahasiswa/dispensasi-cetak.php?nodata=" . $nodata . "' style=' background-color: #0000FF;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Cetak Surat " . $surat . "</a> 
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
