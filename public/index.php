<?php 
ini_set('display_errors',1);
include '../vendor/autoload.php';
use BigBear\System\Router;
include '../routes.php';

Router::dispatch($_SERVER);
