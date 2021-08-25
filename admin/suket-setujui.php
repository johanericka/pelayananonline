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

$qupdate = mysqli_query($conn, "UPDATE suket
                                SET verifikasi=1,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan',
                                    statussurat=1
                                WHERE nodata='$nodata'");
//cari data mahasiswa
$qmhs = mysqli_query($conn, "SELECT * FROM suket WHERE nodata='$nodata'");
$dmhs = mysqli_fetch_array($qmhs);
$nim = $dmhs['nim'];
$jenissurat = $dmhs['jenissurat'];

$qmhs2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
$dmhs2 = mysqli_fetch_array($qmhs2);
$nama = $dmhs2['nama'];
$email = $dmhs2['email'];

//kirim email user
$subject = "Notifikasi Pengajuan Surat Keterangan " . $jenissurat;
$pesan = "Yth. " . $nama . "
            <br/>
            Assalamualaikum Wr. Wb.
            <br/>
            Pengajuan <b>Surat Keterangan " . $jenissurat . "</b> anda telah disetujui.
            <br/>
            Silahkan klik tombol berikut ini untuk mencetak Surat Keterangan " . $jenissurat . " anda
            <br/>
            <br/>
            <a href='https://humaniora.uin-malang.ac.id/pelayananonline/mahasiswa/suket-cetak.php?nodata=" . $nodata . "' style=' background-color: #0000FF;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Cetak Surat Keterangan " . $jenissurat . "</a> 
            <br/>
            <br/>
            Wassalamualaiakum Wr. Wb.
            ";
sendmail($email, $nama, $subject, $pesan);
header("location:dashboard.php");
