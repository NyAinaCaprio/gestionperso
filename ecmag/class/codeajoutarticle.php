<?php  
require 'function.php';
connexiondb();

$requete='INSERT INTO articles SET 
bmouv= "'.$_POST['bmouv'].'",	
designation= "'.$_POST['designation'].'",
id_categorie= "'.$_POST['id_categorie'].'",
unite= "'.$_POST['unite'].'",
quantite_initiale= "'.$_POST['quantite_initiale'].'",
observation= "'.$_POST['observation'].'",
id_fournisseurs= "'.$_POST['id_fournisseurs'].'"';
$db->exec($requete);

$result ="Enregistrement reussi";
echo json_encode($result);
