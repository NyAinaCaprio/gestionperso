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
 
$data = $db->query("select * from titreinventaire where id_titre_inventaire = '".$_SESSION['id_titre_inventaire'] ."'")->fetch();
 
$codehtml = '';
$codehtml .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

#montableau td, #montableau th, #montableau  table {
border:1px solid #CCCCCC;
border-collapse:collapse;
opacity:0.95;
}
#montableau table {
width:100%;
font-family:Arial
}
#montableau td, #montableau th
{
padding:2px;
font-size:11px}

#montableau th{
background:#fff;
color:#000000;
 font-weight:normal}


</style>
</head>

<body>
<div align="center">

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

<div style=" text-align:center; background:#1E15C8; color:red; font-weight:bold"><center><h3>FICHE D\'INVENTAIRE</h3></center></div>
<div>du : '.$data['date'].' le '.$data['saisile'];
$codehtml .= '</div>
<hr/>
<div id="montableau">
<table border="1" cellspacing="0" cellpadding="0" style="line-height:12px;">
  <tr style="background:#6699FF">
   <td>REFERENCE</td>
<td>LIBELLE PRODUIT</td>
<td>QTE INITIALE</td>
<td>QTE ENTREE</td>
<td>QTE SORTIE</td>
<td>STOCK REEL</td>
<td>STOCK PHYSIQUE</td>
<td>ECART</td>
 <td>REMARQUE</td>
   </tr>';

$resultat=$db->query("select * from inventaire where id_inventaire = '".$_SESSION['id_titre_inventaire']."'");	
  

	while($personne=$resultat ->fetch())  
{ 
$codehtml.=' 

  <tr>
<th align="left">'.$personne['reference'].'</th>  
<th>'.utf8_encode(($personne['libelleproduit'])).'</th>
<th>'.$personne['qteinitiale'].'</th>
<th>'.$personne['qteentree'].'</th>
<th>'.$personne['qtesortie'].'</th>
<th align="left">'.$personne['stockreel'].'</th>
<th>'.$personne['stockphysique'].'</th>
<th>'.$personne['ecart'].'</th>
<th>'.$personne['remarque'].'</th>
  </tr>';
}
$codehtml.='
</table>
</div>

<div style=" font-weight:bold; font-size:14px; text-align:center"><p>'.$resultat->rowcount().' enregistrements ... <p></div>
<br/>

<div style=" margin-left:10cm"> Fait à Antananarivo le,........................... </div>


</div>
</body>
</html>';

header("Content-Type: application/xls" );
header("Content-Disposition:attachment; filename=Fiche_d_inventaire.xls");
echo $codehtml;


?>