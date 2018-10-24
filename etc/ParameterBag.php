<?php

namespace Core;

use Core\Interfaces\ParameterBagInterface;


/**
 * Class ParameterBag
 * @package Core
 */
class ParameterBag implements ParameterBagInterface
{


    /**
     * @var array
     */
    private $parameters = [];


    /**
     * ParameterBag constructor.
     * @param array $parameters
     */
    public function __construct($parameters = [])
    {
        $this->parameters = $parameters;
    }


    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }


    /**
     * @param $key
     * @param null $value
     */
    public function set($key, $value = null)
    {
        $this->parameters[$key] = $value;
    }


    /**
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public function has($value)
    {
        if (array_key_exists($value, $this->parameters)) {
            return $value;
        } else {
            throw new \Exception("Paramètre inconnu");
            
        }
    }
}
