<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\LogoutControllerInterface;
use Core\Request;
use Core\View;

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
        $this->view = new View;
    }

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        $request->getSession()->sessionDestroy();
        $this->view->render('loginAdmin', 'backend');
    }
}
