<?php

namespace Core\Interfaces;


/**
 * Interface ParameterBagInterface
 * @package Core\Interfaces
 */
interface ParameterBagInterface
{
    /**
     * ParameterBagInterface constructor.
     * @param array $parameters
     */
    public function __construct($parameters = []);

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public function set($key, $value = null);
}
