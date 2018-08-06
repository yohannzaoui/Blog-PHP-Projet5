<?php

namespace BlogSystem;

class Request
{
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getPath()
    {
        if (!isset($_SERVER['PATH_INFO'])) {
            return '/';
        }

        return $_SERVER['PATH_INFO'];
    }

    public function getParams()
    {
        return $_GET;
    }
}
