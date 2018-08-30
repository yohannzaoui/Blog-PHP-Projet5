<?php

namespace App\Entity;

class User
{
    private $id;
    private $pseudo;
    private $pass;
    private $email;
    private $role;
    private $confirmation_token;
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
        if (is_string($pseudo) && strlen($pseudo)<=255) {
            $this->pseudo = $pseudo;
        }
    }

    public function setPass($pass)
    {
        if (is_string($pass) && strlen($pass)<=255) {
            $this->pass = $pass;
        }
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setRole($role)
    {
        if (is_string($role) && strlen($role)<=10) {
            $this->role = $role;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getCreation_date()
    {
        return $this->creation_date_fr;
    }

    public function getConfirmationToken()
    {
        return $this->confirmation_token;
    }

    public function setConfirmationToken($confirmation_token)
    {
        $this->confirmation_token = $confirmation_token;
    }

}
