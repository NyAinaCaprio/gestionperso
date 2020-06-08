<?php session_start();
include("connexion.php");
$_SESSION['id_titre_inventaire'] = $_POST['id_titre_inventaire'];
 
$donnee = $db->query("select * from titreinventaire where id_titre_inventaire = '".$_SESSION['id_titre_inventaire']."'")->fetch();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form action="exportverspdf.php" method="post">
<div>
	<div class="overflow">
<h4>Inventaire du : <?php echo $donnee["date"].' le '. $donnee["saisile"]?>  </h4>
<table class="table table-striped table-bordered table-hover">
<thead>
<th>REFERENCE</th>
<th>LIBELLE PRODUIT</th>
<th>QTE INITIALE</th>
<th>QTE ENTREE</th>
<th>QTE SORTIE</th>
<th>STOCK REEL</th>
<th>STOCK PHYSIQUE</th>
<th>ECART</th>
 <th>REMARQUE</th>
</thead>
<?php 
$query =$db->query("SELECT  * from inventaire where id_inventaire = '".$_POST['id_titre_inventaire']."' ORDER BY
  `inventaire`.`reference` DESC ");
foreach($query as $data) { ?>
<tbody>

<td><?php echo $data['reference']; ?></td>
<td><?php echo $data['libelleproduit']; ?></td>
<td><?php echo $data['qteinitiale']; ?></td>
<td><?php echo $data['qteentree']; ?></td>
<td><?php echo $data['qtesortie']; ?></td>
<td><?php echo $data['stockreel']; ?></td>
<td><?php echo $data['stockphysique']; ?></td>
<td><?php echo $data['ecart']; ?></td>
 <td><?php echo $data['remarque']; ?></td>
</tbody>
<?php }?>
<tbody>
<tr>
<th colspan="7"> <?php echo $query ->rowcount(); ?> fournisseurs enregistr&eacute;s</th>
</tr>
</tbody>

</table>
<input type="submit" name="exportversexcel" class="btn btn-primary" value="Exporter vers Excel"  />
<input type="submit" name="exportverspdf" class="btn btn-primary" value="Exporter vers PDF"  />
</div> 
</div> 
</form>
</body>
</html>
