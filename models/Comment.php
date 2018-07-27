<?php

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
    if (isset($data['id']))
    {
      $this->_id=$data['id'];
    }
    if (isset($data['id_post']))
    {
      $this->_id_post=$data['id_post'];
    }
    if (isset($data['pseudo']))
    {
      $this->_pseudo=$data['pseudo'];
    }
    if (isset($data['content']))
    {
      $this->_content=$data['content'];
    }
    if (isset($data['creation_date_fr']))
    {
      $this->_creation_date=$data['creation_date_fr'];
    }
    if (isset($data['publication']))
    {
      $this->_publication=$data['publication'];
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
