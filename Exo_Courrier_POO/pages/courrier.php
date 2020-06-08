<?php
/*$data = App\App::getDb()->prepare('SELECT  * FROM courrier WHERE id = ?',array($_GET['id']), 'App\Tables\Courrier', true); */

$courrier = App\Tables\Courrier::find($_GET['id']); 

/*if ($courrier === false) {
	App\App::notFound();
}
 */


App\App::setTitle($courrier->objet_courrier);

 // $classement = App\Tables\Classement::find($courrier->id_classement); 

// l'objet data n'existe pas cad que ce n'est pas un objet 
// var_dump($data);
// nous voulons recuere juste un seul resultat
 // dons la fonction prepare prend un 4 eme parametre de 'one ' qui dit que si o prend un seul resultat
// il faut definir le style de fetch que l'on souhaite utilis& avec fetchstyle
?>

 <h4><?php echo $courrier->objet_courrier ?></h4>
 <p><em class='text text-success'><?php echo $courrier->classement ?></em></p>
 <p><?php echo $courrier->numrefcourrier ?></p>
 <p><?php echo $courrier->datecourrier ?></p>
 
 <p><?php echo $courrier->remarque ?></p>