<?php

namespace App\Controller\Frontend\Interfaces;

/**
 *
 */
interface LogoutControllerInterface
{
    public function __construct();

    public function logoutUser();
}
