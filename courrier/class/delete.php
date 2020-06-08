<?php session_start();
require_once ("../inc/function.php");
connexiondb();

if ($db->exec('DELETE FROM courrier where id = '.$_GET['id'].'')) {
	$message['success'] = "Suppression réussi ";
	$_SESSION['message'] = $message;
	header("location:../index.php");

}else{
	$message['danger'] = "Erreur de Suppression ";
	$_SESSION['message'] = $message;
	header("location:../index.php");
}
 ?>