<?php

$title="Yohann Zaoui - Le Blog";
ob_start();

require('about.php');

require('recentPost.php');

require('contactForm.php');

$content=ob_get_clean();
require('template.php');

?>
