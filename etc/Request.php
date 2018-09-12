<?php
namespace Core;

use Core\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';

    public $query = [];

    public $request = [];

    public $files = [];

    public $server = [];

    /**
     * Request constructor.
     *
     * @param array $query
     * @param array $request
     * @param array $files
     * @param array $server
     */
    public function __construct(array $query = [], array $request = [], array $files = [], array $server = [])
    {
        $this->query = $query;
        $this->request = $request;
        $this->files = $files;
        $this->server = $server;
    }

    public static function createFromGlobals()
    {
        return new static($_GET, $_POST, $_FILES, $_SERVER);
    }

    /**
     * @param $method
     *
     * @return bool
     */
    public function isMethod($method)
    {
        return $method === $this->server['REQUEST_METHOD'];
    }

    public function getRequestUri()
    {
        return $this->server['REQUEST_URI'];
    }

    public function getParam($name)
    {
        return $this->query[$name];
    }
}
