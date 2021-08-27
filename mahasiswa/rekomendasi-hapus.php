<?php
session_start();
require('../config.php');
$nim = $_SESSION['nim'];
$nodata = mysqli_real_escape_string($conn, $_GET['nodata']);

$sql = mysqli_query($conn, "DELETE FROM rekomendasi WHERE nodata='$nodata' AND nim='$nim'");

header("location:dashboard.php");
