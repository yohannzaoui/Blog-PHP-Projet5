<?php

namespace App\Repository;

use Core\DBFactory;
use App\entity\User;

class UserRepository extends DBFactory
{
    public function addAdmin($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (?,?,"admin",NOW())';
        $this->sql($sql, [$pseudo, $pass]);
    }

    public function addUser($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (?,?,"member",NOW())';
        $this->sql($sql, [$pseudo, $pass]);
    }

    public function allAdmins()
    {
        $sql= 'SELECT id,pseudo,pass,role,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM users WHERE role = "admin" ORDER BY id';
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
        $sql= 'SELECT id,pseudo,pass,role,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM users WHERE role = "member" ORDER BY id';
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

    public function adminConnexion($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql ='SELECT * FROM users WHERE pseudo = ? AND pass = ? AND role = "admin"';
        $this->sql($sql, [$pseudo,$pass]);
    }

    public function userConnect($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql ='SELECT * FROM users WHERE pseudo = ? AND pass = ? AND role = "member"';
        $this->sql($sql, [$pseudo,$pass]);
    }

    private function buildObject(array $row)
    {
        $user = new User;
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setPass($row['pass']);
        $user->setRole($row['role']);
        $user->setCreation_date($row['creation_date_fr']);
        return $user;
    }
}