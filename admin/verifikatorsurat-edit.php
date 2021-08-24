<?php
require('../config.php');
$prodi = mysqli_real_escape_string($conn, $_POST['prodi']);
$verifikator = mysqli_real_escape_string($conn, $_POST['verifikator']);

echo $prodi;
echo $verifikator;

$qedit = mysqli_query($conn, "UPDATE prodi
                                SET verifikator = '$verifikator'
                                WHERE namaprodi='$prodi'");

header('location:verifikatorsurat-isi.php');
