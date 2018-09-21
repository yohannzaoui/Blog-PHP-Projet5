<?php
namespace Core;

use Core\Interfaces\MailerInterface;
use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

/**
 *
 */
class Mailer implements MailerInterface
{

    /**
     * 
     */
    public function send($subject, $pseudo, $email, $body)
    {
        $data = require __DIR__ . '/../config/mail.php';
        $transport = (new Swift_SmtpTransport($data['smtp'], $data['port'], $data['encryption']))
          ->setUsername($data['username'])
          ->setPassword($data['password'])
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($subject))
          ->setFrom([$data['from'] => $data['name']])
          ->setTo([$email => $pseudo])
          ->setBody($body)
          ;

        // Send the message
        $mailer->send($message);
    }

    /**
     * Create token for account validation and reset password
     * @return string
     */
    public function token($data)
    {
        return md5($data);
    }
}
