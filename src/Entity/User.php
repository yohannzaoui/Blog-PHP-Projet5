<?php

namespace App\Entity;

use App\Entity\Interfaces\UserInterface;


/**
 * Class User
 * @package App\Entity
 */
class User implements UserInterface
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $pseudo;
    /**
     * @var
     */
    private $pass;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $role;
    /**
     * @var
     */
    private $token;
    /**
     * @var
     */
    private $ctoken;
    /**
     * @var
     */
    private $creationDateFr;


    /**
     * @param $id
     * @return mixed|void
     */
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }


    /**
     * @param $pseudo
     * @return mixed|void
     */
    public function setPseudo($pseudo)
    {
        if (is_string($pseudo) && strlen($pseudo) <= 255) {
            $this->pseudo = $pseudo;
        }
    }


    /**
     * @param $pass
     * @return mixed|void
     */
    public function setPass($pass)
    {
        if (is_string($pass) && strlen($pass) <= 255) {
            $this->pass = $pass;
        }
    }


    /**
     * @param $email
     * @return mixed|void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    /**
     * @param $role
     * @return mixed|void
     */
    public function setRole($role)
    {
        if (is_string($role) && strlen($role) <= 10) {
            $this->role = $role;
        }
    }


    /**
     * @param $creationDateFr
     * @return mixed|void
     */
    public function setCreationDate($creationDateFr)
    {
        $this->creationDateFr = $creationDateFr;
    }


    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }


    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDateFr;
    }


    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }


    /**
     * @param $token
     * @return mixed|void
     */
    public function setToken($token)
    {
        $this->token = $token;
    }


    /**
     * @return mixed
     */
    public function getCtoken()
    {
        return $this->ctoken;
    }


    /**
     * @param $ctoken
     * @return mixed|void
     */
    public function setCtoken($ctoken)
    {
        $this->ctoken = $ctoken;
    }
}
