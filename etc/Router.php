<?php

namespace Core;

use Core\Interfaces\RouterInterface;
use App\Controller\Frontend\Error404Controller;


/**
 * Class Router
 * @package Core
 */
class Router implements RouterInterface
{

    /**
     * @var array
     */
    private $routes = [];


    /**
     * @var
     */
    private $view;


    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->loadRoutes();
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
     * @param Request $request
     * @return Response
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
        $error404 = new Error404Controller;
        return $error404->error();
    }


    /**
     * @param Request $request
     * @param Route $route
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
