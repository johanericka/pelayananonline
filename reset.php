<?php
require('config.php');
include 'assets/phpmailer/sendmail.php';
session_start();

$nim = mysqli_real_escape_string($conn, $_POST['nim']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$qpengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE nim='$nim' AND email='$email'");
$jpengguna = mysqli_num_rows($qpengguna);
if ($jpengguna > 0) {
    $dpengguna = mysqli_fetch_array($qpengguna);
    $nama = $dpengguna['nama'];
    $user = $dpengguna['user'];
    $pass = $dpengguna['plaintext'];

    //kirim email user
    $subject = "Informasi Akun Sistem Persuratan";
    $pesan = "Yth. " . $nama . "
                            <br/>
                            Assalamualaikum Wr. Wb.
                            <br/>
                            Berikut informasi akun ada pada Sistem Persuratan FITK
                            <br/>
                            <br/>
                            Username = " . $user . "
                            <br/>
                            Password = " . $pass . "
                            <br/>
                            <br/>
                            Silahkan gunakan akun tersebut untuk login <a href='https://fitk.uin-malang.ac.id/persuratan' target='_blank'><b>di sini</b></a>
                            <br/>
                            Wassalamualaiakum Wr. Wb.
                            ";
    sendmail($email, $nama, $subject, $pesan);
    header("location:index.php?pesan=emailsukses");
} else {
    header("location:index.php?pesan=emailgagal");
}
