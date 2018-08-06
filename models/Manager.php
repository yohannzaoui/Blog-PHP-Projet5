<?php

namespace BlogModels;

abstract class Manager {


    private $_db;

    protected function getDb() {
        if ($this->_db == null) {
            $this->_db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8','root', '',
                    array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
            return $this->_db;
    }
}
