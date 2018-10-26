<?php

namespace App\Entity\Interfaces;


/**
 * Interface CommentInterface
 * @package App\Entity\Interfaces
 */
interface CommentInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $id_post
     * @return mixed
     */
    public function setPostId($id_post);

    /**
     * @param $pseudo
     * @return mixed
     */
    public function setPseudo($pseudo);

    /**
     * @param $content
     * @return mixed
     */
    public function setContent($content);

    /**
     * @param $creationDate
     * @return mixed
     */
    public function setCreationDate($creationDate);

    /**
     * @param $publication
     * @return mixed
     */
    public function setPublication($publication);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getPostId();

    /**
     * @return mixed
     */
    public function getPseudo();

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
    public function getPublication();
}
