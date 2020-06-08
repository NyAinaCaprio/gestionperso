<br><br>

 <?php
$message= array();
 
if (!empty($_POST)) {
 

  if (empty($_POST['corps']) && empty($_POST['region']) && empty($_POST['force']) && empty($_POST['lieu'])) {
      $message['danger'] = "Veuillez completer les champs vides ";     
  }else{


      $var = getByCorps($_POST['corps']);
      if ($var) {
            $message['danger'] = "corps existant";
            header("location:index.php?p=corps");
            exit(); 
        }
        else{
       $req = $db->prepare('INSERT INTO corps SET 
        corps = ?, 
        region = ?, 
        lieu = ?, 
        forcecorps = ?');   
    $req->execute(array(
         $_POST['corps'],
         $_POST['region'],
         $_POST['lieu'],
         $_POST['forcecorps']
        )); 
    $message['success'] = "Enregistrement reussi";

            }
  }

      $_SESSION['message'] = $message;
} 




    
?>
<br>
<?php if ( array_key_exists('message', $_SESSION)) : ?>
   
    <?php foreach ($_SESSION['message'] as $key => $messages) :   ?>
      <div class="alert alert-<?php echo $key ?> ">
        <?php echo $messages ?>
      </div>  
    <?php endforeach ?>
  
<?php endif ?>
<?php unset($_SESSION['message']) ?>
                

 <form method="post"  enctype="multipart/form-data">

  <div class="panel panel-danger">

      <div class="panel-heading">
      Formulaire d'ajout corps...
      </div>         
    <br>                  

      <div class="animated animate fadeInUp">

        <div class="form-group">
        <label>Corp :</label>
          <input  type="text"  name="corps" class="form-control input-sm"/>        
        </div>
        <div class="form-group">
        <label for="region">Région :</label>
        <input type="text" class="form-control" name="region">
        </div>

        <div class="form-group">
        <label for="force">Force :</label>
        <input type="text" class="form-control" name="forcecorps">
        </div>

        <div class="form-group">
        <label for="lieu">Lieu :</label>
        <input type="text" class="form-control" name="lieu">
        </div>

      <input type="submit" name='enregistrer' class="btn btn-danger" value='Enregistrer' > 

      </div>
  <hr>
	
 </form>

<div class="panel panel-green animated animate fadeInLeft">


    <div style="font-size:4rem;" class= "alert alert-info">
    Liste Corps
    </div>

    <table class="table">
        <thead>
            <tr >
            <th colspan="7"></th>
            </tr>
            <tr>
            <th>Corps</th>
            <th>Region</th>
            <th>Force</th>        
            <th>Lieu</th>        

            </tr>
        </thead>

        <tbody>

            <?php 
            $req1 = getAllCorps();
            while($data=$req1->fetch()) { ?>
            <tr>

                <td><?php echo $data->corps ?></td>
                <td><?php echo $data->region ?></td>
                <td><?php echo $data->forceCorps ?></td>
                <td><?php echo $data->lieu ?></td>

            </tr>
            </tr>
            <?php } ?>
        </tbody>    
    </table>

    <hr>

</div>
 