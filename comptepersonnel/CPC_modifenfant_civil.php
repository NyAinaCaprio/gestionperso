<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$requete="SELECT `enfant`.* FROM `enfant` WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat=$db->query($requete);		

$requete2="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat2=$db->query($requete2);
$personne2=$resultat2->fetch();	
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
<div ><strong>Enfant de <?php echo $_SESSION['varnomprenom']; ?>; " <?php echo $_SESSION["varservicelib"]; ?> </strong></div>
  <table   class="table table-striped table-advance table-hover">
  <thead>
    <tr>
      <th>&nbsp;</th>
      <th >Nom et prénoms
        <input name="id_civil" type="hidden" class="id_civil " value="<?php echo $personne2['id_civil'];?>" /></th>
      <th >Date de naissance</th>
      <th  >Sexe</th>
      <th >Obsérvation</th>
      <th >Edit</th>
      <th ></th>
    </tr>
    </thead>
    <?php while($route=$resultat->fetch()) { ?>
    <tbody>
    <tr>
      <td ><div align="center"><a data-id="<?php echo $route['numenfant']; ?>"class="editmodifenfant_civil01civil" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </div></td>
      <td ><input name="numenfant" type="hidden" id="numconjoint" value="<?php echo $route['numenfant'];?>" />
      <?php echo $route['nomprenom'];?></td>
      <td ><?php echo $route['datenaiss'];?></td>
      <td  ><?php echo $route['sexe'];?></td>
      <td ><?php echo $route['obs'];?></td>
      <td ></td>
      <td ><div align="center"><a data-id="<?php echo $route['numenfant']; ?>" class="deletemodifenfant_civil01civil" href="#"> <i class="fa  fa-trash-o"></i></a> </div></td>
    </tr>
    </tbody>
    <?php }?>
  </table>
</div>
<a onclick="addenfant_civil()" href="#" ><i class="fa fa-plus fa-2x"></i></a>
<div id="miseajour" class="cadre"  ></div>

</form>  
 
</body>
</html>
