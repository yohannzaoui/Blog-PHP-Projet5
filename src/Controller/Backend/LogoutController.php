<?php

namespace App\controller\backend;

use App\Controller\Backend\Interfaces\LogoutControllerInterface;
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

    public function logoutAdmin()
    {
        $this->session->sessionDestroy();
        header('Location: ../index.php?route=loginAdmin');
    }
}
