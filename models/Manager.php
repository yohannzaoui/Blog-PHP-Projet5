<?php

abstract class Manager {

    private static $_db;

    private static function setDb() {
        
        self::$_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
        self::$_db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
    }

    protected function getDb() {

        if(self::$_db == null) {

            self::setDb();
        }
        return self::$_db;
    }

    protected function getAll($table , $obj) {

        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM ' .$table. ' ORDER BY id DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}