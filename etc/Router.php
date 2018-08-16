<?php

namespace Core;

class Router
{
  private $routes = [];

  public function __construct()
  {
    $this->loadRoutes();
  }

  private function loadRoutes()
  {
    $routes = require_once __DIR__.'./../config/routes.php';

    foreach ($routes as $route => $value) {
      $this->routes[] = new Route($value['path'], $value['methods'], $value['action']);
    }
  }

  public function handleRequest(Request $request)
  {
    foreach ($this->routes as $route) {

      $this->catchParams($request, $route);

      if ($route->getPath() === $request->getPathInfo() && \in_array($request->getMethod(), $route->getMethods())) {
        $actionName = $route->getAction();
        $controller = new $actionName();
        return $controller($request);
      }
    }
  }

  private function catchParams(Request $request, Route $route)
  {
    // Attraper les paramètres : /article/details/{id}
    // Request -> /article/details/22
  }
}
