<?php session_start();
require_once ('function.php');
connexiondb();
//testanneereliquat();
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
            <?php $var = getPersonnel($_GET['id_civil'])
            ?>
             <p><?php echo $var['nomprenom'] ?></p>

            <table class="table table-bordered text-danger">
                <thead>
                <tr>
                    <th>Heure de départ</th>
                    <th>Motif</th>
                    <th>Date</th>
                </tr>
                </thead>
                <?php
                $var = getAllAutoAbsence($_GET['id_civil']);
                foreach ($var as $data){
                ?>
                <tbody>
                <tr>
                    <td><?php echo $data['heuredepart'] ?></td>
                    <td><?php echo $data['motif'] ?></td>
                    <td><?php echo $data['date'] ?></td>
                </tr>
                </tbody>
                <?php }  ?>
            </table>
            <div class="col-md-12">
                <?php echo $var->rowCount() ?> Enregistrement(s)...
            </div>

            <div id="container">
                
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