<?php

require_once('views/View.php');


class ControllerPost {

    private $_postManager;
    private $_commentManager;
    private $_view;

    public function __construct($url) {

        if(isset($url) && count($url) > 1) {

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
            $post = $this->_postManager->getPost($id);
            $this->_commentManager = new CommentManager;
            $comments = $this->_commentManager->valideComment($id);
            $this->_view = new View('Post');
            $this->_view->generate(array('post'=>$post,'comments'=>$comments));
        }
        
    }
}