<?php

namespace Core;

use Core\Router;

/**
 *
 */
class Application
{

    private $router;

    public function __construct()
    {
        $this->router = new Router;
    }

    public function boot()
    {
        $this->router->run();
    }
}
