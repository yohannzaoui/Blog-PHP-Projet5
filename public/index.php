<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Core\Application;
use Core\Request;


$request = Request::createFromGlobals();
$request->getSession()->sessionStart();
$application = new Application();
$application->boot($request);
/*echo "<pre>";
var_dump($request);
echo "</pre>";*/
