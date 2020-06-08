
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
                     <?php require_once('entetedepage.php') ?>
                </div>
                <!-- End Top Menu -->
            </div>
        </div>
        <!-- End Header -->
        <!-- === END HEADER === -->
        <!-- === BEGIN CONTENT === -->
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <!-- Main Column -->
                    <div class="col-md-9">
                        <!-- Main Content -->
                        <div class="headline">
                            <h2 class="margin-bottom-20">Formulaire d'ajout type de projet</h2>
                        </div>
                          
                        <form action="codeajouttypedeprojet.php" method="POST">
                            <label>Type de projet:</label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-6 col-md-offset-0">
                                    <input placeholder="Majuscule"  required="" class="form-control" type="text" name="projet">
                                </div>
                            </div>
                            <p>
                                <button type="submit" class="btn btn-green">Enregistrer</button>
                            </p>
                            <br>
                            <p>Liste de tous les types </p>
                            <table class="table table-striped table-bordered">
                            <thead>
                            
                                <tr>
                                    <th>N°</th>
                                    <th>TYPE</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $data = $db->query('select * from projet'); 
                                foreach ($data as $donnee) {
                            ?>
                                <tr>
                                    <th><?php echo $donnee['id_projet'] ?></th>
                                    <th><?php echo $donnee['projet'] ?></th>
                                </tr>
                                <?php } ?>
                            </tbody>
                                
                            </table>


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