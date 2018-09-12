<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface ResetAdminControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}
