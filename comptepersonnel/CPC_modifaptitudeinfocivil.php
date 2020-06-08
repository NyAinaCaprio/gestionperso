<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$requete="SELECT `aptitudeinfo`.* FROM `aptitudeinfo` WHERE id_civil ='".$_SESSION['varidcivil']."'";
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
<div id="montableau">

  <input type="hidden" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>"/>
Modification de Connaissance Info de <?php echo $_SESSION['varnomprenom']; ?>; "<?php echo $_SESSION["varservicelib"]; ?>"
  <table class="table table-striped table-advance table-hover" >
    <thead>
    <tr>
      <th>&nbsp;</th>
      <th >Buréautique</th>
      <th>Autres</th>
      <th>&nbsp;</th>
    </tr>
    </thead>
    <?php while($route=$resultat->fetch()) { ?>
    <tbody>
    <tr>
      <td ><div align="center"><a data-id="<?php echo $route['numaptitudeinfo'];?>" class="modifaptitudeinfo01civil" href="#"><i class="fa fa-pencil-square-o "></i></a> </div></td>
      <td ><?php echo $route['bureautique'];?></td>
      <td ><?php echo $route['autres'];?></td>
      <td ><div align="center"><a data-id="<?php echo $route['numaptitudeinfo'];?>" class="deletemodifaptitudeinfo01civil" href="#"><i class="fa fa-trash-o"></i></a> </div></td>
    </tr>
    </tbody>
    <?php }?>
  </table>
  <a href="#" onclick="ajoutaptitudeinfocivil()"><i class="fa fa-plus fa-2x"></i></a>
</div>
<div id="miseajour"></div>
</form>
</body>
</html>
