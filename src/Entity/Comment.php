<?php

namespace App\Entity;

use App\Entity\Interfaces\CommentInterface;


/**
 * Class Comment
 * @package App\Entity
 */
class Comment implements CommentInterface
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $id_post;
    /**
     * @var
     */
    private $pseudo;
    /**
     * @var
     */
    private $content;
    /**
     * @var
     */
    private $creationDateFr;
    /**
     * @var
     */
    private $publication;


    /**
     * @param $id
     * @return mixed|void
     */
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }


    /**
     * @param $id_post
     * @return mixed|void
     */
    public function setPostId($id_post)
    {
        $id_post = (int)$id_post;
        if ($id_post > 0) {
            $this->id_post = $id_post;
        }
    }


    /**
     * @param $pseudo
     * @return mixed|void
     */
    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }


    /**
     * @param $content
     * @return mixed|void
     */
    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }


    /**
     * @param $creationDate
     * @return mixed|void
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDateFr = $creationDate;
    }


    /**
     * @param $publication
     * @return mixed|void
     */
    public function setPublication($publication)
    {
        if ($publication >= 0 && $publication <= 1) {
            $this->publication = $publication;
        }
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->id_post;
    }


    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }


    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDateFr;
    }


    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }
}
