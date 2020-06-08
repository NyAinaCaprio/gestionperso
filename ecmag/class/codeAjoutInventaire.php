<?php 
require 'function.php';
require 'codeprepareetatdestock.php';
connexiondb();

$message = '';
$message = array();
if (isset($_POST['enregistrer']) && !empty($_POST['titre_inventaire'])) {
	
	$query= $db->prepare('INSERT INTO titreinventaire (titre_inventaire, date, saisipar, saisile) 
		VALUES (:titre_inventaire, :date, :saisipar , :saisile) ');
	$query->execute( array(
		'titre_inventaire'=> $_POST['titre_inventaire'],
			'date'=>$_POST['date'],
			'saisipar'=>$_POST['saisipar'],
			'saisile'=>$_POST['saisile']
		));

$idMaxTitre = getIdMax();

for ($i=0; $i < count($_POST['reference']) ; $i++) { 
	
	$query= $db->prepare('INSERT INTO inventaire (reference, libelleproduit, qteinitiale, qteentree, qtesortie, stockfinal, stockphysique, ecart, remarque, id_titreinventaire) 
		VALUES (:reference, :libelleproduit, :qteinitiale, :qteentree, :qtesortie, :stockfinal, :stockphysique, :ecart, :remarque, :id_titreinventaire) ');
	
	$query->execute( array(
		'reference'=>$_POST['reference'][$i] , 
		'libelleproduit' =>$_POST['libelleproduit'][$i],
		'qteinitiale' =>$_POST['qteinitiale'][$i],
		'qteentree' =>$_POST['qteentree'][$i],
		'qtesortie' =>$_POST['qtesortie'][$i],
		'stockfinal' =>$_POST['stockfinal'][$i],
		'stockphysique' =>$_POST['stockphysique'][$i],
		'ecart' =>$_POST['ecart'][$i],
		'remarque' =>$_POST['remarque'][$i],
		'id_titreinventaire' => $idMaxTitre	
		));
}

$_SESSION['message'] = 'Création inventaire réussi ! ';
header ('Location:../index.php?p=addInventaire');
}
else{

	$_SESSION['message'] = 'Erreur de traitement ! ';
}
 ?>