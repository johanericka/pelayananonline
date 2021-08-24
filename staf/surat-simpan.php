<?php
require('../config.php');
$prodi = $_POST['prodi'];
$namasurat = $_POST['namasurat'];
$verifikator = $_POST['verifikator'];
/*
echo $prodi . "<br/>";
echo $namasurat . "<br/>";
echo $verifikator . "<br/>";
*/
$qcari = mysqli_query($conn, "SELECT * FROM verifikasi WHERE prodi='$prodi' AND namasurat='$namasurat'");
$jmlcari = mysqli_num_rows($qcari);
if ($jmlcari > 0) {
    $qupdate = mysqli_query($conn, "UPDATE verifikasi
                                    SET verifikator = '$verifikator'
                                    WHERE prodi = '$prodi' AND namasurat='$namasurat'");
    if (!$qupdate) {
        echo mysqli_error($qupdate);
    }
} else {
    $qinsert = mysqli_query($conn, "INSERT INTO verifikasi (prodi,namasurat,verifikator) VALUES ('$prodi','$namasurat','$verifikator')");
    if (!$qinsert) {
        echo mysqli_error($qinsert);
    }
}

header('location:surat-isi.php');
die();
