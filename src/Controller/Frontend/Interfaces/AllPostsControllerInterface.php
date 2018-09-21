<?php
namespace App\Controller\Frontend\Interfaces;

use Core\Request;

/**
 *
 */
interface AllPostsControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}
