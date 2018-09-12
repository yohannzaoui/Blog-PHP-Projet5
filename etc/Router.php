<?php
namespace Core;

use Core\Interfaces\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->loadRoutes();
    }

    public function loadRoutes()
    {
        $routes = require_once __DIR__.'/../config/routes.php';

                foreach ($routes as $route) {
                    $this->routes[] = new Route($route['path'], $route['action'], $route['methods'] ?? []);
                }
    }

    public function handle(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($route->getPath() === $request->getRequestUri()) {
                $controller = $route->getAction();
                $class = new $controller();
                return $class($request);
            }
        }
    }

    private function catchParams(Request $request, $path)
    {

    }
}
