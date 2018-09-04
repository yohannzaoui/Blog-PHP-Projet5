<?php

require_once __DIR__."/../vendor/autoload.php";

use Core\Application;
use Core\Session;

$session = New Session;
$session->sessionStart();
$application = new Application;
$application->boot();
