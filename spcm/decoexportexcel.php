<?php
$codehtml = '';
    $codehtml = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<div style=" text-align:center; background:#1E15C8; color:red; font-weight:bold"><center><h3>Liste Personnel Civil</h3></center></div>
<hr/>
<div id="montableau">
<table border="1" cellspacing="0" cellpadding="0" style="line-height:12px;">
  <tr style="background:#6699FF">
    <td >Nom et prénoms</td>
    <td >Caegorie</td>
    <td >Fonction</td>
    <td >Etd ou Service</td>
    <td >Lieu de détachement</td>
    <td >Année de Sce</td>
    <td >Age</td>
   </tr>';

    $db = new PDO('mysql:host=localhost;dbname=dia', 'root', '');

    if($_POST['mychoix']==2)
    {$ages =25;  $anneesce= 10;}
    else if($_POST['mychoix']==3)
    { $ages =25;  $anneesce= 15;}
    else if($_POST['mychoix']==4)
    { $ages =25;  $anneesce= 16;}
    else if($_POST['mychoix']==5)
    { $ages =40;  $anneesce= 20;}
    else if($_POST['mychoix']==6)
    { $ages =40;  $anneesce= 25;}
    else if($_POST['mychoix']==7)
    { $ages =40;  $anneesce= 30;}
    else if($_POST['mychoix']==8)
    { $ages =45;  $anneesce= 20;}
    else if($_POST['mychoix']==9)
    { $ages =45;  $anneesce= 25;}
    else if($_POST['mychoix']==10)
    { $ages =45;  $anneesce= 29;}
    else if($_POST['mychoix']==11)
    { $ages =45;  $anneesce= 32;}
    else if($_POST['mychoix']==12)
    { $ages =45;  $anneesce= 37;}


$var = $db->query('SELECT
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
  `categorie_civil`.`categorie_civil`, `personnelcivil`.`fonction`,
  `etsouservice`.`etsouservice`, `dettache`.`dettache`, Year(Date(Now())) -
  Year(`etatdeservicecivil`.`datederecrutement`) AS `anneedeservice`,
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) AS `ages`
FROM
  `decoration_civil` INNER JOIN
  `personnelcivil` ON `personnelcivil`.`id_civil` =
    `decoration_civil`.`id_civil` INNER JOIN
  `etatdeservicecivil` ON `etatdeservicecivil`.`id_civil` =
    `personnelcivil`.`id_civil` INNER JOIN
  `dettache` ON `dettache`.`id_dettache` = `etatdeservicecivil`.`id_dettache`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `personnelcivil`.`id_etsouservice` INNER JOIN
  `categorie_civil` ON `categorie_civil`.`id_categorie_civil` =
    `personnelcivil`.`id_categorie_civil`
WHERE
  Year(Date(Now())) - Year(`etatdeservicecivil`.`datederecrutement`) >="'.$anneesce.'" AND
  Year(Date(Now())) - Year(`personnelcivil`.`datenaisse`) >= "'.$ages.'"
GROUP BY
  `personnelcivil`.`id_civil`, `personnelcivil`.`nomprenom`,
  `categorie_civil`.`categorie_civil`, `personnelcivil`.`fonction`,
  `etsouservice`.`etsouservice`, `dettache`.`dettache`,
  `etatdeservicecivil`.`datederecrutement`, `decoration_civil`.`decretouarrete`,
  `personnelcivil`.`rupture`
HAVING
  `decoration_civil`.`decretouarrete` = "" AND `personnelcivil`.`rupture` IS
  NULL;');


foreach ($var as $personne)
    {
        $codehtml.=' 
<tr>
<th align="left">'.$personne['nomprenom'].'</th>  
<th>'.$personne['categorie_civil'].'</th>
<th>'.$personne['fonction'].'</th>
<th>'.$personne['etsouservice'].'</th>
<th>'.$personne['dettache'].'</th>
<th>'.$personne['anneedeservice'].'</th>
<th>'.$personne['ages'].'</th>
</tr>';
    }
    $codehtml.='
</table>
</div>

<div style=" font-weight:bold; font-size:14px; text-align:center"><p>Le nombre des personnels civil est arrêté à la somme de : '.$var->rowcount().'<p></div>
<br/>

<div style=" margin-left:10cm"> Fait à Antananarivo le,........................... </div>


</div>
</body>
</html>';

    header("Content-Type: application/xls");
    header("Content-Disposition:attachment; filename=PropositionDeco.xls");
    echo $codehtml;


?>