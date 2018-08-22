<?php

require '../vendor/autoload.php';

use Core\Router;
use Core\Session;

$session = New Session;
$session->start();
$router = new router;
$router->run();