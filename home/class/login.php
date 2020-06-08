<?php 
	session_start();
	$message = array();
	 	
	require '../../spcm/inc/function.php';
	connexiondb();

	if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password']) ) {
 		$req = $db->prepare("SELECT * from users WHERE username = :username");
		$req->execute(array(
			'username'=>$_POST['username']
			));
		$user = $req->fetch();

		
		if 	(($_POST['password']===$user->password) &&
			( strtolower(strtolower($_SESSION['etsouservice'])) === $user->service) && 
			( strtolower($_POST['username']) === $user->username)) 
		{
	 		$_SESSION['auth'] = $user;
			
			header('location:../../'.$user->service.'/index.php');
		}else{
			$message['danger'] = "Mot de passe ou login invalide ! ";	
			$_SESSION['message'] = $message;	
		header("location:../../index.php?p=acces&etsouservice=".$_SESSION['etsouservice']."");
		exit();
		} 

/*		if ($user) {		
			$_SESSION['auth'] = $user;
			$_SESSION['flash']['success'] = 'VOUS ETE  CONNECTER';
			if ($_POST['remember']) {
				$remember_toker = str_random(255);
	 			$req = $db->prepare('UPDATE users SET remember_token = ? WHERE id = ?');
				$req->execute(array($remember_toker, $user->id));
	//setcookie(prend 3 parametre : son , la clé, le temps d expiration):			
	setcookie('remember', $user->id ."//". $remember_toker . sha1($user->id. 'blablabla'), time() + 60 * 60 * 24 * 7);
			}
			 
			header('location:account.php');

		}else{
			$message['danger'] = "Mot de passe ou login invalide ! ";	
			$_SESSION['message'] = $message;	
		header("location:../../index.php?p=acces&etsouservice=".$varetsouservice."");
		exit();
		}*/
}
?>

