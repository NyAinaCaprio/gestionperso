<?php session_start();
require_once ("function.php");
connexiondb();
?>
<h2>Mouvement </h2>
<div class="panel panel-success">

    <div class="panel-heading">

        Formulaire d'ajout

    </div>

    <div class="panel-body">
        <div class="col-md-12">
            <div class="col-md-4">
                <label for="reference">Référence : </label>
                <select required id="reference" class="form-control">
                    <option value=""></option >
                    <?php
                    $art = getArticle();
                    foreach ($art as $data)
                    {
                        ?>
                        <option value="<?php echo $data['reference']  ?>"><?php echo $data['libelleproduit']  ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="id_mouvement">Type de mouvement :</label>
                <select required id="id_mouvement" class="form-control">
                    <option value=""></option >
                    <?php
                    $typ = getAllType();
                    foreach ($typ as $data)
                    {
                        ?>
                        <option value="<?php echo $data['id_type']  ?>"><?php echo $data['type']  ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="quantite">Quantité :</label>
                <input id="quantite" class="form-control" type="number" required >
            </div>

            <div class="col-md-4">
                <label for="etat">Etat :</label>
                <select required id="etat" class="form-control">
                    <option value="En attente de retour"> En Attente de retour</option >
                    <option value="Régle"> Réglé</option >
                </select>
            </div>

            <div class="col-md-12">
                <label for="observation">Observation :</label>
                <textarea class="form-control" id="observation"></textarea>
            </div>

        </div>


    </div>

    <div class="panel-footer">

        <div>

            <button  type="button" onClick="enregistrerdetailentreearticle()" class="btn btn-danger" > <i class="fa fa-save fa-2x"></i>  Enregistrer</button>

        </div>

    </div>

</div>
