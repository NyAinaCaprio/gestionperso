<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$requete1="SELECT `affectationsuccessivecivil`.* FROM `affectationsuccessivecivil` WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat1=$db->query($requete1);		

$requete2="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat2=$db->query($requete2);
$personne2=$resultat2->fetch();
//-----------------------------
$tab=[];
$req1="SELECT max(numaffectciv) FROM affectationsuccessivecivil";
$tab=$db->query($req1)->fetch();
$idmax1=$tab[0];



$requete="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat=$db->query($requete);
$variable=$resultat->fetch();		

 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fenêtre de Modification</title>
</head>

<body >
<form name="modifaffectationsuccessivescivil">

  <input type="hidden" class="id_civil" value="<?php echo $personne2['id_civil'];?>" />
  Affectation Successives de <?php echo $_SESSION['varnomprenom']; ?>; "<?php echo $_SESSION["varservicelib"]; ?> 
<div id="montableau">
<table  class="table table-striped table-advance table-hover"  >
  <tr>
    <th  >Lieu affectation</th>
    <th  >Détachement</th>
    <th  >Fonction tenue</th>
    <th >Date effet</th>
    </tr>
  <?php while($route=$resultat1->fetch()) { ?>
  <tr>
    <td ><?php echo $route['lieuaffect'];?></td>
    <td ><?php echo $route['detachement'];?></td>
    <td ><?php echo $route['fonctiontenue'];?></td>
    <td ><?php echo $route['dateeffet'];?></td>
    </tr>
  <?php }?>
</table>
</div>

<div id="miseajour"></div>

</form>
</body>
</html>
