<?php

namespace Core\Interfaces;

/**
 * 
 */
interface ResponseInterface
{
    public function __construct($statusCode = 200, $headers = [], $content);

    public function setContent($content);

    public function statusCode($statusCode);

    public function send();

    public function sendHeaders();
}