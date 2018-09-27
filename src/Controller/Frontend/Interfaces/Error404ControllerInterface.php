<?php

namespace App\Controller\Frontend\Interfaces;

interface Error404ControllerInterface
{
    public function __construct();
    
    public function __invoke();
}