<?php

namespace Core;

use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

class Mailer
{
    public function send($pseudo,$email,$body)
    {
        $data = require __DIR__ . '/../config/mail.php';
        $transport = (new Swift_SmtpTransport($data['smtp'], $data['port'], $data['encryption']))
          ->setUsername($data['username'])
          ->setPassword($data['password'])
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Message du Blog Yohann Zaoui'))
          ->setFrom(['contact@yohannzaoui.com' => 'Blog Yohann Zaoui'])
          ->setTo([$email => $pseudo])
          ->setBody($body)
          ;

        // Send the message
        $result = $mailer->send($message);
    }

    public function token($data)
    {
        return md5($data);
    }
}
