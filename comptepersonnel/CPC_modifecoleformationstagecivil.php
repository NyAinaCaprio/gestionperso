<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$resultat= getEcoleFormation($_SESSION['varidcivil']);
$personne2 = getAllPersonnel($_SESSION['varidcivil']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fenêtre de Modification</title>
</head>

<body > 
<form>
<div id="montableau">

  <strong>Cursus d'Etude de <?php echo $_SESSION['varnomprenom']; ?>; &quot;<?php echo $_SESSION["varservicelib"]; ?></strong>

  <table class="table table-striped table-advance table-hover" >
<thead>
    <tr>
      <th>&nbsp;</th>
      <th height="31"><input type="hidden" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>" />Intitule</th>
      <th>Etablissement</th>
      <th>Diplome</th>
      <th>Annee</th>
      <th>&nbsp;</th>
    </tr>
   </thead> 
    <?php while($route=$resultat->fetch()) { ?>
    <tr>
      <td ><a  data-id="<?php echo $route['numecole'];?>" class="editmodifecoleformationstage01civil" href="#"><i class="fa fa-pencil-square-o"></i></a> </td>
      <td ><input name="numecole" type="hidden"  disabled="disabled" class="numecole" value="<?php echo $route['numecole'];?>" /><?php echo $route['intitule'];?></td>
      <td ><?php echo $route['etabli'];?></td>
      <td ><?php echo $route['diplome'];?></td>
      <td ><?php echo $route['annee'];?></td>
      <td widtd="76"><a  data-id="<?php echo $route['numecole'];?>" class="deletemodifecoleformationstage01civil" href="#"><i class="fa fa-trash-o"></i></a></td>
    </tr>
    <?php }?>
  </table>
  <a onclick="ecoleformationstagecivil()"  href="#"><i class="fa fa-plus fa-2x"></i></a>
</div>

 <div id="miseajour"></div>

</form>
</body>
</html>
