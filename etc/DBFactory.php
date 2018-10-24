<?php
namespace Core;

use Core\Interfaces\DBFactoryInterface;


/**
 * Class DBFactory
 * @package Core
 */
abstract class DBFactory implements DBFactoryInterface
{

    /**
     * @var
     */
    protected $db;


    /**
     * @return \PDO
     */
    private function checkDb()
    {
        if ($this->db === null) {
            return $this->getDb();
        }
        return $this->db;
    }


    /**
     * @return \PDO
     */
    private function getDb()
    {
        try
        {
            $data = require __DIR__ .'/../config/database.php';
            $this->db = new \PDO($data['dsn'], $data['login'], $data['password']);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->db;
        }

        catch (\Exception $errorConnection)
        {
            die('Erreur de connection : '.$errorConnection->getMessage());
        }
    }


    /**
     * @param $sql
     * @param null $parameters
     * @return bool|\PDOStatement
     */
    public function sql($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkDb()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
            $result = $this->checkDb()->query($sql);
            return $result;
    }
}
