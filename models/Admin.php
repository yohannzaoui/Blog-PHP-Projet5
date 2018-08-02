<?php

class Admin
{
  private $_id;
  private $_pseudo;
  private $_password;
  private $_creation_date;

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

  public function setPseudo($pseudo)
  {
    if (is_string($pseudo) && strlen($pseudo)<=255)
    {
      $this->_pseudo=$pseudo;
    }
  }

  public function setPassword($password)
  {
    if (is_string($password) && strlen($password)<=255)
    {
      $this->_title=$title;
    }
  }

  public function setCreation_date($creation_date)
  {
    $this->_creation_date=$creation_date;
  }

  public function getId()
  {
    return $this->_id;
  }

  public function getPseudo()
  {
    return $this->_pseudo;
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function getCreation_date()
  {
    return $this->_creation_date;
  }
}
