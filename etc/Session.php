<?php

namespace Core;

use Core\Interfaces\SessionInterface;

/**
 *
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
     * 
     */
    public function add($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * 
     */
    public function flash($message)
    {
        $this->add('flash', $message);
    }

    /**
     * 
     */
    public function existeSession($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    /**
     * 
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
