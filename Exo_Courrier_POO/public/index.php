<?php 
session_start();
require '../app/Autoload.php';
App\Autoloader::register();

//$config = App\Config::getInstance();
//var_dump($config::get('db_user'));


$app = App\App::getInstance();

$courrier = $app->getTable("Courrier");

