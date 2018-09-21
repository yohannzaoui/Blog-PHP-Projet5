<?php

namespace Core;

use Core\Interfaces\RequestInterface;

/**
 * 
 */
class Request implements RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';

    public $query;

    public $request;

    public $files;

    public $server;

    public $attributes;

    private $session;

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
        $this->query = new ParameterBag($query);
        $this->request = new ParameterBag($request);
        $this->files = new ParameterBag($files);
        $this->server = new ParameterBag($server);
        $this->attributes = new ParameterBag([]);
        $this->session = new Session();
    }

    /**
     * 
     */
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
        return $method === $this->server->get('REQUEST_METHOD');
    }

    /**
     * 
     */
    public function getRequestUri()
    {
        return $this->server->get('REQUEST_URI');
    }

    /**
     * 
     */
    public function getQuery($name)
    {
        return $this->query->get($name);
    }

    /**
     * 
     */
    public function getRequest($name)
    {
        return $this->request->get($name);
    }

    public function has($value)
    {
        return $this->request->has($value);
    }

    /**
     *@return Session object
     */
    public function getSession()
    {
        return $this->session;
    }
}
