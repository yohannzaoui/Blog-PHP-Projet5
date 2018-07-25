<?php

require_once('views/View.php');

class ControllerListPost {

    private $_postManager;
    private $_view;

    public function __construct($url) {

        if(isset($url) && count($url)>1) {
            throw new Exception('Page introuvable');
        }
        else {
            $this->posts();
        }
    }

    private function posts() {

        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getListPost();
        $this->_view = new View('ListPost');
        $this->_view->generate(array('posts'=>$posts));
    }
}