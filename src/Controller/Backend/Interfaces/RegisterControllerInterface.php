<?php
namespace App\Controller\Backend\Interfaces;

/**
 *
 */
interface RegisterControllerInterface
{
    public function __construct();

    public function registration();

    public function addAdmin();
}
