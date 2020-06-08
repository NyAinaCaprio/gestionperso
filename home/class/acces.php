<?php
  if (isset($_GET['etsouservice'])) {
      $_SESSION['etsouservice'] = $_GET['etsouservice'];

    } 
?>




<form action="home/class/register.php" method='post'>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Création de compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="username" class="col-form-label">Nom d'utilisateur</label>
            <input required  type="text" class="form-control" id="username" name="username" >
          </div>
          <div class="form-group">
            <label for="mail" class="col-form-label">Adresse mail</label>
            <input required type="text" class="form-control" id="mail" name="mail" >
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Mot de passe</label>
            <input required type="password" class="form-control" id="password" name="password" >
          </div>
          <div class="form-group">
            <label for="password2" class="col-form-label">Confirmation mot de passe</label>
            <input required type="password" class="form-control" id="password_confirm" name="password_confirm" >
          </div>        
          <div class="form-group">
            <label for="password2" class="col-form-label">Choix</label>
            <select required name="service" class="form-control">
            	<option value=""></option>
            	<?php echo SelectBox_affect_Succ() ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
</form>
<center>


<form  action="home/class/login.php" class="form-login" name="formlogin" method="post" enctype="multipart/form-data">
<div class="card alert alert-info" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
      <?php  
      if ( array_key_exists('message', $_SESSION)) : ?>
      <div>
        <?php foreach ($_SESSION['message'] as $message) :   ?>
          <div class='alert alert-danger'>
            <?php echo $message ?>
          </div>
        <?php endforeach ?>
      </div>
      <?php endif ?>
      <?php unset($_SESSION['message']) ?>
      Authentification
    </p>
  </div>
  <div class="list-group list-group-flush">
    <div class="form-group">
      <input type="text" name="username" class="form-control"  placeholder="Nom d'utilisateur" id="username" autofocus="autofocus" required />
    </div>

    <div class="form-group">
      <input name="password" type="password" id="password" placeholder="mot de passe"  class="form-control" maxlength="50" autofocus="autofocus" required />
    </div>
     
  </div>
  <div class="card-body">
    <div class='form-group'>
      <i class="fa fa-lock"></i>
      <input type="submit" id="btnlogin" class="btn btn-warning btn-block"  value="Valider" />
    </div>
  </div>
    <div class="login-social-link centered">
      <p>Vous pouvez consulter notre site web</p>
      <a href="index.php" class=" btn btn-success ">Site de la DIA</a>
    </div>
    <p class="registration">
      Vous n'avez pas encore d'un compte?<br/>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Création d'un compte</button>
    </p>
</div>
</form>

   
</center> 
		   