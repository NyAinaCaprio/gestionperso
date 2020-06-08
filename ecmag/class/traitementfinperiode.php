<?php 
require "function.php";
connexiondb();
//demarragetraitement()

?>
 <div class="col-md-12">

    <div class="col-md-3">
        <a href="index.php?p=addInventaire" class='btn btn-primary'>Créer inventaire</a>
    </div>
 </div>

    <div class="col-md-12">
    <h4>Inventaire par date :</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>TITRE INVENTAIRE</th>
                <th>DATE</th>
                <th>EFFECTUE PAR</th>
                <th> LE</th>

            </thead>
        <?php 
        $query = getAllTitreInventaire();

         foreach($query as $data) { ?>
        <tbody>

        <td><a href="#" class="consultinventaire" data-id_titre_inventaire="<?php echo $data['id_titre_inventaire'] ?>" title="CONSULTER" > <?php echo $data['titre_inventaire']; ?></a></td>
        <td><?php echo $data['date']; ?></td>
        <td><?php echo $data['saisipar']; ?></td>
        <td><?php echo $data['saisile']; ?></td>
        </tbody>
        <?php }?>
        
        <tbody>
            <tr>
            <th colspan="7"> <?php echo $query->rowcount(); ?> Enregistrement(s)</th>
            </tr>
        </tbody>

        </table>
    </div> 
 
 