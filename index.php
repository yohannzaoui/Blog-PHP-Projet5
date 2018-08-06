<?php

require 'vendor/autoload.php';

$router = new BlogSystem\Router();
$router->add('GET', '/', 'ControllerFrontend', 'getHome');
$router->add('GET', '/post', 'ControllerFrontend', 'getPost');
$router->add('GET', '/List', 'ControllerFrontend', 'list');
$router->add('POST', '/post', 'ControllerFrontend', 'comment');

$request = new BlogSystem\Request();
$method = $request->getMethod();
$path = $request->getPath();
$params = $request->getParams();

// Get the right controller
$route = $router->getController($method, $path);
//var_dump($route);

$controller = $route['class'];
$action = $route['action'];
new BlogSystem\Response($controller, $action, $params);
