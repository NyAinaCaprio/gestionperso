<?php
 connexiondb();

  $db->query("DELETE FROM  fichedestock");


 $entreetransentr= $db->query("SELECT
  `articles`.`reference`, `mouvement`.`date`, `mouvement`.`BLouBMS`, `mouvement`.`numerodelapj`, 
  `mouvement`.`numerodelapj`, `detail_mouvement`.`quantite`,
  `mouvement`.`id_mouvement`, `mouvement`.`type` FROM
  `articles` INNER JOIN
  `detail_mouvement` ON `articles`.`reference` = `detail_mouvement`.`reference`
  INNER JOIN
  `mouvement` ON `mouvement`.`id_mouvement` = `detail_mouvement`.`id_mouvement`
  WHERE
  `mouvement`.`date` > '".getDateMax()."' AND
  `mouvement`.`type` = 1");
   
foreach($entreetransentr as $donneentretransent)  
{
  $requetetransentr="INSERT INTO fichedestock SET 
  reference  = '".$donneentretransent['reference']."',
  date  =  '".$donneentretransent['date']."',
  numerodelapj = '".$donneentretransent['numerodelapj']."',
  BLouBMS = '".$donneentretransent['BLouBMS']."',
  quantiteentree  =  '".$donneentretransent['quantite']."'";
  $db->exec($requetetransentr);

}



$dataqtesort= $db->query("SELECT
  `articles`.`reference`, `mouvement`.`date`, `mouvement`.`BLouBMS`, `mouvement`.`numerodelapj`, 
  `mouvement`.`numerodelapj`, `detail_mouvement`.`quantite`,
  `mouvement`.`id_mouvement`, `mouvement`.`type` FROM
  `articles` INNER JOIN
  `detail_mouvement` ON `articles`.`reference` = `detail_mouvement`.`reference`
  INNER JOIN
  `mouvement` ON `mouvement`.`id_mouvement` = `detail_mouvement`.`id_mouvement`
  WHERE
  `mouvement`.`date` > '".getDateMax()."' AND
  `mouvement`.`type` = 2");

foreach($dataqtesort as $donneesort)  
{
  
  $requetesort ="INSERT INTO fichedestock SET 
  reference  = '".$donneesort['reference']."',
  date  =  '".$donneesort['date']."',
  numerodelapj = '".$donneesort['numerodelapj']."',
  BLouBMS = '".$donneesort['BLouBMS']."',
  quantitesortie  =  '".$donneesort['quantite']."'";
  $db->exec($requetesort);
}
?>