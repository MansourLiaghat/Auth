<?php

$dbConfig = (object)[
    'dbName'=>'auth2024',
    'host'=>'localhost',
    'userName'=>'root',
    'password'=>'',
    'charset'=>'utf8mb4'
];





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->Username = '7db21ee820cb57';
$mail->Password = 'e3081d70f7438b';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->setFrom('info@auth.com');
$mail->isHTML(true);

















