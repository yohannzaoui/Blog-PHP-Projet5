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
            throw new Exception("Le pseudo est déja utilisé. Veuillez en choisir un autre.");
        }
        $sql = 'SELECT email FROM users WHERE role = "admin" AND email = ?';
        $req = $this->sql($sql, [$email]);
        $user = $req->rowCount();
        if($user > 0) {
            throw new Exception("L'adresse email est déja utilisée. Veuillez en choisir une autre.");
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, email, token, role, creation_date) VALUES (?,?,?,?,"admin",NOW())';
            $this->sql($sql, [$pseudo, $passhash, $email, $token]);
            $userId = $this->db->lastInsertId();
        }
        return $userId;
    }

    public function addUser($pseudo,$email,$passhash,$token)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "member" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $user = $req->rowCount();
        if($user > 0) {
            throw new Exception("Le pseudo est déja utilisé. Veuillez en choisir un autre.");
        }
        $sql = 'SELECT email FROM users WHERE role = "member" AND email = ?';
        $req = $this->sql($sql, [$email]);
        $user = $req->rowCount();
        if($user > 0) {
            throw new Exception("L'adresse email est déja utilisée. Veuillez en choisir une autre.");
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, email, token, role, creation_date) VALUES (?,?,?,?,"member",NOW())';
            $this->sql($sql, [$pseudo, $passhash, $email, $token]);
            $userId = $this->db->lastInsertId();
        }
        return $userId;
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
            if(password_verify($pass, $user['pass']) && !empty($user['token']) && !empty($user['c_token']) && $user['token'] === $user['c_token']) {
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
            if(password_verify($pass, $user['pass']) && !empty($user['token']) && !empty($user['c_token']) && $user['token'] === $user['c_token']) {
                header('Location: ../index.php?route=all');
                return $user;
            } else {
            throw new Exception("Les informations fournis sont incorrects / ou le membre n'éxiste pas.");
            }
        } else {
            throw new Exception("Ce compte n'éxiste pas");
        }
    }

    public function confirme($id,$token)
    {
        $sql = 'SELECT id, token FROM users WHERE id = ? AND c_token = ?';
        $req = $this->sql($sql, [$id,$token]);
        $user = $req->rowCount();
        if($user > 0) {
            throw new Exception('Ce compte à déja été validé');
        } else {
            $sql = 'UPDATE users SET c_token=? WHERE id= ?';
            $req = $this->sql($sql, [$token,$id]);
        }
    }

    public function resetUser($token)
    {
        $sql = 'SELECT id, pseudo FROM users WHERE role = "member" AND token = ?';
        $req = $this->sql($sql, [$token]);
        $userExist = $req->rowCount();
        if ($userExist > 0) {
            $user = $req->fetch();
        } else {
            throw new Exception("Adresse Email inconnue");
        }
        return $user;
    }

    public function resetAdmin($token)
    {
        $sql = 'SELECT id, pseudo FROM users WHERE role = "admin" AND token = ?';
        $req = $this->sql($sql, [$token]);
        $userExist = $req->rowCount();
        if ($userExist > 0) {
            $user = $req->fetch();
        } else {
            throw new Exception("Adresse Email inconnue");
        }
        return $user;
    }

    public function resetUserPass($id, $passhash)
    {
        $sql = 'UPDATE users SET pass=? WHERE id= ?';
        $this->sql($sql, [$passhash, $id]);
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
