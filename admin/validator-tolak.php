<?php
require("../config.php");
include '../assets/phpmailer/sendmail.php';

date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nosurat']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
$tglverifikasi = date("Y-m-d H:i:s");

/*
echo $nodata;
echo $keterangan;
echo $tglverifikasi;
*/

if (isset($keterangan) and !empty($keterangan)) {
    $qupdate = mysqli_query($conn, "UPDATE validasi
                                    SET verifikasi=2,
                                        tglverifikasi='$tglverifikasi',
                                        keterangan='$keterangan'
                                    WHERE no='$nodata'");

    //cari data mahasiswa
    $qmhs = mysqli_query($conn, "SELECT * FROM validasi WHERE no='$nodata'");
    $dmhs = mysqli_fetch_array($qmhs);
    $nim = $dmhs['nim'];
    $keterangan = $dmhs['keterangan'];

    $qmhs2 = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim'");
    $dmhs2 = mysqli_fetch_array($qmhs2);
    $nama = $dmhs2['nama'];
    $email = $dmhs2['email'];

    //kirim email user
    $subject = "Notifikasi Permohonan Validator Instrumen";
    $pesan = "Yth. " . $nama . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Mohon maaf, pengajuan <b>Permohonan Validator Instrumen</b> anda telah ditolak oleh Program Studi dengan alasan <b>$keterangan</b>.
						<br/>
						Silahkan akses <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'> <b> Sistem Persuratan FITK </b> </a> mencetak melakukan pengajuan ulang / menghapus pengajuan anda.
						<br/>
						Wassalamualaiakum Wr. Wb.
						";
    sendmail($email, $nama, $subject, $pesan);
    header("location:dashboard.php");
} else {
    header("location:validator-tampil.php?nodata=$nodata&pesan=keterangan");
}
