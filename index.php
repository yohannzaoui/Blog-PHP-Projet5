<?php
function loadClasses($class)
{
  require 'models/'.$class.'.php';
}

spl_autoload_register('loadClasses');

$dbmanager= new Manager;
$db=$dbmanager->dbConnect();
$manager= new PostManager($db);
$posts=$manager->recentPost();
require('indexView.php');
