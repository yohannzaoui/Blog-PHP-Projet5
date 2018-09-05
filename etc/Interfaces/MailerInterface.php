<?php

namespace Core\Interfaces;

/**
 *
 */
interface MailerInterface
{
    public function send($subject, $pseudo, $email, $body);

    public function token($data);
}
