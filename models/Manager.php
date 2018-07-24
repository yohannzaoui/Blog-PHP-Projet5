<?php

abstract class Manager {

    private static $_db;

    private static function setDb() {

        $host="localhost";
        $dbName="blog";
        $user="root";
        $password="";
        
        self::$_db = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8',$user,$password);
        self::$_db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
    }

    protected function getDb() {

        if(self::$_db == null) {

            self::setDb();
        }
        return self::$_db;
    }
}