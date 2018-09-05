<?php

namespace App\Entity\Interfaces;

/**
 *
 */
interface UserInterface
{
    public function setId($id);

    public function setPseudo($pseudo);

    public function setPass($pass);

    public function setEmail($email);

    public function setRole($role);

    public function setToken($token);

    public function setCtoken($ctoken);

    public function setCreation_date($creation_date_fr);

    public function getPseudo();

    public function getPass();

    public function getEmail();

    public function getId();

    public function getRole();

    public function getCreation_date();

    public function getToken();

    public function getCtoken();
}
