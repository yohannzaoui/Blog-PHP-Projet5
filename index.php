<?php

require('model.php');

try
{
  $posts=getRecentsPosts();

  require('indexView.php');
}

catch (Exception $e)
{
  $msgError = $e->getMessage();
  require ('error.php');
}
