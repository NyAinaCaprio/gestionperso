<?php  
	$classement = App\Tables\Classement::find($_GET['id']);
		if ($classement === false) {
			App\App::notFound();
			die();
		}
	$courrier = App\Tables\Courrier::getByClassement($_GET['id']);
 

	$class = App\Tables\Classement::all();
 
 ?>
<h2><?php echo $classement->classement ?></h2>
<div class="row">
	<div class="col-sm-8">
		<?php foreach ($courrier as $datas): ?>
			<!-- solition pour l'url on va creer une class article -->
			<h4><a href="<?php echo $datas->url ?>"> <?php echo $datas->objet_courrier ?></a> </h4>
			<P><em><?php echo $datas->classement ?> </em>	</P>
			<p> <?php echo $datas->extrait ?> </p>

		<?php endforeach	 ?>
	</div>
	<div class="col-sm-4">
		<h4>Liste des Classements</h4>
		<ul>
			<?php foreach (\App\Tables\Classement::all() as $data): ?>
				<!-- il faut creer une class parent pour cet attribut url  -->
			<li><a href="<?php echo $data->url ?>"><?php echo $data->classement ?></a></li>
			<?php endforeach ?>
		</ul>
	</div>
</div>

