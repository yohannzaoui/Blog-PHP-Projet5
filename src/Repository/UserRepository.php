<?php

namespace App\Repository;

use Core\DBFactory;
use App\entity\User;

class UserRepository extends DBFactory
{
    public function addAdmin($user)
    {
        extract($user);
        $sql = 'INSERT INTO users (pseudo, pass, level, creation_date) VALUES (?,?,1,NOW())';
        $this->sql($sql, [$pseudo, $pass]);
    }

    public function addUser($user)
    {
        extract($user);
        $sql = 'INSERT INTO users (pseudo, pass, level, creation_date) VALUES (?,?,2,NOW())';
        $this->sql($sql, [$pseudo, $pass]);
    }

    public function allAdmins()
    {
        $sql= 'SELECT * FROM users ORDER BY id';
        $result = $this->sql($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        return $users;
    }

    public function allUsers()
    {
        $sql= 'SELECT id,pseudo,pass,level,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM users WHERE level = 2 ORDER BY id';
        $result = $this->sql($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        return $users;
    }

    public function deleteAdmin($id)
    {
        $sql = 'DELETE FROM users WHERE id='.$id;
        $this->sql($sql, [$id]);
    }

    public function deleteUser($id)
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
        $user->setLevel($row['level']);
        $user->setCreation_date($row['creation_date_fr']);
        return $user;
    }
}