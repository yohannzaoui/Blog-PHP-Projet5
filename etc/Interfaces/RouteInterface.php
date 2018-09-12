<?php
namespace Core\Interfaces;

/**
 *
 */
interface RouteInterface
{
    public function __construct($path, $action, $methods = []);

    public function getPath();

    public function getAction();

    public function getMethods();
}
