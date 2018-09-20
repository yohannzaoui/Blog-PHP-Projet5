<?php
namespace Core;

use Core\Interfaces\RouterInterface;

/**
 * 
 */
class Router implements RouterInterface
{
    /**
     * @var array
     */
    private $routes = [];
    private $view;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->loadRoutes();
        $this->view = new View;
    }

    /**
     * 
     */
    public function loadRoutes()
    {
        $routes = require_once __DIR__.'/../config/routes.php';

            foreach ($routes as $route) {
                    $this->routes[] = new Route($route['path'], $route['action'], $route['methods'] ?? [], $route['params'] ?? []);
                }
    }

    /**
     * 
     */
    public function handle(Request $request)
    {
        foreach ($this->routes as $route) {
            $this->catchParams($request, $route);
            if ($route->getPath() === $request->getRequestUri()) {
                $controller = $route->getAction();
                $class = new $controller();
                return $class($request);
            } 
        }
    }

    /**
     * 
     */
    private function catchParams(Request $request, Route &$route)
    {
        foreach ($route->getParams() as $key => $param) {
            preg_match(sprintf('#%s#', $param), $request->getRequestUri(), $entry);
            $request->attributes->set($key, $entry[0] ?? null);
            $route->setPath(strtr($route->getPath(), [sprintf('{%s}', $key) => $request->attributes->get($key)]));
        }
    }
}
