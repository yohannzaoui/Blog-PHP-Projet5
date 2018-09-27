<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Response;
use App\Controller\Frontend\Interfaces\Error404ControllerInterface;

class Error404Controller implements Error404ControllerInterface
{
    
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function __invoke()
    {     
        return new Response(200, [], $this->view->render('error404', 'error'));
    }
}