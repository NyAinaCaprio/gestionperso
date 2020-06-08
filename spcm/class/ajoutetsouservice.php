<?php 
if (!empty($_POST)) {
      $message=array(); 
  if (isset($_POST['enregistrer'] )) {

       $data = getEtsouService($_POST["etsouservice"])->fetch();
        if($data){
         $_SESSION['message']= $_POST["etsouservice"]." existant";            
        }else{
 
              $req= $db->prepare("INSERT INTO etsouservice (etsouservice, libelle, SE) VALUES (:etsouservice, :libelle, :se)");
              $req->execute(array(
                ':etsouservice' =>$_POST["etsouservice"],
                ':libelle' =>$_POST["libelle"],
                ':se' =>$_POST["SE"]
                ));
                
                $_SESSION['message']="Enregistrement reussi";
                header("location:index.php?p=service");
         }
    
  }

      if (isset($_POST['modifier'] )) {

          $req= $db->prepare("UPDATE etsouservice SET etsouservice = ?, libelle= ?, SE= ? WHERE id_etsouservice = ?");
          $req->execute(array( 
          $_POST["etsouservice"],
          $_POST["libelle"],
          $_POST["SE"],
          $_GET["id_etsouservice"]
          ));

          $_SESSION['message']="Modification reussi";
          header("location:index.php?p=service");
         }
    }

 ?>

 
<?php if (array_key_exists('message', $_SESSION)): ?>
  <div class='alert alert-danger'>
    <?php echo $_SESSION['message'];  ?>
  </div>
<?php endif ?>
<?php unset($_SESSION['message'] ) ?>
      <form action=""  method='post' class="animated animate fadeInUp" >
  <div class=''>
    <div class='row'>
      <div id='centre' class='col-md-12' >
  

<?php if (!isset($_GET['id_etsouservice'])): ?>
    <div class="panel panel-danger">
        <div class="panel-heading">
            Formulaire d'ajout ETS ou Service...
        </div>
 
            
          <div class="box box-solid">
            <div class="box-header">
              <div class="col-md-6">
                 <div class="form-group">
                  <label for="choix"> Choix</label>
                   <select id='choix' name = "SE" class='form-control'>
                    <option value='SERVICE'>SERVICE</option>
                    <option value='ETABLISSEMENT'>ETABLISSEMENT</option>
                    <option value='DIRECTION'>DIRECTION</option>
                   </select>
                </div>
                  <div class="form-group">
                  <label for="etsouservice"> Nom</label>
                  <input type="text" class="form-control" required="" name="etsouservice">
                </div>
                <div class="form-group">
                  <label for="libelle"> Libelle</label>
                  <input type="text" class="form-control" required="" name="libelle">
                </div>
                <div class="form-group">
                  <input class='btn btn-primary' type='submit' value='enregistrer' name='enregistrer'>
                </div>
              </div>               
                
            </div> 

          </div>           
    </div>
 <?php endif ?>  
   

<?php if (isset($_GET['id_etsouservice'])): ?>
  <?php $data = getEtsouService($_GET['id_etsouservice'])->fetch();  ?>
  <div class="panel panel-danger">
        <div class="panel-heading">
            Modification 
        </div>

            
          <div class="box box-solid">
            <div class="box-header">
              <div class="col-md-6">                      
               <div class="form-group">
                  <label for="choix"> Choix</label>
                   <select id='choix' name = "SE" class='form-control'>
                    <option value='<?php echo $data->SE ?>'><?php echo $data->SE ?></option>
                    <option value='SERVICE'>SERVICE</option>
                    <option value='ETABLISSEMENT'>ETABLISSEMENT</option>
                    <option value='DIRECTION'>DIRECTION</option>
                   </select>
                </div>
                <div class="form-group">
                  <label for="etsouservice"> Nom</label>
                  <input type="text" class="form-control" required="" value='<?php echo $data->etsouservice ?>' name="etsouservice">
                </div>
                <div class="form-group">
                  <label for="libelle"> Libelle</label>
                  <input type="text" class="form-control" required="" value='<?php echo $data->libelle ?>' name="libelle">
                </div>
                <div class="form-group">
                  <input class='btn btn-primary' type='submit' value='Modifier' name='modifier'>
                </div>
              </div>               
                
            </div> 

          </div>           
    </div>

      <a href="index.php?p=service" class='btn btn-info'>Créer Nouveau</a>

<?php endif ?>


  
    <div class="panel panel-primary animated animate fadeInDown">

    <div class="panel-heading ">
    Liste de tous les services ou etablissement
    </div>         
        <table class="table table-bordered table-advance table-hover">

            <thead>
                <tr>
                <th>Editer</th>
                <th>ETS ou Service</th>
                <th>Libellé</th>
                <th>SE</th>
                <th>Suppr</th>
                </tr>

            </thead>

        <tbody>

        <?php
        $req1 = getAllEtsouservice();
        while($data=$req1->fetch()){
        ?>
        <tr>
            <td> <a href="index.php?p=service&id_etsouservice=<?php echo $data->id_etsouservice ?>"><i class="fa fa-edit fa-1x"></i></a></td>
            <td><?php echo $data->etsouservice ?></td>
            <td><?php echo $data->libelle ?></td>
            <td><?php echo $data->SE ?></td>
            <td> <a href="index.php?p=delete&tab=etsouservice&var=<?php echo $data->id_etsouservice ?>"><i class='fa fa-trash fa-1x'></i></a></td>
        </tr>
        <?php }?>
        </tbody>
        </table>
    </div>
 


      </div>
    </div>
  </div>

  </form>