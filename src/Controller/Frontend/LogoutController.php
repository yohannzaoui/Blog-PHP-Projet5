<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Controller\Frontend\Interfaces\LogoutControllerInterface;

/**
 *
 */
class LogoutController implements LogoutControllerInterface
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
    public function __invoke(Request $request)
    {
        $request->getSession()->sessionDestroy();
        return new Response(200, [], $this->view->render('loginUser', 'frontend'));
    }
}
