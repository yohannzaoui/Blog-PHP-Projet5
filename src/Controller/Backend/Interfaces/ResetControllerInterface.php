<?php
namespace App\Controller\Backend\Interfaces;

/**
 *
 */
interface ResetControllerInterface
{
    public function __construct();

    public function resetUser();

    public function resetAdmin();

    public function passwordResetUser();

    public function passwordResetAdmin();

    public function resetUserInfo();

    public function resetAdminInfo();

    public function passwordReset();
}
