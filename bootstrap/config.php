<?PHP

$dataBase_config = (object)[
    'host'=> 'localhost',
    'user'=> 'root',
    'password'=> '',
    'dbname'=> 'authen'
];

$mail = new \PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '36a93dbd178b91';
$mail->Password = '549affa74fc9bd';
$mail->setFrom('auth@Deljoo.com', 'Mdeljoo');
$mail->isHTML(true);