<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';
session_start();
$userid = $_SESSION['userid'];
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
$tglverifikasi = date("Y-m-d H:i:s");

if (isset($keterangan) and !empty($keterangan)) {
    $qupdate = mysqli_query($conn, "UPDATE penelitian
    SET verifikasi=2,
        tglverifikasi='$tglverifikasi',
        keterangan='$keterangan',
        statussurat=2
    WHERE nodata='$nodata'");


    //cari data mahasiswa
    $qmhs = mysqli_query($conn, "SELECT * FROM penelitian WHERE nodata='$nodata'");
    $dmhs = mysqli_fetch_array($qmhs);
    $nim = $dmhs['nim'];
    $keterangan = $dmhs['keterangan'];

    $qmhs2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
    $dmhs2 = mysqli_fetch_array($qmhs2);
    $nama = $dmhs2['nama'];
    $email = $dmhs2['email'];

    //kirim email user
    $actual_link = "https://$_SERVER[HTTP_HOST]/pelayananonline/";
    $surat = "Izin Penelitian";
    $subject = "Notifikasi Pengajuan Surat " . $surat;
    $pesan = "Yth. " . stripslashes($nama) . "
                <br/>
                Assalamualaikum Wr. Wb.
                <br/>
                Mohon maaf, pengajuan <b>Surat " . $surat . "</b> anda telah ditolak dengan alasan <b>$keterangan</b>.
                <br/>
                Silahkan ajukan ulang di <a href='" . $actual_link . "'>Sistem Pelayanan Online Fakultas Humaniora UIN Maulana Malik Ibrahim Malang</a>
                <br/>
                Wassalamualaiakum Wr. Wb.
                ";
    sendmail($email, stripslashes($nama), $subject, $pesan);
    header("location:dashboard.php");
} else {
    header("location:penelitian-tampil.php?nodata=$nodata&pesan=keterangan");
}
