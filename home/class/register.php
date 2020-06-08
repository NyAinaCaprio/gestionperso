<?php 
session_start();

if (!empty($_POST)) {

	$message = array();
	//|| filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL
	//preg_match('/^[a-zA-Z0-9]$/', $_POST['username'])
	require '../../spcm/inc/function.php';
	connexiondb();


	if (empty($_POST['username'])) {
		$message['username'] = "Nom d'utilisateur non valide";
	}else{
		$req = $db->prepare("SELECT id  from users WHERE username = ?");
		$req->execute(array($_POST['username']));
		$user = $req->fetch();
		if ($user) {
			$message['username'] = "ce Pseudo est déjà pris ! ";
			$_SESSION['message'] = $message;
			header("location:../../index.php?p=acces&etsouservice=".$_SESSION['etsouservice']."");
			exit();
	}
	}

	if (empty($_POST['password']) || $_POST['password']!=$_POST['password_confirm']) {
		$message['password'] = "password n'est pas valide";
		$_SESSION['message'] = $message;
		header("location:../../index.php?p=acces&etsouservice=".$_SESSION['etsouservice']."");
		exit();
	}
	
	if (empty($message)) {
		$req = $db->prepare("INSERT INTO users set username = ?, mail = ?, password = ?, confirmation_token = ? , service = ? ");
		$password = crypt($_POST['password']);
		$token = str_random(60);
		if ($req->execute(array( $_POST['username'], $_POST['mail'], $password, $token,strtolower($_POST['service']) ))) {
			$message['reussi'] = "Enregistrement reussi";
		}
		$user_id = $db->lastInsertId();
		if (mail($_POST['mail'], 'Confirmation mail', "Afin de valider votre compte merci de cliquer ce lien\n\nhttp://localhost/comptes/confirme.php?id=".$user_id."&confirmation_token=".$token."")) {
				$message['envoye'] = "Un email de confirmation vous a été envoyer";
			}else{
				$message['nonenvoye'] = "Email non envoyé";
			}

		$_SESSION['message'] = $message;
		header("location:../../index.php?p=acces&etsouservice=".$_SESSION['etsouservice']."");
		exit();
	 	}

} 
?>