<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Core\View;
use Core\Request;
use Core\Response;
use Core\Application;


    
$request = Request::createFromGlobals();
$request->getSession()->sessionStart();
$application = new Application();
$response = $application->boot($request);
$response->send();
