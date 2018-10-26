<?php

namespace App\Entity\Interfaces;

/**
 *
 */
interface PostInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $author
     * @return mixed
     */
    public function setAuthor($author);

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title);

    /**
     * @param $subtitle
     * @return mixed
     */
    public function setSubtitle($subtitle);

    /**
     * @param $content
     * @return mixed
     */
    public function setContent($content);

    /**
     * @param $creationDateFr
     * @return mixed
     */
    public function setCreationDate($creationDateFr);

    /**
     * @param $updateDateFr
     * @return mixed
     */
    public function setUpdateDate($updateDateFr);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getAuthor();

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @return mixed
     */
    public function getSubtitle();

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @return mixed
     */
    public function getCreationDate();

    /**
     * @return mixed
     */
    public function getUpdateDate();
}
