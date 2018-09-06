<?php
namespace App\Entity;

use App\Entity\Interfaces\UserInterface;

/**
 *
 */
class User implements UserInterface
{

    private $id;
    private $pseudo;
    private $pass;
    private $email;
    private $role;
    private $token;
    private $ctoken;
    private $creationDateFr;


    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo) && strlen($pseudo) <= 255) {
            $this->pseudo = $pseudo;
        }
    }

    public function setPass($pass)
    {
        if (is_string($pass) && strlen($pass) <= 255) {
            $this->pass = $pass;
        }
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setRole($role)
    {
        if (is_string($role) && strlen($role) <= 10) {
            $this->role = $role;
        }
    }

    public function setCreationDate($creationDateFr)
    {
        $this->creationDateFr = $creationDateFr;
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

    public function getCreationDate()
    {
        return $this->creationDateFr;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getCtoken()
    {
        return $this->ctoken;
    }

    public function setCtoken($ctoken)
    {
        $this->ctoken = $ctoken;
    }
}
