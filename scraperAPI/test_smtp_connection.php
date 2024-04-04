<?php

require_once 'vendor/autoload.php';

use Swift_SmtpTransport;
use Swift_Mailer;

$transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
$transport->setUsername('atecgestpro@gmail.com');
$transport->setPassword('gphabhsmfugcpebr');

$mailer = new Swift_Mailer($transport);

try {
    $mailer->getTransport()->start();
    echo "Conexão SMTP bem-sucedida!";
} catch (Exception $e) {
    echo "Erro na conexão SMTP: " . $e->getMessage();
}
