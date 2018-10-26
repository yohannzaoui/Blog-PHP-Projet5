<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface LogoutControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface LogoutControllerInterface
{
    /**
     * LogoutControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}
