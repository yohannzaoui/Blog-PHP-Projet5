<?php
namespace App\Repository\Interfaces;

/**
 *
 */
interface UserRepositoryInterface
{
    public function addAdmin($pseudo, $passhash, $email, $token);

    public function addUser($pseudo, $email, $passhash, $token);

    public function allAdmins();

    public function allUsers();

    public function deleteUser($id);

    public function adminConnect($pseudo, $pass);

    public function userConnect($pseudo, $pass);

    public function confirme($id, $token);

    public function resetUser($token);

    public function resetAdmin($token);

    public function resetUserPass($id, $passhash);

    public function countAdmins();

    public function countMembers();
}
