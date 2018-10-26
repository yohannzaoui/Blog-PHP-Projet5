<?php

namespace App\Repository\Interfaces;


/**
 * Interface UserRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface UserRepositoryInterface
{
    /**
     * @param $pseudo
     * @param $passhash
     * @param $email
     * @param $token
     * @return mixed
     */
    public function addAdmin($pseudo, $passhash, $email, $token);

    /**
     * @param $pseudo
     * @param $email
     * @param $passhash
     * @param $token
     * @return mixed
     */
    public function addUser($pseudo, $email, $passhash, $token);

    /**
     * @return mixed
     */
    public function allAdmins();

    /**
     * @return mixed
     */
    public function allUsers();

    /**
     * @param $id
     * @return mixed
     */
    public function deleteUser($id);

    /**
     * @param $pseudo
     * @param $pass
     * @return mixed
     */
    public function adminConnect($pseudo, $pass);

    /**
     * @param $pseudo
     * @param $pass
     * @return mixed
     */
    public function userConnect($pseudo, $pass);

    /**
     * @param $id
     * @param $token
     * @return mixed
     */
    public function confirme($id, $token);

    /**
     * @param $token
     * @return mixed
     */
    public function resetUser($token);

    /**
     * @param $token
     * @return mixed
     */
    public function resetAdmin($token);

    /**
     * @param $id
     * @param $passhash
     * @return mixed
     */
    public function resetUserPass($id, $passhash);

    /**
     * @return mixed
     */
    public function countAdmins();

    /**
     * @return mixed
     */
    public function countMembers();
}
