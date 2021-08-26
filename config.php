<?php
$dbhost = '127.0.0.1'; #'10.10.7.91:3306';
$dbuser = 'johanericka';
$dbpass = 'rahasia';
$dbname = 'pelayananonline';
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