<?php
namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\LogoutControllerInterface;
use Core\Session;
use Core\View;

/**
 *
 */
class LogoutController implements LogoutControllerInterface
{

    private $session;
    private $view;

    public function __construct()
    {
        $this->session = new Session;
        $this->view = new View;
    }

    public function __invoke()
    {
        $this->session->sessionDestroy();
        $this->view->render('loginAdmin', 'backend');
    }
}
