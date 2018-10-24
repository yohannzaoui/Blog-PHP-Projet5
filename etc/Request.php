<?php

namespace Core;

use Core\Interfaces\RequestInterface;


/**
 * Class Request
 * @package Core
 */
class Request implements RequestInterface
{
    /**
     *
     */
    const METHOD_GET = 'GET';
    /**
     *
     */
    const METHOD_POST = 'POST';
    /**
     *
     */
    const METHOD_DELETE = 'DELETE';


    /**
     * @var ParameterBag
     */
    public $query;


    /**
     * @var ParameterBag
     */
    public $request;


    /**
     * @var ParameterBag
     */
    public $files;


    /**
     * @var ParameterBag
     */
    public $server;


    /**
     * @var ParameterBag
     */
    public $attributes;


    /**
     * @var Session
     */
    private $session;


    /**
     * Request constructor.
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
     * @return Request
     */
    public static function createFromGlobals()
    {
        return new static($_GET, $_POST, $_FILES, $_SERVER);
    }


    /**
     * @param $method
     * @return bool
     */
    public function isMethod($method)
    {
        return $method === $this->server->get('REQUEST_METHOD');
    }


    /**
     * @return mixed|null
     */
    public function getRequestUri()
    {
        return $this->server->get('REQUEST_URI');
    }


    /**
     * @param $name
     * @return mixed|null
     */
    public function getQuery($name)
    {
        return $this->query->get($name);
    }


    /**
     * @param $name
     * @return mixed|null
     */
    public function getRequest($name)
    {
        return $this->request->get($name);
    }

    /**
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public function has($value)
    {
        return $this->request->has($value);
    }


    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }
}
