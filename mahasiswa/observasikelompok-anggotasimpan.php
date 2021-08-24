<?php
require "../config.php";

$pengusul = mysqli_real_escape_string($conn, "$_POST[pengusul]");
$nama = mysqli_real_escape_string($conn, "$_POST[nama]");
$nim = mysqli_real_escape_string($conn, "$_POST[nim]");
/*
echo "Pengusul = " . $pengusul . "<br/>";
echo "Nama = " . $nama . "<br/>";
echo "Nim = " . $nim . "<br/>";
*/
$qsimpan = mysqli_query($conn, "INSERT INTO observasikelompok_anggota (pengusul,nama,nim)
												                VALUES ('$pengusul','$nama','$nim')");
header("location:observasikelompok-anggotaisi.php");
