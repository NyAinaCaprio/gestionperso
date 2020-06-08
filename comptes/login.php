<?php
include 'inc/header.php'; 
include 'inc/function.php'; 
require 'inc/db.php';
if (isset($_SESSION['auth'])) {
			header('location:account.php');
}
reconnected_coockie();

if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password']) ) {
 		$req = $db->prepare("SELECT * from users WHERE (username = :username OR mail = :username) AND confirmed_at IS NOT NULL");
		$req->execute(array(
			'username'=>$_POST['username']
			));
		$user = $req->fetch();
  		
/*		if (password_verify($_POST['password'], $user->password)) {
		 	$_SESSION['auth'] = $user;
			header('location:register.php');

		 } 
*/
		if ($user) {		
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
			$_SESSION['flash']['danger'] = "Mot de passe ou login invalide ! ";	
			header('location:login.php');
			exit();
		}
}
?>



<h1>Se connecter</h1>
	<form method='post' action=''>
		<div class="form-group">
			<label>Pseudo ou E-mail </label>
			<input class='form-control' type='text' name='username' >
		</div>
		<div class="form-group">
			<label>Mot de passe <em><a href="forget.php">Mot de passe oublier ! </a></em></label>
			<input class='form-control' type='password' name='password' >
		</div>
		<div class="form-group">
			<input class='btn btn-primary' type='submit' value='enregistrer' name='Enregistrer'>
		</div>
		<div class="form-group">
			<label >
			<input type='checkbox' value='1' name='remember'>Se souvenir de moi 
			</label>
		</div>						
	</form>
 
<?php include 'inc/footer.php' ?>
