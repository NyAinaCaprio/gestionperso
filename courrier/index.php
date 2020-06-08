<?php 
session_start();
 
if (!$_SESSION['auth']) {
	$message['danger'] = 'Vous devez vous connecter';
	$_SESSION['message'] = $message;
	header(('location:../index.php'));
}
 
require_once ("inc/function.php");
connexiondb();

if (isset($_GET['p'])) {
	$p = $_GET['p'];
}else{
	$p='liste';
}


ob_start();

require 'inc/include.php';




$contenu = ob_get_clean();
require "public/template/template.php";

?>