<?php

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 25;
$mail->Username = '36a93dbd178b91';
$mail->Password = '549affa74fc9bd';
$mail->setFrom('auth@7auth.mg', '7Auth Project');
$mail->isHtml(true);
