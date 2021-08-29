<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $nama, $subject, $pesan)
{
	require_once "PHPMailer.php";
	require_once "Exception.php";
	require_once "SMTP.php";
	require "{$_SERVER['DOCUMENT_ROOT']}/config.php";

	$qemail = mysqli_query($conn, "SELECT * FROM email");
	$demail = mysqli_fetch_array($qemail);
	$host = $demail['host'];
	$username = $demail['username'];
	$password = $demail['password'];
	$smtpsecure = $demail['smtpsecure'];
	$port = $demail['port'];
	$from = $demail['from'];
	$fromname = $demail['fromname'];

	$mail = new PHPMailer;

	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	//$mail->Host = "tls://smtp.gmail.com"; //host mail server
	$mail->Host = $host; //host mail server
	$mail->SMTPAuth = true;
	//$mail->Username = "persuratanfitk@gmail.com";   //nama-email smtp
	$mail->Username = $username;   //nama-email smtp          
	//$mail->Password = "persuratan2021";           //password email smtp
	$mail->Password = $password;           //password email smtp
	//$mail->SMTPSecure = "tls";
	$mail->SMTPSecure = $smtpsecure;
	//$mail->Port = 587;
	$mail->Port = $port;
	//$mail->From = "persuratanfitk@gmail.com"; //email pengirim
	$mail->From = $from; //email pengirim
	//$mail->FromName = "Sistem Persuratan FITK"; //nama pengirim
	$mail->FromName = $fromname; //nama pengirim
	$mail->addAddress($email, $nama); //email penerima				 
	$mail->isHTML(true);

	$mail->Subject = $subject; //subject
	$mail->Body 	= $pesan; //isi email
	$mail->AltBody = "PHP mailer"; //body email (optional)

	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent successfully";
	}
}
