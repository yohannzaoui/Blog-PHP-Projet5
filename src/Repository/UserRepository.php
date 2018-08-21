<?php

namespace App\Repository;

use Core\DBFactory;
use App\entity\User;

class UserRepository extends DBFactory
{
    public function addUser($user)
    {
        extract($user);
        $sql = 'INSERT INTO users (pseudo, pass) VALUES (?,?)';
        $this->sql($sql, [$pseudo, $pass]);
    }

    public function allUsers()
    {
        $sql= 'SELECT * FROM users';
        $result = $this->sql($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        return $users;
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id='.$id;
        $this->sql($sql, [$id]);
    }

    public function userConnect()
    {
        $sql ='SELECT * FROM users WHERE pseudo = ? AND pass = ?';
        $this->sql($sql, [$pseudo,$pass]);
        $userExist =$sql->rowCount();
        if ($userExist == 1) {
            $userInfo = $sql->fetch();
        }
    }

    private function buildObject(array $row)
    {
        $user = new User;
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setPass($row['pass']);
        return $user;
    }
}