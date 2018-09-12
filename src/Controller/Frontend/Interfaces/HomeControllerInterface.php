<?php
namespace App\Controller\Frontend\Interfaces;

use Core\Request;

/**
 *
 */
interface HomeControllerInterface
{
    public function __construct();

    public function __invoke(request $request);

    //public function home();

    //public function contact();
}
