<?php

namespace App\Controller\Frontend;

use Core\View;
use Core\Request;
use Core\Response;
use App\Controller\Frontend\Interfaces\LogoutControllerInterface;


/**
 * Class LogoutController
 * @package App\Controller\Frontend
 */
class LogoutController implements LogoutControllerInterface
{


    /**
     * @var View
     */
    private $view;


    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
        $this->view = new View;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $request->getSession()->sessionDestroy();
        return new Response(200, [], $this->view->render('loginUser', 'frontend'));
    }
}
