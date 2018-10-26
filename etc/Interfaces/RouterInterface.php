<?php

namespace Core\Interfaces;

use Core\Request;


/**
 * Interface RouterInterface
 * @package Core\Interfaces
 */
interface RouterInterface
{
    /**
     * RouterInterface constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function loadRoutes();

    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request);
}
