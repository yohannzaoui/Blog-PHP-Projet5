<?php

namespace Core\Interfaces;


/**
 * Interface SessionInterface
 * @package Core\Interfaces
 */
interface SessionInterface
{
    /**
     * @return mixed
     */
    public function sessionStart();

    /**
     * @return mixed
     */
    public function sessionDestroy();

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function add($name, $value);

    /**
     * @param $message
     * @return mixed
     */
    public function flash($message);

    /**
     * @param $name
     * @return mixed
     */
    public function existeSession($name);

    /**
     * @param $name
     * @return mixed
     */
    public function getSession($name);
}
