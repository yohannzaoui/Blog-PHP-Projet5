<?php

session_start();

require_once 'vendor/autoload.php';

use Core\Application;
use Core\Request;

$request = new Request();
$application = new Application();
$application->boot($request);
