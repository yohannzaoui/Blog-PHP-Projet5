<?php

use App\Action\HomeController;

return [
  'home' => [
    'path' => '/',
    'methods' => ['GET'],
    'action' => HomeController::class
  ],
  'post' => [
    'path' => '/post',
    'methods' => ['GET'],
    'action' => PostController::class
  ],
  'all' => [
    'path' => '/all',
    'methods' => ['GET'],
    'action' => AllController::class
  ]
];
