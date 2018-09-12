<?php
namespace App\Controller\Frontend\Interfaces;

use Core\Request;

/**
 *
 */
interface LoginControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}
