<?php

namespace App\Repository;

use Core\DBFactory;
use App\Entity\User;
use PDO;

class UserRepository extends DBFactory
{
    public function addAdmin($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (:pseudo,:pass,"admin",NOW())';
        $req=$this->sql($sql, ['pseudo'=>$pseudo, 'pass'=>$pass]);
    }

    /*public function addUser($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (?,?,"member",NOW())';
        $req=$this->sql($sql, [$pseudo, $pass]);
    }*/

    public function addUser($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql = 'SELECT pseudo FROM users WHERE role = "member" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count == 1) {
            throw new \Exception('Pseudo existe');
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (?,?,"member",NOW())';
            $req = $this->sql($sql, [$pseudo, $pass]);
        }
    }

    public function allAdmins()
    {
        $sql = 'SELECT id,pseudo,pass,role,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM users WHERE role = "admin" ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::CLASS);
        $users = $req->fetchAll();
        return $users;
    }

    public function allUsers()
    {
        $sql = 'SELECT id,pseudo,pass,role,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr FROM users WHERE role = "member" ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::CLASS);
        $users = $req->fetchAll();
        return $users;
    }

    public function deleteUser($id)
    {
        $sql = 'DELETE FROM users WHERE id=:id';
        $req=$this->sql($sql, ['id'=>$id]);
    }

    public function adminConnexion($user,$passhash)
    {
        extract($user);
        $pass = $passhash;
        $sql = 'SELECT * FROM users WHERE pseudo = ? AND pass = ? AND role = "admin"';
        $req = $this->sql($sql, [$pseudo,$pass]);
        $userexist = $req->rowCount();
        if($userexist == 1) {

            $userinfo = $req->fetch();
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['role'] = $userinfo['role'];
        }
        else {
            throw new \Exception('Identifiant incorrect');
        }
    }

    public function userConnect()
    {
        extract($user);
        $sql = 'SELECT * FROM users WHERE pseudo =? AND pass=?';
        $req = $this->sql($sql, [$pseudo,$pass]);
        if($req->rowCount() == 1){
            $data = $req->fetch();
            if(password_verify($pass,$data['pass'])) {
                echo "ok";
            }
        } else {

        }
    }

    public function countAdmins()
    {
        $sql= 'SELECT COUNT(*) as nb FROM users WHERE role = "admin"';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }

    public function countMembers()
    {
        $sql = 'SELECT COUNT(*) as nb FROM users WHERE role = "member"';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }

    private function buildObject($row)
    {
        $comment = new User;
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setPass($row['pass']);
        $comment->setRole($row['role']);
        $comment->setCreation_date($row['creation_date_fr']);
        return $user;
    }
}
