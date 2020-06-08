<?php session_start();
require_once('function.php');
connexiondb();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="post_menu.php" method="POST">

    <div class="col-md-12">
        <div class="text-center visible-lg">
            <ul id="hornavmenu" class="nav navbar-nav">
                <li>
                    <a href="index.php" class="fa-home active">Acceuil</a>
                </li>
                <li>
                    <a href="recherche.php"  ><span class="fa-search">Recherche</span></a>

                </li>
                <li>
                    <a href="index.php"  > <span class="fa-copy ">MISE A JOUR PROJET</span></a>
                    <ul>
                        <li>
                            <a href="ajouttype.php">Ajout type</a>
                        </li>
                        <li>
                            <a href="ajouttypedeprojet.php">Ajout type de projet</a>
                        </li>
                        <li>
                            <a href="ajoutnouveauprojet.php">Nouveau projet</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a >  <span class="fa-th ">Consultation</span></a>
                    <ul>
                        <?php
                        $reqlist = getAllProjet();
                        foreach ($reqlist as $datalist) { ?>
                            <li>
                                <a href="consultation.php?id_projet=<?php echo $datalist['id_projet'] ?>" > <?php  echo $datalist ['projet']?>  </a>
                            </li>

                        <?php } ?>
                    </ul>

                </li>

                <li>
                    <a href="contact.php" class="fa-comment ">Contact</a>
                </li>
                <li>
                    <a href="../" class="fa fa-power-off">Quitter</a>
                </li>
            </ul>
        </div>
    </div>
</form>
</body>
</html>

