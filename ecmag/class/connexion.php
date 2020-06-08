 
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', 'server');
 header('Content-Type: text/html; charset=ISO-8859-1'); // écrase l'entête utf-8 envoyé par php
ini_set( 'default_charset', 'ISO-8859-1' );
 
} catch (PDOException $e) {
    print "<br><br><br><br>
    <div class='container' align='center'>
<div  class='row alert-danger'>

    <h1><br>Veuillez démarrer votre serveur de base de données</h1>
</div>
    </div>";
    die();
}


?> 