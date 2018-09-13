<?php
namespace Core\Interfaces;

/**
 *
 */
interface ParameterBagInterface
{
    public function __construct($parameters = []);

    public function get($key, $default = null);

    public function set($key, $value = null);
}
