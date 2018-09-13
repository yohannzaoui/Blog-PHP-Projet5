<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Core\Application;
use Core\Request;
use Core\Session;

$session = new Session;
$session->sessionStart();
$request = Request::createFromGlobals();
$application = new Application();
$application->boot($request);
echo "<pre>";
var_dump($request);
echo "</pre>";
