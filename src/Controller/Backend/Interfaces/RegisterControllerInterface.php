<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;

/**
 *
 */
interface RegisterControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}
