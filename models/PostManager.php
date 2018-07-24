<?php

class PostManager extends Manager {

    public function getPosts() {

        //$this->getBdd();
        return $this->getAll('posts', 'Post');
    }
}