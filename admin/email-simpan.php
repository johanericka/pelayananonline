<?php
session_start();
require('../config.php');

$jabatan = $_POST['jabatan'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];

$sql = mysqli_query($conn, "INSERT INTO pejabat (jabatan, nama, nip) VALUES('$jabatan','$nama','$nip')");

header('location:pejabat-isi.php');
