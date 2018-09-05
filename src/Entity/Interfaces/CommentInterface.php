<?php

namespace App\Entity\Interfaces;

/**
 *
 */
interface CommentInterface
{
    public function setId($id);

    public function setPostId($id_post);

    public function setPseudo($pseudo);

    public function setContent($content);

    public function setCreation_date($creation_date);

    public function setPublication($publication);

    public function getId();

    public function getPostId();

    public function getPseudo();

    public function getContent();

    public function getCreation_date();

    public function getPublication();
}
