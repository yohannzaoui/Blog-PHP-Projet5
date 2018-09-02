<?php

namespace Core;

use PDO;
use Exception;

abstract class DBFactory
{
    protected $db;

    private function checkDb()
    {
        if ($this->db === null) {
            return $this->getDb();
        }
        return $this->db;
    }

    private function getDb()
    {
        try
        {
            $data = require __DIR__ . '/../config/database.php';
            $this->db = new PDO($data['dsn'], $data['login'], $data['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        }

        catch (Exception $errorConnection)
        {
            die('Erreur de connection : '.$errorConnection->getMessage());
        }
    }

    public function sql($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkDb()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else {
            $result = $this->checkDb()->query($sql);
            return $result;
        }
    }

    public function lastId()
    {
        return $this->db->lastInsertId();
    }
}
