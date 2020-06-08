<?php
	session_start();
	require '../inc/function.php';
	connexiondb();

	$message = array();

	$message = isValid2($_POST);


	if(!empty($message)){
	    $_SESSION['message'] = $message;
	    header("location:../index.php?p=addreliquat");
	}

	elseif (getAnneeRelikId($_POST['anneereliquat'], $_POST['id_civil'])) {

 		$message['danger']= "Reliquat déja enregistré";
	    $_SESSION['message'] = $message;
		header("location:../index.php?p=addreliquat");
	}

	 else {

	 	/*ancien reliquat + 30 jours*/

	 	$var = reliquatEncours($_POST['id_civil']);
	 	$var = $var + $_POST['nbrReliquat'];	 	
	 	addreliquatPers($_POST['id_civil'], $_POST['anneereliquat'], $var );


	    $message['success'] = "Enregistrement Reliquat reussi ! ";
	    $_SESSION['message'] = $message;
	    header("location:../index.php?p=addreliquat");
	}