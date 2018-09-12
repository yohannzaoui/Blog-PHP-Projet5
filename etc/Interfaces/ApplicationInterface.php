<?php
namespace Core\Interfaces;

use Core\Request;

/**
 *
 */
interface ApplicationInterface
{
    public function __construct();

    public function boot(request $request);
}
