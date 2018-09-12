<?php
namespace App\Controller\Frontend\Interfaces;

use Core\Request;

/**
 *
 */
interface PostControllerInterface
{
    public function __construct();

    public function __invoke(request $request);
}
