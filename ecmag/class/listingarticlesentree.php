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
 
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>

                            <th >Désignation</th>
                            <th >Unité</th>
                            <th >Qté initiale</th>
                            <th >Date entrée</th>
                            <th >Quantité entrée</th>
                            <th >BM N°</th>
                            <th >Fournisseur</th>
                            <th >Catégorie</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 


$choix = $_POST['choix'];
$code_article = $_POST['code_article'];
$id_categorie= $_POST['id_categorie'];
 

if ($choix==1)
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `articles`.`id_categorie`,
  `categorie`.`categorie`, `detail_entree`.`date_entree`,
  `detail_entree`.`quantite_entree`, `detail_entree`.`bmouv`,
  `fournisseurs`.`nomprenom`, `detail_entree`.`id_fournisseur`,
  `articles`.`id_fournisseurs`
FROM
  `detail_entree` INNER JOIN
  `articles` ON `detail_entree`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `fournisseurs` ON `fournisseurs`.`id_fournisseurs` =
    `articles`.`id_fournisseurs`") or die ('Aucun enregistrement...');	
  
 //----------------   
else if ($choix==2)
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `articles`.`id_categorie`,
  `categorie`.`categorie`, `detail_entree`.`date_entree`,
  `detail_entree`.`quantite_entree`, `detail_entree`.`bmouv`,
  `fournisseurs`.`nomprenom`, `detail_entree`.`id_fournisseur`,
  `articles`.`id_fournisseurs`
FROM
  `detail_entree` INNER JOIN
  `articles` ON `detail_entree`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `fournisseurs` ON `fournisseurs`.`id_fournisseurs` =
    `articles`.`id_fournisseurs`
WHERE
  `articles`.`id_categorie` = '".$id_categorie."'") or die ('Aucun enregistrement...');

else if ($choix==3)
$resultat=$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `articles`.`quantite_initiale`, `articles`.`id_categorie`,
  `categorie`.`categorie`, `detail_entree`.`date_entree`,
  `detail_entree`.`quantite_entree`, `detail_entree`.`bmouv`,
  `fournisseurs`.`nomprenom`, `detail_entree`.`id_fournisseur`,
  `articles`.`id_fournisseurs`
FROM
  `detail_entree` INNER JOIN
  `articles` ON `detail_entree`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `fournisseurs` ON `fournisseurs`.`id_fournisseurs` =
    `articles`.`id_fournisseurs`
WHERE
  `articles`.`code_article` = '".$code_article."'")  or die ('Aucun enregistrement...');
 
	foreach($resultat as $personne)  { 
					?>
                                <tr>

<td><?php echo $personne['designation'];?></td>
<td><?php echo $personne['unite'];?></td>
<td><?php echo $personne['quantite_initiale'];?></td>
<td><?php echo $personne['date_entree'];?></td>
<td><?php echo $personne['quantite_entree'];?></td>
<td><?php echo $personne['bmouv'];?></td>
<td><?php echo $personne['nomprenom'];?></td>
<td><?php echo $personne['categorie'] ;?></td>
                                </tr>
							  <?php } ?>
<tr>
<td colspan="9" ><div class="soustitre1">En totalité, Il y a <span  class="grasbleu"> <?php echo $resultat ->rowcount();?></span> enregistrements</div></td>
</tr>
                            </tbody>
                        </table>
 

</body>
</html>
