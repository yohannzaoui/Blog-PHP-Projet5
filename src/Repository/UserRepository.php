<?php

namespace App\Repository;

use Core\DBFactory;
use App\Entity\User;
use PDO;
use Exception;

class UserRepository extends DBFactory
{
    public function addAdmin($pseudo,$passhash)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "admin" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count > 0) {
            throw new Exception('Ce pseudo est déja utilisé. Veuillez en choisir un autre.');
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (?,?,"admin",NOW())';
            $req = $this->sql($sql, [$pseudo, $passhash]);
        }
    }

    public function addUser($pseudo,$passhash)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "member" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count > 0) {
            throw new Exception('Ce pseudo est déja utilisé. Veuillez en choisir un autre.');
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, role, creation_date) VALUES (?,?,"member",NOW())';
            $req = $this->sql($sql, [$pseudo, $passhash]);
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

    public function adminConnexion($pseudo, $pass)
    {
        $sql = 'SELECT pseudo, pass FROM users WHERE pseudo = ? AND role = "admin"';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count > 0) {
            $data = $req->fetch();
            if(password_verify($pass, $data['pass'])) {
                header('Location: ../index.php?route=savePost');
            } else {
            throw new Exception("Les informations fournis sont incorrects / ou l'administrateur n'éxiste pas.");
            }
        }
    }

    public function userConnect($pseudo, $pass)
    {
        $sql = 'SELECT * FROM users WHERE role = "member" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if($count > 0) {
            $data = $req->fetch();
            if(password_verify($pass, $data['pass'])) {
                echo "ok";
            } else {
            throw new Exception("Les informations fournis sont incorrects / ou le membre n'éxiste pas.");
            }
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
