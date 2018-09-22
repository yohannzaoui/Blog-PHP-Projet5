<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Core\View;
use Core\Request;
use Core\Response;
use Core\Application;

try {
    
    $request = Request::createFromGlobals();
    $request->getSession()->sessionStart();
    $application = new Application();
    $response = $application->boot($request);
    $response->send();
    
} catch (\Exception $e) {
    $view = new view;
    return new Response(200, [], $view->render('error', 'error', ['error'=>$e->getMessage()]));
    //$view->render('error', 'error', ['error'=>$e->getMessage()]);
}

//echo "<pre>";
//var_dump($request);
//echo "</pre>";
