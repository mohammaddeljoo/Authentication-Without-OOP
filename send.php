<?php
require "bootstrap/init.php";


$maile->addAddress('mohammaddeljoo1@gmail.com', 'Joe User');
// $maile->addAddress('mohammaddeljoo1@gmail.com', 'Joe User');
$maile->Subject = 'Here is the subject';
$maile->Body    = 'This is the HTML message body <b>in bold!</b>';
// $result = $maile->send();
// vp($result);

$maile->Subject = 'Here is the subject';
$maile->Body    = 'This is the HTML message body <b>in bold!</b>';
$maile->AltBody = 'This is the body in plain text for non-HTML mail clients';

$maile->send();
vp($maile);
