<?php

$requ = $db->query("SELECT stockphysique from inventaire 
                  where reference = '".$_POST['reference']."' 
                  AND id_titreinventaire = '".getIdMax()."'")->fetch();


$requete = $db->query("SELECT
  `unite`.`id_unite`, `articles`.`reference`, `articles`.`libelleproduit`,
  `articles`.`description`, `categorie`.`categorie`, `unite`.`unite`
FROM
  `articles` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite`
WHERE
  `articles`.`reference` = '".$_POST['reference']."'")->fetch();
 
$requetefich =$db->query("SELECT
  `fichedestock`.`reference`, `fichedestock`.`date`,
  `fichedestock`.`numerodelapj`, `fichedestock`.`provenanceoudestination`,
  `fichedestock`.`BLouBMS`, `fichedestock`.`dues`,
  `fichedestock`.`quantiteentree`, `fichedestock`.`quantitesortie`
FROM
  `fichedestock`
WHERE
  `fichedestock`.`reference` = '".$_POST['reference']."'");



           $reqsumentre = $db->query("SELECT
  `detail_mouvement`.`reference`, Sum(`detail_mouvement`.`quantite`)
FROM
  `mouvement` INNER JOIN
  `detail_mouvement` ON `mouvement`.`id_mouvement` =
    `detail_mouvement`.`id_mouvement`
WHERE
  `mouvement`.`type` = 1 AND
  `mouvement`.`date` >  '".getDateMax()."' AND
  `detail_mouvement`.`reference` = '".$_POST['reference']."'")->fetch(); 

            $reqsumsortie = $db->query("SELECT
  `detail_mouvement`.`reference`, Sum(`detail_mouvement`.`quantite`)
FROM
  `mouvement` INNER JOIN
  `detail_mouvement` ON `mouvement`.`id_mouvement` =
    `detail_mouvement`.`id_mouvement`
WHERE
  `mouvement`.`type` = 2 AND
  `mouvement`.`date` >  '".getDateMax()."' AND
  `detail_mouvement`.`reference` = '".$_POST['reference']."'")->fetch(); 

  
            $stockfinal =  ($requ ["stockphysique"] + $reqsumentre['Sum(`detail_mouvement`.`quantite`)']) - $reqsumsortie['Sum(`detail_mouvement`.`quantite`)'] ;                 
    

?>