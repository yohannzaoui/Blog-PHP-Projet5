<?php

//namespace BlogFram;
//require_once 'vendor/autoload.php';
require_once 'Session.php';


class Request
{
    /** Tableau des paramètres de la requête */
    private $params;

    /** Objet session associé à la requête */
    private $session;

    /**
     * Constructeur
     *
     * @param array $params Paramètres de la requête
     */
    public function __construct($params)
    {
        $this->params = $params;
        $this->session = new Session();
    }

    /**
     * Renvoie l'objet session associé à la requête
     *
     * @return Session Objet session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     *
     * @param string $name name du paramètre
     * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide
     */
    public function existeParams($name)
    {
        return (isset($this->params[$name]) && $this->params[$name] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     *
     * @param string $name name d paramètre
     * @return string Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas dans la requête
     */
    public function getParams($name)
    {
        if ($this->existeParams($name)) {
            return $this->params[$name];
        }
        else {
            throw new Exception("Paramètre '$name' absent de la requête");
        }
    }

}
