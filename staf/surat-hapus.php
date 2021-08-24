<?php
require('../config.php');
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);

$qhapus = mysqli_query($conn, "DELETE FROM verifikasi WHERE no='$nodata'");
header('location:surat-isi.php');
die();
