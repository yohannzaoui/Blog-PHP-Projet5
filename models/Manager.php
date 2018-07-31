<?php

abstract class Manager
{
    private  $_db;

    protected function getDb()
    {
        $this->_db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $this->_db;
    }
    
}