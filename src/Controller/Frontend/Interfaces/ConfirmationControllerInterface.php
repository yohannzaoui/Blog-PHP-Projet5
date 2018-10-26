<?php

namespace App\Controller\Frontend\Interfaces;

use Core\Request;


/**
 * Interface ConfirmationControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface ConfirmationControllerInterface
{
    /**
     * ConfirmationControllerInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}
