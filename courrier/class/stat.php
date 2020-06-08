<div class="container">
	<div class="col-md-12 text text-danger text-center">
		<h2>STATISTIQUE DES COURRIERS ENTRANT</h2>
	</div>
</div>

<hr>
<div class="col-md-12">
<div class="row">
	<?php $var = statistique();  ?>
	<?php foreach ($var as $value): ?>
	<div class="form-group col-md-6" >
		<label for="numrefcourrier" ><h2><?php echo $value['type'] ?> : </h2><span class='text text-success'><?php echo $value['nombre'] ?></span></label>
		<div class="progress">
			<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $value['nombre'] ?>%;" aria-valuenow="<?php echo $value['nombre'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $value['pourc'] ?> %</div>
		</div>
	</div>
	<?php endforeach ?>
</div>
   
</div>