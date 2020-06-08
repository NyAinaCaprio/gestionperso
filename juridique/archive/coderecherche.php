<?php
if ($_POST['choix']==1)
$req = $db->query("SELECT
  `contenu`.`id_contenu`, `contenu`.`numero`, `contenu`.`date`,
  `contenu`.`porte`, `contenu`.`observation`, `projet`.`projet`, `type`.`type`,
  `contenu`.`id_projet`, `contenu`.`id_type`, `contenu`.`date`,`contenu`.`lien` 
FROM
  `contenu` INNER JOIN
  `projet` ON `projet`.`id_projet` = `contenu`.`id_projet` INNER JOIN
  `type` ON `type`.`id_type` = `contenu`.`id_type`
WHERE
  `contenu`.`date` >=  '".$_POST['date1']."' AND
  `contenu`.`date` <= '".$_POST['date2']."' AND
  `contenu`.`id_projet` = '".$_POST['id_projet']."' AND
  `contenu`.`id_type` = '".$_POST['id_type']."' 
ORDER BY
  `contenu`.`date` DESC, `contenu`.`date` DESC");
elseif ($_POST['choix']==2) 
   $req = $db->query(" SELECT
  `contenu`.`id_contenu`, `contenu`.`numero`, `contenu`.`date`,`contenu`.`lien`,
  `contenu`.`porte`, `contenu`.`observation`, `projet`.`projet`, `type`.`type`
FROM
  `contenu` INNER JOIN
  `projet` ON `projet`.`id_projet` = `contenu`.`id_projet` INNER JOIN
  `type` ON `type`.`id_type` = `contenu`.`id_type`
WHERE
  `contenu`.`porte` LIKE '%".$_POST['titre']."%' AND
  `contenu`.`id_projet` = '".$_POST['id_projet']."' AND
  `contenu`.`id_type` = '".$_POST['id_type']."'
ORDER BY
  `contenu`.`date` DESC");
elseif ($_POST['choix']==3) 
    $req = $db->query(" SELECT
  `contenu`.`id_contenu`, `contenu`.`numero`, `contenu`.`date`,
  `contenu`.`porte`, `contenu`.`observation`, `projet`.`projet`, `type`.`type`,`contenu`.`lien`
FROM
  `contenu` INNER JOIN
  `projet` ON `projet`.`id_projet` = `contenu`.`id_projet` INNER JOIN
  `type` ON `type`.`id_type` = `contenu`.`id_type`
WHERE
  `contenu`.`numero` LIKE '%".$_POST['numero']."%' AND
  `contenu`.`id_projet` = '".$_POST['id_projet']."' AND
  `contenu`.`id_type` = '".$_POST['id_type']."'
ORDER BY
  `contenu`.`date` DESC");
elseif ($_POST['choix']==4) 
  $req = $db->query(" SELECT
  `contenu`.`id_contenu`, `contenu`.`numero`, `contenu`.`date`,
  `contenu`.`porte`, `contenu`.`observation`, `projet`.`projet`, `type`.`type`,`contenu`.`lien`
FROM
  `contenu` INNER JOIN
  `projet` ON `projet`.`id_projet` = `contenu`.`id_projet` INNER JOIN
  `type` ON `type`.`id_type` = `contenu`.`id_type`
WHERE
  `contenu`.`observation` LIKE '%".$_POST['observation']."%' AND
  `contenu`.`id_projet` = '".$_POST['id_projet']."' AND
  `contenu`.`id_type` = '".$_POST['id_type']."'
ORDER BY
  `contenu`.`date` DESC");
 
?>