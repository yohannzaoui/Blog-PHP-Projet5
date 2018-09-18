<?php
namespace App\Entity;

use App\Entity\Interfaces\PostInterface;

/**
 *
 */
class Post implements PostInterface
{

    private $id;
    private $author;
    private $title;
    private $subtitle;
    private $content;
    private $creationDateFr;
    private $updateDateFr;

    public function setId($id)
    {
        $id = (int)$id;
        if ($id>0) {
            $this->id = $id;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author) && strlen($author) <= 255) {
            $this->author = $author;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title) && strlen($title) <= 255) {
              $this->title = $title;
        }
    }

    public function setSubtitle($subtitle)
    {
        if (is_string($subtitle) && strlen($subtitle) <= 255) {
            $this->subtitle = $subtitle;
        }
    }

    public function setContent($content)
    {
        if (is_string($content) && strlen($content) <= 10000) {
            $this->content = $content;
        }
    }

    public function setCreationDate($creationDateFr)
    {
        $this->creationDateFr = $creationDateFr;
    }

    public function setUpdateDate($updateDateFr)
    {
        $this->updateDateFr = $updateDateFr;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDateFr;
    }

    /**
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->updateDateFr;
    }
}
