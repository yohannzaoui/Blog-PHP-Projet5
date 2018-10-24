<?php

namespace Core;

use Core\Interfaces\SessionInterface;


/**
 * Class Session
 * @package Core
 */
class Session implements SessionInterface
{


    /**
     *
     */
    public function sessionStart()
    {
        session_start();
    }


    /**
     *
     */
    public function sessionDestroy()
    {
        session_destroy();
    }


    /**
     * @param $name
     * @param $value
     */
    public function add($name, $value)
    {
        $_SESSION[$name] = $value;
    }


    /**
     * @param $message
     */
    public function flash($message)
    {
        $this->add('flash', $message);
    }


    /**
     * @param $name
     * @return bool
     */
    public function existeSession($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }


    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function getSession($name)
    {
        if ($this->existeAttribut($name)) {
            return $_SESSION[$name];
        }
        else {
            throw new \Exception("Attribut '$name' absent de la session");
        }
    }
}
