<?php 
session_start();
if (!$_SESSION['auth']) {
	$_SESSION['message'] = 'Vous devez vous connecter';
	header(('location:../index.php'));
}
 

require_once ("../spcm/inc/function.php");
require_once ("inc/function.php");
connexiondb();

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