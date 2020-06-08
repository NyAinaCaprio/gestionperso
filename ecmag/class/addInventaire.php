<?php 
require 'function.php';
connexiondb();
require "codeprepareetatdestock.php";
prepareEtatDeStock();
  
$data = selectAllEtatdeStock();

 
 ?>
<form method ='post' action='class/codeAjoutInventaire.php' enctype="multipart/form-data"> 
<?php

 
 ?> 
<div class='col-md-12'>
    <?php 

    if (array_key_exists('message',$_SESSION)) {
        echo '<p class="btn btn-info">'.$_SESSION['message'].'</p>';
    }
    unset($_SESSION['message']);
     ?> 
</div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            Formulaire d'ajout
        </div>

        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="titre_inventaire">Titre inventaire :  </label>
                    <input name="titre_inventaire" class="form-control" required  >
                </div>

                <div class="col-md-6">
                    <label for="date">Date  : </label>
                    <input value=' <?php echo date('Y:m:d H:m:s') ?> ' type='date' name="date" class="form-control" required   >
                </div>

                <div class="col-md-6">
                    <label for="saisipar">Saisi par  : </label>
                    <input name="saisipar" value=' <?php echo $_SESSION['login'] ?> ' type='text' class="form-control" required >
                </div>
                <div class="col-md-6">
                    <label for="saisile">Saisi le  : </label>
                    <input name="saisile" value=' <?php echo date('Y:m:d H:m:s') ?> ' type='text' class="form-control" required >
                </div>
            </div>
        </div>
    </div>
<?php 

 ?>

<table class="table table-bordered ">
    <thead>
        <th width='10%'>Référence</th>
        <th width='20%'>Libelle Article</th>
        <th width='7%'>Qté Initiale</th>
        <th width='7%'>Qté Entrée</th>
        <th width='7%'>Qté Sortie</th>
        <th width='7%'>Stock Réel</th>
        <th width='7%'>Stock Physique</th>
        <th width='7%'>Ecart</th>
        <th>Observation</th>
    </thead>

<?php

foreach ($data as $donnees)  { ?>
<tbody>
    <td><input type = 'text' name='reference[]' value='<?php echo utf8_encode( $donnees['reference']) ?>' class='form-control'> </td>
    <td><?php 
        $data = article($donnees['reference']) ;
    foreach ($data as $datas) { ?>
     <input type = 'text' name='libelleproduit[]' value='<?php echo utf8_encode( $datas['libelleproduit']) ?>' class='form-control'>    
 
        <?php }?>

</td>
    <td><input type = 'text' name='qteinitiale[]' value='<?php echo $donnees['quantite_initiale'] ?>' class='form-control'>   </td>
    <td> <input type = 'text' name='qteentree[]' value='<?php echo $donnees['quantite_entree'] ?>' class='form-control'>  </td>
    <td> <input type = 'text' name='qtesortie[]' value='<?php echo $donnees['quantite_sortie'] ?>' class='form-control'>  </td>
    <td> <input type = 'text' name='stockfinal[]' value='<?php echo $donnees['StockFinal'] ?>' class='form-control'>  </td>
    <td> <input type='text' name='stockphysique[]' class='form-control'> </td>
    <td> <input type='text' name='ecart[]' class='form-control'> </td>
    <td> <input type='text' name='remarque[]' class='form-control'> </td>
     

</tbody>
<?php } ?>
</table>
<div class="col-md-12">
    <div class="col-md-12">
        <input name='enregistrer' type="submit" class='btn btn-primary' value='Lancer le traitement'>

    </div>
</div>
</form>