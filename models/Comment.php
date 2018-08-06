<?php

namespace BlogModels;

class Comment
{
  private $_id;
  private $_id_post;
  private $_pseudo;
  private $_content;
  private $_creation_date;
  private $_publication;

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
    if($id>0)
    {
      $this->_id=$id;
    }
  }

  public function setPostId($id_post)
  {
    $id_post=(int)$id_post;
    if($postId>0)
    {
      $this->_id_post=$id_post;
    }
  }

  public function setPseudo($pseudo)
  {
    if (is_string($pseudo))
    {
      $this->_pseudo=$pseudo;
    }
  }

  public function setContent($content)
  {
    if (is_string($content))
    {
      $this->_content=$content;
    }
  }

  public function setCreation_date($creation_date)
  {
    $this->_creation_date=$creation_date;
  }

  public function setPublication($publication)
  {
    if ($publication>=0 && $publication<=1)
    {
      $this->_publication=$publication;
    }
  }

  public function getId()
  {
    return $this->_id;
  }

  public function getPostId()
  {
    return $this->_id_post;
  }

  public function getPseudo()
  {
    return $this->_pseudo;
  }

  public function getContent()
  {
    return $this->_content;
  }

  public function getCreation_date()
  {
    return $this->_creation_date;
  }

  public function getPublication()
  {
    return $this->_publication;
  }

}
