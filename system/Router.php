<?php

namespace BlogSystem;

class Router
{
    private $routes = [];

    public function add(
        string $method,
        string $path,
        string $class,
        string $action,
        array $params = []
    ) {
        if ($method !== 'GET' && $method !== 'POST') {
            throw new InvalidArgumentException("$method is not a valid method");
        }

        $this->routes[$path][strtoupper($method)] = [
            'class' => $class,
            'action' => $action,
            'params' => $params,
        ];
    }

    public function getController(string $method, string $path)
    {
        if (!isset($this->routes[$path][strtoupper($method)])) {
          http_response_code(404);
          // APPELER LA VUE ERREUR

          die();
        }

        return $this->routes[$path][strtoupper($method)];
    }
}
