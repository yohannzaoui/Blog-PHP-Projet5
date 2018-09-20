<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Core\Application;
use Core\Request;
use Core\Response;

$request = Request::createFromGlobals();
$request->getSession()->sessionStart();
$application = new Application();
$response = $application->boot($request);
$response->send();
/*echo "<pre>";
var_dump($request);
echo "</pre>";*/
