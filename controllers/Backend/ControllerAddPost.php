<?php

require 'Models/PostManager.php';
require 'system/viewBackend.php';


class ControllerAddPost {

    private $_ctrlAddPost;

    public function Add(){

        if (isset($_POST['send'],$_POST['title'],$_POST['subtitle'],$_POST['author'],$_POST['content'])) {

            if (!empty($_POST['title'])&&!empty($_POST['subtitle'])&&!empty($_POST['author'])&&!empty($_POST['content'])) {
                
                $post = new Post(['title'=>$_POST['title'],'subtitle'=>$_POST['subtitle'],'author'=>$_POST['content']]);
                $this->_ctrlAddpost->addPost($post);
                $view = new ViewBackend("Addpost");
                $insertOk="Article ajouté";
        }
        else {
                $errorMsg="Les champs sont vides";
            }
        }

    }
    
}