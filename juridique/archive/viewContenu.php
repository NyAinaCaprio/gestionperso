<?php
require_once ('function.php');
connexiondb();

$_SESSION['id']=$_GET['id_contenu'];
$data = getContenuByID($_GET['id_contenu']);
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
    <link href="../themes/images/ico/favicon.png" rel="shortcut icon">
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

<script type="text/javascript" src="../bootstrap/js/jquery-1.12.4.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/juridique.js" type="text/javascript"></script>
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
            <?php require_once('entetedepage.php') ?>
        </div>
        <!-- End Top Menu -->
    </div>
</div>
<form method="post" action="codemodifcontenu.php" enctype="multipart/form-data">
<div id="content">
    <div class="container background-white">
        <div class="row margin-vert-30">
            <!-- Main Column -->
            <div class="col-md-12">
                <!-- Main Content -->
                <div class="headline">
                    <h2 class="margin-bottom-20">Formulaire de Consultation</h2>
                </div>



                <div class="container ">
                    <!-- Blog Item Header -->

                    <div class="col-md-12">
                        <!-- Title -->
                        <h5>
                            <p>
                                <?php echo $data['projet'].' N°: '; echo $data['numero'].' du '; echo  $data ['date']?></p>
                        </h5>
                        <div class="blog-post-details-item blog-post-details-item-left

blog-post-details-tags">
                            <a href="#"><?php echo $data['type'] ?></a>
                        </div>

                        <div class="blog">

                            <div class="col-md-7">
                                <p> <?php echo $data['porte'] ?></p>
                                <!--<a href="#" class="btn btn-primary">
                                    Details
                                    <i class="icon-chevron-right readmore-icon"></i>
                                </a>-->
                                <!-- End Read More -->
                            </div>

                        </div>
                    </div>
                    <p> Observation : <?php echo $data['observation'] ?></p>

                    <p><a target="_blank" href="<?php echo $data['lien'] ?>">Redirection vers la page </a>  </p>

                 <p>

                    <?php $donnees = getAllDossier($_GET['id_contenu']);

                    $nomdossier = getProjetByID($data['id_projet']);

                    foreach ($donnees as $myDossier) {

                        ?>

                    <img  src="dossier/<?php echo $nomdossier['projet'] ?>/<?php echo $myDossier['nomdossier'] ?>" width="140" height="140" /><a href="#" class="deleteimage" data-id="<?php echo $myDossier['id']   ?>"><i class="fa fa-trash-o"></i></a>
                    <?php }?>
                 </p>


                    <a class="btn btn-primary" href="editContenu.php?id_contenu=<?php echo $data['id_contenu']  ?>"><i class="fa fa-pencil-square-o fa-1x"></i> Modifier</a>
                    <a class="btn btn-danger" href="deleteContenu.php?id_contenu=<?php echo $data['id_contenu'] ?>"><i class="fa fa-trash-o fa-1x"></i> Supprimer</a>

                </div>



            </div>

        </div>
    </div>
</div>
</form>
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