<?php 
$var = getCourrierById($_GET['id'])->fetch();
$type = getTypeCourrier($var->id_type_courrier)->fetch();
$class = getClassementById($var->id_classement)->fetch();

$degre = getDegreById($var->id_degre)->fetch();

 
 ?>
<div class="col-md-8">
	<h5 class="card-title">Aperçu du message scané</h5>
	<img src="public/courrierImage/<?php echo $var->filename ?>" class="card-img-top" alt="...">
</div>
<div class="col-md-4">
	<h5 class="card-title">Spécificité</h5>
	<ul>
		<li><div><?php echo $type->type ?></div></li>
		<li><div><?php echo $class->classement ?></div></li>
		<li><div><?php echo $degre->degre ?></div></li>
	</ul>
</div>
<div class="col-md-12">

<table class="table table-striped">
	<thead>
		<th>Autorité Origine</th>
		<th>Référence</th>
		<th>Objet</th>
		<th>Remarque</th>
	</thead>
	<tbody>
		<td><?php echo utf8_encode( $var->autorite_origine) ?></td>
		<td><?php echo utf8_encode( $var->numrefcourrier) ?></td>
		<td><?php echo utf8_encode( $var->objet_courrier) ?></td>
		<td><?php echo utf8_encode( $var->remarque) ?></td>
	</tbody>
</table>
 <div class="col-md-12">
 	<a class='btn btn-danger' href="class/delete.php?id=<?php echo $var->id ?>">Delete</a>
 </div>
</div>


