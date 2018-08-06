<?php

namespace BlogModels;

class Post
{
  private $_id;
  private $_author;
  private $_title;
  private $_subtitle;
  private $_content;
  private $_creation_date;
  private $_update_date;

  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);

      if (method_exists($this,$method)) {
        $this->$method($value);
      }
    }
  }

  public function setId($id)
  {
    $id=(int)$id;
    if ($id>0)
    {
      $this->_id=$id;
    }
  }

  public function setAuthor($author)
  {
    if (is_string($author) && strlen($author)<=255)
    {
      $this->_author=$author;
    }
  }

  public function setTitle($title)
  {
    if (is_string($title) && strlen($title)<=255)
    {
      $this->_title=$title;
    }
  }

  public function setSubtitle($subtitle)
  {
    if (is_string($subtitle) && strlen($subtitle)<=255)
    {
      $this->_subtitle=$subtitle;
    }
  }

  public function setContent($content)
  {
    if (is_string($content) && strlen($content)<=10000)
    {
      $this->_content=$content;
    }
  }

  public function setCreation_date($creation_date)
  {
    $this->_creation_date=$creation_date;
  }

  public function setUpdate_date($update_date)
  {
    $this->_update_date=$update_date;
  }

  public function getId()
  {
    return $this->_id;
  }

  public function getAuthor()
  {
    return $this->_author;
  }

  public function getTitle()
  {
    return $this->_title;
  }

  public function getSubtitle()
  {
    return $this->_subtitle;
  }

  public function getContent()
  {
    return $this->_content;
  }

  public function getCreation_date()
  {
    return $this->_creation_date;
  }

  public function getUpdate_date()
  {
    return $this->_update_date;
  }
}
