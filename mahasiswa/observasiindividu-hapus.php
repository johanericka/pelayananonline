<?php
require('../config.php');
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);
$nim = mysqli_real_escape_string($conn, $_GET['nim']);
echo "No Data = " . $nodata . "<br/>";
echo "NIM = " . $nim . "<br/>";

$qhapus = mysqli_query($conn, "DELETE FROM observasi WHERE no='$nodata' and nim='$nim'");
header('location:dashboard.php');
