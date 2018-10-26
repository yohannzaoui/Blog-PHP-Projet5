<?php

namespace App\Entity\Interfaces;


/**
 * Interface UserInterface
 * @package App\Entity\Interfaces
 */
interface UserInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $pseudo
     * @return mixed
     */
    public function setPseudo($pseudo);

    /**
     * @param $pass
     * @return mixed
     */
    public function setPass($pass);

    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * @param $role
     * @return mixed
     */
    public function setRole($role);

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token);

    /**
     * @param $ctoken
     * @return mixed
     */
    public function setCtoken($ctoken);

    /**
     * @param $creationDateFr
     * @return mixed
     */
    public function setCreationDate($creationDateFr);

    /**
     * @return mixed
     */
    public function getPseudo();

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getRole();

    /**
     * @return mixed
     */
    public function getCreationDate();

    /**
     * @return mixed
     */
    public function getToken();

    /**
     * @return mixed
     */
    public function getCtoken();
}
