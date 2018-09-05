<?php

namespace App\Entity;

use App\Entity\Interfaces\CommentInterface;

/**
 *
 */
class Comment implements CommentInterface
{

    private $id;
    private $id_post;
    private $pseudo;
    private $content;
    private $creationDateFr;
    private $publication;

    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setPostId($id_post)
    {
        $id_post = (int)$id_post;
        if ($id_post > 0) {
            $this->id_post = $id_post;
        }
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDateFr = $creationDate;
    }

    public function setPublication($publication)
    {
        if ($publication >= 0 && $publication <= 1) {
            $this->publication = $publication;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->id_post;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreationDate()
    {
        return $this->creationDateFr;
    }

    public function getPublication()
    {
        return $this->publication;
    }
}
