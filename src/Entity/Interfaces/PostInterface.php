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

    public function setCreationDate($creationDateFr);

    public function setUpdateDate($updateDateFr);

    public function getId();

    public function getAuthor();

    public function getTitle();

    public function getSubtitle();

    public function getContent();

    public function getCreationDate();

    public function getUpdateDate();
}
