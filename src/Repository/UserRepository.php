<?php

namespace App\Repository;

use App\Repository\Interfaces\UserRepositoryInterface;
use Core\DBFactory;
use App\Entity\User;


/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository extends DBFactory implements UserRepositoryInterface
{


    /**
     * @param $pseudo
     * @param $passhash
     * @param $email
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public function addAdmin($pseudo, $passhash, $email, $token)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "admin" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $user = $req->rowCount();
        if ($user > 0) {
            throw new \Exception("Le pseudo est déja utilisé. Veuillez en choisir un autre.");
        }
        $sql = 'SELECT email FROM users WHERE role = "admin" AND email = ?';
        $req = $this->sql($sql, [$email]);
        $user = $req->rowCount();
        if ($user > 0) {
            throw new \Exception("L'adresse email est déja utilisée. Veuillez en choisir une autre.");
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, email, token, role, creation_date) VALUES (?,?,?,?,"admin",NOW())';
            $this->sql($sql, [$pseudo, $passhash, $email, $token]);
            $userId = $this->db->lastInsertId();
        }
        return $userId;
    }


    /**
     * @param $pseudo
     * @param $email
     * @param $passhash
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public function addUser($pseudo, $email, $passhash, $token)
    {
        $sql = 'SELECT pseudo FROM users WHERE role = "member" AND pseudo = ?';
        $req = $this->sql($sql, [$pseudo]);
        $user = $req->rowCount();
        if ($user > 0) {
            throw new \Exception("Le pseudo est déja utilisé. Veuillez en choisir un autre.");
        }
        $sql = 'SELECT email FROM users WHERE role = "member" AND email = ?';
        $req = $this->sql($sql, [$email]);
        $user = $req->rowCount();
        if ($user > 0) {
            throw new \Exception("L'adresse email est déja utilisée. Veuillez en choisir une autre.");
        } else {
            $sql = 'INSERT INTO users (pseudo, pass, email, token, role, creation_date) VALUES (?,?,?,?,"member",NOW())';
            $this->sql($sql, [$pseudo, $passhash, $email, $token]);
            $userId = $this->db->lastInsertId();
        }
        return $userId;
    }


    /**
     * @return array
     */
    public function allAdmins()
    {
        $sql = 'SELECT id, pseudo, pass, role, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr FROM users WHERE role = "admin" ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::CLASS);
        $users = $req->fetchAll();
        return $users;
    }


    /**
     * @return array
     */
    public function allUsers()
    {
        $sql = 'SELECT id, pseudo, pass, role, DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creationDateFr FROM users WHERE role = "member" ORDER BY creation_date DESC';
        $req = $this->sql($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::CLASS);
        $users = $req->fetchAll();
        return $users;
    }


    /**
     * @param $id
     * @throws \Exception
     */
    public function deleteUser($id)
    {
        $sql = 'SELECT id FROM users WHERE id = ?';
        $req = $this->sql($sql, [$id]);
        $count = $req->rowCount();
        if ($count > 0) {
            $sql = 'DELETE FROM users WHERE id = ?';
            $this->sql($sql, [$id]);  
        } else {
            throw new \Exception('L\'ID n\'éxiste pas ');
        }
        
    }


    /**
     * @param $pseudo
     * @param $pass
     * @return mixed
     * @throws \Exception
     */
    public function adminConnect($pseudo, $pass)
    {
        $sql = 'SELECT * FROM users WHERE pseudo = ? AND role = "admin"';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if ($count > 0) {
            $user = $req->fetch();
            if (password_verify($pass, $user['pass']) && !empty($user['token']) && !empty($user['c_token']) && $user['token'] === $user['c_token']) {
                return $user;
            } else {
                throw new \Exception("Les informations fournis sont incorrects / ou l'administrateur n'éxiste pas.");
            }
        } else {
            throw new \Exception("Ce compte n'éxiste pas");
        }
    }


    /**
     * @param $pseudo
     * @param $pass
     * @return mixed
     * @throws \Exception
     */
    public function userConnect($pseudo, $pass)
    {
        $sql = 'SELECT * FROM users WHERE pseudo = ? AND role = "member"';
        $req = $this->sql($sql, [$pseudo]);
        $count = $req->rowCount();
        if ($count > 0) {
            $user = $req->fetch();
            if (password_verify($pass, $user['pass']) && !empty($user['token']) && !empty($user['c_token']) && $user['token'] === $user['c_token']) {
                header('Location: ../index.php?route=all');
                return $user;
            } else {
                throw new \Exception("Les informations fournis sont incorrects / ou le membre n'éxiste pas.");
            }
        } else {
            throw new \Exception("Ce compte n'éxiste pas");
        }
    }


    /**
     * @param $id
     * @param $token
     * @throws \Exception
     */
    public function confirme($id, $token)
    {
        $sql = 'SELECT id, token FROM users WHERE id = ? AND c_token = ?';
        $req = $this->sql($sql, [$id, $token]);
        $user = $req->rowCount();
        if ($user > 0) {
            throw new \Exception('Ce compte à déja été validé');
        } else {
            $sql = 'UPDATE users SET c_token = ? WHERE id = ?';
            $this->sql($sql, [$token, $id]);
        }
    }


    /**
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public function resetUser($token)
    {
        $sql = 'SELECT id, pseudo FROM users WHERE role = "member" AND token = ?';
        $req = $this->sql($sql, [$token]);
        $userExist = $req->rowCount();
        if ($userExist > 0) {
            $user = $req->fetch();
        } else {
            throw new \Exception("Adresse Email inconnue");
        }
        return $user;
    }


    /**
     * @param $token
     * @return mixed
     * @throws \Exception
     */
    public function resetAdmin($token)
    {
        $sql = 'SELECT id, pseudo FROM users WHERE role = "admin" AND token = ?';
        $req = $this->sql($sql, [$token]);
        $userExist = $req->rowCount();
        if ($userExist > 0) {
            $user = $req->fetch();
        } else {
            throw new \Exception("Adresse Email inconnue");
        }
        return $user;
    }


    /**
     * @param $id
     * @param $passhash
     * @throws \Exception
     */
    public function resetUserPass($id, $passhash)
    {
        $sql = 'SELECT id FROM users WHERE id = ?';
        $req = $this->sql($sql, [$id]);
        $count = $req->rowCount();
        if ($count > 0) {
            $sql = 'UPDATE users SET pass = ? WHERE id = ?';
            $this->sql($sql, [$passhash, $id]);
        } else {
            throw new \Exception("ID du membre inconnu");
        }
        
    }


    /**
     * @return mixed
     */
    public function countAdmins()
    {
        $sql= 'SELECT COUNT(*) as nb FROM users WHERE role = "admin"';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }


    /**
     * @return mixed
     */
    public function countMembers()
    {
        $sql = 'SELECT COUNT(*) as nb FROM users WHERE role = "member"';
        $line = $this->sql($sql)->fetch();
        return $line['nb'];
    }

}
