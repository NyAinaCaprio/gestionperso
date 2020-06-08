<?php require 'inc/header.php' ?>
<?php 
 
	require 'inc/function.php';
	require 'inc/db.php';
	//AND reset_at > date_sub(NOW(), INTERVAL 1 MINUTE
	$req = $db->prepare("SELECT *  from users WHERE id = ? AND reset_token = ?");
	$req->execute(array($_GET['id'], $_GET['reset_token']));
	$user = $req->fetch();
	if ($user) {
		//session_start();
		if (!empty($_POST)) {
			if (!empty($_POST['password']) ||$_POST['password']==$_POST['password_confirm'] ) {
				# code... && $user->reset_token == $reset_token

				$password = crypt($_POST['password']);
				$req = $db->prepare('UPDATE users SET password = ?, reset_token = NULL WHERE id = ? ')
				$req->execute(array($password, $_GET['id']));
			 	$_SESSION['flash']['success'] = "Votre mot de passe a ete modifier";
				$_SESSION['auth'] =$user;
				header('location:account.php');
				exit();
				//$errors['message']['succes'] = "On vient de vous envoyer un mail de confirmation ";	
			}
		}
	}else{
		//si quelq un tente d acceder sur le lien de token on le regdirige vers la page d'inscription
		//session_start();
		$_SESSION['flash']['danger']=" ce token n'est plus valide";
		header('location:login.php');

	}
 ?>
<h1>Reinitialiser votre mot de passe</h1>
	<form method='post' action=''>
		<div class="form-group">
			<label>Mot de passe</label>
			<input class='form-control' type='password' name='password'  >
		</div>
		<div class="form-group">
			<label>Confirmation</label>
			<input class='form-control' type='password' name='password_confirm' >
		</div>
		<div class="form-group">
			<input class='btn btn-primary' type='submit' value='enregistrer' name='Enregistrer'>
		</div>						
	</form>


<?php include 'inc/footer.php' ?>
