<?php
require('../config.php');
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);

$qhapus = mysqli_query($conn, "DELETE FROM staff WHERE no='$nodata'");
header('location:user-tampil.php');
die();
