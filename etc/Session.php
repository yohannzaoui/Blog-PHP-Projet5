<?php

namespace Core;

class Session
{

    public function sessionStart()
    {
        session_start();
    }

    
    public function sessionDestroy()
    {
        session_destroy();
    }

    
    public function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }


    public function existeSession($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    
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