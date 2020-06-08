<div class="list-group-item list-group-item-primary">
	<h2>Derniers enregistrements </h2>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<td>Nom et Prénom(s)</td>
			<td>Date</td>
			<td>Heure de départ </td>
			<td>Heure de retour </td>
		</tr>
	</thead>
	<tbody>
		<?php 
			$var = lastAutoAbsence();
		 ?>
		<?php foreach ($var as $data): ?>
		<tr>
			<?php $var = getListcivil($data->id_civil) ?>
			<?php foreach ($var as $value): ?>
				<td><?php echo $value->nomprenom ?> </td>
			<?php endforeach ?>
			<td><?php echo $data->date ?> </td>
			<td><?php echo $data->heuredepart ?> </td>
			<td><?php echo $data->heureretour ?> </td>
		</tr>	
		<?php endforeach ?>
	</tbody>
</table>
				