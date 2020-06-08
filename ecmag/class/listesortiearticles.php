<?php session_start();
require 'function.php';
?>
<div>
<div class="panel panel-warning">
<div class="panel-heading">
<h4> Liste sortie d'article</h4> 
</div>
<div class="panel-body"></div>
<div class="panel-footer">

<div class="overflow">

<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Désignation</th>
<th>Unité</th>
<th> Date sortie</th>
<th>Qté sortie</th>
<th>Type</th>
<th>Béneficiaire</th>
<th>Bon de mouvement N°</th>
<th>Observation</th>
</thead>
<?php 
$query =$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `detail_sortie`.`date_sortie`, `detail_sortie`.`quantite_sortie`,
  `detail_sortie`.`observation`, `detail_sortie`.`typesortie`,
  `detail_sortie`.`etsouserviceoucorps`, `etsouservice`.`id_etsouservice`,
  `etsouservice`.`etsouservice`, `detail_sortie`.`bmouv`
FROM
  `articles` INNER JOIN
  `detail_sortie` ON `detail_sortie`.`code_article` = `articles`.`code_article`
  INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie`.`etsouserviceoucorps`");
foreach($query as $data) { ?>
<tbody>
<tr>

<td><?php echo $data['designation']; ?></td>
<td><?php echo $data['unite']; ?></td>
<td><?php echo $data['date_sortie']; ?></td>
<td><?php echo $data['quantite_sortie']; ?></td>
<td><?php echo $data['typesortie']; ?></td>
<td><?php echo $data['etsouservice']; ?></td>
<td><?php echo $data['bmouv']; ?></td>
<td><?php echo $data['observation']; ?></td>
</tbody>
<?php }?>
</table>
</div> 
</div>
</div>
</div>