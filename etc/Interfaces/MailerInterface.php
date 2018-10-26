<?php

namespace Core\Interfaces;


/**
 * Interface MailerInterface
 * @package Core\Interfaces
 */
interface MailerInterface
{
    /**
     * @param $subject
     * @param $pseudo
     * @param $email
     * @param $body
     * @return mixed
     */
    public function send($subject, $pseudo, $email, $body);

    /**
     * @param $data
     * @return mixed
     */
    public function token($data);
}
