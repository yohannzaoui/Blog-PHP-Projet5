<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface LogoutControllerInterface
{
    public function __invoke(Request $request);
}
