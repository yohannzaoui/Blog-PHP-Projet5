<?php

namespace Core;

/**
 * 
 */
class Response
{

    const HTTP_OK = 200;
    const HTTP_NOT_FOUND = 404;

    /**
     * 
     */
    private $statusCode;

    /**
     * 
     */
    private $content;

    /**
     * 
     */
    public $headers = [];

    /**
     * 
     */
    private $statusText = [
        200 => 'Ok',
        404 => 'Not Found'
    ];
    private $version = '1.0';

    /**
    * 
    */
    public function __construct($statusCode = 200, $headers = [], $content)
    {
        $this->setContent($content);
        $this->statusCode($statusCode);
        $this->headers = $headers;
    }

    /**
     * 
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 
     */
    public function statusCode($statuCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * 
     */
    public function send()
    {
        $this->sendHeaders();
        echo $this->content;
        return $this;
    }

    /**
     * 
     */
    public function sendHeaders()
    {
        header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText[$this->statusCode]), true, $this->statusCode);
    }
}
