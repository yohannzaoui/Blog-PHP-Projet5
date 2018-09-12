<?php
namespace Core;

use Core\Interfaces\ApplicationInterface;


class Application implements ApplicationInterface
{
    /**
     * @var Router
     */
    private $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function boot(Request $request)
    {
        return $this->router->handle($request);
    }
}
