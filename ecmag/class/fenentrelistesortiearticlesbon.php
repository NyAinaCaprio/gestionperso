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
<div class="panel panel-primary">
<div class="panel-heading">
<h4> Bon des articles  </h4> 
</div>
<div class="panel-body"></div>
<div class="panel-footer">

<div class="overflow">

<table class="table table-striped table-bordered table-hover">
<thead>

<th>Désignation</th>
<th>Unité</th>
<th>Date sortie</th>
<th> Qté sortie</th>
<th> Type</th>
<th>Bon de mouvement N°</th>
<th>Etat</th>
<th>Bénéficiaire</th>	
<th>Date retour</th> 
 
<th></th>	
</thead>
<?php 
$query =$db->query("SELECT
  `articles`.`code_article`, `articles`.`designation`, `articles`.`unite`,
  `detail_sortie_bon`.`date_sortie`, `detail_sortie_bon`.`quantite_sortie`,
  `detail_sortie_bon`.`typesortie`, `detail_sortie_bon`.`bmouv`,
  `detail_sortie_bon`.`etat`, `etsouservice`.`etsouservice`,
  `detail_sortie_bon`.`id_sortie`, `detail_sortie_bon`.`date_retour`
FROM
  `articles` INNER JOIN
  `detail_sortie_bon` ON `detail_sortie_bon`.`code_article` =
    `articles`.`code_article` INNER JOIN
  `etsouservice` ON `etsouservice`.`id_etsouservice` =
    `detail_sortie_bon`.`etsouserviceoucorps`");
foreach($query as $data) { ?>
<tbody>

<td><?php echo $data['designation']; ?></td>
<td><?php echo $data['unite']; ?></td>
<td><?php echo $data['date_sortie']; ?></td>
<td><?php echo $data['quantite_sortie']; ?></td>
<td><?php echo $data['typesortie']; ?></td>
<td><?php echo $data['bmouv']; ?></td>
<td><?php echo $data['etat']; ?></td>
<td><?php echo $data['etsouservice']; ?></td>
<td><?php echo $data['date_retour']; ?></td>
 
<td>
 
<a href="#" class="retourbonarticle" title="Valider le retour" data-id_sortie="<?php echo $data['id_sortie'];?>"><i class="fa fa-asterisk fa-1x"></i></a></td>
</tbody>
<?php }?>
</table>
</div> 
</div>
</div>
</div>
</body>
</html>
