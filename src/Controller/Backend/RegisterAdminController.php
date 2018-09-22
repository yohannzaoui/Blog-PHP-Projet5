<?php

namespace App\Controller\Backend;

use Core\View;
use Core\Response;
use App\Controller\Backend\Interfaces\RegisterAdminControllerInterface;

class RegisterAdminController implements RegisterAdminControllerInterface
{
    
    /**
     * 
     */
    private $view;

    /**
     * 
     */
    public function __construct()
    {
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke()
    {
        return new Response(200, [], $this->view->render('registerAdmin', 'backend'));
    }
}
