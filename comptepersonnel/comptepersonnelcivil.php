<?php session_start();
if ($_SESSION["varservicelib"]=="" or $_SESSION["varcategoriecivil"]=="" or $_SESSION["varidcivil"]=="")
{
    header('location:../acces.php?etsouservice=Personnel');
}
//echo $_SESSION["varidcivil"].'<br>';
//echo $_SESSION["varservice"].'<br>';
//echo $_SESSION["varcategoriecivil"].'<br>';
//echo $_SESSION["varnomprenom"].'<br>';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Compte Personnel</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/animate.css">
    <script src="../assets/js/jquery-3.1.0.js" type="text/javascript"></script>
    <script type="text/javascript" src="../bootstrap/js/comptepersonnelscript.js"></script>
      <link href="../XXXassets/css/nexus.css" rel="stylesheet" type="text/css">
<!----------->
 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class=" sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a class="logo"><b>Compte</b></a>
            
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../index.php">Déconnexion</a></li>
            	</ul>
            </div>

        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"></a></p>
              	  
              	  	
                  <li class="mt">
                      <a class="active" href="javascript:;" onClick="CPC_acceuil()">
                          <i class="fa fa-dashboard"></i>
                          <span>Aceuil</span>                      </a>                  </li>

                  <li class="sub-menu">
                    <a  onClick="CPC_affichemodifetatcivilcivil()" >
					<i class="fa fa-desktop"></i><strong>Renseignement Personnel et Professionnel</strong></a>                  
				</li>
				<li class="sub-menu">
                    <a  onClick="CPC_affichemodifetatdeservicecivil()" >
					<i class="fa fa-adjust"></i><strong>Etat de service</strong></a>                  
				</li>

                  <li class="sub-menu">
                      <a href="javascript:;"  onClick="CPC_affichemodifavancementsuccessifscivil()"  >
                          <i class="fa fa-cogs"></i><strong>Avancements successives</strong></a>                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_affichemodifenfant_civil()" >
                          <i class="fa fa-book"></i><strong>Enfant en charge</strong></a>                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_afficheordredemerite()" >
                          <i class="fa fa-tasks"></i><strong>Decoration</strong></a>                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_affichemodifaffectationsuccessivescivil()" >
                          <i class="fa fa-th"></i><strong>Affectation successives</strong></a>                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_afficheaptitudeinfocivil()" >
                          <i class=" fa fa-bar-chart-o"></i><strong>Aptitude en informatique</strong></a>                  </li>

				  <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_affichemodifconge()" >
                          <i class=" fa fa-fax"></i>
                          <span><strong>Congé</strong><span>                      </a>                  </li>
						  
					<li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_affichemodifecoleformationstagecivil()" >
                          <i class=" fa  fa-bell-o"></i>
                          <span><strong>Ecole / Formation / Stage</strong><span>                      </a>                  </li>
						  
						  <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_affichemodifaptitudelinguistiquecivil()" >
                          <i class=" fa fa-beer"></i>
                          <span><strong>Aptitude linguistique</strong><span>                      </a>                  </li>
                          
                          <li class="sub-menu">
                      <a href="javascript:;" onClick="CPC_afficheaptitudeparticulier()" >
                          <i class=" fa fa-archive"></i>
                          <span><strong>Aptitude particulier</strong><span></a></li>
              </ul>
            <!-- sidebar menu end-->
          </div>
    </aside>

     <div id="main-content" class="row">
<!------------>
           <div id="centre" class="centre col-md-12">
           	
           </div>

    </div>


  </body>
</html>
