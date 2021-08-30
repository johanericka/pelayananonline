<?php
session_start();
require('../config.php');

$host = $_POST['host'];
$username = $_POST['username'];
$password = $_POST['password'];
$smtpsecure = $_POST['smtpsecure'];
$port = $_POST['port'];
$from = $_POST['from'];
$fromname = $_POST['fromname'];

$sql = mysqli_query($conn, "UPDATE email 
                            SET host='$host',
                                username='$username',
                                password='$password',
                                smtpsecure='$smtpsecure',
                                port='$port',
                                from='$from',
                                fromname='$fromname'");

header('location:email-isi.php');
