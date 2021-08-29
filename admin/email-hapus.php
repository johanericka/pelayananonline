<?php
session_start();
require('../config.php');
$no = $_POST['nomer'];
$ttd = $_POST['ttd'];

$sql = mysqli_query($conn, "DELETE FROM pejabat WHERE no='$no'");
unlink($ttd);
header('location:pejabat-isi.php');
