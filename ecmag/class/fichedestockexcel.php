<?php  session_start();
try {
    $db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', 'server');
 
} catch (PDOException $e) {
    print "<br><br><br><br>
    <div class='container' align='center'>
<div  class='row alert-danger'>

    <h1><br>Veuillez démarrer votre serveur de base de données</h1>
</div>
    </div>";
    die();
}
 
$marequete = $db-> query("SELECT
  Max(`titreinventaire`.`id_titre_inventaire`)
FROM
  `titreinventaire`")->fetch();
$_SESSION['varidmax'] = $marequete['Max(`titreinventaire`.`id_titre_inventaire`)'];


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
  `mouvement`.`type` IN (3, 4, 5) AND
  `mouvement`.`date` >  '".$_SESSION['varidmax']."' AND
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
    
 
$codehtml = '';
$codehtml .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style>
.fondbleue{
  background:#0000FF;
  color:white
}
</style>
</head>

<body >
 
<div  >
 
 <div><table width="785" style="line-height:14px" border="0">
  <tr>
    <td colspan="3"></td>
  </tr>
  
  <tr>
    <td width="359"><div align="center"><strong><u><center>GOUVERNEMENT</center></u></strong></div></td>
    <td width="165">&nbsp;</td>
    <td width="137">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong><u><center>MINISTERE DE LA DEFENSE NATIONALE</center></u></strong></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong><u><center>ETAT MAJOR GENERAL DE L\'ARMEE MALAGASY</center></u></strong></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong><u><center>DIRECTION DE L\'INTENDANCE DE L\'ARMEE</center></u></strong></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></div>                      
                        <div class=" panel panel-success">
                     <h3><center>FICHE DE STOCK</center></h3><br>
                     <h3><center>à partir du '.$_SESSION['datemax'].' </center></h3><br>
   <table   >
  <tr>
    <td width="33%">REFERENCE :</td>
    <td width="67%"><h3>'.$requete["reference"].'</h3></td>
  </tr>
  <tr>
    <td>LIBELLE PRODUIT :</td>
    <td><h4>'.utf8_encode($requete["libelleproduit"]).'</h4></td>
  </tr>
  <tr>
    <td>UNITE :</td>
    <td>'.utf8_encode($requete["unite"]).'</td>
  </tr>
  <tr>
    <td>CATEGORIE :</td>
    <td>'.$requete["categorie"].'</td>
  </tr>
  <tr>
    <td>QTE INITIALE :</td>
    <td><h4>'.$requ["stockphysique"].'</h4></td>
  </tr>
</table>
<hr />
                     <table border="1" style="width: auto; " cellpadding="0" cellspacing="0" >
                            <thead>
                                <tr>
                                    <th class = "fondbleue">Date</th>
                                    <th class = "fondbleue">N de la PJ</th>
                                  <th class = "fondbleue">BL ou BMS</th>
                                    <th class = "fondbleue">PROVENANCE ou DESTINATION</th>
                                    <th class = "fondbleue">QTE ENTREE</th>
                                    <th class = "fondbleue">QTE SORTIE</th>
                                </tr>
                            </thead>
                            <tbody>';
        

                       foreach($requetefich as $datafiche){
           

                               $codehtml.= '<tr>
                                    <td>'.$datafiche["date"].'</td>
                                    <td> '.$datafiche["numerodelapj"] .'</td>
                                    <td>'.$datafiche["BLouBMS"].'</td>
                                    <td>'.$datafiche["provenanceoudestination"].'</td>
                                    <td>'.$datafiche["quantiteentree"].'</td>
                                  <td>'.$datafiche["quantitesortie"].'</td>
                                </tr>';
                            }  ;
                              $codehtml.= '<tr>
                                  <td colspan="5"><div align="right"> <h4>STOCK REEL :  </h4></div></td>
                                  <td><h4>'.$stockfinal.'</h4></td>
                                </tr>
                            </tbody>
                        </table>
  </div>
</div>
 
</body>
</html>';


header("Content-Type: application/xls" );
header("Content-Disposition:attachment; filename=Fiche_d_inventaire.xls");
echo $codehtml;


?>