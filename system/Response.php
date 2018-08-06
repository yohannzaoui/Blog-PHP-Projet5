<?php

namespace BlogSystem;

require 'Controllers/ControllerFrontend.php';

class Response
{
    private $controller;
    private $action;
    private $params=[];

    public function __construct($controller, $action, $params)
    {
        $controller = new $controller;
        $controller->$action($params);
    }


}
