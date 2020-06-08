<?php
include ('connexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>

</head>

<body >
<form action="export.php" name="listingsortiedetail" class="listingsortiedetail" id="listingsortiedetail">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                            
                            <th >Désignation</th>
                            <th >Unité</th>
                            <th >Quantité Initiale</th>
                            <th >Date sortie</th>
                            <th >Quantité Sortie</th>
                            <th >Type</th>
                            <th >BM N°</th>
                            <th >Bénéficiaire</th>
                            <th >Catégorie</th>
                            <th >&nbsp;</th>
                            <th >&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 

$choix= $_POST['choix'];
$typesortie =  $_POST['typesortie'];
$id_categorie = $_POST['id_categorie'];
$id_etsouservice=  $_POST['id_etsouservice'];
$code_article = $_POST['code_article'];

$var = $typesortie.$choix;
if($var =="11"){
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `detail_sortie`.`date_sortie`,
  `detail_sortie`.`quantite_sortie`, `detail_sortie`.`typesortie`,
  `detail_sortie`.`bmouv`, `etsouservice`.`etsouservice`,
  `categorie`.`categorie`, `detail_sortie`.`etsouserviceoucorps`,
  `articles`.`id_categorie`
FROM
  `articles` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `detail_sortie` ON `detail_sortie`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie`.`etsouserviceoucorps`");
}
else if($var =="12"){
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `detail_sortie`.`date_sortie`,
  `detail_sortie`.`quantite_sortie`, `detail_sortie`.`typesortie`,
  `detail_sortie`.`bmouv`, `etsouservice`.`etsouservice`,
  `categorie`.`categorie`, `detail_sortie`.`etsouserviceoucorps`,
  `articles`.`id_categorie`
FROM
  `articles` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `detail_sortie` ON `detail_sortie`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie`.`etsouserviceoucorps`
WHERE
  `articles`.`code_article` = '".$code_article."'");
}
else if($var =="13"){
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `detail_sortie`.`date_sortie`,
  `detail_sortie`.`quantite_sortie`, `detail_sortie`.`typesortie`,
  `detail_sortie`.`bmouv`, `etsouservice`.`etsouservice`,
  `categorie`.`categorie`, `detail_sortie`.`etsouserviceoucorps`,
  `articles`.`id_categorie`
FROM
  `articles` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `detail_sortie` ON `detail_sortie`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie`.`etsouserviceoucorps`
WHERE
  `detail_sortie`.`etsouserviceoucorps` = '".$id_etsouservice."'");
}
else if($var =="14"){
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `detail_sortie`.`date_sortie`,
  `detail_sortie`.`quantite_sortie`, `detail_sortie`.`typesortie`,
  `detail_sortie`.`bmouv`, `etsouservice`.`etsouservice`,
  `categorie`.`categorie`, `detail_sortie`.`etsouserviceoucorps`,
  `articles`.`id_categorie`
FROM
  `articles` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `detail_sortie` ON `detail_sortie`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie`.`etsouserviceoucorps`
WHERE
  `articles`.`id_categorie` = '".$id_categorie."'");
}

else if($var =="21"){
$resultat=$db->query("SELECT
  `detail_sortie_bon`.`date_sortie`, `detail_sortie_bon`.`quantite_sortie`,
  `detail_sortie_bon`.`etsouserviceoucorps`, `detail_sortie_bon`.`typesortie`,
  `etsouservice`.`etsouservice`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `categorie`.`categorie`,
  `articles`.`id_categorie`, `detail_sortie_bon`.`bmouv`
FROM
  `detail_sortie_bon` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie_bon`.`etsouserviceoucorps` INNER JOIN
  `articles` ON `articles`.`code_article` = `detail_sortie_bon`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`");
}

else if($var =="22"){
$resultat=$db->query("SELECT
  `detail_sortie_bon`.`date_sortie`, `detail_sortie_bon`.`quantite_sortie`,
  `detail_sortie_bon`.`etsouserviceoucorps`, `detail_sortie_bon`.`typesortie`,
  `etsouservice`.`etsouservice`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `categorie`.`categorie`,
  `articles`.`id_categorie`, `detail_sortie_bon`.`bmouv`
FROM
  `detail_sortie_bon` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie_bon`.`etsouserviceoucorps` INNER JOIN
  `articles` ON `articles`.`code_article` = `detail_sortie_bon`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
WHERE
  `articles`.`code_article` = '".$code_article."'");
}
else if($var =="23"){
$resultat=$db->query("SELECT
  `detail_sortie_bon`.`date_sortie`, `detail_sortie_bon`.`quantite_sortie`,
  `detail_sortie_bon`.`etsouserviceoucorps`, `detail_sortie_bon`.`typesortie`,
  `etsouservice`.`etsouservice`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `categorie`.`categorie`,
  `articles`.`id_categorie`, `detail_sortie_bon`.`bmouv`
FROM
  `detail_sortie_bon` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie_bon`.`etsouserviceoucorps` INNER JOIN
  `articles` ON `articles`.`code_article` = `detail_sortie_bon`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
WHERE
  `detail_sortie_bon`.`etsouserviceoucorps` = '".$id_etsouservice."'");
}
else if($var =="24"){
$resultat=$db->query("SELECT
  `detail_sortie_bon`.`date_sortie`, `detail_sortie_bon`.`quantite_sortie`,
  `detail_sortie_bon`.`etsouserviceoucorps`, `detail_sortie_bon`.`typesortie`,
  `etsouservice`.`etsouservice`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `categorie`.`categorie`,
  `articles`.`id_categorie`, `detail_sortie_bon`.`bmouv`
FROM
  `detail_sortie_bon` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie_bon`.`etsouserviceoucorps` INNER JOIN
  `articles` ON `articles`.`code_article` = `detail_sortie_bon`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
WHERE
  `articles`.`id_categorie` = '".$id_categorie."'");
}


	foreach($resultat as $personne)  { 
					?>
                                <tr>
                            
                                    <td><?php echo $personne['designation'];?></td>
                                    <td><?php echo $personne['unite'];?></td>
                                    <td><?php echo $personne['quantite_initiale'];?></td>
                                    <td><?php echo $personne['date_sortie'];?></td>
                                    <td><?php echo $personne['quantite_sortie'];?></td>
                                    <td><?php echo $personne['typesortie'];?></td>
                                    <td><?php echo $personne['bmouv'];?></td>                                    
                                    <td><?php echo $personne['etsouservice'];?></td>
                                  <td><?php echo $personne['categorie'];?></td>
                                  <td><a href="#" title="Valider le retour" class="modifetatbon" data-id = "<?php ?>"><i class="fa fa-gears"></i></a></td>
                                  <td>&nbsp;</td>
                                </tr>
							  <?php } ?>
<tr>
<td colspan="13" ><div class="soustitre1">En totalité, Il y a <span  class="grasbleu"> <?php echo $resultat->rowcount();?></span> article en sortie</div></td>
</tr>
                            </tbody>
                        </table>
 
</form>
</body>
</html>
