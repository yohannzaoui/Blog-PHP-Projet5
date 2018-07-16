<?php
  $title="Yohann Zaoui - Le Blog";
  ob_start();
?>

<?php
require('about.php');
require('recentsPosts.php');
require('contact.php');
?>


<?php
  $content=ob_get_clean();
  require('template.php');
?>
