<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Core\Application;
use Core\Request;
use Core\View;

try {
    
    $request = Request::createFromGlobals();
    $request->getSession()->sessionStart();
    $application = new Application();
    $application->boot($request);
    
} catch (Exception $e) {
    $view = new view;
    $view->render('error', 'error', ['error'=>$e->getMessage()]);
}

//echo "<pre>";
//var_dump($request);
//echo "</pre>";
