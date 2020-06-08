<?php session_start();
require_once ('function.php');
connexiondb();

$errors='';

//testanneereliquat();
if($_SESSION['varid_etsouservice']=="")
{
    $_SESSION['errors'] = "Vous devez vous connécter ! ";
    header("location:../index.php");
}

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
    <?php require_once  ("layout.php") ?>
    <div class="row">
        <div id="menu" class="col-md-2">

            <?php require_once ("menu.php")?>

        </div>
        <div id="content" class="col-md-10">

            <div id="message" class="col-md-12">
                <div class="login-social-link centered">
                    <?php
                    if(array_key_exists('errors', $_SESSION)){
                        echo '<div class="alert alert-danger">'.$_SESSION['errors'].'</div>';
                    }else{

                    }
                    unset($_SESSION['errors']);
                    ?>

                </div>
            </div>

            <div id="container" class="col-md-12">

                <form class="formreliquat" method="post" action="codeajoutreliquat.php">
                    <div class="form-row col-md-10">


                        <div class="form-group col-md-6">

                            <label for="id_etsouservice" class="form-control-label">Personnel Interne :</label>
                            <select id="id_etsouservice" class="form-control"  onchange="showUser1(this.value)">
                                <?php
                                $data = getEtsouService();
                                foreach ($data as $value) {  ?>
                                    <option value="<?php echo $value['id_etsouservice'] ?>"><?php echo $value['etsouservice'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_dettache" class="form-control-label">Personnel detaché :</label>
                            <select id="id_dettache" class="form-control"  onchange="showUser2(this.value)">
                                <?php
                                $data = getDetache();
                                foreach ($data as $value) {  ?>
                                    <option value="<?php echo $value['id_dettache'] ?>"><?php echo $value['dettache'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div id="txtHint" class="form-group">

                        </div>


                        <div class="form-group col-md-4">
                            <label for="nbrReliquat" class="col-form-label">Nbr Reliquat :</label>
                            <input type="text" required class="form-control" name="nbrReliquat">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="anneereliquat" class="col-form-label">Année :</label>
                            <input type="text" required  class="form-control" name="anneereliquat">
                        </div>

                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" required type="checkbox" name="checkbox" > j'accepte
                                </label>
                                <button type="submit" name="enregistrer" class="btn btn-primary" ><i class="fa fa-desktop"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </div>

    <hr>

   <?php require_once ("footer.php") ?>
</div>

<script src="rootfolder/assets/js/jquery-3.1.0.js" type="text/javascript"></script>
<script src="rootfolder/js/CongeJavaScript.js"></script>
</body>
</html>
