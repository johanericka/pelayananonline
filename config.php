<?php
$dbhost = 'localhost'; #'10.10.7.91:3306';
$dbuser = 'persuratan2021';
$dbpass = 'Ses!6p69';
$dbname = 'persuratan2021';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
	die('Could not connect: ') . mysqli_error($conn);
}
//echo 'Connected successfully' . "<br/>";

/*
$dbsiakad = mysqli_connect('10.10.7.91:3306', 'surat', 'surat2020', 'surat');
if (!$dbsiakad) {
	die('Could not connect: ' . mysqli_error());
}
*/