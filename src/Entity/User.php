<?php

namespace App\Entity;

class User
{
    private $id;
    private $pseudo;
    private $pass;

    public function setId($id)
    {
        $id=(int)$id;
        if ($id>0){
        $this->id=$id;
        }
    }

    public function setPseudo($pseudo)
    {
        if(is_string($pseudo) && strlen($pseudo)<=255){
            $this->pseudo = $pseudo;
        }
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getPseudo()
    {
        return $this->pseudo; 
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getId()
    {
        return $this->id;
    }
}