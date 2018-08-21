<?php

namespace App\entity;

class Post
{
  private $id;
  private $author;
  private $title;
  private $subtitle;
  private $content;
  private $creation_date_fr;
  private $update_date_fr;


  public function setId($id)
  {
    $id=(int)$id;
    if ($id>0){
      $this->id=$id;
    }
  }

  public function setAuthor($author)
  {
    if (is_string($author) && strlen($author)<=255) {
      $this->author=$author;
    }
  }

  public function setTitle($title)
  {
    if (is_string($title) && strlen($title)<=255) {
      $this->title=$title;
    }
  }

  public function setSubtitle($subtitle)
  {
    if (is_string($subtitle) && strlen($subtitle)<=255) {
      $this->subtitle=$subtitle;
    }
  }

  public function setContent($content)
  {
    if (is_string($content) && strlen($content)<=10000) {
      $this->content=$content;
    }
  }

  public function setCreation_date($creation_date_fr)
  {
    $this->creation_date_fr=$creation_date_fr;
  }

  public function setUpdate_date($update_date_fr)
  {
    $this->update_date_fr=$update_date_fr;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getSubtitle()
  {
    return $this->subtitle;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function getCreation_date()
  {
    return $this->creation_date_fr;
  }

  public function getUpdate_date()
  {
    return $this->update_date_fr;
  }
}