<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';

date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nodata']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
$tglverifikasi = date("Y-m-d H:i:s");

$qupdate = mysqli_query($conn, "UPDATE suket
                                SET verifikasi=2,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan',
                                    statussurat=2
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
$actual_link = "https://$_SERVER[HTTP_HOST]/pelayananonline/";
$subject = "Notifikasi Pengajuan Surat Keterangan " . $jenissurat;
$pesan = "Yth. " . stripslashes($nama) . "
            <br/>
            Assalamualaikum Wr. Wb.
            <br/>
            Mohon maaf, pengajuan <b>Surat Keterangan " . $jenissurat . "</b> anda telah ditolak dengan alasan " . $keterangan . ".
            <br/>
            Silahkan ajukan kembali permohonan surat keterangan dengan memperhatikan alasan penolakan diatas.
            <br/>
            <br/>
            <a href='" . $actual_link . "' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
			<br/>
            <br/>
            Wassalamualaiakum Wr. Wb.
            ";
sendmail($email, stripslashes($nama), $subject, $pesan);
header("location:dashboard.php");
