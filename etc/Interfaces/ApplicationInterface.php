<?php
namespace Core\Interfaces;

use Core\Request;


/**
 * Interface ApplicationInterface
 * @package Core\Interfaces
 */
interface ApplicationInterface
{
    /**
     * ApplicationInterface constructor.
     */
    public function __construct();

    /**
     * @param Request $request
     * @return mixed
     */
    public function boot(request $request);
}
