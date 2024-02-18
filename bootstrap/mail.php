<?php

$maile = new \PHPMailer\PHPMailer\PHPMailer();

$maile->isSMTP();
$maile->Host = 'sandbox.smtp.mailetrap.io';
$maile->SMTPAuth = true;
$maile->Port = 2525;
$maile->Username = '36a93dbd178b91';
$maile->Password = '549affa74fc9bd';
$maile->setFrom('mohammaddeljoo1@gmail.com', 'Mailer');

// $mail->setFrom('M.deljoo@auth.com','auth deljoo');
$maile->isHTML(true); 