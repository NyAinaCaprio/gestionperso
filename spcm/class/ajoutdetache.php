<?php 
if (!empty($_POST)) {
  $message = array();
  if (isset($_POST['enregistrer'] )) {
    if ($_POST['detache']=='') {
      $_SESSION['message']='Vous n\'avez pas bien remplir le formulaire'; 
    }else{
      $req= $db->prepare("INSERT INTO dettache SET dettache = ?");
      $req->execute(array($_POST['detache'] ));
      $_SESSION['message']="Enregistrement réussi";
    }
  }
}
?>

<?php if (array_key_exists('message', $_SESSION)): ?>
  <div class='alert alert-danger'>
    <?php echo $_SESSION['message'];  ?>
  </div>
<?php endif ?>
<?php unset($_SESSION['message'] ) ?>


<form method='post' action=''>
  <div class="row animated animate fadeInUp">
    <div class="col-md-6">
      <div class="form-group">
        <label>Détachement</label>
        <input type="text" class="form-control" required id="detache" name="detache" >
      </div>
      <div class="form-group">
        <button type='submit' class='btn btn-primary' name='enregistrer'>Enregistrer</button>
      </div>

    </div>

  </div>

  <div class="panel panel-primary animated animate fadeInDown">

    <div class="panel-heading ">
    Lieu de détachement
    </div>      
  
      <table class="table table-bordered table-advance table-hover">
        <thead>
            <tr>
              <th>Détachement</th>
            </tr>
        </thead>

        <tbody>

          <?php
          $req1 = getAllDetache();
          while($data=$req1->fetch()){
          ?>
          <tr>
              <td><?php echo $data->dettache ?></td>
          </tr>
          <?php }?>
        </tbody>
        </table>
  </div>      

</form>