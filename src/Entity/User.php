<?php

namespace App\Entity;

class User
{
    private $id;
    private $pseudo;
    private $pass;
    private $level;
    private $creation_date_fr;

    public function setId($id)
    {
        $id=(int)$id;
        if ($id>0) {
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

    public function setLevel($level)
    {
        $level=(int)$level;
        if ($level==1 || $level==2) {
            $this->level=$level;
        }
    }

    public function setCreation_date($creation_date_fr)
  {
    $this->creation_date_fr=$creation_date_fr;
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
 
    public function getLevel()
    {
        return $this->level;
    }
 
    public function getCreation_date()
    {
        return $this->creation_date_fr;
    }
}