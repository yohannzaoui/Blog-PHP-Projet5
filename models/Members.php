<?php

 class Members
 {
   private $_id;
   private $_pseudo;
   private $_password;
   private $_email;
   private $_creation_date;
   private $_confirmekey;
   private $_confirme;

   public function setId($id)
   {
     $id=(int)$id;
     if ($id>=1)
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

   }

   public function setEmail($email)
   {
     if (preg_match('~^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$~',$email) && filter_var($email, FILTER_VALIDATE_EMAIL))
     {
       $this->_email=$email;
     }
   }

   public function setCreation_date($creation_date)
   {
     $this->_creation_date=$creation_date;
   }

   public function setConfirmeKey($confirmekey)
   {
     $confirmekey=(int)$confirmekey;
     $this->_confirmekey=$confirmekey;
   }

   public function setConfirme($confirme)
   {
     $confirme=(int)$confirme;
     $this->_confirme=$confirme;
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

   public function getEmail()
   {
     return $this->_email;
   }

   public function getCreation_date()
   {
     return $this->_creation_date;
   }

   public function getConfirmeKey()
   {
     return $this->_confirmekey;
   }

   public function getConfirme()
   {
     return $this->_confirme;
   }
 }
