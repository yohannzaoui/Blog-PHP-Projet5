<?php

require_once('views/View.php');

class ControllerPost {

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
        if(isset($_GET['id']) and $_GET['id']>=0) {

        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getPost($_GET['id']);
        $this->_view = new View('Post');
        $this->_view->generate(array('posts'=>$posts));
        }
        else {
            throw new Exception('identifiant d\'article introuvable');
        }
        
    }
}