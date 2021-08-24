<?php
require('../config.php');
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$nim = mysqli_real_escape_string($conn, $_GET['nim']);

$qhapus = mysqli_query($conn, "DELETE FROM observasikelompok WHERE no='$nodata' AND pengusul='$nim'");
$qhapus2 = mysqli_query($conn, "DELETE FROM observasikelompok_anggota WHERE pengusul='$nim'");
header('location:dashboard.php');
