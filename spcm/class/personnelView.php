<?php 
//var_dump($_SESSION['varidcivil']);
$_SESSION['varidcivil'] = $_GET['id_civil'];
$civil = getListCivil($_GET['id_civil'])->fetch();

//$deco_list = select_deco();
//$select_ServDet = SelectBox_affect_Succ();
$_SESSION['varidcivil'] = $_GET['id_civil'];
$etatdeservice= getEtatdeService($_SESSION['varidcivil'])->fetch();
$conjoint = getConjoint($_SESSION['varidcivil'])->fetch();
$avancements = getAvanSucc($_SESSION['varidcivil']);
$enfant = getEnfant($_SESSION['varidcivil']);
$decoration = getDecoDetail($_SESSION['varidcivil']);
$affect = getAffecSucc($_SESSION['varidcivil']);  
$conge = getConge($_SESSION['varidcivil']);
$info = getInfo($_SESSION['varidcivil'])->fetch(); 
$langue = getLinguistique($_SESSION['varidcivil'])->fetch();
$ecole = getEcoleFormation($_SESSION['varidcivil']);
$particulier = getAptiPart($_SESSION['varidcivil'])->fetch();

?>
<div class="row">
	<div class="col-md-12">
		<?php if ( array_key_exists('message', $_SESSION)) : ?>
		<ul>
			<?php foreach ($_SESSION['message'] as $key => $messages) :   ?>
			<li>
				<div class='alert alert-<?php echo $key ?>'>
	            <?php echo $messages ?>
	        	</div>
	    	</li>
	    <?php endforeach ?>
		</ul>
		<?php endif ?>
		<?php unset($_SESSION['message']) ?>
		<div class="box">
			<div class="box-header with-border">
	<!-- Main content -->
				<div class="row">
					<div id='centre' class="box-header with-border">
						<div class="col-md-12">
						<!-- Default box -->
						<div class="box box-solid box-default">
							<div class="box-header">
								<h3 class=""> Fiche personnel civil </h3>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5">
										<h3>Detail Personnel <a href="index.php?p=editetatcivil&id_civil=<?php echo $civil->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></h3>
										<div class="col">Nom & Prénoms : <b><?php echo $civil->nomprenom ?></b> </div>
										<div class="col">Catégorie : <?php echo $civil->categorie_civil ?> </div>
										<div class="col">Service ou Ets : <?php echo $civil->etsouservice ?> </div>
										<div class="col">Détachement :  <?php echo $civil->dettache ?> </div>
										<div class="col">Sexe : <?php echo $civil->sexe ?></div>
										<div class="col">Date de naissance : <?php echo $civil->datenaisse ?></div>
										<div class="col">lieu de naissance : <?php echo $civil->lieudenaiss	 ?></div>
										<div class="col">Cin : <?php echo $civil->cin ?></div>
										<div class="col">Délivré le : <?php echo $civil->delivrele ?></div>
										<div class="col">à : <?php echo $civil->a ?></div>
										<div class="col">Adresse actuelle : <?php echo $civil->adresseactuelle ?></div>
										<div class="col">Mail : <?php echo $civil->mail ?></div>
										<div class="col">Situation Matr. : <?php echo $civil->situationmatrimonial ?></div>
										<div class="col">Groupe sanguin: <?php echo $civil->groupesanguin ?></div>
										<div class="col">Groupe ethnique: <?php echo $civil->groupeethnique ?></div>
									 	<div class="col">Religion : <?php echo $civil->religion ?> </div>
										<div class="col">Fonction : <?php echo $civil->fonction ?></div>
										<div class="col">Téléphone : <?php echo $civil->telephone ?></div>
										<div class="col">Date retraite probable : <?php echo $civil->retraite	 ?></div>
									</div>	
									<div class="col-md-4">
										<h3>Etatde Service</h3>
										<div class="col">Affectiona actuelle : <?php echo $etatdeservice->affectionactuelle ?></div>
										<div class="col">Direction : <?php echo $etatdeservice->direction ?> </div>
										<div class="col">Matricule : <?php echo $etatdeservice->matricule ?></div>
										<div class="col">Date de recrutement : <?php echo $etatdeservice->datederecrutement	 ?></div>
										<div class="col">Indice : <?php echo $etatdeservice->indice ?></div>
										<div class="col">Interruptiondu  : <?php if ($etatdeservice->interruptiondu!='0000-00-00'): echo $etatdeservice->interruptiondu; ?> <?php endif  ?></div>
										<div class="col">Au : <?php if ($etatdeservice->au!='0000-00-00'): echo $etatdeservice->au; ?> <?php endif  ?></div>
									</div>
									<div class="col-md-3">
										<h3>Photo</h3>
										<img src="public/personnelImage/<?php echo $civil->photo ?>" class="user-image" width="150px" height="auto" />
									</div>
								</div>
								<!-- Fin -->
								<div class="col-md-12">
									<div class="col-md-3">
										<h3>Conjoint(e)</h3>
										<div class="col">Nom et Prénom : <?php if (isset($conjoint->nomprenom)): echo $conjoint->nomprenom?> <?php endif ?></div>
										<div class="col">Date de naissance :  <?php if (isset($conjoint->datenaissance)): echo $conjoint->datenaissance ?> <?php endif ?></div>
										<div class="col">Lieu de naissance : <?php if (isset($conjoint->lieunaissance)): echo $conjoint->lieunaissance ?> <?php endif ?></div>
										<div class="col">Date mariage : <?php if (isset($conjoint->datemarriage)): echo $conjoint->datemarriage ?> <?php endif ?></div>
									</div>
								<div class="col-md-3">
									<h3>Aptitude informatique</h3>
									<div class="col">Buréautique :  <?php if (isset($info->bureautique)): echo $info->bureautique ?><?php endif ?></div>
									<div class="col">Autres : <?php if (isset($info->autres)): echo $info->autres ?><?php endif ?></div>
								</div>
								<div class="col-md-3">
									<h3>Aptitude particulier</h3>
									<div class="col">Permis : <?php if (isset($particulier->permis)): ?><?php echo $particulier->permis ?> <?php endif ?> </div>
									<div class="col">Délivré le : <?php if (isset($particulier->delivrele)): ?><?php echo $particulier->delivrele ?> <?php endif ?> </div>
									<div class="col">à : <?php if (isset($particulier->a)): ?><?php echo $particulier->a ?> <?php endif ?> </div>
									<div class="col">Catégorie : <?php if (isset($particulier->categorie)): ?><?php echo $particulier->categorie ?> <?php endif ?> </div>
									<div class="col">Autres : <?php if (isset($particulier->autres)): ?><?php echo $particulier->autres ?> <?php endif ?> </div>
								</div>
								<div class="col-md-3">
									<h3>Aptitude linguistique</h3>
									<div class="col">Français : <?php if (isset($langue->francais)): ?><?php echo $langue->francais ?> <?php endif ?> </div>
									<div class="col">Anglais : <?php if (isset($langue->anglais)): ?><?php echo $langue->anglais ?> <?php endif ?> </div>
									<div class="col">Autres : <?php if (isset($langue->autres)): ?><?php echo $langue->autres ?> <?php endif ?> </div>
								</div>
							</div>
							<!-- fin -->
							<div class=='col-md-12'>
								<div class='col-md-6'>
									<h3>Avancements successifs  <a href="index.php?p=editavancem&id_civil=<?php echo $civil->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></h3>
									<table class='table-bordered' width='100%'>
									<thead>
										<tr>
											<td>Status</td>
											<td>Référence</td>
											<td>Date effet</td>
										</tr>
									</thead>
									<?php foreach ($avancements as  $data): ?>
									<tr>
										<td><?php echo $data->statut ?></td>
										<td><?php echo $data->reference ?></td>
										<td><?php echo $data->dateeffet ?></td>
									</tr>
										
									<?php endforeach ?>
								</table>
							</div>
							<div class='col-md-6'>
								<h3>Enfants <a href="index.php?p=editenfant&id_civil=<?php echo $civil->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></h3>
								<table class='table-bordered' width='100%'>
									<thead>
										<tr>
											<td>Nom et prénom</td>
											<td>Date de naissance</td>
											<td>Sexe</td>
											<td>Obs</td>
										</tr>
									</thead>
									<?php foreach ($enfant as  $data): ?>
									<tr>
										<td><?php echo $data->nomprenom ?></td>
										<td><?php echo $data->datenaiss ?></td>
										<td><?php echo $data->sexe ?></td>
										<td><?php echo $data->obs ?></td>
									</tr>
										
									<?php endforeach ?>
								</table>
							</div>
							<div class='col-md-6'>
								<h3>Décoration <a href="index.php?p=editdeco&id_civil=<?php echo $civil->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></h3>
								<table class='table-bordered' width='100%'>
									<thead>
										<tr>
											<td>Décoration</td>
											<td>Decret ou arreté</td>
											<td>Année</td>
											<td>Obs.</td>
										</tr>
									</thead>
									<?php foreach ($decoration as  $data): ?>
									<tr>
											
										<td>
										<?php 
										$var = getIntituleDeco($data->numdecorationcivil);
										foreach ($var as $donnee): ?>
											<?php echo $donnee->decoration ?>
										<?php endforeach ?>
										</td>

										<td><?php echo $data->decretouarrete ?></td>
										<td><?php echo $data->annee ?></td>
										<td><?php echo $data->observation ?></td>
									</tr>
										
									<?php endforeach ?>
								</table>
							</div>
							<div class='col-md-6'>
								<h3>Affectation successives <a href="index.php?p=editaffect&id_civil=<?php echo $civil->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></h3>
								<table class='table-bordered' width='100%'>
									<thead>
										<tr>
											<td>Lieu d'affectation</td>
											<td>détachement</td>
											<td>Fonction tenu</td>
											<td>Date effet</td>
										</tr>
									</thead>
									<?php foreach ($affect as  $data): ?>
									<tr>
										<td> <?php echo $data->lieuaffect ?> </td>
										<td><?php echo $data->detachement ?></td>
										<td><?php echo $data->fonctiontenue ?></td>
										<td><?php echo $data->dateeffet ?></td>
									</tr>
										
									<?php endforeach ?>
								</table>
							</div>
							<div class='col-md-6'>
								<h3>Ecole/Formation/Stage  <a href="index.php?p=editecole&id_civil=<?php echo $civil->id_civil ?>"><i class="fa fa-edit fa-1x"></i></a></h3>
								<table class='table-bordered' width='100%'>
									<thead>
										<tr>
											<td>Intitulé</td>
											<td>Etablissement</td>
											<td>Diplôme</td>
											<td>Année</td>
										</tr>
									</thead>
									<?php foreach ($ecole as  $data): ?>
									<tr>
										<td> <?php echo $data->intitule ?> </td>
										<td><?php echo $data->etabli ?></td>
										<td><?php echo $data->diplome ?></td>
										<td><?php echo $data->annee ?></td>
									</tr>
										
									<?php endforeach ?>
								</table>
							</div>
							<div class='col-md-6'>
								<h3>Congé</h3>
								<table class='table-bordered' width='100%'>
									<thead>
										<tr>
											<td>Annee</td>
											<td>Reliquat</td>
											<td>Droit</td>
											<td>Total</td>
										</tr>
									</thead>
									<?php foreach ($conge as  $data): ?>
									<tr>
										<td> <?php echo $data->annee ?> </td>
										<td><?php echo $data->reliquat ?></td>
										<td><?php echo $data->droit ?></td>
										<td><?php echo $data->total ?></td>
									</tr>
										
									<?php endforeach ?>
								</table>
							</div>
						</div>

						<!-- fin -->
					</div>
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>

	<div class='col-md-8'>
		<?php  

			if ($_SESSION['auth']->username === "anja"): ?>
			<a class="btn btn-danger" href="class/supprtout.php?id_civil=<?php echo $_SESSION['varidcivil'] ?>">Supprimer</a> 
		<?php endif ?>
	</div>
</div>


       	    
            	    





 