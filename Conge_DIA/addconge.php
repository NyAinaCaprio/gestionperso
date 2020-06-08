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
    <link rel="stylesheet" href=" ../bootstrap/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="rootfolder/assets/css/animate.css" rel="stylesheet">

</head>

<body>
<div class="col-md-12">

    <?php require_once  ("layout.php") ?>

    <div class="row">
        <div id="menu" class="col-md-2">

            <?php require_once ("menu.php") ?>

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
                <!---------------------->

                <form name="enregistrer" action="code.php" method="post" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="etsouservice">Personnel Interne :</label>
                                <select class="form-control" required id="id_etsouservice" onchange="showUser1(this.value)" >
                                    <?php
                                    require_once ('function.php');
                                    connexiondb();

                                    $etsouservice = getEtsouService();
                                    foreach ($etsouservice as $listeetsouservice) {?>
                                        <option value="<?php echo $listeetsouservice['id_etsouservice']?>"><?php echo $listeetsouservice['etsouservice'] ?> </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_dettache">Personnel détaché :</label>
                                <select class="form-control" required id="id_dettache" onchange="showUser2(this.value)" >
                                    <?php
                                    $detache = getDetache();
                                    foreach ($detache as $listedetache) {?>
                                        <option value="<?php echo $listedetache['id_dettache']?>"><?php echo $listedetache['dettache'] ?> </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div id="txtHint" class="form-group">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nbrjour">Nombre de jour :</label>
                                <input type="text" class="form-control" required id="nbrjour" name="nbrjour" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datededepart">Date de départ :</label>
                                <input  type="text" placeholder="AAAA/MM/JJ" required class="form-control" id="datededepart" name="datededepart" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="motif">Motif :</label>
                                <input  type="text" class="form-control" id="motif" required name="motif" >
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adresse">(Pour en jouir à )Adresse Compete :</label>
                                <input  type="text" class="form-control" id="adresse" name="adresse" >
                            </div>
                        </div>
                    </div>
                    <p >Type de congé : </p>
                    <div class="row">
                        <div class="col-xs-4">
                            <input  type="radio" value="1" name="type"  >
                            <label for="normal">Droit Normal</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="radio" value="2" name="type" >
                            <label for="exceptionnel">Droit Exceptionnel</label>
                        </div>
                    </div>
                    <!---------------->
                    Validé par :

                    <div class="row">
                        <div class="col-xs-4">
                            <input type="checkbox" value="1" name="chefdiv" >
                            <label for="chefdiv">Chef de division</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" value="1" name="chefservice" >
                            <label for="chefservice">Chef de Service</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" value="1" name="chefspcm" >
                            <label for="chefspcm">Chef SPCM de la DIA</label>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <input required type="checkbox" name="valider" >
                            J'accepte
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>

                    </div>

                    <!--<button type="submit" onclick="enregistrerconge()" class="btn btn-success">Enregistrer</button>-->
                </form>

            </div>


<!---            <div class="col-md-12">
                <a class="btn btn-danger" href="#">
                    <i class="fa fa-trash-o fa-lg"></i> Delete</a>
                <a class="btn btn-default btn-sm" href="#">
                    <i class="fa fa-cog"></i> Settings</a>

                <a class="btn btn-lg btn-success" href="#">
                    <i class="fa fa-flag fa-2x pull-left"></i> Font Awesome<br>Version 4.7.0</a>

                <div class="btn-group">
                    <a class="btn btn-default" href="#">
                        <i class="fa fa-align-left" title="Align Left"></i>
                    </a>
                    <a class="btn btn-default" href="#">
                        <i class="fa fa-align-center" title="Align Center"></i>
                    </a>
                    <a class="btn btn-default" href="#">
                        <i class="fa fa-align-right" title="Align Right"></i>
                    </a>
                    <a class="btn btn-default" href="#">
                        <i class="fa fa-align-justify" title="Align Justify"></i>
                    </a>
                </div>

                <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input class="form-control" type="text" placeholder="Email address">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input class="form-control" type="password" placeholder="Password">
                </div>

                <div class="btn-group open">
                    <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> User</a>
                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
                        <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
                        <li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-unlock"></i> Make admin</a></li>
                    </ul>
                </div>
            </div>
------>

        </div>

    </div>

    <hr>

 <?php require_once ("footer.php") ?>
</div>

<script src="rootfolder/assets/js/jquery-3.1.0.js" type="text/javascript"></script>
<script src="rootfolder/js/CongeJavaScript.js"></script>
</body>
</html>
