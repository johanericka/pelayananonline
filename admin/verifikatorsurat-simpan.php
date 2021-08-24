<?php
require('../config.php');
$prodi = mysqli_real_escape_string($conn, $_POST['prodi']);
$namasurat = mysqli_real_escape_string($conn, $_POST['namasurat']);
$pejabat = mysqli_real_escape_string($conn, $_POST['pejabat']);
$nip = mysqli_real_escape_string($conn, $_POST['nip']);
$jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
$verifikator = mysqli_real_escape_string($conn, $_POST['verifikator']);

/*
echo $prodi . "<br/>";
echo $namasurat . "<br/>";
echo $pejabat . "<br/>";
echo $nip . "<br/>";
echo $jabatan . "<br/>";
echo $verifikator . "<br/>";
*/

$qcari = mysqli_query($conn, "SELECT * FROM verifikasi WHERE prodi='$prodi' AND namasurat='$namasurat'");
$jmlcari = mysqli_num_rows($qcari);
if ($jmlcari > 0) {
    $qupdate = mysqli_query($conn, "UPDATE verifikasi
                                    SET prodi ='$prodi',
                                        namasurat = '$namasurat',
                                        jabatan = '$jabatan',
                                        pejabat = '$pejabat',
                                        nip = '$nip',
                                        verifikator = '$verifikator'
                                    WHERE prodi = '$prodi' AND namasurat='$namasurat'");
} else {
    $qinsert = mysqli_query($conn, "INSERT INTO verifikasi (prodi,namasurat,jabatan,pejabat,nip,verifikator) 
                                                    VALUES ('$prodi','$namasurat','$jabatan','$pejabat','$nip','$verifikator')");
}

header('location:surat-isi.php');
