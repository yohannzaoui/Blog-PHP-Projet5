<?php
namespace Core;

use Core\Interfaces\ApplicationInterface;
use Core\Router;

/**
 *
 */
class Application implements ApplicationInterface
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
