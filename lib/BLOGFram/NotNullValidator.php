<?php
namespace BLOGFram;

class NotNullValidator extends Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}