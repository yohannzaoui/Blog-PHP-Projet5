<?php

namespace App\Controller\Backend\Interfaces;

/**
 *
 */
interface LoginControllerInterface
{
    public function __construct();

    public function admin();

    public function adminConnect();
}
