<?php

namespace Core\Interfaces;

/**
 *
 */
interface ViewInterface
{
    public function render($template, $path, $data = []);

    public function check($data);
}
