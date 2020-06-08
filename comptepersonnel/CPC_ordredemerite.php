<?php session_start();

require_once ("function.php");
connexiondb();
//---------------------requête de la fiche modif
$requete="SELECT `decoration_civil`.*, `decorationcivil`.* FROM  `decoration_civil` INNER JOIN  `decorationcivil` ON `decorationcivil`.`numdecorationcivil` =  `decoration_civil`.`numdecorationcivil` WHERE id_civil ='".$_SESSION['varidcivil']."'";
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
<form>
<div id="montableau">
  <div ><strong>
    <input type="hidden" class="id_civil" value="<?php echo $_SESSION['varidcivil'];?>"/>
Décoration de <?php echo $_SESSION['varnomprenom']; ?>; &quot;<?php echo $_SESSION["varservicelib"]; ?></strong>
	</div>

	<table class="table table-striped table-advance table-hover"   >

<thead>
    		<th>Décoration</th>
        <th>Libellé Décoration</th>
        <th>Décret ou arrâté</th>
        <th>Année</th>
        <th>Observation</th>

 </thead>
      
      
    <?php while($route=$resultat->fetch()) { ?>
 <tbody>
    <tr>
        <td ><?php echo $route['decoration'];?></td>
        <td ><?php echo $route['libelledecoration'];?></td>
        <td ><?php echo $route['decretouarrete'];?></td>
        <td ><?php echo $route['annee'];?></td>
        <td ><?php echo $route['observation'];?></td>
	</tr>
	  
	 
	  
 </tbody>    
      <?php }?>
  </table>
</div>

<div id="miseajour"></div>
</form>
</body>
</html>
