<?php session_start();
require '../inc/function.php';
connexiondb();
$message = array();

/*
var_dump($_POST);
die();*/
//echo getDateConge($_POST['datededepart'],$_POST['id_civil']);
 
$message = autoAbsenceIsValid($_POST);

if(!empty($message))
{
    $_SESSION['message'] = $message;
    header("location:../index.php?p=autoabsence");
}
if (isset($_POST)) {
	if (empty($message)) {
		$req = $db->prepare('INSERT INTO autoabsence SET id_civil = :id_civil,  heuredepart = :heuredepart,  heureretour = :heureretour,  motif =  :motif, date = :date, lieu = :lieu');
		$req->execute(array(
			':id_civil' => $_POST['id_civil'],
			':heuredepart' => $_POST['heuredepart'] , 
			':heureretour' => $_POST['heureretour'] , 
			':motif' =>  $_POST['motif'] , 
			':date' => $_POST['date'] , 
			':lieu' => $_POST['lieu']
			)); 
	$message['success'] = "Enregistrement réussi !";	
    $_SESSION['message'] = $message;
    header("location:../index.php?p=autoabsence");
	}
}
	 
