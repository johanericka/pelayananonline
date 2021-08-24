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

$prodi = $_POST['prodi'];
$jenjang = $_POST['jenjang'];

$sql = mysqli_query($conn, "INSERT INTO prodi (namaprodi, jenjang) VALUES ('$prodi','$jenjang')");

header('location:prodi-isi.php');
