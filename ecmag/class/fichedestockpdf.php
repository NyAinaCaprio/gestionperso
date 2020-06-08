<?php session_start();
     header('Content-Type: text/html; charset=utf-8'); // écrase l'entête utf-8 envoyé par php
//ini_set( 'default_charset', 'ISO-8859-1' );

$db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', 'server');

$marequete = $db-> query("SELECT
  Max(`titreinventaire`.`id_titre_inventaire`)
FROM
  `titreinventaire`")->fetch();
$_SESSION['varidmax'] = $marequete['Max(`titreinventaire`.`id_titre_inventaire`)'];
$mareqdate = $db->query("select * from titreinventaire where id_titre_inventaire= '".$_SESSION['varidmax']."'")->fetch();
$_SESSION['date'] = $mareqdate['date'];

$requ = $db->query("SELECT stockphysique from inventaire where reference = '".$_SESSION['reference'] ."' AND id_inventaire = '".$_SESSION['varidmax']."'")->fetch();


$requete = $db->query("SELECT
  `unite`.`id_unite`, `articles`.`reference`, `articles`.`libelleproduit`,
  `articles`.`description`, `categorie`.`categorie`, `unite`.`unite`
FROM
  `articles` INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite`
WHERE
  `articles`.`reference` = '".$_SESSION['reference'] ."'")->fetch();
 
$requetefich =$db->query("SELECT
  `fichedestock`.`reference`, `fichedestock`.`date`,
  `fichedestock`.`numerodelapj`, `fichedestock`.`provenanceoudestination`,
  `fichedestock`.`BLouBMS`, `fichedestock`.`dues`,
  `fichedestock`.`quantiteentree`, `fichedestock`.`quantitesortie`
FROM
  `fichedestock`
WHERE
  `fichedestock`.`reference` = '".$_SESSION['reference'] ."'");



           $reqsumentre = $db->query("SELECT
  `detail_mouvement`.`reference`, Sum(`detail_mouvement`.`quantite`)
FROM
  `mouvement` INNER JOIN
  `detail_mouvement` ON `mouvement`.`id_mouvement` =
    `detail_mouvement`.`id_mouvement`
WHERE
  `mouvement`.`type` IN (4, 5, 6) AND
  `mouvement`.`date` >  '".$_SESSION['date']."' AND
  `detail_mouvement`.`reference` = '".$_SESSION['reference'] ."'")->fetch(); 

            $reqsumsortie = $db->query("SELECT
  `detail_mouvement`.`reference`, Sum(`detail_mouvement`.`quantite`)
FROM
  `mouvement` INNER JOIN
  `detail_mouvement` ON `mouvement`.`id_mouvement` =
    `detail_mouvement`.`id_mouvement`
WHERE
  `mouvement`.`type` IN (1, 2, 3) AND
  `mouvement`.`date` >  '".$_SESSION['varidmax']."' AND
  `detail_mouvement`.`reference` = '".$_SESSION['reference'] ."'")->fetch(); 

  
            $stockfinal =  ($requ["stockphysique"] + $reqsumentre['Sum(`detail_mouvement`.`quantite`)'] - $reqsumsortie['Sum(`detail_mouvement`.`quantite`)'] );                 
    

?>
<style type="text/Css">
<!--
.test1
{
    border: solid 1px #FF0000;
    background: #FFFFFF;
    border-collapse: collapse;
}
.fondbleu{
	background-color: blue;
	color:#FFFFFF;
}
.center{
	text-align: center;
}
-->
</style>
<page orientation="portrait"  style="font-size: 12px; margin: 5px; padding: 5px">

    <span style="font-weight: bold; font-size: 18pt; color: #FF0000; font-family: Times">Fiche de Stock<br></span>
    <br>

    à partir du : <?php echo $_SESSION['datemax'] ?>
    <br>
    <hr style="height: 1mm; background: #AA5500; border: solid 1mm #0055AA">
  
    <br>
      <table  >
  <tr>
    <td  >REFERENCE :</td>
    <td  > <?php echo $requete["reference"];?> </td>
  </tr>
  <tr>
    <td>LIBELLE PRODUIT :</td>
    <td><b> <?php echo utf8_encode($requete["libelleproduit"])?></b></td>
  </tr>
  <tr>
    <td>UNITE :</td>
    <td><?php echo utf8_encode($requete["unite"]);?></td>
  </tr>
  <tr>
    <td>CATEGORIE :</td>
    <td><?php echo $requete["categorie"];?></td>
  </tr>
  <tr>
    <td>QTE INITIALE :</td>
    <td> <?php echo $requ["stockphysique"];?> </td>
  </tr>
</table>
<hr />
                     <table border="1" style="width: 90%; " cellpadding="0" cellspacing="0" >
                            
                                <tr>
                                    <td class="fondbleu">Date</td>
                                    <td class="fondbleu">N de la PJ</td>
                                  <td class="fondbleu">BL ou BMS</td>
                                    <td class="fondbleu">PROVENANCE ou DESTINATION</td>
                                    <td class="fondbleu" >QTE ENTREE</td>
                                    <td class="fondbleu"  >QTE SORTIE</td>
                                </tr>
                            
                             
				<?php 

                       foreach($requetefich as $datafiche){
					?>

                                <tr>
                                    <td><?php  echo $datafiche["date"];  ?></td>
                                    <td> <?php  echo $datafiche["numerodelapj"]; ?></td>
                                    <td><?php echo $datafiche["BLouBMS"]; ?></td>
                                    <td><?php  echo $datafiche["provenanceoudestination"];  ?></td>
                                    <td class="center"><?php echo $datafiche["quantiteentree"];  ?></td>
                                  <td class="center"><?php   echo $datafiche["quantitesortie"]; ?></td>
                                </tr>
                           <?php } ?>
                                <tr>
                                  <td colspan="5"><div align="right"> <h4>STOCK REEL :  </h4></div></td>
                                  <td class="center"><h4><?php echo $stockfinal ?></h4></td>
                                </tr>
                             	
                        </table>
     <p> <?php echo $requetefich->rowcount() ?> enregistrements...</p>
</page>