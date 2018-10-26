<?php

namespace App\Controller\Backend\Interfaces;

use Core\Request;


/**
 * Interface LogoutControllerInterface
 * @package App\Controller\Backend\Interfaces
 */
interface LogoutControllerInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}
