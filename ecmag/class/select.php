<?php
 require 'function.php';

 connexiondb();

$resultat=$db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`) AS `quantite_initiale`, 
  Sum(`etatdestock`.`quantite_entree`) AS `quantite_entree`,
  Sum(`etatdestock`.`quantite_sortie`) AS `quantite_sortie`, 
  Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - 
  Sum(`etatdestock`.`quantite_sortie`) AS `StockFinal`, 
  `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` 
INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
GROUP BY
  `etatdestock`.`reference`, `articles`.`libelleproduit`, `unite`.`unite`,
  `categorie`.`categorie`, `articles`.`id_categorie`
HAVING
  `articles`.`id_categorie` = 3
ORDER BY
  `etatdestock`.`reference` DESC");

 var_dump($resultat);
 