<?php

class Post {

    private $_id;
    private $_author;
    private $_title;
    private $_content;
    private $_creation_date;
    private $_update_date;

    public function __construct(array $data) {

        $this->hydrate($data);
    }

    public function hydrate(array $data) {

        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exists($this , $method)) {
                $this->$method($value);
            }
        }
    }

    public function setId($id) {
        $id = (int)$id;
        if($id>0) {
            $this->_id=$id;
        }
    }

    public function setAuthor($author) {
        if(is_string($author)) {
            $this->_author = $author;
        } 
    }

    public function setTitle($title) {
        if(is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content) {
        if(is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setCreation_Date($creation_date) {
        $this->_creation_date = $creation_date;
    }

    public function setUpdate_Date($update_date) {
        $this->_update_date = $update_date;
    }

    public function id() {
        return $this->_id;
    }

    public function author() {
        return $this->_author;
    }

    public function title() {
        return $this->_title;
    }

    public function content() {
        return $this->_content;
    }

    public function creation_date() {
        return $this->_creation_date;
    }

    public function update_date() {
        return $this->_update_date;
    }
}