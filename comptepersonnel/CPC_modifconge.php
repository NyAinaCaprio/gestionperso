<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$requete="SELECT `conge`.* FROM `conge` WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat=$db->query($requete);		

$requete2="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat2=$db->query($requete2);
$personne2=$resultat2->fetch()	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fenêtre de Modification</title>


</head>

<body >
<form>
  <input type="hidden" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>"/>
Modification congé de <?php echo $_SESSION['varnomprenom']; ?>; &quot;<?php echo $_SESSION["varservicelib"]; ?>
<hr />
<div id="montableau">
  <table  class="table table-striped table-advance table-hover" >
  <thead>
    <tr>
      <th>Annee</th>
      <th>Reliquat</th>
      <th>Droit</th>
      <th>Total</th>
      <th>Date debut </th>
      <th>Date fin</th>
      </tr>
      </thead>
    <?php while($route=$resultat->fetch()) { ?>
    <tbody>
    <tr>
      <td ><?php echo $route['annee'];?></td>
      <td width="153"><?php echo $route['reliquat'];?></td>
      <td width="153"><?php echo $route['droit'];?></td>
      <td width="153"><?php echo $route['total'];?></td>
      <td width="153"><?php echo $route['datedeb'];?></td>
      <td width="153"><?php echo $route['datefin'];?></td>
      </tr>
    </tbody>
	<?php }?>
  </table>
</div>

<div id="miseajour"></div>

</form>

</body>
</html>
