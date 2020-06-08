<?php require_once('connexion.php');
$mareq = "INSERT INTO type set 
	type ='".$_POST['type']."'";
$db->exec($mareq);
header('location:ajouttype.php');
?>