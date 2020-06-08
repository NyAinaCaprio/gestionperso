<?php session_start(); 
if($_SESSION['motdepasse']==""){
header('location:index.php');
}
include('connexion.php');

?>
<!DOCTYPE html >
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Ecmag - Etablissement Central des Matériels Téchnique</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <link href="../bootstrap/css/animate.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="assets/js/jquery-3.1.0.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js" type="text/javascript"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"  type="text/javascript"></script>
    <script src="assets/js/monjavasstock.js" type="text/javascript"></script>

</head>
<body  onLoad="demarrage()" >
<form class="monformajoutarticle" >
    <div id="wrapper">
        <div class=" navbar navbar-inverse navbar-fixed-top">
            
            <div class="adjust-nav ">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;DIA - Ecmag</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Bienvenue ! </a></li>
                        <li><a href="#"><?php echo $_SESSION["login"] ?> </a></li>
                        <li><a href="../index.php" class="btn btn-info">Déconnexion</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back"></li>


						<li>
                        <a href="acceuil.php"><i class="fa fa-desktop "></i>Acceuil</a>
						</li>
						<li>
                        <a href="entreenouveauarticles.php" ><i class="fa fa-asterisk"></i>Entrée Nouveau Article</a>
						</li>
                    <li>
                        <a href="sortiearticles.php" ><i class="fa fa-edit "></i>Sortie article</a>	
					</li>

                    <li>
                        <a href="etatdestock.php" ><i class="fa fa-table "></i>ETAT DE STOCK</a>
                    </li>
                    <li>
                        <a href="fichedestock.php"><i class="fa fa-edit "></i>FICHE DE STOCK</a>
                    </li>


                    <li>
                        <a href="sauvegarde.php"><i class="fa fa-sitemap "></i>Sauvegarde</a>
                        
                    </li>
                    <li>
                        <a href="traitementfinperiode.php"><i class="fa fa-qrcode "></i>Traitement fin periode</a>
                    </li>
                    <li>
                        <a href="fournisseurs.php"><i class="fa fa-bar-chart-o"></i>Fournisseurs</a>
                    </li>

                    <li>
                        <a href="etsouservice.php"><i class="fa fa-edit "></i>ETS - Service - Corps</a>
                    </li>

                </ul>

            </div>
		
		
		
					
					
        </nav>
        <!-- /. NAV SIDE  -->
<div id="page-wrapper">


<div id="page-inner"> 

        <div class="btn_search pull-right">
        <input id="link-search" value="Nouveau article" onClick="affichefenetrenouveau();" type="button">
        <input id="link-search-reset" value="Detail entrée" onClick="affichefenetredetailentree();" type="button">
        <input id="consultentree" value="Consultation entrée" onClick="consultationentree();" type="button">
        </div>


<div class="entetedepage"></div>
	
<hr />


<div id="msgerreur"> </div>




<div class="contenu"  >
</div>
                        
                  
</div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div >
    

</form>


</body>
</html>
