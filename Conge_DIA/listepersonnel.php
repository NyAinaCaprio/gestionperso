<head>
    <link href="rootfolder/assets/css/font-awesome.css" rel="stylesheet">
</head>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Detail Congé</th>
        <th>Nom et Prénoms</th>
        <th>ETS ou Service</th>
        <th>Fonction</th>
        <th>Catégorie</th>
        <th>Nbr Auto. Absence</th>
    </tr>
    </thead>
    <?php
    require_once ("function.php");
    connexiondb();
    $data = getPersonnelListe($_POST['critere']);
    foreach ($data as $liste) {
    ?>
    <tbody>
    <tr>
        <td><a href="view.php?id_civil=<?php echo $liste['id_civil']?>"><i class="fa fa-edit"></i></a></td>
        <td><?php echo $liste["nomprenom"]?></td>
        <td><?php echo $liste["fonction"]?></td>
        <td><?php echo $liste["etsouservice"]?></td>
        <td><?php echo $liste["categorie_civil"]?></td>
        <td><a href="viewautoabsence.php?id_civil=<?php echo $liste['id_civil']?>"><i class="fa fa-book"></i></a></td>
        <td></td>

    </tr>
    </tbody>
    <?php } ?>

</table>
<div class="row">
    <td class="col-md-12">
        <?php echo $data->rowCount() ?> Enregistrements...
    </td>
</div>