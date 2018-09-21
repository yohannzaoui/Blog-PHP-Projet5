<?php

namespace Core\Interfaces;

/**
 *
 */
interface RequestInterface
{
    public function __construct(array $query = [], array $request = [], array $files = [], array $server = []);

    public static function createFromGlobals();

    public function isMethod($method);

    public function getRequestUri();

    public function getQuery($name);

    public function getRequest($name);
}
