
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Ecmag - Etablissement Central des Matériels Téchnique</title>
<!-- BOOTSTRAP STYLES-->
 
<body>
<div class=" navbar navbar-inverse navbar-fixed-top">

    <div class="adjust-nav ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>DIA - Ecmag </a>
        </div>
        <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Bienvenue ! </a></li>
                <li><a href="#"><?php echo $_SESSION['login'] ?></a></li>
                <li><a href="acces/index.php" class="btn btn-info">Déconnexion</a></li>
            </ul>
        </div>

    </div>
</div>
<div id="wrapper">
 <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center user-image-back">

            </li>


            <li>
                <a href="index.php?p=home"><i class="fa fa-desktop "></i>Acceuil</a>
            </li>


            <li>
                <a href="index.php?p=etatdestock" ><i class="fa fa-table "></i>ETAT DE STOCK</a>
            </li>
            <li>
                <a href="index.php?p=fichedestock"><i class="fa fa-edit "></i>FICHE DE STOCK</a>
            </li>

<!-- 
            <li>
                <a href="index.php?p=bonetdotation"><i class="fa fa-sitemap "></i>BON - DOTATION</a>

            </li> -->
            <li>
                <a href="index.php?p=traitementfinperiode"><i class="fa fa-qrcode "></i> Inventaire</a>
            </li>
            <li>
                <a href="index.php?p=consultation"><i class="fa fa-qrcode "></i>consultation</a>
            </li>
            <li>
                <a href="index.php?p=fournisseurs"><i class="fa fa-bar-chart-o"></i>Fournisseurs</a>
            </li>

            <li>
                <a href="index.php?p=DON"> <i class="fa fa-share"></i> Mouvement<span class="fa arrow"></span></a>
             </li>
 


        </ul>

    </div>
</nav>
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="contenu"  > <?php echo $contenu ?>  </div>
            

            <div id="msgerreur">  </div>




        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>


 
</body>
</html>
