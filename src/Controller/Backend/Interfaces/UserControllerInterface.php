<?php
namespace App\Controller\Backend\Interfaces;

use Core\Request;
/**
 *
 */
interface UserControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}
