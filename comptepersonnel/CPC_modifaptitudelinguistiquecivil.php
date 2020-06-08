<?php session_start();
require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$resultat = getLinguistique($_SESSION['varidcivil']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fenêtre de Modification</title>

</head>

<body > 
<form>
  <div id="montableau"><strong>
<input type="hidden" name="id_civil" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>"  />    
Aptitude Linguistique de <?php echo $_SESSION['varnomprenom']; ?>; "<?php echo $_SESSION["varservicelib"]; ?>"</strong>
    <table class="table table-striped table-advance table-hover" >
<tr>
  <th>&nbsp;</th>
      <th> Français</th>
      <th> Anglais </th>
      <th> Autres </th>
      <th>&nbsp;</th>
</tr>
    <?php while($route=$resultat->fetch()) { ?>
    <tr>
      <td ><a href="javascript:;" class="modifaptitudelinguistique01civil" data-id="<?php echo $route['numaptiling'];?>"><i class="fa fa-pencil-square-o"></i></a> </td>
      <td ><?php echo $route['francais'];?></td>
      <td ><?php echo $route['anglais'];?></td>
      <td ><?php echo $route['autres'];?></td>
      <td ><div align="center"><a  href="javascript:;" class="deleteaptitudelinguistique01civil" data-id="<?php echo $route['numaptiling'];?>" ><i class="fa fa-trash-o"></i></a> </div></td>
      </tr>
    <?php }?>
      </table>
    <a href="javascript:;" onclick="addaptitudelinguistiquecivil()"><i class="fa fa-plus fa-2x"> </i></a>
</div><div id="miseajour"></div>

</form>
</body>
</html>
