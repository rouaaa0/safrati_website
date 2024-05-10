<?php
echo"test";
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '47008581e16720';
    $phpmailer->Password = '3cf110bf4a1d8b';
    echo "test";
    $phpmailer->setFrom('yacinetwelbi2018@gmail.com', 'webmaster');
    $phpmailer->addAddress("yacinetwelbi2018@gmail.com");// Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $phpmailer->isHTML(true);
    $phpmailer->Subject = "Booking status";
    echo "test";

    // Attach the HTML template
    $currentDirectory = __DIR__;

    // Attach the HTML template
    $templateContent = file_get_contents($currentDirectory . '/template.html');
    echo "test";

    $phpmailer->msgHTML($templateContent);

    $phpmailer->send();
} catch (\PHPMailer\PHPMailer\Exception $e) {
    echo $e;
} finally {
    echo "done";
}
?>
