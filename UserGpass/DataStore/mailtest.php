<?php
requre 'PHPMailerAutoload.php';
/*use vendor\phpmailer\phpmailer\src\PHPMailer;
use vendor\phpmailer\phpmailer\src\Exception;

require "vendor/phpmailer/phpmailer/src/Exception.php";
require "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "vendor/phpmailer/phpmailer/src/SMTP.php";
*/

//require 'vendor/autoload.php';

$mail = new PHPMailer;

try {
    // Server settings
    $mail->SMTPDebug = 3;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;  
    $mail->SMTPSecure='tls';                                 // Enable SMTP authentication
    $mail->Username   = 'aflabi.babatunde2@outlook.com';                      // SMTP username
    $mail->Password   = 'Dufil@123';                         // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port= 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('tunde.afolabi@dufil.com', 'Mailer');
    $mail->addAddress('tunde.afolabi@dufil.com', 'Joe User');     // Add a recipient
    $mail->addReplyTo('tunde.afolabi@dufil.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode('Message has been sent');
} catch (Exception $e) {
    echo json_encode ("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
}











?>