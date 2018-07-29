<form method="post" action="">
<p><input type="text" name="title" placeholder="titre"></p>
<p><input type="text" name="subtitle" placeholder="sous titre"></p>
<p><input type="text" name="author" placeholder="auteur"><p>
<p><input type="text" name="content" placeholder="contenu"></p>
<p><input type="submit" name="send"></p>
<p><input type="reset" name="reset"></p>
</form>

<?php
if (isset($errorMsg))
{
  echo $errorMsg;
}
if (isset($insertOk))
{
  echo $insertOk;
}
?>