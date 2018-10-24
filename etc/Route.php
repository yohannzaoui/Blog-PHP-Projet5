<?php

namespace Core;

use Core\Interfaces\RouteInterface;


/**
 * Class Route
 * @package Core
 */
class Route implements RouteInterface
{

    /**
     * @var
     */
    private $path;


    /**
     * @var
     */
    private $action;


    /**
     * @var array
     */
    private $methods = [];


    /**
     * @var array
     */
    private $params = [];


    /**
     * Route constructor.
     * @param $path
     * @param $action
     * @param array $methods
     * @param array $params
     */
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


    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }


    /**
     * @param $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
}
