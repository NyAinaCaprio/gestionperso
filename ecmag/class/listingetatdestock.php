<?php

//setlocale(LC_CTYPE, 'fr_FR.UTF-8');

?>
 <form action="etatdestockexport.php" method="POST"> 
<table class="table table-striped table-bordered table-hover animated animate flash">
            <thead>
                <tr>
            		<th>REFERENCE</th>
                    <th>DESIGNATION</th>
                    <th>UNITE</th>
                    <th>CATEGORIE</th>
                    <th>QTE INITIALE</th>
                    <th>QTE ENTREE</th>
                  <th>QTE SORTIE</th>
                     <th>STOCK FINAL</th>
                </tr>
            </thead>
            <tbody>
                            
                            <?php 

$_SESSION['choix'] = $_POST['choix'];
$_SESSION['reference'] = $_POST['reference'];
$_SESSION['id_categorie'] = $_POST['id_categorie']; 

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
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
GROUP BY
  `etatdestock`.`reference`, `articles`.`libelleproduit`, `unite`.`unite`,
  `categorie`.`categorie`, `articles`.`id_categorie`
ORDER BY
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
  `etatdestock`.`reference`, `articles`.`libelleproduit`, `unite`.`unite`,
  `categorie`.`categorie`, `articles`.`id_categorie`
HAVING
  `articles`.`id_categorie` = '".$_SESSION['id_categorie']."'
ORDER BY
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
            <td><?php echo $personne['libelleproduit'];?></td>
            <td><?php echo $personne['unite'];?></td>
            <td><?php echo $personne['categorie'];?></td>
            <td><?php echo $personne['Sum(`etatdestock`.`quantite_initiale`)'];?></td>
            <td><?php echo $personne['Sum(`etatdestock`.`quantite_entree`)'];?></td>
             <td><?php echo $personne['Sum(`etatdestock`.`quantite_sortie`)'];?></td>
            <td><?php echo $personne['StockFinal'];?></td>
        </tr>
							  <?php } ?>
<tr>
<td colspan="10" ><div class="soustitre1"> <span  class="grasbleu"> <?php echo $resultat->rowcount();?></span> enregistrement(s)...</div></td>
</tr>
                            </tbody>
                        </table>
                      
<input type="submit" name="exportversexcel" value="Exporter vers Excel" class="btn btn-primary"> 
<input type="submit" name="exportverspdf" value="Exporter vers PDF" class="btn btn-primary">
 
</form>