<?php
require("../config.php");
date_default_timezone_set("Asia/Jakarta");
$nodata = mysqli_real_escape_string($conn, $_POST['nosurat']);
$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
$tglverifikasi = date("Y-m-d H:i:s");

$qupdate = mysqli_query($conn, "UPDATE observasi
                                SET verifikasi=2,
                                    tglverifikasi='$tglverifikasi',
                                    keterangan='$keterangan'
                                WHERE no='$nodata'");
header("location:dashboard.php");
