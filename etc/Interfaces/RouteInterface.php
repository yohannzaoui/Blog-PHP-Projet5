<?php

namespace Core\Interfaces;


/**
 * Interface RouteInterface
 * @package Core\Interfaces
 */
interface RouteInterface
{
    /**
     * RouteInterface constructor.
     * @param $path
     * @param $action
     * @param array $methods
     */
    public function __construct($path, $action, $methods = []);

    /**
     * @return mixed
     */
    public function getPath();

    /**
     * @return mixed
     */
    public function getAction();

    /**
     * @return mixed
     */
    public function getMethods();
}
