<?php 
include ("connexion.php");
$etat = "En retour";
$req = "UPDATE detail_sortie_bon SET 
etat ='".$etat."',
date_retour = '".date('Y-m-d')."' 
 where id_sortie ='".$_POST["id_sortie"]."'";
$db->exec($req);

$result = "Mise A  Jour reussi ! ";
echo json_encode($result);
?>