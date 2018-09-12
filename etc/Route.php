<?php
namespace Core;

use Core\Interfaces\RouteInterface;


class Route implements RouteInterface
{
    private $path;
    private $action;
    private $methods;

    public function __construct($path, $action, $methods = [])
    {
        $this->path = $path;
        $this->action = $action;
        $this->methods = $methods;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getMethods()
    {
        return $this->methods;
    }
}
