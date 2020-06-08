<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$requete="SELECT `avancementsuccessifs`.* FROM `avancementsuccessifs` WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat=$db->query($requete);		

$requete2="SELECT * FROM personnelcivil WHERE id_civil ='".$_SESSION['varidcivil']."'";
$resultat2=$db->query($requete2);
$personne2=$resultat2->fetch();	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fenêtre de Modification</title>

</head>

<body >
<form>
<div id="montableau">
  <div ><strong>
    <input type="hidden" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>"/>
    Avancement Successifs de <?php echo $_SESSION['varnomprenom']; ?>; &quot;<?php echo $_SESSION["varservicelib"]; ?> </strong>
	</div>
  <table class="table table-striped table-advance table-hover"  >

<thead>
    <tr>
      <th >Statut</th>
      <th>Reference</th>
      <th>Date effet</th>
    </tr>
 </thead>
      
      
    <?php while($route=$resultat->fetch()) { ?>
 <tbody>
    <tr>
      <td>  <?php echo $route['statut'];?></td>
      <td > <?php echo $route['reference'];?></td>
      <td > <?php echo $route['dateeffet'];?></td>
      </tr>
 </tbody>    
    <?php }?>
  </table>
 
  
  </div>
  <div id="miseajour" ></div>

</form> 

</body>
</html>
