<?php

require '../vendor/autoload.php';

use Core\Router;
use Core\Session;

$session = New Session;
$router = new router;
$router->run();