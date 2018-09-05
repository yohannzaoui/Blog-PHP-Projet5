<?php

namespace App\Entity\Interfaces;

/**
 *
 */
interface PostInterface
{
    public function setId($id);

    public function setAuthor($author);

    public function setTitle($title);

    public function setSubtitle($subtitle);

    public function setContent($content);

    public function setCreation_date($creation_date_fr);

    public function setUpdate_date($update_date_fr);

    public function getId();

    public function getAuthor();

    public function getTitle();

    public function getSubtitle();

    public function getContent();

    public function getCreation_date();

    public function getUpdate_date();
}
