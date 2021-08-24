<?php
session_start();
require('../config.php');
$userid = $_SESSION['userid'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$prodi = $_SESSION['prodi'];
global $userid;
$role = $_SESSION['role'];
if ($role != 'adminfakultas') {
    header("location:../deauth.php");
}

$nodata = $_POST['nodata'];

$sql = mysqli_query($conn, "DELETE FROM prodi WHERE no='$nodata'");

header('location:prodi-isi.php');
