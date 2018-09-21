<?php
namespace App\Controller\Frontend\Interfaces;

use Core\request;

/**
 *
 */
interface PasswordUserControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}
