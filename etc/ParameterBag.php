<?php
namespace Core;

use Core\Interfaces\ParameterBagInterface;

/**
 *
 */
class ParameterBag implements ParameterBagInterface
{

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * 
     */
    public function __construct($parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * 
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

    /**
     * 
     */
    public function set($key, $value = null)
    {
        $this->parameters[$key] = $value;
    }
}
