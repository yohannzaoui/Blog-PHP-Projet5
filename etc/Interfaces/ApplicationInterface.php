<?php

namespace Core\Interfaces;

use Core\Request;

interface ApplicationInterface
{
    public function boot(Request $request);
}
