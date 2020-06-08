<?php session_start();
     header('Content-Type: text/html; charset=utf-8'); // écrase l'entête utf-8 envoyé par php
//ini_set( 'default_charset', 'ISO-8859-1' );

$db = new PDO('mysql:host=localhost;dbname=gestiondestock', 'root', 'server');
$data= $db->query("select * from titreinventaire where id_titre_inventaire = '".$_SESSION['id_titre_inventaire']."'")->fetch();
?>
<style type="text/Css">
<!--
.test1
{
    border: solid 1px #FF0000;
    background: #FFFFFF;
    border-collapse: collapse;
}
.fondbleu{
	background-color: blue;
	color:#FFFFFF;
}
-->
</style>
<page orientation="paysage"  style="font-size: 12px">

    <span style="font-weight: bold; font-size: 18pt; color: #FF0000; font-family: Times">Fiche d'inventaire<br></span>
    <br>
    du : <?php echo $data['date'].' le '.$data['saisile'] ?> <br />
    <br>
    <hr style="height: 1mm; background: #AA5500; border: solid 1mm #0055AA">
  
    <br>
     <table style="border: solid 1px #000000; width:100%; " border="1px" cellpadding="0" cellspacing="0">
	<tr>
		<td class="fondbleu">REFERENCE</td>
		<td style="width: 30%;" class="fondbleu">LIBELLE PRODUIT</td>
		<td class="fondbleu">QTE INITIALE</td>
		<td class="fondbleu">QTE ENTREE</td>
		<td class="fondbleu">QTE SORTIE</td>
		<td class="fondbleu">STOCK REEL</td>
		<td class="fondbleu">STOCK PHYSIQUE</td>
		<td class="fondbleu">ECART</td>
		<td style="width: 15%" class="fondbleu">REMARQUE</td>

	</tr>
	<?php 
	$donne = $db->query("select * from inventaire where id_inventaire = '".$_SESSION['id_titre_inventaire']."'");
	foreach ($donne as $result) { ?>
	<tr>
		<td><?php echo $result['reference'] ?></td>
		<td><?php echo utf8_encode($result['libelleproduit']) ?></td>
		<td><?php echo $result['qteinitiale'] ?></td>
		<td><?php echo $result['qteentree'] ?></td>
		<td><?php echo $result['qtesortie'] ?></td>
		<td><?php echo $result['stockreel'] ?></td>
		<td><?php echo $result['stockphysique'] ?></td>
		<td><?php echo $result['ecart'] ?></td>
		<td><?php echo utf8_encode($result['remarque']) ?></td>
	</tr>
	<?php }?>
   </table>
     <p> <?php echo $donne->rowcount() ?> enregistrements...</p>
</page>