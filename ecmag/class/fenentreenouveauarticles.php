<?php 
require 'function.php';
connexiondb();
if (isset($_POST['enregistrer'])) {

$sth = $db->prepare('INSERT INTO articles SET 
reference= "'.$_POST['reference'].'",   
libelleproduit= "'.$_POST['libelleproduit'].'",
description= "'.$_POST['description'].'",
id_categorie= "'.$_POST['id_categorie'].'",
id_unite= "'.$_POST['id_unite'].'",
codebarrefournisseur = "'.$_POST['codebarrefrs'].'",
codebarreinterne= "'.$_POST['codebarreinterne'].'",
stockalerte= "'.$_POST['stockalert'].'",
saisipar= "'.$_POST['saisipar'].'",
saisile= "'.$_POST['saisile'].'"');

$sth->execute();
 

header('location:index.php?p=home');
}
?>

<form action = '#' method = 'POST'>
 <h4>Nouveau Articles à enregistrer</h4>


    <div class="panel panel-primary">
        <div class="panel-heading">
            Formulaire d'ajout
        </div>

        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-4">
                    <label for="reference">Référence :  </label>
                    <input name="reference" class="form-control" required  >
                </div>

                <div class="col-md-4">
                    <label for="libelleproduit">Libéllé produit  : </label>
                    <input name="libelleproduit" class="form-control" required   >
                </div>

                <div class="col-md-4">
                    <label for="description">Description  : </label>
                    <input name="description" class="form-control" required >
                </div>

                <div class="col-md-4">
                    <label for="categorie">Categorie : </label>
                    <select required name="id_categorie" class="form-control">
                        <option value=""></option >
                        <?php
                        $cat = getAllCategorie();
                        foreach ($cat as $data)
                        {
                            ?>
                            <option value="<?php echo $data['id_categorie']  ?>"><?php echo $data['categorie']  ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="id_unite">Unité : </label>
                    <select required name="id_unite" class="form-control">
                        <option value=""></option >
                        <?php

                        $unite = getAllUnite();
                        foreach ($unite as $data)
                        {
                        ?>
                        <option value="<?php echo $data['id_unite']  ?>"><?php echo $data['unite']  ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="image">Photo : </label>
                    <input name="image" type="file" class="form-control" >
                </div>

                <div class="col-md-4">
                    <label for="codebarrefrs">Code barre FRS : </label>
                    <input name="codebarrefrs" type="text" class="form-control"      >
                </div>

                <div class="col-md-4">
                    <label for="codebarreinterne">Code barre interne : </label>
                    <input name="codebarreinterne" type="text" class="form-control"  >
                </div>


                <div class="col-md-4">
                    <label for="stockalert">Stock Alerte : </label>
                    <input name="stockalert" class="form-control" required type="text" >
                </div>

                <div class="col-md-4">
                    <label for="saisipar">Saisi Par : </label>
                    <input name="saisipar" class="form-control" required type="text" value="<?php echo $_SESSION['login']?> ">
                </div>

                <div class="col-md-4">
                    <label for="saisile">Saisie le : </label>
                    <input name="saisile" type="date" class="form-control" required value="<?php echo date("Y-m-d")?>">
                </div>

            </div>


        </div>


        <div class="panel-footer">
            <div class=" ">
                <button  type="submit"  class="btn btn-danger" name='enregistrer' > <i class="fa fa-save fa-2x"></i> Enregistrer</button>
            </div>
        </div>

    </div>
</form>

