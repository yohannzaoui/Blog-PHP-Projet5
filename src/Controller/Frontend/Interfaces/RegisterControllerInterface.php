<?php
namespace App\Controller\Frontend\Interfaces;

/**
 *
 */
interface RegisterControllerInterface
{
    public function __construct();

    public function registrationPage();

    public function addUser();

    public function confirmation($id, $token);
}
