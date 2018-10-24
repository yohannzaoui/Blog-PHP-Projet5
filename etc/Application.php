<?php
namespace Core;

use Core\Interfaces\ApplicationInterface;


/**
 * Class Application
 * @package Core
 */
class Application implements ApplicationInterface
{
    /**
     * @var Router
     */
    private $router;


    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->router = new Router();
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function boot(Request $request)
    {
        return $this->router->handle($request);
    }
}
