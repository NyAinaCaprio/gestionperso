<?php 
require_once('connexion.php');
require_once('idmax.php');
$datemax = $db->query("select * from titreinventaire where id_titre_inventaire = '".$_SESSION['varidmax']."'")->fetch();
$_SESSION['datemax'] = $datemax['date'];

?>