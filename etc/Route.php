<?php
namespace Core;

use Core\Interfaces\RouteInterface;


class Route implements RouteInterface
{
    private $path;
    private $action;
    private $methods = [];
    private $params =[];

    public function __construct($path, $action, $methods = [], $params = [])
    {
        $this->path = $path;
        $this->action = $action;
        $this->methods = $methods;
        $this->params = $params;
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

    public function getParams()
    {
        return $this->params;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }
}
