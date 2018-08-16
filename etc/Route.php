<?php

namespace Core;

class Route
{
  private $path = '/';

  private $methods = [];

  private $action;

  public function __construct(string $path, array $methods = [], string $action)
  {
    $this->path = $path;
    $this->methods = $methods;
    $this->action = $action;
  }

  public function getPath()
  {
    return $this->path;
  }

  public function getAction(): string
  {
    return $this->action;
  }

  public function getMethods(): array
  {
    return $this->methods;
  }
}
