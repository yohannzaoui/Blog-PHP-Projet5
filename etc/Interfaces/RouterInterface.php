<?php
namespace Core\Interfaces;

use Core\Request;

/**
 *
 */
interface RouterInterface
{
    public function __construct();

    public function loadRoutes();

    public function handle(Request $request);
}
