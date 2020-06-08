<?php 
session_start();
$message = array();
require 'inc/function.php';
connexiondb();

if (!$_SESSION['auth']) {
	$message['danger'] = 'Vous devez vous connecter';
	$_SESSION['message'] = $message;
	header(('location:../index.php'));
}

if (isset($_GET['p'])) {
	$p = $_GET['p'];
}else{
	$p='home';
}


ob_start();

 
require 'inc/include.php'; 

$contenu = ob_get_clean();
require "public/template/template.php";

 ?>