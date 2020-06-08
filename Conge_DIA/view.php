<?php session_start();
require_once ('function.php');
connexiondb();
//
$errors='';

//testanneereliquat();
if($_SESSION['varid_etsouservice']=="")
{
    $_SESSION['errors'] = "Vous devez vous connécter ! ";
    header("location:../index.php");
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion de congé : Personnel Civil de la DIA</title>

    <link rel="icon" type="image/x-icon" href="rootfolder/themes/images/ico/favicon.png" />
    <link rel="stylesheet" href="rootfolder/assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="rootfolder/assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="rootfolder/assets/css/animate.css" rel="stylesheet">

</head>

<body>
<div class="col-md-12">
    <?php require_once ("layout.php")?>

    <div class="row">
        <div id="menu" class="col-md-2">
            <?php require_once ("menu.php")?>
        </div>

        <div id="content" class="col-md-10">
            <div id="container" class="col-md-12">

                    <p><?php $perso = getPersonnel($_GET['id_civil']);
                    echo $perso['nomprenom'];
                        ?></p>

                    <hr>
                <h3>Regroupement par Année :</h3>
                <hr>
            <p class="well ">Reliquat de l'année : <?php echo getMinAnneeReliquat($_GET['id_civil'])?> <?php ?></p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Année </th>
                    <th>Normal </th>
                    <th>Exeptionnel </th>
                    <th>Reliquat </th>
                </tr>
                </thead>
                <?php

                $data = getReliquatGroupByYear($_GET['id_civil']) ;
                foreach ($data as $liste){ ?>
                <tbody>
                <tr>
                    <td><?php echo $liste['annee'] ?></td>
                    <td><?php echo $liste['total'] ?></td>
                    <td><?php  echo sumExceptByID($liste['id_civil'],$liste['annee']); ?></td>
                    <td><?php
                        $p = $db->query("Select reliquat from reliquat WHERE id_civil = '".$liste['id_civil']."' AND anneereliquat = '".$liste['annee']."'");
                        foreach ($p as $donnee){
                            echo $donnee['reliquat'];
                        }
                        ?></td>
                </tr>
                </tbody>
                <?php }?>
            </table>

                <p> Reliquat en Cours : <?php echo reliquatEncours($_GET['id_civil']); ?></p>
                <!------------->
        <h3>Detail Congé </h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Date de depart</th>
                     <th>Nbr de jour</th>
                    <th>Type</th>
                    <th>Chef de service</th>
                    <th>Chef Spcm</th>
                    <th>Chef de division</th>
                </tr>
                </thead>
                <?php
                $data = $db->query("select * from conge where id_civil = '".$_GET['id_civil']."'");
                foreach ($data as $donnee) {
                ?>
                <tbody>
                <tr>
                    <td><?php echo $donnee['datededepart']?></td>
                     <td><?php echo $donnee['nbrjour']?></td>
                    <td><?php
                         if ($donnee['typeconge']==1){
                             echo "Normal";
                         }else{
                             echo "Excéptionnel";
                         } ?>
                    </td>
                    <td><?php if( $donnee['chefservice']==1)
                        {
                            echo "Valider";
                        }
                        ?></td>
                    <td><?php if($donnee['chefspcm']==1)
                        {
                            echo "Valider";
                        }?></td>
                    <td><?php if($donnee['chefdiv']==1)
                        {
                            echo "Valider";
                        }?></td>
                </tr>
                </tbody>
                <?php } ?>
            </table>

            </div>

            <div id="message" class="col-md-12">

            </div>

        </div>

    </div>

    <hr>

<?php require_once ("footer.php")?>
</div>

<script src="rootfolder/assets/js/jquery-3.1.0.js" type="text/javascript"></script>
<script src="rootfolder/js/CongeJavaScript.js"></script>
</body>
</html>