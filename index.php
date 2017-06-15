<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'vendor/autoload.php';

//
//$obj = new App\Index();
//$obj->index();die;

$obj = new Acme\Router(); 
$obj ->run();
?>
