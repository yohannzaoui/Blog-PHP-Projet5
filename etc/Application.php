<?php

namespace Core;

use Core\Interfaces\ApplicationInterface;

final class Application implements ApplicationInterface
{
  private $router;

  public function __construct()
  {
    $this->router = new Router();
  }

  public function boot(Request $request)
  {
    $this->router->handleRequest($request);
  }
}
