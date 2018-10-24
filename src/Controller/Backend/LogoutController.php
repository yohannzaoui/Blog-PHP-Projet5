<?php

namespace App\Controller\Backend;

use App\Controller\Backend\Interfaces\LogoutControllerInterface;
use Core\Request;


/**
 * Class LogoutController
 * @package App\Controller\Backend
 */
class LogoutController implements LogoutControllerInterface
{


    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $request->getSession()->sessionDestroy();
        header('location:../admin');
    }
}
