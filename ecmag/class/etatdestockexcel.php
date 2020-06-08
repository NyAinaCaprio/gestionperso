<?php  session_start();
try {
    $db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', '');
 
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

    $datemax = $db->query("select * from titreinventaire where id_titre_inventaire = '".$_SESSION['varidmax']."'")->fetch();
$_SESSION['datemax'] = $datemax['date'];

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
  `etatdestock`.`reference` DESC;") or die ('Aucun enregistrement...');	
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
                     <h3><center>ETAT DE STOCK</center></h3><br>
                     <h3><center>à partir du '.$_SESSION['datemax'].' </center></h3><br>
 
<hr />
                     <table border="1" style="width: auto; " cellpadding="0" cellspacing="0" >
                            <thead>
                                <tr>
                                    <th class = "fondbleue">REFERENCE</th>
                                    <th class = "fondbleue">DESIGNATION</th>
                                  	<th class = "fondbleue">UNITE</th>
                                    <th class = "fondbleue">CATEGORIE</th>
                                    <th class = "fondbleue">QTE INITIALE</th>
                                    <th class = "fondbleue">QTE ENTREE</th>
                                    <th class = "fondbleue">QTE SORTIE</th>
                                	<th class = "fondbleue">STOCK FINAL</th>
                                </tr>
                            </thead>
                            <tbody>';
        

                       foreach($resultat as $datafiche){
           

                               $codehtml.= '<tr>
                                    <td>'.$datafiche['reference'].'</td>
            <td>'.utf8_encode( $datafiche['libelleproduit']).' </td>
            <td>'.utf8_encode( $datafiche['unite']).' </td>
            <td>'.$datafiche['categorie'].' </td>
            <td>'.$datafiche['Sum(`etatdestock`.`quantite_initiale`)'].' </td>
            <td>'.$datafiche['Sum(`etatdestock`.`quantite_entree`)'].' </td>
             <td>'.$datafiche['Sum(`etatdestock`.`quantite_sortie`)'].'</td>
            <td>'.$datafiche['StockFinal'].'</td>
                                </tr>';
                            }  ;
                              $codehtml.= '<tr>
                              <td colspan=8>'.$resultat->rowcount().'enregistrements... </td>
                              </tr> 
                            </tbody>
                        </table>
  </div>
</div>
 
</body>
</html>';


header("Content-Type: application/xls" );
header("Content-Disposition:attachment; filename=Etat_de_stock.xls");
echo $codehtml;


?>