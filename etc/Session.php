<?php

namespace Core;

class Session
{
    public function __construct()
    {
        session_start();
    }

    
    public function destroy()
    {
        session_destroy();
    }

    
    public function setAttribut($nom, $valeur)
    {
        $_SESSION[$nom] = $valeur;
    }

    
    public function existeAttribut($nom)
    {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }

    
    public function getAttribut($nom)
    {
        if ($this->existeAttribut($nom)) {
            return $_SESSION[$nom];
        }
        else {
            throw new Exception("Attribut '$nom' absent de la session");
        }
    }

}
