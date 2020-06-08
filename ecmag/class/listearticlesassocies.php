<?php session_start();
include('connexion.php');
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>


<div>
	<div class="overflow">

<table class="table table-striped table-bordered table-hover">
<thead>
<th>DESIGNATION</th>
<th>DESCRIPTION</th>
<th>CATEGORIE</th>
<th>UNITE</th> 
</thead>
<?php 
$querylist =$db->query("SELECT
  `fournisseurs`.`id_fournisseurs`, `articles`.`libelleproduit`,
  `articles`.`description`, `categorie`.`categorie`, `unite`.`unite`
FROM
  `fournisseurs` INNER JOIN
  `mouvement` ON `fournisseurs`.`id_fournisseurs` = `mouvement`.`id_fournisseur`
  INNER JOIN
  `detail_mouvement` ON `mouvement`.`id_mouvement` =
    `detail_mouvement`.`id_mouvement` INNER JOIN
  `articles` ON `articles`.`reference` = `detail_mouvement`.`reference`
  INNER JOIN
  `categorie` ON `categorie`.`id_categorie` = `articles`.`id_categorie`
  INNER JOIN
  `unite` ON `unite`.`id_unite` = `articles`.`id_unite`
WHERE
  `fournisseurs`.`id_fournisseurs` = '".$_POST['id_fournisseurs']."'
GROUP BY
  `articles`.`libelleproduit`, `articles`.`description`,
  `categorie`.`categorie`, `unite`.`unite`");
foreach($querylist as $data) { ?>
<tbody>

<td>  <?php echo $data['libelleproduit']; ?> </td>
<td><?php echo $data['description']; ?></td>
<td><?php echo $data['categorie']; ?></td>
<td><?php echo $data['unite']; ?></td> 
</tbody>
<?php }?>
<tbody>
<tr>
<th colspan="7"> <?php echo $querylist ->rowcount(); ?> fournisseurs enregistr&eacute;s</th>
</tr>
</tbody>

</table>
</div> 
</div>
</div>
</body>
</html>
