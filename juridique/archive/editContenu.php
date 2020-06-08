<?php
require_once ('function.php');
connexiondb();
?>
<!DOCTYPE html>
<html lang="fr">
<!--<![endif]-->
<head>
    <!-- Title -->
    <title>DIA - JURIDIQUE</title>
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,300,400" type="text/css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" type="text/css" rel="stylesheet">
</head>
<body>
<div id="header" style="background-position: 50% 0%; <br />
<b>Notice</b>:  Undefined variable: full_page in <b>C:\xampp\htdocs\bootstrap\html\php\header.php</b> on line <b>46</b><br />
" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="logo">
                <a href="index.php" title="">
                    <img src="assets/img/logo.png" alt="Logo"  width="250" height="120" />
                </a>
            </div>
            <!-- End Logo -->
        </div>
        <!-- Top Menu -->
        <div id="hornav" class="row text-light">
            <?php require_once('entetedepage.php');
            $_SESSION['id_contenu']=$_GET['id_contenu'];

            ?>

        </div>
        <!-- End Top Menu -->
    </div>
</div>

<div id="content">
    <div class="container background-white">
        <div class="row margin-vert-30">
            <!-- Main Column -->
            <div class="col-md-12">
                <!-- Main Content -->
                <div class="headline">
                    <h2 class="margin-bottom-20">Formulaire de modification <?php echo  $_SESSION['id_contenu']?></h2>
                </div>

                <form action="codemodifcontenu.php" method="POST" enctype="multipart/form-data">

                    <label>Projet :</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-4 col-md-offset-0">

                            <select name="id_projet" required="" class="form-control" id="id_projet">
                            <?php

                            $donneeProjet=getAllProjet();
                            $getContenuByID=getContenuByID($_GET['id_contenu']);
                            foreach($donneeProjet as $resDonneeProjet) { ?>
                                    <option <?php  if($resDonneeProjet['id_projet']==$getContenuByID['id_projet']) echo "selected='selected'"; ?> value="<?php echo $resDonneeProjet['id_projet'];?>"><?php echo $resDonneeProjet['projet'];?></option>
                                <?php }?>
                            </select>

                        </div>
                    </div>

                    <label>Type :</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-4 col-md-offset-0">
                            <select name="id_type" required="" class="form-control" id="id_type">
                                <option value=""></option>
                                <?php
                                $donneType =getAllType();
                                foreach($donneType as $resDonneType) { ?>
                                    <option <?php  if($resDonneType['id_type']==$getContenuByID['id_type']) echo "selected='selected'"; ?> value="<?php echo $resDonneType['id_type'];?>"><?php echo $resDonneType['type'];?></option>
                                <?php }?>

                            </select>
                        </div>
                    </div>

                    <label>N° :</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-3 col-md-offset-0">
                            <input class="form-control" required="" type="text" name="numero" value="<?php  echo $getContenuByID['numero']?>">
                        </div>
                    </div>

                    <label>Date:</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-3 col-md-offset-0">
                            <input class="form-control" type="date" required="" name="date" value="<?php  echo $getContenuByID['date']?>">
                        </div>
                    </div>

                    <label>Porté:</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-offset-0">
                            <textarea class="col-md-10" name="porte" required="" ><?php  echo $getContenuByID['porte']?></textarea>
                        </div>
                    </div>

                    <label>Observation:</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-offset-0">
                            <textarea class="col-md-10" name="observation" required=""> <?php  echo $getContenuByID['observation']?></textarea>
                        </div>
                    </div>

                    <label>Lien :</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-4 col-md-offset-0">
                            <input class="form-control" type="text" id="lien" name="lien" value="<?php  echo $getContenuByID['lien']?>">
                        </div>
                    </div>

                    <div class="row margin-bottom-20">
                        <div class="col-md-12">
                            <label>Pèces jointes </label>
                            <input type="file"  name="image[]" id="image" multiple>
                        </div>
                    </div>


                    <p>
                        <button type="submit" class="btn btn-success">Valider la Modification</button>
                    </p>



                </form>
                <!-- End Contact Form -->
                <!-- End Main Content -->
            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<div id="footer" class="background-dark text-light">
    <?php include('pieddepage.php') ?>
</div>
<!-- End Footer -->
<!-- JS -->
<script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
<!-- Isotope - Portfolio Sorting -->
<script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
<!-- Mobile Menu - Slicknav -->
<script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
<!-- Animate on Scroll-->
<script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
<!-- Stellar Parallax -->
<script type="text/javascript" src="assets/js/jquery.stellar.js" charset="utf-8"></script>
<!-- Sticky Div -->
<script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
<!-- Slimbox2-->
<script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
<!-- Modernizr -->
<script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
<!-- End JS -->
</body>
</html>
<!-- === END FOOTER === -->