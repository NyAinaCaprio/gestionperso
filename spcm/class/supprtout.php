<?php
	session_start();
	
	require '../inc/function.php';
	connexiondb();
	$message = array();




if ($_SESSION['auth']->username === "admin") {
	
	/*$db->exec('DELETE FROM personnelcivil where id_civil = '.$_GET['id_civil'].'  ');
	$db->exec('DELETE FROM conge_stat where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM aptitudeparticulier where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM aptitudeinfo where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM aptitudelinguistique where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM ecoleformationstage where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM avancementsuccessifs where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM affectationsuccessivecivil where id_civil = '.$_GET['id_civil'].'');
	$db->exec('DELETE FROM enfant where id_civil = '.$_GET['id_civil'].'');
	$db->exec('DELETE FROM civil where id_civil = '.$_GET['id_civil'].'');
	$db->exec('DELETE FROM etatdeservicecivil where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM conjoint_civil where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM presence where id_civil = '.$_GET['id_civil'].' ');
	$db->exec('DELETE FROM decoration_civil where id_civil = '.$_GET['id_civil'].'');
	$db->exec('DELETE FROM conge where id_civil = '.$_GET['id_civil'].' ');
*/	
	$message['success']= 'Suppression reussi avec success' ;

}else{
	$message['success']= 'Vous n\'avez pas le droit.' ;
}
	
	$_SESSION['message']= $message;
	

	header('location:../index.php?p=viewPers&id_civil='.$_GET['id_civil'].'');
