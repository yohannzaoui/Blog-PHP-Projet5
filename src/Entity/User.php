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

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDateFr;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getCtoken()
    {
        return $this->ctoken;
    }

    public function setCtoken($ctoken)
    {
        $this->ctoken = $ctoken;
    }
}
