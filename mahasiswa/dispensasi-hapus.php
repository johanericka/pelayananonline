<?php
require('../config.php');
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$nim = mysqli_real_escape_string($conn, $_GET['nim']);

$qhapus = mysqli_query($conn, "DELETE FROM dispensasi WHERE nodata='$nodata' AND nim='$nim'");
header('location:dashboard.php');
