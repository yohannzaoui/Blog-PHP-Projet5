<?php

//define('URL',str_replace("index.php","",isset($_SERVER['HTTPS'])?"http"))



require_once('system/Router.php');
$router = new Router;
$router->routeReq();