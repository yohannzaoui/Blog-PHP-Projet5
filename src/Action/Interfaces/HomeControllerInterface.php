<?php

namespace App\Action\Interfaces;

use Core\Request;

interface HomeControllerInterface
{
    public function __construct();

    public function __invoke(Request $request);
}
