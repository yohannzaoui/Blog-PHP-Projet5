<?php

namespace App\Entity;

use App\Entity\Interfaces\PostInterface;


/**
 * Class Post
 * @package App\Entity
 */
class Post implements PostInterface
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $author;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $subtitle;
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
    private $updateDateFr;


    /**
     * @param $id
     * @return mixed|void
     */
    public function setId($id)
    {
        $id = (int)$id;
        if ($id>0) {
            $this->id = $id;
        }
    }


    /**
     * @param $author
     * @return mixed|void
     */
    public function setAuthor($author)
    {
        if (is_string($author) && strlen($author) <= 255) {
            $this->author = $author;
        }
    }


    /**
     * @param $title
     * @return mixed|void
     */
    public function setTitle($title)
    {
        if (is_string($title) && strlen($title) <= 255) {
              $this->title = $title;
        }
    }


    /**
     * @param $subtitle
     * @return mixed|void
     */
    public function setSubtitle($subtitle)
    {
        if (is_string($subtitle) && strlen($subtitle) <= 255) {
            $this->subtitle = $subtitle;
        }
    }


    /**
     * @param $content
     * @return mixed|void
     */
    public function setContent($content)
    {
        if (is_string($content) && strlen($content) <= 10000) {
            $this->content = $content;
        }
    }


    /**
     * @param $creationDateFr
     * @return mixed|void
     */
    public function setCreationDate($creationDateFr)
    {
        $this->creationDateFr = $creationDateFr;
    }


    /**
     * @param $updateDateFr
     * @return mixed|void
     */
    public function setUpdateDate($updateDateFr)
    {
        $this->updateDateFr = $updateDateFr;
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
    public function getAuthor()
    {
        return $this->author;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
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
    public function getUpdateDate()
    {
        return $this->updateDateFr;
    }
}
