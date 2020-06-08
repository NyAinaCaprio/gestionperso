<?php require 'inc/header.php' ?>
<?php require 'inc/function.php' ?>

<?php 

if (!empty($_POST) && !empty($_POST['mail'] )) {

		require 'inc/db.php';
 		$req = $db->prepare("SELECT * from users WHERE mail = ? AND confirmed_at IS NOT NULL ");
		$req->execute(array($_POST['mail']));
		$user = $req->fetch();
		
		 
		if ($user) {
		$reset_token = str_random(60);
		$db->prepare('UPDATE users SET reset_token = ? , reset_at = NOW() WHERE id = ?')->execute(array($reset_token, $user->id));
		//$db->query('UPDATE users SET confirmed_at = NULL, confirmation_token = "'.$token.'" WHERE id = "'.$user->id.'" ');
		mail($_POST['mail'], 'Reinitialisation mot de passe', "Afin de valider votre compte merci de cliquer ce lien\n\nhttp://localhost/comptes/reset.php?id={$user->id}&token=$reset_token");	
	 	$_SESSION['flash']['success'] = "Reinitialisation de votre mot de passe \n\n Un email de confirmation vous a été envoyer";
	 	header('location:login.php');
	 	exit();
		}

}else{

$_SESSION['flash']['danger'] = "Mot de passe ou login invalide ! ";	

} 

 

 ?> 
	<form method='post' action=''>
		<div class="form-group">
			<label>Tapez votre mail : </label>
			<input class='form-control' type='mail' name='mail' >
		</div>
		<div class="form-group">
			<input class='btn btn-primary' type='submit' value='Envoyer' name='Envoyer'>
		</div>						
	</form>

<?php require 'inc/footer.php' ?>
