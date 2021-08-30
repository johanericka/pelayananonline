<?php
require('../config.php');
require('../assets/phpmailer/sendmail.php');

date_default_timezone_set("Asia/Jakarta");
$tanggal = date('Y-m-d H:i:s');
$nama = mysqli_real_escape_string($conn, "$_POST[nama]");
$nim = mysqli_real_escape_string($conn, "$_POST[nim]");
$prodi = mysqli_real_escape_string($conn, "$_POST[prodi]");
$notelepon = mysqli_real_escape_string($conn, "$_POST[notelepon]");
$email = mysqli_real_escape_string($conn, "$_POST[email]");
$keperluan = mysqli_real_escape_string($conn, "$_POST[keperluan]");

//cari verifikator
$qverifikator = mysqli_query($conn, "SELECT * FROM jenissurat WHERE namasurat='Surat Keterangan'");
$dverifikator = mysqli_fetch_array($qverifikator);
$pejabat = $dverifikator['pejabat'];

$qverifikator = mysqli_query($conn, "SELECT * FROM pejabat WHERE jabatan='$pejabat'");
$dverifikator = mysqli_fetch_array($qverifikator);
$verifikator = $dverifikator['nip'];

$qsimpan = mysqli_query($conn, "INSERT INTO rekomendasi (tanggal,prodi,nim,nama,notelepon,email,keperluan,verifikator,verifikasi,statussurat)
								VALUES ('$tanggal','$prodi','$nim','$nama','$notelepon','$email','$keperluan','$verifikator','0','0')");
if ($qsimpan) {
    /*
    //cari email admin fakultas
    $qadminfak = mysqli_query($conn, "SELECT * FROM pengguna WHERE role = 'adminfakultas'");
    while ($dadminfak = mysqli_fetch_array($qadminfak)) {
        $emailfak = $dadminfak['email'];
        $namaadmin = $dadminfak['nama'];
        $surat = "Surat Rekomendasi";
        $subject = "Notifikasi Pengajuan " . $surat;
        $pesan = "Yth. " . $namaadmin . "
						<br/>
						Assalamualaikum Wr. Wb.
						<br/>
						Terdapat Pengajuan <b>Surat " . $surat . "</b> atas nama " . $nama . ".
						<br/>
						Silahkan klik tombol dibawah ini untuk melakukan verifikasi surat.
						<br/>
                        <br/>
                        <a href='https://humaniora.uin-malang.ac.id/pelayananonline/' style=' background-color: #0000FF;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Pelayanan Online</a> 
						<br/>
                        <br/>
						Wassalamualaikum Wr. Wb.
						";
        sendmail($emailfak, $namaadmin, $subject, $pesan);
    }
*/
    header("location:dashboard.php");
} else {
    echo "simpan gagal";
}
