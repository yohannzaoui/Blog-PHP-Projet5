<?php
namespace App\Controller\Frontend;

use App\Controller\Frontend\Interfaces\LogoutControllerInterface;
use Core\Session;

/**
 *
 */
class LogoutController implements LogoutControllerInterface
{

    private $session;

    public function __construct()
    {
        $this->session = new Session;
    }

    public function logoutUser()
    {
        $this->session->sessionDestroy();
        header('Location: ../loginUser');
    }
}
