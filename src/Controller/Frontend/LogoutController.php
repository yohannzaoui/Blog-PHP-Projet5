<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LogoutControllerInterface;
use Core\View;
use Core\Request;

/**
 *
 */
class LogoutController implements LogoutControllerInterface
{

    private $view;

    /**
     * 
     */
    public function __construct()
    {
        $this->session = new Session;
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        $request->getSession()->sessionDestroy();
        $this->view->render('loginUser', 'frontend');
    }
}
