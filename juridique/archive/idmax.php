<?php 
$req1="select max(id_contenu) from contenu";
$tab=$db->query($req1)->fetch();

$_SESSION['idmax'] = $tab[0];
 
?>