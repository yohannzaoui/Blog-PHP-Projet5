<?php

function getRecentsPosts()
{
  $db=getDb();
  $posts = $db->query('SELECT id,author,title,subtitle,DATE_FORMAT(creation_date,"%d/%m/%Y à %Hh%imin") AS creation_date_fr,DATE_FORMAT(update_date,"%d/%m/%Y à %Hh%imin") AS update_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,3');
  return $posts;
}


function getDb()
{
  $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $db;
}
