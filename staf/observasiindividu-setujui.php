<?php
require("../config.php");
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nosurat']);
$tglverifikasi = date("Y-m-d H:i:s");
$nosurat = "/Un.03.1/TL.00.1/";
$bulan = date("m");
$tahun = date("Y");

$keterangan = $nodata . $nosurat . $bulan . "/" . $tahun;
$qupdate = mysqli_query($conn, "UPDATE observasi
                                SET verifikasi=1,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan'
                                WHERE no='$nodata'");
header("location:dashboard.php");
