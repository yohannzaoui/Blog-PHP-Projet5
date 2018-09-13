<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LogoutControllerInterface;
use Core\View;
use Core\Session;

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
        $this->view->render('loginUser', 'frontend');
    }
}
