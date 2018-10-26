<?php

namespace App\Controller\Frontend\Interfaces;

/**
 * Interface Error404ControllerInterface
 * @package App\Controller\Frontend\Interfaces
 */
interface Error404ControllerInterface
{
    /**
     * Error404ControllerInterface constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function error();
}