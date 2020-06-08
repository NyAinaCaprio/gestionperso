
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Site de la DIA - Service S.P.C.M</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css"  href="public/css/animate.css" />

    <link href="public/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="public/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link href="public/css/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap
    <link href="public/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    -->
    <!-- Daterange picker -->
    <link href="public/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="public/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../public/font-awesome-4.3.0/css/font-awesome.min.css">


    <script type="text/javascript" src="public/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="public/js/monjava.js" charset="utf-8" ></script>
    <script type="text/javascript" src="public/js/jquery-ui.js" charset="utf-8" ></script>
    <script type="text/javascript" src="../public/js/monjava.js" charset="utf-8" ></script>

</head>

<body class="skin-blue">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Gestion </b>Personnel</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
    
                    

            <!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown tasks-menu">
            <a href="../home/class/logout.php" class="alert-danger">
                Déconnexion
                <span class="label label-danger"></span>                
            </a>
     
        </li>
          
        <li class="dropdown user user-menu">
           
        </li>
    </ul>   
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="critere" class="critere form-control" placeholder="Search..." >
              <span class="input-group-btn">
                <button type="submit" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->

               <ul class="sidebar-menu">
                <li class="header"> MENU PRINCIPAL</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Option</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?p=add"> <i class="fa fa-clipboard fa-1x"></i> Ajout Personnel</a></li>
                        <li><a href="index.php?p=consult"> <i class="fa fa-dedent fa-1x"></i> Consultation</a></li>
                        <li><a href="index.php?p=deco" ><i class="fa fa-th fa-1x"></i> D. Honorifique</a></li>
                        <li><a href="index.php?p=detail" ><i class="fa fa-caret-square-o-down fa-1x"></i> Detail Effectif</a></li>
                        <li><a href="index.php?p=contact" ><i class="fa fa-flask fa-1x"></i> Contact Personnel</a></li>
                        <li><a href="index.php?p=directeur" ><i class="fa fa-telegram fa-1x"> </i> Ajout Directeur</a></li>
                        <li><a href="../conge/" ><i class="fa fa-flask fa-1x"></i> Congé</a></li>
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="#" onclick="">  <i class="fa fa-camera fa-sm"></i> Catégorie</a></li>
                        <li class="active"><a href="index.php?p=service"><i class="fa fa-arrows-alt"></i> ETS ou Service</a></li>
                        <li class="active"><a href="index.php?p=detache" ><i class="fa fa-circle-o"></i> Lieu de détachement</a></li>
                        <li class="active"><a href="index.php?p=corps" ><i class="fa fa-adjust"></i> Corps</a></li>
                    </ul>
                </li>


                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Retraité </span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <?php 
                        $req = groupByRetraite();
                        foreach ($req as $data) {?>
                        <li class='header' id='gauche'> 
                            <span class="">
                           
                            <a href="index.php?p=listeretraite&annee=<?php echo date('Y', strtotime($data->retraite))?>"> 
                               <i class="fa fa-angle-double-right"></i>  <?php echo date('Y', strtotime($data->retraite))  ?> : <?php echo $data->somme ?>
                            </a>
                            </span>
                        </li>   
                        <?php } ?>
                    </ul>
                </li>


                <li><a href="#"><i class="fa fa-book"></i> Documentation</a></li>
                <li><a href="../Conge/"><i class="fa fa-book"></i> Congé</a></li>






            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <section  class="content">

          <?php echo $contenu ?>    
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <b> Copyright &copy; </b>  <?php echo date("Y") ?> Conception et Développement : 
            <a href="mailto:tina.wdata@gmail.com">  RANDRIANAIVONJOEL Tina H.</a>
        </div>
            <span ><b>Directeur de la DIA</b> : IG ASSANY Bemarivo Jeannot </span>
            <b> - Supérviseur :   </b> 
            <a href="mailto:randriamaroriri@gmail.com"> COMMANDANT  MBOLA MAMITIANA Elie Haris</a>
    </footer>

    <!-- Bootstrap
    <script src="bootstrap/js/jquery-3.1.0.js"></script>
    3.3.2 JS -->
    <script src="public/js/bootstrap.min.js" type="text/javascript"></script>
    <!----   <script src="bootstrap/js/jquery.slimscroll.min.js" type="text/javascript"></script>

       <script src='bootstrap/js/fastclick.min.js'></script>
       <script src="bootstrap/js/demo.js" type="text/javascript"></script>
   ---->

    <script src="public/js/app.min.js" type="text/javascript"></script>

</body>
</html>
