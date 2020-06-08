<div class="row">
	<div class="col-sm-8">
		<?php foreach (\App\Tables\Courrier::getLast() as $datas): ?>
			<!-- solition pour l'url on va creer une class article -->
			<h4><a href="<?php echo $datas->url ?>"> <?php echo $datas->id ?> <?php echo $datas->objet_courrier ?></a> </h4>
			<P><em><?php echo $datas->classement ?> </em>	</P>
			<p> <?php echo $datas->extrait ?> </p>

		<?php endforeach	 ?>
	</div>
	<div class="col-sm-4">
		<h4>Liste des Classements</h4>
		<ul>
			<?php foreach (\App\Tables\Classement::all() as $data):  ?>
				<!-- il faut creer une class parent pour cet attribut url  -->
			<li><a href="<?php echo $data->url ?>"><?php echo $data->classement ?>  </a></li>
			<?php endforeach ?>
		</ul>
	</div>
</div>


