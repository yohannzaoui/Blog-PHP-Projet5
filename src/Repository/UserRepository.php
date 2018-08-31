<?php

namespace App\Repository;

use Core\DBFactory;
use App\Entity\User;
use PDO;
use Exception;

class UserRepository extends DBFactory
{
    public function addAdmin($pseudo,$passhash,$email,$token)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "admin" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $user = $req->rowCount();
        if($user > 0) {
            throw new Exception('Ce pseudo est déja utilisé. Veuillez en choisir un autre.');
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, email,token, role, creation_date) VALUES (?,?,?,?,"admin",NOW())';
            $req = $this->sql($sql, [$pseudo, $passhash, $email, $token]);
        }
    }

    public function addUser($pseudo,$email,$passhash,$token)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "member" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $user = $req->rowCount();
        if($user > 0) {
            throw new Exception('Ce pseudo est déja utilisé. Veuillez en choisir un autre.');
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, email, token, role, creation_date) VALUES (?,?,?,?,"member",NOW())';
            $req = $this->sql($sql, [$pseudo, $passhash, $email, $token]);
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
        $sql = 'DELETE FROM users WHERE id=?';
        $req=$this->sql($sql, [$id]);
    }

    public function adminConnect($pseudo, $pass)
    {
        $sql = 'SELECT * FROM users WHERE pseudo = ? AND role = "admin"';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count > 0) {
            $user = $req->fetch();
            if(password_verify($pass, $user['pass'])) {
                header('Location: ../index.php?route=savePost');
                return $user;
            } else {
            throw new Exception("Les informations fournis sont incorrects / ou l'administrateur n'éxiste pas.");
            }
        } else {
            throw new Exception("Ce compte n'éxiste pas");
        }
    }

    public function userConnect($pseudo, $pass)
    {
        $sql = 'SELECT * FROM users WHERE pseudo = ? AND role = "member"';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count > 0) {
            $user = $req->fetch();
            if(password_verify($pass, $user['pass'])) {
                header('Location: ../index.php?route=all');
                return $user;
            } else {
            throw new Exception("Les informations fournis sont incorrects / ou le membre n'éxiste pas.");
            }
        } else {
            throw new Exception("Ce compte n'éxiste pas");
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
}
