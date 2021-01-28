<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Database\Eloquent\Model as Model;

class Email extends Model {
    public function send_email($email, $subject, $view) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp-relay.sendinblue.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shaftyu@gmail.com';
            $mail->Password = 's9zJkBn8HXAUvGfy';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Encoding = 'base64';
            $mail->charSet = 'UTF-8';
        
            //Recipients
            $mail->setFrom('shaftyu@gmail.com', 'Okularium');   // replace with okularium email
            $mail->addAddress('scupak.m@seznam.cz');            // replace with patients email
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader($subject, 'UTF-8');
            $mail->Body = $view;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}