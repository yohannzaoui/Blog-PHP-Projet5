<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Response;
use App\Controller\Frontend\Interfaces\Error404ControllerInterface;

class Error404Controller implements Error404ControllerInterface
{

    public function __invoke()
    {     
        $view = new View;
        return new Response(200, [], $view->render('error404', 'error'));
    }
}