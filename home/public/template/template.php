<?php
$service = getAllService();
$ets = getAllEts();
$centre = getAllCentre();
$corps = getAllCorps();
 ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
 
        <title>Direction de l'Intendance de l'Armées</title>
 
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 
        <link  href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/jquery-3.3.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="public/font-awesome-4.3.0/css/font-awesome.min.css">

      </head>
<body>
<div class="bd-example mb-4">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="home/public/jpg/DSCN2645.JPG" alt="Logo" width="100%" height="300px" />
        <div class="carousel-caption d-none d-md-block">
          <h5>Direction de l'Intendance de l'Armée</h5>
          <p>1960 - 2019</p>
        </div>
      </div>
<!--       <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div> -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="list-group" class="" id="headingOne">
            <button class="list-group-item list-group-item-action list-group-item-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                SERVICE
              </button>
            </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <ul class="list-group ">
              <?php foreach ($service as $liste1): ?>
                <a href="index.php?p=acces&etsouservice=<?php echo $liste1->etsouservice ?>" class="list-group-item list-group-item-warning d-flex  align-items-center ">
                   <?php echo $liste1->etsouservice  ?> 
                </a>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="list-group" id="headingTwo">
            <button   class="list-group-item list-group-item-action list-group-item-primary" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              ETABLISSEMENT
            </button>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample"><ul class="list-group">
              <?php foreach ($ets as $liste): ?>
                <a href="index.php?p=acces&etsouservice=<?php echo $liste->etsouservice ?>" class="list-group-item list-group-item-warning d-flex justify-content-between align-items-center" >
                  <?php echo $liste->etsouservice ;  ?>
                </a>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="list-group" id="headingThree">
              <button class="list-group-item list-group-item-action list-group-item-primary" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                 CENTRE
              </button>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <ul class="list-group">
              <?php foreach ($centre as $liste): ?>
                <a href="index.php?p=acces&etsouservice=<?php echo $liste->etsouservice?>"><?php echo $liste->etsouservice; ?>" class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $liste->corps;  ?>
                </a>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="list-group" id="headingThree">
              <button class="list-group-item list-group-item-action list-group-item-primary" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                 CORPS
              </button>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <ul class="list-group">
              <?php foreach ($corps as $liste): ?>
                <a href="index.php?p=acces&etsouservice=<?php echo $liste->id_corps?>" class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $liste->corps;  ?>
                </a>
              <?php endforeach ?>
            </ul>
          </div>
        </div>        
        <div class="card">
          <div class="list-group" id="headingThree">
              <button class="list-group-item list-group-item-action list-group-item-primary" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                 EVENEMENTS
              </button>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <ul id="" class="">
              <li><a href="SaintMartin/">Saint Matin</a> </li>
                <li><a href=""></a> Video</li>
              </ul>              
            </div>
          </div>
        </div>
        <div class="card">
          <div class="list-group" id="headingThree">
              <button class="list-group-item list-group-item-action list-group-item-primary" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                 SPORT
              </button>
          </div>
          <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <ul id="collapse-sport" class="collapse">
                <li><a href="Evenements/photos.php"></a> Calendrier</li>
                <li><a href="Evenements/video.php"></a></li>
              </ul>              
            </div>
          </div>
        </div>
        <div class="card">
          <div class="list-group" id="headingThree">
              <a class="list-group-item list-group-item-action list-group-item-primary" href="index.php?p=organigramme" >
                 ORGANIGRAMME
              </a>
          </div>
        </div>
        <div class="card">
          <div class="list-group" id="headingThree">
              <a class="list-group-item list-group-item-action list-group-item-primary" href="droit/" >
                 DROIT PUBLIC
              </a>
          </div>
        </div>                        
      </div>      
    </nav>
  
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <?php if (array_key_exists('message', $_SESSION)) : ?>
    <ul>
        
      <?php foreach ($_SESSION['message'] as $key => $message) : ?>
            <div class="col-md-12 alert alert-<?php echo $key ?>  "><li><?php echo $message ?></li></div>
      <?php endforeach ?>
    </ul>
      <?php endif ?>
      <?php unset($_SESSION['message']); ?>
   
       <?php echo $contenu ?>
     </main>
  </div>
</div>

        <footer class="col-md-12">

        <p class="float-right"  >    
          <a href="#">Conception et Développement : </a>   
          <a href="#">RANDRIANAIVONJOEL Tina Heriniaina.</a>
        </p>
        <p >
          <a href="#">&copy; 2019 Service Informatique de la DIA.</a>
        </p>
        <p><b>Superviseur</b> : COMMANDANT  MBOLA MAMITIANA Elie Haris.</p>
      </footer>


    </body>
</html>

      <script src="public/js/popper.min.js" ></script>
      <script src="public/js/bootstrap.min.js"  ></script>  