<?php

namespace App\Controller\Backend\Interfaces;

/**
 *
 */
interface UserControllerInterface
{
    public function __construct();

    public function listAdmins();

    public function listUsers();

    public function deleteAdmin();

    public function deleteUser();
}
