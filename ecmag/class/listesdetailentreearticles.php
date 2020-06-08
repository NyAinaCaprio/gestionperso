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
<div class="panel panel-warning">
<div class="panel-heading">
<h4> Liste detail entrée article</h4> 
</div>
<div class="panel-body"></div>
<div class="panel-footer">

<div class="overflow">

<table class="table table-striped table-bordered table-hover">
<thead>

<th>Désignation</th>
<th>Unité</th>
<th> Date entrée</th>
<th>Qté entrée</th>
<th>Bon de mouvement N° </th>
<th>Observation</th>
</thead>
<?php 
$query =$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `detail_entree`.`date_entree`, `detail_entree`.`quantite_entree`,
  `detail_entree`.`observation`, `detail_entree`.`bmouv`
FROM
  `articles` INNER JOIN
  `detail_entree` ON `detail_entree`.`code_article` = `articles`.`code_article`");
foreach($query as $data) { ?>
<tbody>

<td><?php echo $data['designation']; ?></td>
<td><?php echo $data['unite']; ?></td>
<td><?php echo $data['date_entree']; ?></td>
<td><?php echo $data['quantite_entree']; ?></td>
<td><?php echo $data['bmouv']; ?></td>
<td><?php echo $data['observation']; ?></td>
</tbody>
<?php }?>
</table>
</div> 
</div>
</div>
</div>
</body>
</html>
