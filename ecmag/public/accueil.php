<?php 
require 'class/function.php';
connexiondb();
 ?>
<p><a class="btn btn-primary" href="index.php?p=add">Ajout nouveau article</a> </p> 
<div class="col-md-3">
    LISTE DE TOUS LES ARTICLES
</div>
                <?php
                $data= getArticle();

                echo $data->rowCount() ?> Articles.
<table class="table table-bordered ">
    <thead>
        <th>Référence</th>
        <th>Libelle Article</th>
        <th>Categorie</th>
        <th>Unite</th>
        <th>Saisi le</th>
    </thead>

<?php

foreach ($data as $donnees)  {?>
<tbody>
    <td><?php echo utf8_encode( $donnees['reference']) ?></td>
    <td><?php echo utf8_encode($donnees['libelleproduit']) ?></td>
    <td><?php
    $cat = getAllCategorieByID($donnees['id_categorie']);
    echo utf8_encode($cat['categorie'])
    ?>
    </td>
    <td><?php
    $uni = getAllUniteByUnite($donnees['id_unite']);
    echo utf8_encode($uni['unite']) ?></td>
    <td><?php echo utf8_encode($donnees['saisile']) ?></td>

</tbody>
<?php } ?>
</table>
