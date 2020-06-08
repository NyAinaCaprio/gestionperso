<?php 
require 'function.php';
connexiondb();
$message = array();

if (isset($_POST['enregistrer'])) {

$query=$db->prepare('INSERT INTO mouvement (type,source, date, numerodelapj,BLouBMS,saisipar,saisile)
				 VALUES (:type, :source, :date, :numerodelapj, :BLouBMS, :saisipar, :saisile)');

$query->execute(array(
		'type' =>  $_POST['type'],
        'source' =>  $_POST['source'],
        'date' =>  $_POST['date'],
        'numerodelapj' =>  $_POST['numerodelapj'],
        'BLouBMS' =>  $_POST['bloubms'],
        'saisipar' =>  $_POST['saisipar'],
        'saisile' =>  $_POST['saisile']
	));

    

  

	for ($i=0; $i < count($_POST['reference']) ; $i++) { 

		$idMaxMouvement = getIdMaxMouv();

		$query = $db->prepare('INSERT INTO detail_mouvement (id_mouvement, reference, quantite, etat, observation) 
			VALUES (:id_mouvement, :reference, :quantite, :etat, :observation)');
		
		$query->execute(array(

		'id_mouvement' =>  $idMaxMouvement,
		'reference' =>  $_POST['reference'][$i],
        'quantite' =>  $_POST['quantite'][$i],
        'etat' =>  $_POST['etat'][$i],
        'observation' =>  $_POST['observation'][$i]
        ));
	}
	$_SESSION['message'] ='Enregistrement reussi ! ';
	header('Location:../index.php?p=DON');
} 
 ?>


 
<?php /*
require 'function.php';
connexiondb();

if (isset($_POST['enregistrer'])) {

$query=$db->prepare('INSERT INTO mouvement (type,source, date, numerodelapj,BLouBMS,saisipar,saisile)
				 VALUES (:type, :source, :date, :numerodelapj, :BLouBMS, :saisipar, :saisile)');

$query->execute([
	    'type' =>  $_POST['type'],
        'source' =>  $_POST['source'],
        'date' =>  $_POST['date'],
        'numerodelapj' =>  $_POST['numerodelapj'],
        'BLouBMS' =>  $_POST['bloubms'],
        'saisipar' =>  $_POST['saisipar'],
        'saisile' =>  $_POST['saisile']
        ]);

    $idMaxMouvement = getIdMaxMouv();
 
 	$reference = $_POST['reference'];
	$quantite = $_POST['quantite'];
	$etat = $_POST['etat'];
	$observation = $_POST['observation'];

	$query ='';
	for ($i=0; $i < count($reference) ; $i++) { 

		$reference_clean = $db->quote($reference);
		$quantite_clean = $db->quote($quantite);
		$etat_clean = $db->quote($etat);
		$observation_clean = $db->quote($observation);

		$query = $db->prepare('INSERT INTO detail_mouvement (id_mouvement, reference, quatinte, etat, type) VALUES ("'.$idMaxMouvement.'", "'.$reference_clean.'", "'.$quantite_clean.'", "'.$etat_clean.'","'.$observation_clean.'")');
		$query->execute();
	}
}*/
 ?> 