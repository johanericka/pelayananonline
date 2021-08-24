<?php
require('../config.php');
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$iduser = mysqli_real_escape_string($conn, $_GET['iduser']);

$qhapus = mysqli_query($conn, "DELETE FROM observasikelompok_anggota WHERE no='$nodata' AND pengusul='$iduser'");
header('location:observasikelompok-anggotaisi.php');
