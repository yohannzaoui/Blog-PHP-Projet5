<?php

namespace App\controller\frontend;

use Core\Session;

class LogoutController
{
    private $session;

    public function __construct()
    {
        $this->session = new Session;
    }

    public function logoutUser()
    {
        $this->session->sessionDestroy();
        header('Location: ../index.php?route=loginUser');
    }
}
