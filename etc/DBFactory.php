<?php

namespace Core;


abstract class DBFactory
{
    private static $db;

    protected static function getDb()
    {
        if (self::$db === null) {
            
            self::$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        }
        return self::$db;
    }

}
