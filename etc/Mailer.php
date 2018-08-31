<?php

namespace Core;

use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

class Mailer
{
    public function send($pseudo,$email)
    {
        $data = require __DIR__ . '/../config/mail.php';
        $transport = (new Swift_SmtpTransport($data['smtp'], $data['port'], $data['encryption']))
          ->setUsername($data['username'])
          ->setPassword($data['password'])
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Confirmation de compte'))
          ->setFrom(['contact@yohannzaoui.com' => 'Blog Yohann Zaoui'])
          ->setTo([$email => $pseudo])
          ->setBody('Cliquez ici pour confirmer votre création de compte')
          ;

        // Send the message
        $result = $mailer->send($message);
    }
}
