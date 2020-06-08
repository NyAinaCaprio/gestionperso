<?php session_start();
    $db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', '');
$marequete = $db-> query("SELECT
  Max(`titreinventaire`.`id_titre_inventaire`)
FROM
  `titreinventaire`")->fetch();
$_SESSION['varidmax'] = $marequete['Max(`titreinventaire`.`id_titre_inventaire`)'];

    $datemax = $db->query("select * from titreinventaire where id_titre_inventaire = '".$_SESSION['varidmax']."'")->fetch();
$_SESSION['date'] = $datemax['date'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> ---->
<style type="text/css">
	.table-bordered tr td {
    border: 1px solid #000000 !important;
  }
  .fondbleu{
  	background-color: blue
  }
  *{
   
  	padding: 5px
  }
</style>
 
<body>
<h3>ETAT DE STOCK </h3>
<p>à partir de : <?php echo $_SESSION['date'] ?></p>
<div style="background-color: #000000; height: 1em;width: 100%"> </div>

<table align="center"  class=" table-bordered ">
            
	<tr>
			<td class="fondbleu">REFERENCE</td>
			<td class="fondbleu"> DESIGNATION</td>
			<td class="fondbleu">UNITE</td>
			<td class="fondbleu">CATEGORIE</td>
			<td class="fondbleu">QTE INITIALE</td>
			<td class="fondbleu">QTE ENTREE</td>
			<td class="fondbleu">QTE SORTIE</td>
			<td class="fondbleu">STOCK FINAL</td>
	</tr>
  <?php 

  
if ($_SESSION['choix'] =="1")

$resultat = $db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`), Sum(`etatdestock`.`quantite_entree`),
  Sum(`etatdestock`.`quantite_sortie`), Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - Sum(`etatdestock`.`quantite_sortie`) AS
  `StockFinal`, `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` INNER JOIN
  `categorie` ON `CATEGORIE`.`id_categorie` = `articles`.`id_categorie`
GROUP BY
  `articles`.`libelleproduit`, `unite`.`unite`, `categorie`.`categorie`,
  `articles`.`id_categorie` ORDER BY
  `etatdestock`.`reference` DESC");
  
  if ($_SESSION['choix'] =="2")
$resultat=$db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`), Sum(`etatdestock`.`quantite_entree`),
  Sum(`etatdestock`.`quantite_sortie`), Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - Sum(`etatdestock`.`quantite_sortie`) AS
  `StockFinal`, `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
GROUP BY
  `articles`.`libelleproduit`, `unite`.`unite`, `categorie`.`categorie`,
  `articles`.`id_categorie` 
HAVING
  `articles`.`id_categorie` = '".$_SESSION['id_categorie']."' ORDER BY
  `etatdestock`.`reference` DESC") or die ('Aucun enregistrement...');	
 //----------------   
elseif ($_SESSION['choix'] ==3)
$resultat=$db->query("SELECT
  `etatdestock`.`reference`, `articles`.`libelleproduit`,
  Sum(`etatdestock`.`quantite_initiale`), Sum(`etatdestock`.`quantite_entree`),
  Sum(`etatdestock`.`quantite_sortie`), Sum(`etatdestock`.`quantite_initiale`) +
  Sum(`etatdestock`.`quantite_entree`) - Sum(`etatdestock`.`quantite_sortie`) AS
  `StockFinal`, `unite`.`unite`, `categorie`.`categorie`
FROM
  `etatdestock` INNER JOIN
  `articles` ON `articles`.`reference` = `etatdestock`.`reference` INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie` 
WHERE
  `etatdestock`.`reference` = '".$_SESSION['reference']."'
GROUP BY
  `articles`.`libelleproduit`, `unite`.`unite`, `categorie`.`categorie` ORDER BY
  `etatdestock`.`reference` DESC") or die ('Aucun enregistrement...');

 foreach($resultat as $personne)  { 
					?>
        <tr>
            <td><?php echo $personne['reference'];?></td>
            <td><?php echo utf8_encode( $personne['libelleproduit']);?></td>
            <td><?php echo utf8_encode($personne['unite'])?></td>
            <td><?php echo $personne['categorie'];?></td>
            <td><?php echo $personne['Sum(`etatdestock`.`quantite_initiale`)'];?></td>
            <td><?php echo $personne['Sum(`etatdestock`.`quantite_entree`)'];?></td>
             <td><?php echo $personne['Sum(`etatdestock`.`quantite_sortie`)'];?></td>
            <td><?php echo $personne['StockFinal'];?></td>
        </tr>
							  <?php } ?>
                                   
  </table>
  <p><?php //echo $resultat->rowcount() ?> enregistrement(s)... </p>
</body>
</html>