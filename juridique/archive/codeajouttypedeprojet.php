<?php require_once('connexion.php');
$nomprojet = $_POST['projet'];
if (!file_exists("dossier/$nomprojet")) {
mkdir("dossier/$nomprojet");

}else{

}

$mareq = "INSERT INTO projet set 
	projet ='".$_POST['projet']."'";
$db->exec($mareq);
header('location:ajouttypedeprojet.php');
?>