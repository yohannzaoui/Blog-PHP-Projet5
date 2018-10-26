<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface HomeControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface HomeControllerInterface
{
    /**
     * HomeControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}
