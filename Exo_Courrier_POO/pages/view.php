<?php
$data = App\App::getDb()->prepare('SELECT  * FROM courrier WHERE id = ?',array($_GET['id']), 'App\Tables\Courrier', true);
// l'objet data n'existe pas cad que ce n'est pas un objet 
// var_dump($data);
// nous voulons recuere juste un seul resultat
 // dons la fonction prepare prend un 4 eme parametre de 'one ' qui dit que si o prend un seul resultat
// il faut definir le style de fetch que l'on souhaite utilis& avec fetchstyle
?>

 <h4><?php echo $data->objet_courrier ?></h4>
 <p><?php echo $data->numrefcourrier ?></p>
 <p><?php echo $data->datecourrier ?></p>
 
 <p><?php echo $data->remarque ?></p>