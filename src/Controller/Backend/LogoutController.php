<?php

namespace App\controller\backend;

use Core\Session;

class LogoutController
{
    private $session;

    public function __construct()
    {
        $this->session = new Session;
    }

    public function logoutAdmin()
    {
        $this->session->sessionDestroy();
        header('Location: ../index.php?route=admin');
    }
}
