<?php

require_once 'views/View.php';


class ControllerHome {

    private $_postManager;
    private $_view;

    public function __construct($url) {

        if(isset($url) && count($url) > 1) {

            throw new Exception('Page introuvable');
        }
        else {

            $this->RecentPosts();
        }
    }

    private function RecentPosts() {

        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getRecentPosts();
        $this->_view = new View('Home');
        $this->_view->generate(array('posts'=>$posts));
    }
}