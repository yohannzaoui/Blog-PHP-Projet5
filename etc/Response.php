<?php

namespace Core;

use Core\Interfaces\ResponseInterface;


/**
 * Class Response
 * @package Core
 */
class Response implements ResponseInterface
{

    /**
     *
     */
    const HTTP_OK = 200;
    /**
     *
     */
    const HTTP_NOT_FOUND = 404;


    /**
     * @var
     */
    private $statusCode;


    /**
     * @var
     */
    private $content;


    /**
     * @var array
     */
    public $headers = [];


    /**
     * @var array
     */
    private $statusText = [
        200 => 'Ok',
        404 => 'Not Found'
    ];
    /**
     * @var string
     */
    private $version = '1.0';


    /**
     * Response constructor.
     * @param int $statusCode
     * @param array $headers
     * @param $content
     */
    public function __construct($statusCode = 200, $headers = [], $content)
    {
        $this->setContent($content);
        $this->statusCode($statusCode);
        $this->headers = $headers;
    }


    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }


    /**
     * @param $statusCode
     */
    public function statusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }


    /**
     * @return $this
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
