<?php

namespace Core\Interfaces;


/**
 * Interface ResponseInterface
 * @package Core\Interfaces
 */
interface ResponseInterface
{
    /**
     * ResponseInterface constructor.
     * @param int $statusCode
     * @param array $headers
     * @param $content
     */
    public function __construct($statusCode = 200, $headers = [], $content);

    /**
     * @param $content
     * @return mixed
     */
    public function setContent($content);

    /**
     * @param $statusCode
     * @return mixed
     */
    public function statusCode($statusCode);

    /**
     * @return mixed
     */
    public function send();

    /**
     * @return mixed
     */
    public function sendHeaders();
}