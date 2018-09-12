<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;
/**
 *
 */
interface LoginControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}
