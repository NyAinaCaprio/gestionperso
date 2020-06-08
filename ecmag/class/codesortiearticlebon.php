<?php 
include('connexion.php');
include('codeprepareetatdestock.php');
$result="";
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`,
  `articles`.`quantite_initiale`,
  `fournisseurs`.`nomprenom`, Sum(`etat_de_stock`.`quantite_entree`),
  Sum(`etat_de_stock`.`quantite_sortie`), `articles`.`quantite_initiale` + Sum(`etat_de_stock`.`quantite_entree`)-Sum(`etat_de_stock`.`quantite_sortie`) AS `stockfinal`, `articles`.`unite`
FROM
  `etat_de_stock` INNER JOIN
  `articles` ON `articles`.`code_article` = `etat_de_stock`.`code_article`
  INNER JOIN
  `fournisseurs` ON `fournisseurs`.`id_fournisseurs` =
    `articles`.`id_fournisseurs`
GROUP BY
  `articles`.`code_article`, `articles`.`designation`,
  `articles`.`quantite_initiale`,
  `fournisseurs`.`nomprenom`, `articles`.`unite`
HAVING
  `articles`.`code_article` = '".$_POST['code_article']."'")->fetch();
  
 if($resultat["stockfinal"]<$_POST['quantite_sortie']){
 $result='STOCK INSUFFISANT !';
 }else{


$result="";
$etat = "En cours";
$requete='INSERT INTO detail_sortie_bon SET 
code_article= "'.$_POST['code_article'].'",	
date_sortie= "'.$_POST['date_sortie'].'",
quantite_sortie= "'.$_POST['quantite_sortie'].'",
typesortie= "'.$_POST['typesortie'].'",
etsouserviceoucorps= "'.$_POST['etsouserviceoucorps'].'",
nombenef= "'.$_POST['nombenef'].'",
bmouv= "'.$_POST['bmouv'].'",
observation= "'.$_POST['observation'].'",
etat= "'.$etat.'"';
$db->exec($requete);

 $result="Enregistrement avec succes !";
}
echo json_encode($result);
 ?> 				