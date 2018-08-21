<?php

namespace Core;

use PDO;

abstract class DBFactory
{
    private $connection;

    private function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    private function getConnection()
    {
        try
        {
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            $this->connection = new PDO($dsn, $login, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }

        catch (\Exception $errorConnection)
        {
            die('Erreur de connection : '.$errorConnection->getMessage());
        }

    }

    public function sql($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else {
            $result = $this->checkConnection()->query($sql);
            return $result;
        }
    }
}