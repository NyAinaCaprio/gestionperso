<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=juridique', 'root', '');
 
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