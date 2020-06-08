<?php session_start();

require_once ("function.php");
connexiondb();
 $resultat = getAptiPart($_SESSION['varidcivil']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fenêtre de Modification</title>
</head>

<body > 
<form>
  <input type="hidden" name="id_civil" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>"  />
Aptitude Particulier de <?php echo $_SESSION['varnomprenom']; ?>; "<?php echo $_SESSION["varservicelib"]; ?>"

  <div id="montableau">

<table class="table table-striped table-advance table-hover">
  <thead>
  <tr>
    <th >&nbsp;</th>
    <th >Permis</th>
    <th>Delivré le</th>
    <th>à</th>
    <th>Categorie</th>
    <th>Autres</th>
    <th>&nbsp;</th>
    </tr>
  </thead>
  <?php while($route=$resultat->fetch()) { ?>
  <tbody>
  <tr>
    <td ><a data-id="<?php echo $route['numaptitudeparticulier'];?>" class="editaptitudeparticulier01civil" href="javascript:;"><i class="fa fa-pencil-square-o "></i></a> </td>
    <td ><?php echo $route['permis'];?></td>
    <td ><?php echo $route['delivrele'];?></td>
    <td ><?php echo $route['a'];?></td>
    <td ><?php echo $route['categorie'];?></td>
    <td ><?php echo $route['autres'];?></td>
    <td ><a data-id="<?php echo $route['numaptitudeparticulier'];?>" class="deleteaptitudeparticulier01civil" href="javascript:;"><i class="fa fa-trash-o"></i></a></a></td>
    </tr>
  </tbody>
  <?php }?>
</table>
  </div>
<a href="#" onclick="ajoutaptitudeparticuliercivil()"><i class="fa fa-plus fa-2x"></i></a>

  <div id="miseajour"></div>

</form>

</body>
</html>
