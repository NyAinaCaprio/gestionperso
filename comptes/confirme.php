
<?php 
	session_start();
	require 'inc/function.php';
	$user_id = $_GET['id'];
	$token = $_GET['confirmation_token'];
	require 'inc/db.php';
	$req = $db->prepare("SELECT *  from users WHERE  confirmation_token = ?");
	$req->execute(array($token));
	$user = $req->fetch();
	if ($user && $user->confirmation_token == $token) {
		//session_start();
		$date = date('Y-m-d H:m:s');
		$db->query('UPDATE users SET confirmed_at = "'.$date.'", confirmation_token = NULL WHERE id = "'.$user_id.'"');
	 	$_SESSION['flash']['success'] = "Votre compte a ete valide";
		$_SESSION['auth'] =$user;
		header('location:account.php');
		//$errors['message']['succes'] = "On vient de vous envoyer un mail de confirmation ";	
	}else{
		//si quelq un tente d acceder sur le lien de token on le regdirige vers la page d'inscription
		//session_start();
		$_SESSION['flash']['danger']=" ce token n'est plus valide";
		header('location:login.php');

	}
 ?>