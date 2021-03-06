<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';

date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$tglverifikasi = date("Y-m-d H:i:s");
$nosurat = "/FHm/KM.01.3/";
$bulan = date("m");
$tahun = date("Y");

$keterangan = "B-" . $nodata . $nosurat . $bulan . "/" . $tahun;

$qupdate = mysqli_query($conn, "UPDATE rekomendasi
                                SET verifikasi=1,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan',
                                    statussurat=1
                                WHERE nodata='$nodata'");

//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM rekomendasi WHERE nodata='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nim = $dmhs['nim'];
$jenissurat = $dmhs['jenissurat'];

$qmhs2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
$dmhs2 = mysqli_fetch_array($qmhs2);
$nama = $dmhs2['nama'];
$email = $dmhs2['email'];

//kirim email user
$actual_link = "https://$_SERVER[HTTP_HOST]/pelayananonline/";
$surat = "Rekomendasi";
$subject = "Notifikasi Pengajuan Surat " . $surat;
$pesan = "Yth. " . stripslashes($nama) . "
            <br/>
            Assalamualaikum Wr. Wb.
            <br/>
            Pengajuan <b>Surat " . $surat . "</b> anda telah disetujui.
            <br/>
            Silahkan klik tombol berikut ini untuk mencetak Surat " . $surat . " anda
            <br/>
            <br/>
            <a href='" . $actual_link . "/mahasiswa/rekomendasi-cetak.php?nodata=" . $nodata . "' style=' background-color: #0000FF;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Cetak Surat " . $surat . "</a> 
            <br/>
            <br/>
            Wassalamualaiakum Wr. Wb.
            ";
sendmail($email, stripslashes($nama), $subject, $pesan);

header("location:dashboard.php");
