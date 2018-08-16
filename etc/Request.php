<?php

namespace Core;

class Request
{
  private $attributes = [];

  private $pathInfo;

  private $method;

  public function __construct()
  {
    $this->attributes[] = $_SERVER;
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->pathInfo = $_SERVER['REQUEST_URI'];
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function getPathInfo()
  {
    return $this->pathInfo;
  }
}
