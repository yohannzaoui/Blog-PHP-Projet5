<?php

namespace Core;

/**
 * 
 */
class Response
{

    const HTTP_OK = 200;
    const HTTP_NOT_FOUND = 404;

    private $statusCode;
    private $content;
    private $headers = [];

    /**
    * 
    */
    public function __construct($statusCode = 200, $content, $headers = [])
    {
      $this->setContent($content);
      $this->statusCode($statusCode);
    }

    /**
     * 
     */
    public function setContent()
    {

    }
}
