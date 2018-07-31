<?php

require_once('views/View.php');


class ControllerPost {

    private $_postManager;
    private $_view;

    public function __construct($url) {

        if(isset($url) && count($url) > 3) {

            throw new Exception('Page introuvable');
        }
        else {

            $this->Post();
        }
    }

    private function Post() {
        if(isset($_GET['id']) && $_GET['id']>0) {
            $id = (int)$_GET['id'];
            $this->_postManager = new PostManager;
        $post = $this->_postManager->getPost($_GET['id']);
        $this->_view = new View('Post');
        $this->_view->generate(array('post'=>$post));
        }
        
    }
}