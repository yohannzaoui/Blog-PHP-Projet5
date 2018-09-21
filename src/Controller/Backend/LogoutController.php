<?php

namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\LogoutControllerInterface;
use Core\Request;

/**
 *
 */
class LogoutController implements LogoutControllerInterface
{

    /**
     * 
     */
    public function __invoke(Request $request)
    {
        $request->getSession()->sessionDestroy();
        header('location:../admin');
    }
}
