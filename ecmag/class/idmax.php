<?php 
connexiondb();
$marequete = $db-> query("SELECT Max(`titreinventaire`.`id_titre_inventaire`)
FROM  `titreinventaire`")->fetch();
$_SESSION['varidmax'] = $marequete['Max(`titreinventaire`.`id_titre_inventaire`)'];

$marequetedate = $db->query("SELECT * from titreinventaire where id_titre_inventaire = '".$_SESSION['varidmax']."'")->fetch();
$_SESSION['date'] = $marequetedate['date'];
?>