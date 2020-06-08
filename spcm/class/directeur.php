<?php 
$message = array();
if (!empty($_POST)) {

var_dump($_SERVER['DOCUMENT_ROOT']);
	var_dump($_POST);
	        if ($_SERVER['DOCUMENT_ROOT']=="E:/wamp/www/") {
	        	if (move_uploaded_file($_FILES['image']['tmp_name'], 'public/directeurImage/'.$_FILES['image']['name'])) {
                $filename = $_FILES['image']['name'];
            }else{
                $filename="";
                $message['danger'] ='Erreur lors de téléchargement d\'image';                
            }
        }else{
            if (move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/personnel/public/personnelImage/'.$_FILES['image']['name'])) {
                $filename = $_FILES['image']['name'];                
            }else{
                $filename="";
                $message['danger'] ='Erreur lors de téléchargement d\'image';
            }
        }
        if (addDirecteur($_POST, $filename)) {
         $message["success"] = "Enregistrement reussi ! ";
         $_SESSION['$message'] = $message;    
        header("location:index.php?p=directeur");
        }

}
 ?>

<?php if ( array_key_exists('message', $_SESSION)) : ?>
        <ul>
            <?php foreach ($_SESSION['message'] as $key => $messages) :   ?>
            <li>
                <div class='alert alert-<?php echo $key ?>'>
                    <?php echo $messages ?>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
<?php endif ?>
<?php unset($_SESSION['message']) ?>



<section  class="content">
            <div class="row">
                

<div class="col-md-12 mt-4">
<form method ="post" action="" enctype="multipart/form-data" >
	<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nomprenom">Nom & Prénoms :</label>
                <input type="text" class="form-control" required id="nomprenom" name="nomprenom" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="grade">Grade :</label>
                <input  type="text"  required class="form-control" id="grade" name="grade" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fonction">Fonction :</label>
                <input  type="text"  required class="form-control" id="fonction" name="fonction" value="DIRECTEUR" >
        </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="periode">Période du - au</label>
                <input type="text" class="form-control" required id="periode" name="periode" >
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="obs">Observation :</label>
                <textarea class="form-control" id="obs" name="obs"> </textarea>   
            </div>
        </div>
 	</div>




   <div class="form-group">
    <div class="form-check">
      <input required class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Validé l'enregistrement
      </label>
    </div>
  </div>
	<div class="form-group">
		<label for="image">Photo : </label>
		<input required type="file" name="image"  class="" />
	</div>
  <button type="submit" class="btn btn-warning">Enregistrer</button>
</form>

</div>


<div class='col-md-12'>
<h1>LISTE</h1>
<div class="">
<?php 
    $var = getDirecteur();
    foreach ($var as $value): ?>
    <div class="card mb-12" style="max-width: 640px;">
      <div class="row no-gutters">
        <div class="col-md-3">
            <img src="public/directeurImage/<?php echo $value->photo ?>" class="user-image" width="150px" height="auto" />
        </div>
        <div class="col-md-9">
          <div class="card-body">
            <h5 class="card-title"><h3><?php echo $value->grade ." " . $value->nomprenom ?></h3></h5>
            <p class="card-text"><small class="text-muted"><?php echo $value->fonction ?></small></p>
            <p class="card-text"><small class="text-muted"><?php echo $value->periode ?></small></p>
            <p class="card-text"><?php echo $value->obs ?></p>
          </div>
        </div>
      </div>
    </div>
    <hr>
<?php endforeach ?>
</div>
</div>
</div>
</section>