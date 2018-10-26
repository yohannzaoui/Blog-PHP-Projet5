<?php

namespace Core\Interfaces;


/**
 * Interface RequestInterface
 * @package Core\Interfaces
 */
interface RequestInterface
{
    /**
     * RequestInterface constructor.
     * @param array $query
     * @param array $request
     * @param array $files
     * @param array $server
     */
    public function __construct(array $query = [], array $request = [], array $files = [], array $server = []);

    /**
     * @return mixed
     */
    public static function createFromGlobals();

    /**
     * @param $method
     * @return mixed
     */
    public function isMethod($method);

    /**
     * @return mixed
     */
    public function getRequestUri();

    /**
     * @param $name
     * @return mixed
     */
    public function getQuery($name);

    /**
     * @param $name
     * @return mixed
     */
    public function getRequest($name);
}
