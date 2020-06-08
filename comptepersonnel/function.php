<?php

require_once ("../Personnel/function.php");

function getMessageRecu($id_civil)
{
    global $db;

    $req = $db->query("SELECT
  `messageremarque`.`id_messageremarque`, `messageremarque`.`expediteur`,
  `messageremarque`.`destinataire`, `messageremarque`.`etsouservice`,
  `messageremarque`.`categorie`, `messageremarque`.`nomprenom`,
  `messageremarque`.`remarque`, `messageremarque`.`date`,`messageremarque`.`heure`,
  `messageremarque`.`reponse`
FROM
  `messageremarque`
WHERE
  `messageremarque`.`destinataire` = '".$id_civil."'
ORDER BY
  `messageremarque`.`date` DESC");

    return $req;
}
